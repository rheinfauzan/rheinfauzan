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

    public function export_pdf()
	{	
		// $date = Post::select('created_at')->get();
	    $guru = Post::all();
		$filename = urlencode("guru-".date("d-m-Y").".pdf");

        $pdf = PDF::loadview('guru',['guru'=>$guru]);
        return $pdf->download($filename);
	}
}
