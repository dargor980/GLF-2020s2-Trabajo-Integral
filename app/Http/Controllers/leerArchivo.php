<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class leerArchivo extends Controller
{
    public function readText(Request $request){
        //Store the file in storage/app/public
        $file= $request->file('texto');
        $nombre= "RUTAS.txt";
        \Storage::disk('local')->put($nombre, \File::get($file));

        $lala= array();
        $content = \File::get($file);
        
        return $content;
    }
}
