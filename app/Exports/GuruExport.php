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

                $data = Post::select('nama_guru', 'nip_guru', 'jabatan')->get();
                
   

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


                $i = 2;
                foreach ($data as $key => $value) {
                    $event->sheet->setCellValue('A'.$i, $value->nama_guru);
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
