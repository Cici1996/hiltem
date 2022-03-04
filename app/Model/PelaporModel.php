<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PelaporModel extends Model
{
    protected $table = 't_lp_pelapor';
    protected $primaryKey = 'id';

    protected $fillable = [
        "lp_id",
        "nik",
        "nama",
        "tgl_lahir",
        "jk",
        "alamat",
        "umur"
    ];
}
