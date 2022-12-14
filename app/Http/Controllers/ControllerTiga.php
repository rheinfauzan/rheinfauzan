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
        $data = MahasiswaModel::select('no_id as id', 'nama_mhs', 'nim_mhs');

        return DataTables::of($data->withTrashed())
                ->addColumn( 'action', function($row) {
                    $button = '';
                    if ($row->deleted_at == null) {
                        $button .= '<button data-id="'.$row->id.'" class="btn btn-success btn-xs list-inline-item edit" type="button" data-toggle="modal" data-placement="top" data-target="#editData">Edit</button>';
                        $button .= '<button data-id="'.$row->id.'" class="btn btn-danger btn-xs list-inline-item btn-circle delete" type="button" data-toggle="modal" data-placement="top" data-target="#hapusData">Hapus</button>';
                    
                    } else {
                        $button .= '<button data-id="'.$row->id.'" class="btn btn-primary btn-xs list-inline-item restore" type="button" data-toggle="modal" data-placement="top" data-target="#restoreData">Restore</button>';
                        $button .= '<button data-id="'.$row->id.'" class="btn btn-danger btn-xs list-inline-item btn-circle forceDelete" type="button" data-toggle="modal" data-placement="top" data-target="#hapusData">Hapus</button>';
                    };  

                return $button;
                
                })
            ->rawColumns(['action'])
            ->make(true); 
    }

    public function mahasiswa()
    {
        return view('mahasiswa');
    }

    public function store(Request $request) 
    {
        $validation = Validator::make($request->all(), [
            'nama_mhs' => 'required',
            'nim_mhs' => 'required|numeric',
        ]);

        $mahasiswa = new MahasiswaModel();
        $mahasiswa->nama_mhs = $request->nama_mhs;
        $mahasiswa->nim_mhs = $request->nim_mhs;
        if ($mahasiswa->save()) {
            return response()->json([
                'success' => true,
                'message' => "Data berhasil disimpan",
            ]);
        }
    }


}
