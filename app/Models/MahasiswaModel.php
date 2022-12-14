<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MahasiswaModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "mahasiswa";

    protected $primaryKey = "no_id";

    public $incrementing = true;
}
