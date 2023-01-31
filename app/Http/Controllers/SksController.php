<?php

namespace App\Http\Controllers;

use App\Models\SksModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SksController extends Controller
{
    public function index()
    {
        return view('sks');
    }

    public function skstabel(Request $request)
    {
        $sks = SksModel::select('id', 'sks', 'nm_matkul');

        return DataTables::of($sks->get())
            ->addColumn('action', function($row){
                $button = '';  
                

                    $button .= '<button data-id="'.$row->id.'" class="btn btn-success btn-sm list-inline-item edit" type="button" data-toggle="modal" data-placement="top" data-target="#editData">Edit</button>';
                    $button .= '<button data-id="'.$row->id.'" class="btn btn-danger btn-sm list-inline-item btn-circle forceDelete" type="button" data-toggle="modal" data-placement="top" data-target="#hapusData">Hapus</button>';
            
                return $button;
                })
            ->rawColumns(['action'])
            ->make(true);         
    }

    public function addsks(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'sks'       => 'required',
            'nm_matkul' => 'required',
        ]);

        if ($validation->fails()) {
            return response()
            ->json([
                'status' => false,
                'message' => 'Validasi gagal.',
                'data' => $validation->messages(),
            ]);
        }

        $data = new SksModel();
        $data->sks       = $request->sks;
        $data->nm_matkul = $request->nm_matkul;

        DB::beginTransaction();
        try {
            $data->save();
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Data SKS was saved successfully.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('daily')->error('Error Create SKS.  Detail Error: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Failed',
            ]);
        }

    }

    public function show(Request $request)
    {
        $showsks = SksModel::select('id', 'sks', 'nm_matkul')->where('id', $request->id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data' => $showsks,
        ]);
    }

    public function updatedata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'sks' => 'required',
            'matkul' => 'required',
        ]);

        //create post
        SksModel::where('id', $request->id)
        ->update([
        'sks' => $request->sks, 
        'nm_matkul' => $request->matkul,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
        ]);
    }

    public function forcedelete(Request $request)
    {
        // $forcedelete = SksModel::foreign('sks_id')->references('id')->on('tb_sks as t_sks')->onDelete('cascade');
        $forcedelete = SksModel::where('id', $request->id);
        $forcedelete->delete();

        try {
            $forcedelete->forceDelete();
        } catch (\Throwable $th) {
            //throw $th;
        }

        return response()->json([
            'success' => true,
            'message' => "Data berhasil dihapus",
        ]);
    }

    public function test() 
    {
        $siswa = [
            (object)[
                'siswa_id'=>1,
                'nama'=>'siswa1',
            ],
            (object)[
                'siswa_id'=>2,
                'nama'=>'siswa2',
            ],
            (object)[
                'siswa_id'=>3,
                'nama'=>'siswa3',
            ],
        ];

        $datasiswa = [];
        // $key = [];

        foreach ($siswa as $i => $item) {
           $datasiswa[$item->siswa_id] = $item->nama; 
        //    $siswa[$i]->umur = '10'; //add atau get data object
        }

        // dd($siswa);

        $kelas = [
            (object)[
                'kelas_id'=>1,
                'nama_kelas'=>'Kelas A',
            ],
            (object)[
                'kelas_id'=>2,
                'nama_kelas'=>'Kelas B',
            ],
        ];

        $datakelas = [];
        // $key = [];

        foreach ($kelas as $key => $value) {
           $datakelas[$value->kelas_id] = $value->nama_kelas;
        };

        // dd($kelassiswa);




        $kelas_siswa = [
            (object)[
                'kelas_id'=>1,
                'siswa_id'=>1,
            ],
            (object)[
                'kelas_id'=>1,
                'siswa_id'=>2,
            ],
            (object)[
                'kelas_id'=>2,
                'siswa_id'=>3,
            ],
        ];


        foreach ($kelas_siswa as $key => $value) {
            // $kelas_siswa[$value->siswa_id];

            if (isset($datakelas[$value->kelas_id])) {
                $kelas_siswa[$key]->nama_kelas = $datakelas[$value->kelas_id];
            };


            if (isset($datasiswa[$value->siswa_id])) {
                $kelas_siswa[$key]->nama_siswa = $datasiswa[$value->siswa_id];
            }
        }

        $kelassiswafix = [];
        foreach ($kelas_siswa as $key => $value) {
            $kelassiswafix[$value->siswa_id] = [
                "kelas_id" => $value->kelas_id,
                "nama_kelas" => $value->nama_kelas,
                "nama_siswa" => $value->nama_siswa,
            ];
        }

        // dd($kelassiswafix);

        $nilaiSiswa = [
            (object)[
                'mapel'=>'Matematika',
                'nilai'=>79,
                'siswa_id'=>1,
            ],
            (object)[
                'mapel'=>'Matematika',
                'nilai'=>90,
                'siswa_id'=>2,
            ],
            (object)[
                'mapel'=>'Matematika',
                'nilai'=>89,
                'siswa_id'=>3,
            ],
            (object)[
                'mapel'=>'IPA',
                'nilai'=>76,
                'siswa_id'=>1,
            ],
            (object)[
                'mapel'=>'IPA',
                'nilai'=>80,
                'siswa_id'=>2,
            ],
            (object)[
                'mapel'=>'IPA',
                'nilai'=>83,
                'siswa_id'=>3,
            ],
        ];

        $data = 

        dd($data);
    }
}
