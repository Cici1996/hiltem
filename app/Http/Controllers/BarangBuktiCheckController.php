<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Model\BarangBuktiModel as LP;

class BarangBuktiCheckController extends BaseController
{
    public function Index()
    {
        return view('check.index');
    }

    public function getData(Request $request)
    {
        $iduser = $request->session()->get('id');

        $data = DB::table('v_bb_found')
        ->select("id","id_user","nomor","tanggal","nomor_registrasi","isFound","isFoundId","id_bb","nama_satker")
        ->where("id_user",'=',$iduser);

        return Datatables::of($data)->make(true);
    }

    public function updatestatus(Request $request)
    {

        $LP = LP::where('id','=',$request->id)->first();
        
        $LP->isFound = 1;
        $LP->isFoundId =$request->status;
        $LP->updated_at = date('Y-m-d H:i:s');

        $LP->save();
        return $this->sendResponse($LP,'Berhasil Update Data');
    }
}
