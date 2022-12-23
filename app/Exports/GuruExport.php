<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $guru = Post::select('nama_guru', 'nip_guru', 'jabatan');

        return ($guru->get());
    }

    public function headings(): array
    {
        return ["Nama Guru", "NIP Guru", "Jabatan"];
    }
}
