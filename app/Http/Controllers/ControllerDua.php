<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class ControllerDua extends Controller
{
    public function tabel2()
    {
        return view('tabel2');
    }

    public function gettabel2(Request $request)
    {
      
        $guru = Post::select('id', 'nama_guru', 'nip_guru', 'jabatan', 'deleted_at');
        
        if (!empty( $request->guru)) {
            $guru->where('nama_guru', 'like', '%'.$request->guru.'%');
        }


        

        return DataTables::of($guru->withTrashed())
            ->addColumn('action', function($row){
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

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'nip'   => 'required|numeric',
            'jabatan'   => 'required',
        ]);

        $guru = new Post();
        $guru->nama_guru = $request->nama;
        $guru->nip_guru = $request->nip;
        $guru->jabatan = $request->jabatan;
        if($guru->save()){
            //return response
            return response()->json([
                'success' => true,
                'message' => 'Data Post Berhasil Dihapus!',
        ]);
        };

  
    }


    public function show(Request $request)
    {
        //return response
        $showtabel = Post::select('id', 'nama_guru', 'nip_guru', 'jabatan')->where('id', $request->id)->first();
        // dd($nama);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data' => $showtabel,
        ]); 

    }

    public function update(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'nip'   => 'required|numeric',
            'jabatan'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        Post::where('id', $request->id)
        ->update([
        'nama_guru' => $request->nama, 
        'nip_guru'   => $request->nip,
        'jabatan' => $request->jabatan,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
        ]);
    }

    // delete
    public function delete(Request $request)
    {
        $deleted = Post::where('id', $request->id);
        $deleted = $deleted->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diarchive!',
        ]);
    }

    public function restore(Request $request)
    { 
        $restore = Post::where('id', $request->id);
        $restore->restore();

        return response()->json([
            'success' => true,
            'message' => 'Data Di Restore',
        ]);
    }

    public function forcedelete(Request $request)
    {
        $forcedelete = Post::where('id', $request->id)->forceDelete();

        return response()->json([
            'success' => true,
            'message' => "Data berhasil dihapus!",
        ]);
    }
}
