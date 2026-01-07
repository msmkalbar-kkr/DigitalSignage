<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('admin.master.pengumuman.index');
    }


    public function loadData()
    {
        $query = DB::table('pengumuman')->select('*');

        return DataTables::of($query)
            ->addIndexColumn()

            ->editColumn('waktu', function ($item) {
                return \Carbon\Carbon::parse($item->waktu)->format('H:i');
            })

            ->addColumn('aksi', function ($item) {

                $editUrl = route('admin.pengumuman.edit', [
                    'id' => Crypt::encrypt($item->id),
                ]);

                return '
            <div class="flex items-center gap-2">
                <button 
                    class="bg-blue-600 text-white px-3 py-1 rounded-md"
                    onclick="window.location.href=\'' . $editUrl . '\'">
                    <i class="uil-edit"></i>
                </button>

                <button 
                    class="bg-red-600 text-white px-3 py-1 rounded-md"
                    onclick="hapus(\'' . $item->id . '\');">
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
        return view('admin.master.pengumuman.create');
    }

    public function store(Request $request)
    {
        $data = $request->data;


        DB::beginTransaction();
        try {




            DB::table('pengumuman')->insert(
                [

                    'judul' => $data['judul'],
                    'tanggal' => $data['tgl'],
                    'waktu' => $data['waktu'],
                    'tempat' => $data['tempat'],
                    'agenda' => $data['agenda'],
                    'keterangan' => $data['keterangan'],
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
        $dataAwal = DB::table('pengumuman')->where('id', $id)->first();
        $data = [
            'dataAwal' => $dataAwal,
        ];
        // dd($data);
        return view('admin.master.pengumuman.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->data;


        DB::beginTransaction();
        try {




            DB::table('pengumuman')->where('id', $data['id'])->update(
                [

                    'tanggal' => $data['tgl'],
                    'judul' => $data['judul'],
                    'waktu' => $data['waktu'],
                    'tempat' => $data['tempat'],
                    'agenda' => $data['agenda'],
                    'keterangan' => $data['keterangan'],
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
    public function destroy(Request $request)
    {
        $id = $request->id;

        DB::beginTransaction();
        try {
            DB::table('pengumuman')->where([
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
