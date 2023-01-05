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

		$tgl_mulai = date('Y-m-d',strtotime($request->tanggal_mulai));
		$tgl_selesai = date('Y-m-d',strtotime($request->tanggal_selesai));
		dd($tgl_mulai);
		$guru = Post::select('nama_guru', 'nip_guru', 'jabatan', 'created_at')
				->whereDate('created_at', '>=', $tgl_mulai)
				->whereDate('created_at', '<=', $tgl_selesai)
				->get();

		$filename = urlencode("guru-".date("d-m-Y").".pdf");

        $pdf = PDF::loadview('guru',['guru'=>$guru]);
        return $pdf->download($filename);
	}
}
