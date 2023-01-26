<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use App\Models\Post;
use App\Models\SksModel;
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
        };

        $jmlguru = Post::select('guru1.id')->count();
        // dd($jmlguru);
        // $rowcount = [$key => $jmlguru];
        $jmlmatkul = SksModel::select('tb_sks.id')->count();
        // dd($jmlmatkul);



        
        return view('profile', ['card_mhs'=>$card_mhs, 'jmlgurus'=>$jmlguru, 'jmlmatkuls'=>$jmlmatkul], ['jml_mhs' => $jml_mhs, 'angkatan' => $angkatan]);
    }
}
