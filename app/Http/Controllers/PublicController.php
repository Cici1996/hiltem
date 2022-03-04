<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function getListBb(Request $request)
    {
        $input = $request->all();
        $perpage = $request['perpage'];
        $page = $request['page'];
        if($perpage > 0 && $page > 0){
            
            $nomorlp = $request['nomorlp'];
            $nomorregistrasi = $request['nomorregistrasi'];
            if($nomorlp != '' && $nomorregistrasi != ''){
                $data = DB::table('v_bb_found')
                    ->where('nomor','LIKE','%'.$nomorlp.'%')
                    ->where('nomor_registrasi','LIKE','%'.$nomorregistrasi.'%')
                    ->paginate($perpage);
            }else if($nomorlp != ''){
                $data = DB::table('v_bb_found')
                    ->where('nomor','LIKE','%'.$nomorlp.'%')
                    ->paginate($perpage);
            }else if($nomorregistrasi != ''){
                $data = DB::table('v_bb_found')
                    ->where('nomor_registrasi','LIKE','%'.$nomorregistrasi.'%')
                    ->paginate($perpage);
            }else{
                $data = DB::table('v_bb_found')->paginate($perpage);
            }


            
        }else{
            $data = array();
        }
        return $this->sendResponse($data,'Berhasil Get Data');
    }

    public static function sendResponse($result,$message)
    {
        $response = [
            'code' => 200,
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        return response()->json($response, 200);
    }
}
