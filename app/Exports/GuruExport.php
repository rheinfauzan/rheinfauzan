<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Excel;
class GuruExport implements WithEvents
{   

    protected $guru;
    protected $nip;
    protected $jabatan;
    protected $tglmulai;
    protected $tglselesai;

    function __construct($data) {
            $this->guru = $data["guru_filter"];
            $this->nip = $data["nip_filter"];
            $this->jabatan = $data["jabatan_filter"];
            $this->tglmulai = $data["tanggal-mulai"];
            $this->tglselesai = $data["tanggal-selesai"];
        }

    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {

    //     $guru = Post::select('nama_guru', 'nip_guru', 'jabatan');


    //     return ($guru->get());
    // }

    // public function headings(): array
    // {   
        

    //     return ["Nama Guru", "NIP Guru", "Jabatan"];
    // }

    public function registerEvents() : array
    {

        return [
            AfterSheet::class    => function(AfterSheet $event) {

                $data = Post::select('nama_guru', 'nip_guru', 'jabatan', 't_sks.sks', 't_sks.nm_matkul')->leftJoin('tb_sks as t_sks', 'guru1.sks_id', '=', 't_sks.id');

                if (!empty($this->guru)) {
                    $data->where('nama_guru', 'like', '%'.$this->guru.'%');
                }
                if (!empty($this->nip)) {
                    $data->where('nip_guru', 'like', '%'.$this->nip.'%');
                }
                if (!empty($this->guru)) {
                    $data->where('jabatan', 'like', '%'.$this->jabatan.'%');
                }
                if ($this->tglmulai != null || $this->tglselesai != null) {
            
                    $tgl_mulai = date('Y-m-d',strtotime($this->tglmulai));
                    $tgl_selesai = date('Y-m-d',strtotime($this->tglselesai));
        
                            $data->whereDate('guru1.created_at', '>=', $tgl_mulai);
                            $data->whereDate('guru1.created_at', '<=', $tgl_selesai);
        
                }

                $data = $data->get();
                

                // Set cell A1 with Your Title
                $event->sheet->setCellValue('A1', 'Nama Guru');
                $event->sheet->getDelegate()->getStyle('A1')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FF17a2b8');

                $event->sheet->setCellValue('B1', 'NIP Guru');
                $event->sheet->getDelegate()->getStyle('B1')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FF17a2b8');

                $event->sheet->setCellValue('C1', 'Jabatan');
                $event->sheet->getDelegate()->getStyle('C1')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FF17a2b8');

                $event->sheet->setCellValue('D1', 'Mata Kuliah');
                $event->sheet->getDelegate()->getStyle('D1')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FF17a2b8');

                // size column
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);

                // get data
                $i = 2;
                foreach ($data as $key => $value) {
                    $event->sheet->setCellValue('A'.$i, $value->nama_guru);
                    $event->sheet->setCellValue('B'.$i, $value->nip_guru);
                    $event->sheet->setCellValue('C'.$i, $value->jabatan);
                    $event->sheet->setCellValue('D'.$i, "(".$value->sks.") ".$value->nm_matkul);
                    $i++;
                };

                // Set cells A2:B2 with current date
                // $event->sheet->setCellValue('A2', 'Report Date:');
                // $event->sheet->setCellValue('B2', now());

                // $cellRange = 'A3:C3'; // All headers

                // $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                // $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->getColor()
                //             ->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
                // $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()->setARGB('FF17a2b8');
                // $event->sheet->setAutoFilter($cellRange);
            },
        ];
    }  

}
