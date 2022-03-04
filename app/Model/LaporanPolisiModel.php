<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LaporanPolisiModel extends Model
{
    protected $table = 't_lp';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nomor','pidana', 'tanggal','id_user'
    ];
}
