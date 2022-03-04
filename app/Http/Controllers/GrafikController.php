<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikController extends BaseController
{
    public function PetaSebaran()
    {
        return view('grafik.peta');
    }

    public function PetaSebaranData()
    {
        $data = DB::table('t_lp_stnk')
            ->select("longitude","latitude")
            ->where('longitude','<>','')
            ->where('latitude','<>','')
            ->get()
            ->toArray();

        $response = array();
        foreach ($data as $value) {
            $response[] = array(
                'type' => 'Feature',
                'geometry' => array(
                    'type' => 'Point',
                    'coordinates' => array($value->longitude, $value->latitude)
                ),
                'properties' => array('modelId' => 1)
            );
        }

        $responseJson = json_encode($response);
        echo $responseJson;
    }

    public function getWilayah()
    {
        $data = DB::table('m_satuan')->where('level','=',2)->get();
        return $this->sendResponse($data->toArray(),'Berhasil Get Data');
    }

    public function GrafikJumlahLP()
    {
        return view('grafik.jumlahlp.index');
    }

    public function getRekapJumlahLp()
    {
        $data = DB::table('v_rekap_jumlah_lp')->get();
        return $this->sendResponse($data->toArray(),'Berhasil Get Data');
    }
}
