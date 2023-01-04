<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ControllerTiga extends Controller
{
    public function get()
    {
        
        $total_mahasiswa = MahasiswaModel::select(DB::raw("CAST(SUM(jml_mhs) as unsigned) as jml_mhs, angkatan"))
                                         ->groupBy('angkatan')->get();
        $no_id = MahasiswaModel::select('no_id as id')->get();
        

 
        return DataTables::of($total_mahasiswa)
            ->editColumn('jml_mhs', function($row) {
                $jumlah = $row->jml_mhs;
                return $jumlah." Mahasiswa";
            })
            ->make(true);

    }

    public function mahasiswa(Request $request)
    {
        return view('mahasiswa');
    }


    public function store(Request $request) 
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
        'angkatan'     => 'required|numeric',
        'jml_mhs'   => 'required|numeric',
        ]);

        $mhs = new MahasiswaModel();
        $mhs->angkatan = $request->angkatan;
        $mhs->jml_mhs = $request->jml_mhs;
        if($mhs->save()){
            //return response
            return response()->json([
                'success' => true,
                'message' => 'Data Post Berhasil Dihapus!',
        ]);
        };     
    }

}
