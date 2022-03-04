<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Model\PelaporModel as LP;

class PelaporController extends BaseController
{
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            "lp_id" => 'required',
            "nik" => 'required',
            "nama" => 'required',
            "tgl_lahir" => 'required',
            "jk" => 'required',
            "alamat" => 'required',
            "umur" => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('validation Error',$validator->errors(),406);
        }

        $LP = new LP([
            "lp_id" => $request->lp_id,
            "nik" => $request->nik,
            "nama" => $request->nama,
            "tgl_lahir" => $request->tgl_lahir,
            "jk" => $request->jk,
            "alamat" => $request->alamat,
            "umur" => $request->umur
        ]);

        $LP->save();
        return $this->sendResponse($LP->toArray(),'Berhasil Simpan Data');
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            "lp_id" => 'required',
            "nik" => 'required',
            "nama" => 'required',
            "tgl_lahir" => 'required',
            "jk" => 'required',
            "alamat" => 'required',
            "umur" => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('validation Error',$validator->errors(),406);
        }

        $LP = LP::where('id','=',$request->id)->first();
        
        $LP->lp_id = $request->lp_id;
        $LP->nik = $request->nik;
        $LP->nama = $request->nama;
        $LP->tgl_lahir = $request->tgl_lahir;
        $LP->jk = $request->jk;
        $LP->alamat = $request->alamat;
        $LP->umur = $request->umur;
        $LP->updated_at = date('Y-m-d H:i:s');

        $LP->save();
        return $this->sendResponse($LP->toArray(),'Berhasil Update Data');
    }

    public function getDataPelapor($id)
    {
        $data = LP::where('lp_id','=',$id)->first();
        if($data != null){
            $data->toArray();
        }
        return $this->sendResponse($data,'Berhasil Get Data');
    }
}
