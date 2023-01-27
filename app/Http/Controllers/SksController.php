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
}
