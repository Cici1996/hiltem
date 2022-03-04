<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User as Model;


class PenggunaController extends BaseController
{
    public function index()
    {
        return view('pengguna.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>  ['required', 'string', 'min:8'],
            'role_id' => 'required',
            'satker_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('validation Error',$validator->errors(),406);
        }

        $LP = new Model([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'satker_id' => $request->satker_id,
        ]);

        $LP->save();
        return $this->sendResponse($LP->toArray(),'Berhasil Simpan Data');
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $Model = Model::where('id','=',$request->id)->first();

        if($request->password != ''){
            $validator = Validator::make($input,[
                'name' => 'required',
                'password' => ['required', 'string', 'min:8']
            ]);
    
            if($validator->fails()){
                return $this->sendError('validation Error',$validator->errors(),406);
            }

            $Model->name = $request->name;
            $Model->password = Hash::make($request->password);
            $Model->updated_at = date('Y-m-d H:i:s');

        }else{
            $validator = Validator::make($input,[
                'name' => 'required'
            ]);
    
            if($validator->fails()){
                return $this->sendError('validation Error',$validator->errors(),406);
            }

            $Model->name = $request->name;
            $Model->updated_at = date('Y-m-d H:i:s');

        }

        $Model->save();
        return $this->sendResponse($Model->toArray(),'Berhasil Update Data');
    }

    public function getBasicData(Request $request)
    {
        $users = DB::table('v_t_user')->select(['id','name','email','RoleName','SatkerName']);

        return Datatables::of($users)->make(true);
    }

    public function getRoles()
    {
        $data = DB::table('roles')->where('id','<>',1)->get();
        return $this->sendResponse($data->toArray(),'Berhasil Get Data');
    }

    public function getSatker()
    {
        $data = DB::table('m_satker')->get();
        return $this->sendResponse($data->toArray(),'Berhasil Get Data');
    }

    public function getUserData(Request $request)
    {
        $id = $request->id;
        $data = DB::table('v_t_user')->select(['id','name'])->where('id','=',$id)->first();
        return $this->sendResponse($data,'Berhasil Get Data');
    }
    
}
