<?php
require ('bd/bd.php');

class preguntas {
private $Idpre;
private $Preg;
private $Resp;


    public function Muestrapregutas()
    {
        $sql01="SELECT * FROM preguntas  ORDER BY idpr ASC";
        $consulta = mysql_query($sql01) or die ("error 1");


echo"<div class=table-responsive> ";
echo"<table class=\"table table-striped\"> ";

echo"<tr><td>Clave</td><td>Pregunta</td>";

    }


}

?>


