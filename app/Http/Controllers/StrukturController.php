<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;

class StrukturController extends Controller
{
    public function index()
    {
        return view('admin.master.struktur.index');
    }


    public function loadData()
    {
        $query = DB::table('strukturOrganisasi')->select('*');

        return DataTables::of($query)

            ->addIndexColumn()

            ->addColumn('aksi', function ($item) {

                $editUrl = route('admin.struktur.edit', [
                    'id' => Crypt::encrypt($item->id),
                ]);


                // onclick="window.location.href=\'' . $editUrl . '\'">
                return '
                <div class="flex items-center gap-2">
                
                <button 
                class="bg-blue-600 text-white px-3 py-1 rounded-md"
                onclick="window.location.href=\'' . $editUrl . '\'">
                <i class="uil-edit"></i>
                </button>
                
                
                
                <button 
                class="bg-red-600 text-white px-3 py-1 rounded-md"
                 onclick="hapus(\'' . $item->id . '\', \'' . $item->nip . '\');">
                    <i class="fas fa-trash-alt"></i>
                </button>

            </div>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.master.struktur.create');
    }

    public function store(Request $request)
    {
        $data = $request->data;


        DB::beginTransaction();
        try {
            $cek = DB::table('strukturOrganisasi')->where([
                'nip' => $data['nip'],
            ])->count();
            if ($cek > 0) {
                return response()->json(['message' => 4]);
            }



            DB::table('strukturOrganisasi')->insert(
                [

                    'nip' => $data['nip'],
                    'nama' => $data['nama'],
                    'jabatan' => $data['jabatan'],
                    'kode' => $data['kode'],
                    'created_at' => date('Y-m-d H:i:s'),

                ]
            );

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 1
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message' => $th
            ]);
        }
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $dataAwal = DB::table('strukturOrganisasi')->where('id', $id)->first();
        $data = [
            'dataAwal' => $dataAwal,
        ];
        // dd($data);
        return view('admin.master.struktur.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->data;


        DB::beginTransaction();
        try {
            $cek = DB::table('strukturOrganisasi')->where([
                'nip' => $data['nip'],
            ])->count();
            if ($cek > 1) {
                return response()->json(['message' => 4]);
            }



            DB::table('strukturOrganisasi')->where('id', $data['id'])->update(
                [

                    'nip' => $data['nip'],
                    'nama' => $data['nama'],
                    'jabatan' => $data['jabatan'],
                    'kode' => $data['kode'],
                    'updated_at' => date('Y-m-d H:i:s'),

                ]
            );

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 1
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message' => $th
            ]);
        }
    }
    public function destroy(Request $request)
    {
        $id = $request->id;

        DB::beginTransaction();
        try {
            DB::table('strukturOrganisasi')->where([
                'id' => $id,

            ])->delete();
            DB::commit();

            return response()->json(
                [
                    'status' => true,
                    'message' => 1
                ]
            );
        } catch (\Throwable $th) {

            return response()->json(
                [
                    'status' => true,
                    'message' => $th
                ]
            );
        }
    }
}
