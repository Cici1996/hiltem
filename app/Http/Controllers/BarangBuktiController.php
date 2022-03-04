<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Model\BarangBuktiModel as LP;

class BarangBuktiController extends BaseController
{
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            "lp_id" => 'required',
            "nama" => 'required',
            "nik" => 'required',
            "nomor_rangka" => 'required',
            "nomor_mesin" => 'required',
            "merk" => 'required',
            "warna" => 'required',
            "type" => 'required',
            "bahan_bakar" => 'required',
            "jenis" => 'required',
            "warna_tnkb" => 'required',
            "model" => 'required',
            "tahun_registrasi" => 'required',
            "tahun_pembuatan" => 'required',
            "nomor_bpkb" => 'required',  
            "alamat" => 'required',
            "isi_silinder" => 'required',
            "nomor_registrasi" => 'required',  
            "longitude" => 'required',  
            "latitude" => 'required',       
        ]);

        if($validator->fails()){
            return $this->sendError('validation Error',$validator->errors(),406);
        }

        $LP = new LP([
            "lp_id" => $request->lp_id,
            "nama" => $request->nama,
            "nik" => $request->nik,
            "nomor_rangka" => $request->nomor_rangka,
            "nomor_mesin" => $request->nomor_mesin,
            "merk" => $request->merk,
            "warna" => $request->warna,
            "type" => $request->type,
            "bahan_bakar" => $request->bahan_bakar,
            "jenis" => $request->jenis,
            "warna_tnkb" => $request->warna_tnkb,
            "model" => $request->model,
            "tahun_registrasi" => $request->tahun_registrasi,
            "tahun_pembuatan" => $request->tahun_pembuatan,
            "nomor_bpkb" => $request->nomor_bpkb,
            "alamat" => $request->alamat,
            "isi_silinder" => $request->isi_silinder,
            "nomor_registrasi" => $request->nomor_registrasi,
            "longitude" => $request->longitude,
            "latitude" => $request->latitude,
        ]);

        $LP->save();
        return $this->sendResponse($LP->toArray(),'Berhasil Simpan Data');
    }

    public function getDataList($id)
    {
        $data = LP::where('lp_id','=',$id)->get();
        return $this->sendResponse($data->toArray(),'Berhasil Get Data');
    }

    public function getData($id)
    {
        $data = LP::where('id','=',$id)->first();
        return $this->sendResponse($data->toArray(),'Berhasil Get Data');
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            "lp_id" => 'required',
            "nama" => 'required',
            "nik" => 'required',
            "nomor_rangka" => 'required',
            "nomor_mesin" => 'required',
            "merk" => 'required',
            "warna" => 'required',
            "type" => 'required',
            "bahan_bakar" => 'required',
            "jenis" => 'required',
            "warna_tnkb" => 'required',
            "model" => 'required',
            "tahun_registrasi" => 'required',
            "tahun_pembuatan" => 'required',
            "nomor_bpkb" => 'required',  
            "alamat" => 'required',
            "isi_silinder" => 'required',
            "nomor_registrasi" => 'required',
            "longitude" => 'required',  
            "latitude" => 'required',             
        ]);

        if($validator->fails()){
            return $this->sendError('validation Error',$validator->errors(),406);
        }

        $LP = LP::where('id','=',$request->id)->first();
        
        $LP->lp_id = $request->lp_id;
        $LP->nama = $request->nama;
        $LP->nik = $request->nik;
        $LP->nomor_rangka = $request->nomor_rangka;
        $LP->nomor_mesin = $request->nomor_mesin;
        $LP->merk = $request->merk;
        $LP->warna = $request->warna;
        $LP->type = $request->type;
        $LP->bahan_bakar = $request->bahan_bakar;
        $LP->jenis = $request->jenis;
        $LP->warna_tnkb = $request->warna_tnkb;
        $LP->model = $request->model;
        $LP->tahun_registrasi = $request->tahun_registrasi;
        $LP->tahun_pembuatan = $request->tahun_pembuatan;
        $LP->nomor_bpkb = $request->nomor_bpkb;
        $LP->alamat = $request->alamat;
        $LP->isi_silinder = $request->isi_silinder;
        $LP->nomor_registrasi = $request->nomor_registrasi;
        $LP->longitude = $request->longitude;
        $LP->latitude = $request->latitude;
        $LP->updated_at = date('Y-m-d H:i:s');

        $LP->save();
        return $this->sendResponse($LP->toArray(),'Berhasil Update Data');
    }

    public function delete(Request $request)
    {
        $data = LP::where('id','=',$request->id)->delete();
        return $this->sendResponse(['status' => 'sukses'],'Berhasil Delete Data');
    }
}
