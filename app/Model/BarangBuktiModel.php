<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BarangBuktiModel extends Model
{
    protected $table = 't_lp_stnk';
    protected $primaryKey = 'id';

    protected $fillable = [
        "lp_id",
        "nama",
        "nik",
        "nomor_rangka",
        "nomor_mesin",
        "merk",
        "warna",
        "type",
        "bahan_bakar",
        "jenis",
        "warna_tnkb",
        "model",
        "tahun_registrasi",
        "tahun_pembuatan",
        "nomor_bpkb",
        "alamat",
        "isi_silinder",
        "nomor_registrasi",
        "longitude",
        "latitude",
        "isFound",
        "isFoundId"
    ];
}
