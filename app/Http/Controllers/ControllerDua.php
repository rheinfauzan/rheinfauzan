<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade;
use PDF;    

class ControllerDua extends Controller
{
    public function tabel2()
    {   
        $skstabel = DB::table('tb_sks')->select('id', 'sks', 'nm_matkul')->get();
        // dd($skstabel);
        return view('tabel2', ['skstabels' =>  $skstabel]);
    }

    public function gettabel2(Request $request)
    {
        $guru = Post::select('guru1.id', 'nama_guru', 'nip_guru', 'jabatan', 't_sks.sks', 't_sks.nm_matkul', 'guru1.created_at', 'guru1.deleted_at')->leftJoin('tb_sks as t_sks', 'guru1.sks_id', '=', 't_sks.id');
        // dd($guru);
        
        if ($request->tanggal_mulai != null) {
            
            $tgl_mulai = date('Y-m-d',strtotime($request->tanggal_mulai));
            $tgl_selesai = date('Y-m-d',strtotime($request->tanggal_selesai));

                    $guru->whereDate('guru1.created_at', '>=', $tgl_mulai);
                    $guru->whereDate('guru1.created_at', '<=', $tgl_selesai);

        }

        if (!empty( $request->guru)) {
            $guru->where('nama_guru', 'like', '%'.$request->guru.'%');
        } 

        if (!empty($request->nip)) {
            $guru->where('nip_guru', 'like', '%'.$request->nip.'%');
        }

        if (!empty($request->jabatan)) {
            $guru->where('jabatan', 'like', $request->jabatan);
        }

        
          return (DataTables::of($guru->get())
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
            ->make(true)); 
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
            'nip'       => 'required|numeric',
            'jabatan'   => 'required',
        ]);

        $guru = new Post();
        $guru->nama_guru = $request->nama;
        $guru->nip_guru = $request->nip;
        $guru->jabatan = $request->jabatan;
        $guru->sks_id = $request->matkul;
        if($guru->save()){
            //return response
            return response()->json([
                'success' => true,
                'message' => 'Data Post Berhasil Disimpan!',
        ]);
        };

  
    }


    public function show(Request $request)
    {
        //return response
        $showtabel = Post::select('id', 'nama_guru', 'nip_guru', 'jabatan')->where('id', $request->id)->first();

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
