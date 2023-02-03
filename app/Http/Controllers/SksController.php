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
        $sks = SksModel::select('id', 'sks', 'nm_matkul', 'bobot');

        return DataTables::of($sks->get())
            ->addColumn('action', function($row){
                $button = '';  
                

                    $button .= '<button data-id="'.$row->id.'" class="btn btn-success btn-xs list-inline-item edit" type="button" data-toggle="modal" data-placement="top" data-target="#editData">Edit</button>';
                    $button .= '<button data-id="'.$row->id.'" class="btn btn-danger btn-xs list-inline-item btn-circle forceDelete" type="button" data-toggle="modal" data-placement="top" data-target="#hapusData">Hapus</button>';
            
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
            'bobot'     => 'required|numeric',
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
        $data->bobot     = $request->bobot;

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
        $showsks = SksModel::select('id', 'sks', 'nm_matkul', 'bobot')->where('id', $request->id)->first();

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
            'bobot' => 'required|numeric',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data perlu diisi.',
                'data' => $validation->messages(),
            ]);
        }

        //create post
        SksModel::where('id', $request->id)
        ->update([
        'sks' => $request->sks, 
        'nm_matkul' => $request->matkul,
        'bobot' => $request->bobot,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
        ]);
    }

    public function forcedelete(Request $request)
    {
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

    // public function test() 
    // {
    //     $siswa = [
    //         (object)[
    //             'siswa_id'=>1,
    //             'nama'=>'siswa1',
    //         ],
    //         (object)[
    //             'siswa_id'=>2,
    //             'nama'=>'siswa2',
    //         ],
    //         (object)[
    //             'siswa_id'=>3,
    //             'nama'=>'siswa3',
    //         ],
    //     ];

    //     $datasiswa = [];
    //     // $key = [];

    //     foreach ($siswa as $i => $item) {
    //        $datasiswa[$item->siswa_id] = $item->nama; 
    //     //    $siswa[$i]->umur = '10'; //add atau get data object
    //     }

    //     // dd($datasiswa);

    //     $kelas = [
    //         (object)[
    //             'kelas_id'=>1,
    //             'nama_kelas'=>'Kelas A',
    //         ],
    //         (object)[
    //             'kelas_id'=>2,
    //             'nama_kelas'=>'Kelas B',
    //         ],
    //     ];

    //     $datakelas = [];

    //     foreach ($kelas as $key => $value) {
    //        $datakelas[$value->kelas_id] = $value->nama_kelas;
    //     };

    //     // dd($datakelas);




    //     $kelas_siswa = [
    //         (object)[
    //             'kelas_id'=>1,
    //             'siswa_id'=>1,
    //         ],
    //         (object)[
    //             'kelas_id'=>1,
    //             'siswa_id'=>2,
    //         ],
    //         (object)[
    //             'kelas_id'=>2,
    //             'siswa_id'=>3,
    //         ],
    //     ];


    //     foreach ($kelas_siswa as $key => $value) {
    //         // $kelas_siswa[$value->siswa_id];

    //         if (isset($datakelas[$value->kelas_id])) {
    //             $kelas_siswa[$key]->nama_kelas = $datakelas[$value->kelas_id];
    //         };


    //         if (isset($datasiswa[$value->siswa_id])) {
    //             $kelas_siswa[$key]->nama_siswa = $datasiswa[$value->siswa_id];
    //         }
    //     }

    //     $kelassiswafix = [];
    //     foreach ($kelas_siswa as $key => $value) {
    //         $kelassiswafix[$value->siswa_id] = [
    //             "nama_siswa" => $value->nama_siswa,
    //             "nama_kelas" => $value->nama_kelas,
    //         ];
    //     }

    //     // dd($kelassiswafix);

    //     $nilaiSiswa = [
    //         [
    //             'mapel'=>'Matematika',
    //             'nilai'=>79,
    //             'siswa_id'=>1,
    //             // 'kelas_id'=>1,
    //         ],
    //         [
    //             'mapel'=>'Matematika',
    //             'nilai'=>90,
    //             'siswa_id'=>1,
    //             // 'kelas_id'=>1,
    //         ],
    //         [
    //             'mapel'=>'Matematika',
    //             'nilai'=>89,
    //             'siswa_id'=>3,
    //             // 'kelas_id'=>1,
    //         ],
    //         [
    //             'mapel'=>'IPA',
    //             'nilai'=>76,
    //             'siswa_id'=>1,
    //             // 'kelas_id'=>1,
    //         ],
    //         [
    //             'mapel'=>'IPA',
    //             'nilai'=>80,
    //             'siswa_id'=>2,
    //             // 'kelas_id'=>1,
    //         ],
    //         [
    //             'mapel'=>'IPA',
    //             'nilai'=>83,
    //             'siswa_id'=>2,
    //             // 'kelas_id'=>1,
    //         ],
    //     ];

        
    //     foreach ($nilaiSiswa as $key => $value) {
    //         if (isset($kelassiswafix[$value['siswa_id']])) {
    //             // $nilaiSiswa[$key]->nama = $datasiswa[$value->siswa_id];
    //             // $nilaiSiswa[$key]->kelas = $kelassiswafix[$value->siswa_id];

    //             $nilaiSiswa[$key] = $nilaiSiswa[$key]+$kelassiswafix[$value['siswa_id']];
    //         }
    //     }



    //     // dd($nilaiSiswa);
    // }

    public function siswa()
    {
        $siswa = DB::table('siswa_kelas')
                ->join('tabel_siswa', 'siswa_kelas.siswa_id', '=', 'tabel_siswa.siswa_id')
                ->join('tabel_kelas', 'siswa_kelas.kelas_id', '=', 'tabel_kelas.kelas_id')
                ->select('siswa_kelas.siswa_id', 'tabel_siswa.nama', 'tabel_kelas.nm_kelas')
                ->get();
        

        dd($siswa);
    }
}
