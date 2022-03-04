<?php
//app/Helpers/Envato/User.php
namespace App\Helpers;
 
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\BaseController as BaseController;
 
class ExportPdf extends BaseController {

    public static function GetPdf($html,$data,$filename = "result.pdf",$size = 'a4',$layout = 'potrait') {
        $pdf = PDF::loadView($html,$data);
        $pdf->setPaper($size,$layout);
        return $pdf->download($filename);
    }
}