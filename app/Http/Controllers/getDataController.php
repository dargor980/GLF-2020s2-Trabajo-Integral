<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\centro_distribucion;
use App\punto_Venta;
use Illuminate\Support\Facades\Log;

class getDataController extends Controller
{
    public function getPuntosVenta(){
        $data= punto_Venta::all();
        return $data;
    }

    public function getCentrosDistribucion(){
        $data= centro_distribucion::all();
        return $data;
    }
    
    public function addLogs(request $request){
        $messagge = $request->input()["messagge"];
        Log::info($messagge);
    }
}
