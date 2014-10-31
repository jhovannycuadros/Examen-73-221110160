<?php

class Preguntas {
    public function Mostrarpreguntas(){
        $numPregs = 10; // la base de datos debe tener mas de 10 preguntas
        echo "<center><h2> Examen Alumno</h2></center>\n";
       /* echo "<p>Bienvenido alumno</p>\n";*/
        // seleccionar las preguntas aleatorias
        $pregsInBD = mysql_query("select count(idp) as 'num' from preguntas");
        $pregsExistentes = mysql_result($pregsInBD,0,'num');
        for($r=0;$r<$numPregs;$r++) $vector[$r]=0;
        for($r=0;$r<$numPregs;$r++){
            $alea=rand(1,$pregsExistentes);
            $bandera=true;
            for($f=0;$f<$r;$f++)
                if($vector[$f]==$alea){
                    $bandera=false;
                    break;
                }
            if(!$bandera){ $r--; continue; }
            $vector[$r]=$alea;
        }
        // cargar las preguntas
        echo '<form action="califica.php" method="post">'."\n";
        for($r=0;$r<$numPregs;$r++){
            $pregActu = mysql_query("select preguntas from preguntas where idp='$vector[$r]'");
            $txtPregActu = mysql_result($pregActu,0,'preguntas');
            $tpPreg = mysql_query("select tipo from preguntas where idp='$vector[$r]'");
            $tipoPreg = mysql_result($tpPreg,0,'tipo');
            echo "<p>\n";
            echo "".($r+1).") ".$txtPregActu;
            if($tipoPreg==1){ // abierta
                echo ' <input type="text" name="'.$r.'">'."\n";
                echo ' <input type="hidden" name="preg'.($r+1).'" value="'.$vector[$r].'">'."\n";
            }
            else{ // multiopcion
                $consOps = mysql_query("select idr from corresponde where idp='$vector[$r]'");
                $numResp = mysql_num_rows($consOps);
                echo "\n<br>";
                echo ' <input type="hidden" name="preg'.($r+1).'" value="'.$vector[$r].'">'."\n";
                for($hui=0;$hui<$numResp;$hui++){
                    $consResp = mysql_query("select respuesta from respuestas where idr='".mysql_result($consOps,$hui,'idr')."'");
                    $valor= mysql_result($consResp,0,'respuesta');
                    echo '<input type="radio" name="'.$r.'" value="'.$valor.'">'.$valor."<br>\n";
                }
            }
            echo "</p>\n";
        }
        echo '<input type="submit" value="Evaluar">'."\n";
        echo '</form>'."\n";

    }

}
?>