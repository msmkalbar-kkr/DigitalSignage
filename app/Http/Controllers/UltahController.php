<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class UltahController extends Controller
{
    public function index()
    {
        return view('admin.master.ultah.index');
    }


    public function loadData()
    {
        $query = DB::table('ulangTahun')->select('*');

        return DataTables::of($query)

            ->addIndexColumn()

            ->addColumn('aksi', function ($item) {

                $editUrl = route('admin.ultah.edit', [
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
        return view('admin.master.ultah.create');
    }

    public function store(Request $request)
    {
        // Validasi file foto
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan file foto
        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto', 'public');
        }


        $data = json_decode($request->data, true);

        // dd($data);

        DB::beginTransaction();
        try {

            // Cek nip sudah ada atau belum
            $cek = DB::table('ulangTahun')
                ->where('nip', $data['nip'])
                ->count();


            if ($cek > 0) {
                return response()->json(['message' => 4]);
            }
            // Simpan data
            DB::table('ulangTahun')->insert([
                'foto'         => $path,
                'nip'          => $data['nip'],
                'nama'         => $data['nama'],
                'tanggalLahir' => $data['tgl'],
                'jabatan'      => $data['jabatan'],
                'created_at'   => now(),
            ]);

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => 1
            ]);
        } catch (\Throwable $th) {

            DB::rollBack();

            return response()->json([
                'status'  => false,
                'message' => $th->getMessage()
            ]);
        }
    }


    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $dataAwal = DB::table('ulangTahun')->where('id', $id)->first();
        $data = [
            'dataAwal' => $dataAwal,
        ];
        // dd($data);
        return view('admin.master.ultah.edit')->with($data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Simpan file foto
        $path = null;
        if ($request->hasFile('foto')) {

            $path = $request->file('foto')->store('foto', 'public');
        }


        $data = json_decode($request->data, true);

        $old = DB::table('ulangTahun')->where('id', $data['id'])->first();
        if ($old->foto && Storage::disk('public')->exists($old->foto)) {
            Storage::disk('public')->delete($old->foto);
        }


        DB::beginTransaction();
        try {

            $cek = DB::table('ulangTahun')->where([
                'nip' => $data['nip'],
            ])->count();
            if ($cek > 1) {
                return response()->json(['message' => 4]);
            }



            DB::table('ulangTahun')->where('id', $data['id'])->update(
                [
                    'foto' => $path,
                    'nip' => $data['nip'],
                    'nama' => $data['nama'],
                    'jabatan' => $data['jabatan'],
                    'tanggalLahir' => $data['tgl'],
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
            DB::table('ulangTahun')->where([
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
