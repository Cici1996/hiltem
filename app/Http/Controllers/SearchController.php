<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ExportPdf AS PDFData;

class SearchController extends BaseController
{
    public function Search()
    {
        return view('search.index');
    }

    public function Detail()
    {
        return view('search.detail');
    }

    public function getData(Request $request)
    {
        $txtcari = $request->txtcari;
        $jenis = $request->jenis;

        if($jenis == '' || $txtcari == ''){
            $data = []  ;
            return $this->sendResponse($data,'Berhasil Get Data');
        }else{
            if($jenis == 1){
                $kolom = "nomor_registrasi";
            }else if($jenis == 2){
                $kolom = "nomor_rangka";
            }else if($jenis == 3){
                $kolom = "nomor_mesin";
            }

            $data = DB::table('v_t_lp_stnk')
            ->select("nomor","tanggal","id_user","id","lp_id","nama","nik","nomor_rangka","nomor_mesin","merk","warna","type","bahan_bakar","jenis","warna_tnkb","model","tahun_registrasi","tahun_pembuatan","nomor_bpkb","alamat","isi_silinder","nomor_registrasi")
            ->where($kolom,'LIKE','%'.$txtcari.'%')
            ->get()
            ->toArray();

            return $this->sendResponse($data,'Berhasil Get Data');
        }
    }

    public function ExportPdf(Request $request)
    {
        $view = 'search.result-pdf';
        $id = $request->id;

        $data = DB::table('v_t_lp_stnk')
        ->select("nomor","tanggal","id_user","id","lp_id","nama","nik","nomor_rangka","nomor_mesin","merk","warna","type","bahan_bakar","jenis","warna_tnkb","model","tahun_registrasi","tahun_pembuatan","nomor_bpkb","alamat","isi_silinder","nomor_registrasi")
        ->where('id','=',$id)
        ->first();

        $dataArray = array('data' => $data);
        $datenow = date('YmdHis');
        return PDFData::GetPdf($view,$dataArray,$filename = "result-".$datenow.".pdf",$size = 'a4',$layout = 'landscape');
    }
}
