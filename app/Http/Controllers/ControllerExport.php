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

		// dd($request->all());
		$guru	 	= $request["guru_filter"];
		$nip 		= $request["nip_filter"];
		$jabatan 	= $request["jabatan_filter"];
		$tglmulai 	= $request["tanggal-mulai"];
		$tglselesai = $request["tanggal-selesai"];
		// dd($guru);

		$data = Post::select('nama_guru', 'nip_guru', 'jabatan', 't_sks.sks', 't_sks.nm_matkul')->leftJoin('tb_sks as t_sks', 'guru1.sks_id', '=', 't_sks.id');

		if (!empty($guru)) {
			$data->where('nama_guru', 'like', '%'.$guru.'%');
		}
		if (!empty($nip)) {
			$data->where('nip_guru', 'like', '%'.$nip.'%');
		}
		if (!empty($jabatan)) {
			$data->where('jabatan', 'like', '%'.$jabatan.'%');
		}
		if ($tglmulai != null || $tglselesai != null) {
	
			$tgl_mulai = date('Y-m-d',strtotime($tglmulai));
			$tgl_selesai = date('Y-m-d',strtotime($tglselesai));

					$data->whereDate('guru1.created_at', '>=', $tgl_mulai);
					$data->whereDate('guru1.created_at', '<=', $tgl_selesai);

		}

		$data = $data->get();

		$filename = urlencode("guru-".date("d-m-Y").".pdf");

        $pdf = PDF::loadview('guru', ['guru'=>$data]);
        return $pdf->download($filename);
	}
}
