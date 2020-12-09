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

        $content= array();
        $path=\Storage::path('RUTAS.txt');
        $archivo = fopen($path,'r');
        while($linea = fgets($archivo)){
            array_push($content,$linea);
            
        }

        foreach($content as $item){
            // aca tendriamos que ir separando las weas de la linea
            //P;1;10,6  SPLIT ";"  ==> transformar a array  
            $aux= explode(";", $item);
            if(count($aux)!=3)
            {
                
                return "Formato no aceptado 1";
            }
            else{
                if($aux[0]=="P" || $aux[0]=="p")
                { 
                    if(is_numeric($aux[1])){                      
                        $aux2= explode(",",$aux[2]);
                        if(count($aux2)==2)
                        {
                            if(is_numeric($aux2[0])){
                                if(is_numeric($aux2[1])){
                                    //error pendiente 
                                }
                                else{
                                    return 'Formato no aceptado. 1 '.$aux2[1].'no es un numero' ;
                                }
                            }
                            else{
                                return 'Formato no aceptado. 2'.$aux2[0].'no es un número';
                            }
                            
                        }
                        else{
                            return 'Formato no aceptado.3';
                        }
                    }
                    else{
                        return 'Formato no aceptado.4';
                    }
                }
                else{
                    if($aux[0]=="C" || $aux[0]=="c"){        
                        if(is_numeric($aux[1])){                      
                            $aux3= explode(",",$aux[2]);
                            if(count($aux3)==2)
                            {
                                if(is_numeric($aux3[0])){
                                    if(is_numeric($aux3[1])){
                                        
                                    }
                                    else{
                                        return 'Formato no aceptado.  5';
                                    }
                                }
                                else{
                                    return 'Formato no aceptado.  6';
                                }
                                
                            }
                            else{
                                return 'Formato no aceptado.7';
                            }
                        }
                        else{
                            return 'Formato no aceptado.8';
                        }
                    }
                }
            }
        }

        return 'ta bien mi rey';
    }
}
