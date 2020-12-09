<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\centro_distribucion;
use App\punto_Venta;

class leerArchivo extends Controller
{
    public function readText(Request $request){
        //Store the file in storage/app/public
        $file= $request->file('texto');
        $nombre= "RUTAS.txt";
        \Storage::disk('local')->put($nombre, \File::get($file));

        $content= array();
        $path=\Storage::path('RUTAS.txt');
        $archivo = fopen($path,'r');
        while($linea = fgets($archivo)){
            array_push($content,$linea);
        }

        //Text format validation.
        foreach($content as $item){
            $aux= explode(";", $item);
            if(count($aux)!=3){
      
                return 'INVALID_FORMAT';
            }
            else{
                if($aux[0]=="P" || $aux[0]=="p" || $aux[0]=="C" || $aux[0]=="c"){ 
                    if(is_numeric($aux[1])){                      
                        $aux2= preg_split("/,/",$aux[2]);
                        if(count($aux2)==2){
                            if(is_numeric($aux2[0])){
                                if(is_string($aux2[1]) && intval($aux2[1])){      
                                }
                                else{
                                    return 'INVALID_FORMAT';
                                }
                            }
                            else{
                                return 'INVALID_FORMAT';
                            }
                        }
                        else{
                            return 'INVALID_FORMAT';
                        }
                    }
                    else{
                        return 'INVALID_FORMAT';
                    }
                }
                else{
                    return 'INVALID_FORMAT';
                }
            }
        }

        //Store the data in the DB
        

        return 'OK';
    }
}
