<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SksModel extends Model
{
    use HasFactory;

    protected $table = "tb_sks";

    protected $primaryKey = "id";

    public $incrementing = true;
}
