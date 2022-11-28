<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ControllerSatu extends Controller
{
    public function index(){
        return view('profile');
    }

    public function tabel(){
        return view('tabel');
    }

    public function gettabel(Request $request){
        $table1 = DB::table('table1')
            ->select('nama_kelas', 'kelas', 'nim_kelas')
            ->get();
                        
            return DataTables::of($table1)
                ->addColumn('action', function(){
                    return '<button class="btn btn-success btn-xs list-inline-item" type="button" data-toggle="modal" data-placement="top" data-target="#editData">Tambah</button>
                    <button class="btn btn-danger btn-xs list-inline-item btn-circle" type="button" data-toggle="modal" data-placement="top" data-target="#hapusData">Hapus</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function simpandata(Request $request){
        // validate form
        $this->validate($request, [
            'nama' => 'required|min:1',
            'kelas' => 'required|min:1',
            'nim' => 'required|min:4',
        ]);

        // post
        Post::create([
            'nama' => $request->nama_kelas,
            'kelas' => $request->kelas,
            'nim' => $request->nim_kelas,
        ]);

        return redirect()->route('tabel')->with(['success' => 'Data berhasil disimpan!']);
    }
}
