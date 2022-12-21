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
        $data = MahasiswaModel::select('no_id as id', 'angkatan', 'jml_mhs');


        return DataTables::of($data->get())

            ->addColumn('aksi', function ($row) {
                $button = "";
                $button .= '<button data-id="'.$row->id.'" class="btn btn-danger btn-xs list-inline-item btn-circle delete" type="button" data-toggle="modal" data-placement="top" data-target="#hapusData">Hapus</button>';
                
                return $button;
            })
            ->editColumn('jml_mhs', function($row) {
                $jumlah = $row->jml_mhs;
                return $jumlah." Mahasiswa";
            })
            ->rawColumns(['aksi'])
            ->make(true);

    }

    public function mahasiswa(Request $request)
    {

        $jml_mhs = MahasiswaModel::select(DB::raw("Year(created_at), SUM(jml_mhs) as jml_mhs"))
                    ->GroupBy("year(created_at)")
                    ->pluck("jml_mhs");
        $angkatan = MahasiswaModel::select(DB::raw("angkatan"))
                    ->pluck("angkatan");

        return view('mahasiswa', compact('jml_mhs', 'angkatan'));
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


    public function delete(Request $request) 
    {
            $deleted = MahasiswaModel::where('no_id', $request->id);
            $deleted = $deleted->forceDelete();
    
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus!',
            ]);
    }

}
