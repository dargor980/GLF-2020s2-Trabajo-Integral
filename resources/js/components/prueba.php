<?php
//Punto de venta
$p1["i"] = "p1";
$p1["x"] = 10;
$p1["y"] = 6;
$p2["i"] = "p2";
$p2["x"] = -5;
$p2["y"] = 66;
$p3["i"] = "p3";
$p3["x"] = -1;
$p3["y"] = -96;
$p4["i"] = "p4";
$p4["x"] = 60;
$p4["y"] = 13;
//Centro de distri
$c1["i"] = "c1";
$c1["x"] = -2;
$c1["y"] = 77;
$c2["i"] = "c2";
$c2["x"] = 5;
$c2["y"] = 48;
$s= 0;
//puntos de venta
$pdv = array($p1,$p2,$p3,$p4);
$cdd = array($c1,$c2);

//METH
de_centro_a_punto($pdv,$cdd);

function de_centro_a_punto($pdv,$cdd){
    $distances = array();
    foreach($pdv as $p_row){
        $array = array();
        foreach($cdd as $c_row){
            $distancia = distancia($p_row,$c_row);
            array_push($array,[$p_row,$c_row,$distancia]); 
        }
        array_push($distances,$array);
    }
    //echo json_encode($distances,JSON_PRETTY_PRINT);
    //
    $rutas_cortas = array();
    $count = 0;
    foreach($distances as $rutas){ // c1->p1,p2     <--F[0,0]-->      c2->p3,p4
        $min = min($rutas[0][2],$rutas[1][2]);
        if($rutas[0][2] == $min){
            array_push($rutas_cortas,$rutas[0]);
        }else if($rutas[1][2] == $min){
            array_push($rutas_cortas,$rutas[1]);
        }
    }
    echo json_encode($rutas_cortas,JSON_PRETTY_PRINT);
}
function distancia ($desde,$hasta){
    $deX = $desde["x"];
    $deY = $desde["y"];
    //hasta
    $aaX = $hasta["x"];
    $aaY = $hasta["y"];
    $reX = $deX + ($aaX-1);
    $reY = $deY + ($aaY-1);
    if($reX < 0){ $reX = $reX-1;}
    if($reY < 0){ $reY = $reY-1;}
    $rec = $reX + $reY;
    return sqrt($reX*$reX + $reY*$reY);
}
?>


            
//VALIDATION
            $apo = session::get('apoderado');
            $id = $apo['id'];
            $to = getenv("MATRICULAS_PARA");
            $data = DB::connection('ins')->select("SELECT * FROM inscription WHERE z_email = $id AND student = $student  AND to_year = $to");            
            if(count($data) == 1){
                $data = DB::connection('ins')->select("SELECT * FROM students_home_circle WHERE student = $student");
                if(count($data) == 1){
                    //UPDATE
                    DB::connection('ins')->update("UPDATE students_home_circle SET student = $student, kinship = '$kinship', full_name = '$full_name',same_ins = '$same_ins',years_old = '$years_old', occupation = '$occupation', update_data = SYSDATE  WHERE student = $student");
                    $message["typ"] = "success"; //Sweet icono 
                    $message["tit"] = "Datos Actualizados"; //Titulo 
                    $message["mes"] = "Antecedentes del estudiante han sido actualizados"; //Mensaje
                    return $this->home_proxy($message);
                }else{
                    DB::connection('ins')->insert("INSERT INTO students_home_circle (student,kinship,full_name,same_ins,years_old,occupation,update_data) VALUES ($student,'$kinship','$full_name','$same_ins','$years_old','$occupation','$update_data')");
                    $message["typ"] = "success"; //Sweet icono 
                    $message["tit"] = "Datos Actualizados"; //Titulo 
                    $message["mes"] = "Antecedentes del estudiante han sido actualizados"; //Mensaje
                    return $this->home_proxy($message);
                }
            }else{
                $message["typ"] = "error";
                $message["tit"] = "Importante";
                $message["mes"] = "Error de Referencia del usuario al alumno no encontrada";
                return $this->home_proxy($message);
            }
            //END VALIDATION