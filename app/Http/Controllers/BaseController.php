<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
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

    public static function sendError($error,$errorMessage = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error
        ];

        if(!empty($errorMessage)){
            $response['data'] = $errorMessage; 
        }

        return response()->json($response, $code);
    }
}
