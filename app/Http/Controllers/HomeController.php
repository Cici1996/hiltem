<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $role = $request->session()->get('role_id');
        if($role == 3){
            return view('dashboards.user');
        }else{
            return view('dashboards.admin');
        }
        
    }

    public function getJumlahLpHarian()
    {
        $data = DB::table('v_dashbaord_lp')->get();
        return $this->sendResponse($data->toArray(),'Berhasil Get Data');
    }

    public function getJumlahLpHarianUser(Request $request)
    {
        $iduser = $request->session()->get('id');
        $data = DB::table('v_dashboard_lp_user')->where('id','=',$iduser)->first();
        return $this->sendResponse($data,'Berhasil Get Data');
    }

    public function getJumlahLpStatus()
    {
        $data = DB::table('v_dashbaord_lp_status')->get();
        return $this->sendResponse($data->toArray(),'Berhasil Get Data');
    }

    public function getJumlahLpByBulan()
    {
        $data = DB::table('v_jumlah_lp_by_bulan')->get();
        return $this->sendResponse($data->toArray(),'Berhasil Get Data');
    }

    public function getListLpforDashboardUser(Request $request)
    {
        $iduser = $request->session()->get('id');
        $data = DB::table('v_t_lp')->select(['id','nomor','tanggal','status_lp'])
                ->where('id_user','=',$iduser)
                ->orderBy('created_at', 'desc')
                ->limit(5)->get();
        return $this->sendResponse($data->toArray(),'Berhasil Get Data');
    }
}
