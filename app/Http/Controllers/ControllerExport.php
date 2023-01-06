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
    public function export_excel()
	{	
		
		$filename = urlencode("guru-".date("d-m-Y").".xlsx");
		$data = Excel::download(new GuruExport, $filename);
		return $data;
	}

    public function export_pdf(Request $request)
	{	

		$tglmulai = date('Y-m-d',strtotime($request->tgl_mulai));
		$tglselesai = date('Y-m-d',strtotime($request->tgl_selesai));

		dd($tglmulai);

		$getguru = Post::select('nama_guru', 'nip_guru', 'jabatan')
			->whereDate('created_at', '>=', $tglmulai)
			->whereDate('created_at', '<=', $tglselesai)
			->get();

		// dd($getguru);
		// dd([$tglmulai, $tglselesai]);
		$filename = urlencode("guru-".date("d-m-Y").".pdf");

        $pdf = PDF::loadview('guru',['guru'=>$getguru]);
        return $pdf->download($filename);
	}
}
