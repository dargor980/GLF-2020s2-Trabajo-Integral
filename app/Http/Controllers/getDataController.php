<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\centro_distribucion;
use App\punto_Venta;

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
}
