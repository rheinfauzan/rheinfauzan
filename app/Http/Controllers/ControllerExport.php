<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Exports\GuruExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade;
use PDF;

class ControllerExport extends Controller
{
    public function export_excel(Request $request)
	{	
		// dd($request->all());
		$filename = urlencode("guru-".date("d-m-Y_H:i:s").".xlsx");
		$data = Excel::download(new GuruExport($request->all()), $filename);
		return $data;
	}

    public function export_pdf(Request $request)
	{	

		dd($request->all());

		// dd($tglmulai);
		
		// $getguru = Post::select('nama_guru', 'nip_guru', 'jabatan')
		// 		->whereDate('created_at', '>=', $tglmulai)
		// 		->whereDate('created_at', '<=', $tglselesai)
		// 		->get();
				// $getguru = Post::all();

		// dd($getguru);
		// dd([$tglmulai, $tglselesai]);
		$filename = urlencode("guru-".date("d-m-Y").".pdf");

        $pdf = PDF::loadview('guru', ['guru'=>$getguru]);
        return $pdf->download($filename);
	}
}
