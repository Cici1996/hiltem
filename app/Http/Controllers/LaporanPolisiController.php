<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DataTables;
use Illuminate\Support\Facades\DB;

use App\Model\LaporanPolisiModel as LP;

class LaporanPolisiController extends BaseController
{
    public function index()
    {
        return view('lp.index');
    }

    public function form()
    {
        return view('lp.form');
    }

    public function editForm($id)
    {
        $data = array('idurl' => $id);
        return view('lp.form')->with($data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'nomor' => 'required',
            'tanggal' => 'required',
            'id' => 'required',
            'pidana' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('validation Error',$validator->errors(),406);
        }

        $LP = new LP([
            'id_user' => $request->session()->get('id'),
            'nomor' => $request->nomor,
            'pidana' => $request->pidana,
            'tanggal' => $request->tanggal,
            'id' => $request->id,
        ]);

        $LP->save();
        return $this->sendResponse($LP->toArray(),'Berhasil Simpan Data');
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'nomor' => 'required',
            'tanggal' => 'required',
            'pidana' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('validation Error',$validator->errors(),406);
        }

        $LP = LP::where('id','=',$request->id)->first();
        
        $LP->id_user = $request->session()->get('id');
        $LP->nomor = $request->nomor;
        $LP->tanggal = $request->tanggal;
        $LP->pidana = $request->pidana;
        $LP->updated_at = date('Y-m-d H:i:s');

        $LP->save();
        return $this->sendResponse($LP->toArray(),'Berhasil Update Data');
    }

    public function getBasicData(Request $request)
    {
        $iduser = $request->session()->get('id');
        $users = DB::table('v_t_lp')->select(['id','nomor','tanggal','status_lp'])->where('id_user','=',$iduser);

        return Datatables::of($users)->make(true);
    }

    public function getDataLp($id)
    {
        $data = LP::where('id','=',$id)->first();
        return $this->sendResponse($data->toArray(),'Berhasil Get Data');
    }

    public function delete(Request $request)
    {
        $data = LP::where('id','=',$request->id)->delete();
        return $this->sendResponse(['status' => 'sukses'],'Berhasil Delete Data');
    }

    public function updatestatus(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'status' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('validation Error',$validator->errors(),406);
        }

        $LP = LP::where('id','=',$request->id)->first();
        
        $LP->status = $request->status;
        $LP->updated_at = date('Y-m-d H:i:s');

        $LP->save();
        return $this->sendResponse($LP->toArray(),'Berhasil Update Data');
    }    
}
