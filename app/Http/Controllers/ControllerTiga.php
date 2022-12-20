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
        $data = MahasiswaModel::select('no_id as id', 'angkatan', 'jml_mhs')->whereYear('angkatan', date('Y'));

        return DataTables::of($data->get())

            ->addColumn('aksi', function ($row) {
                $button = "";
                $button .= '<button data-id="'.$row->id.'" class="btn btn-danger btn-xs list-inline-item btn-circle delete" type="button" data-toggle="modal" data-placement="top" data-target="#hapusData">Hapus</button>';
            })
            ->editColumn('jml_mhs', function($row) {
                $jumlah = $row->jml_mhs;
                return $jumlah." Mahasiswa";
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function mahasiswa()
    {
        return view('mahasiswa');
    }


    public function store() 
    {

    }

}
