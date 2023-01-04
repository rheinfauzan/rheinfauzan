<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ChartController extends Controller
{
    public function profile(){
        $data = MahasiswaModel::select(DB::raw("CAST(SUM(jml_mhs) as unsigned) as jml_mhs, angkatan"))
                ->groupBy('angkatan')
                ->get();

        $jml_mhs = [];
        $angkatan = [];

        if (!empty ($data)) {
            foreach ($data as $index => $value) {
                $jml_mhs [] = $value->jml_mhs;

                $angkatan [] = $value->angkatan;
            }
        };

        $card = MahasiswaModel::select(DB::raw("CAST(SUM(jml_mhs) as unsigned) as card_mhs"))->get();

        $card_mhs = [];
     
        if (!empty ($card)) {
            foreach ($card as $index => $value) {
                $card_mhs = $value->card_mhs;
            }
        }
                    
        return view('profile', ['card_mhs'=>$card_mhs], ['jml_mhs' => $jml_mhs, 'angkatan' => $angkatan]);
    }
}
