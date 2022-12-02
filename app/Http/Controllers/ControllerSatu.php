<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
            ->select('id', 'nama_kelas', 'kelas', 'nim_kelas')
            ->get();
                        
            return DataTables::of($table1)
                ->addColumn('action', function($row){
                    return '<button data-id="'.$row->id.'" class="btn btn-success btn-xs list-inline-item edit" type="button" data-toggle="modal" data-placement="top" data-target="#editData">Edit</button>
                    <button data-id="'.$row->id.'" class="btn btn-danger btn-xs list-inline-item btn-circle delete" type="button" data-toggle="modal" data-placement="top" data-target="#hapusData">Hapus</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }


    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'kelas'   => 'required',
            'nim'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        DB::table('table1')->insert([
            'nama_kelas' => $request->nama, 
            'kelas'   => $request->kelas,
            'nim_kelas' => $request->nim
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
        ]);
    }


    public function show(Request $request)
    {
        //return response
        $nama = DB::table('table1')->select('id', 'nama_kelas', 'kelas', 'nim_kelas')->where('id', $request->id)->first();
        // dd($nama);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data' => $nama,
        ]); 

    }

   public function update(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'kelas'   => 'required',
            'nim'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        DB::table('table1')
            ->where('id', $request->id)
            ->update([
            'nama_kelas' => $request->nama, 
            'kelas'   => $request->kelas,
            'nim_kelas' => $request->nim
            ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
        ]);
    }

    // delete
    public function delete(Request $request)
    {
    $deleted = DB::table('table1')->where('id', $request->id)->delete();

    return response()->json([
        'success' => true,
        'message' => 'Data Post Berhasil Dihapus!',
    ]); 
    }

}
