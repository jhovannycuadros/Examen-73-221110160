<?php

$titulo= 'Bienvenidos al Test';
$contenido = 'Selecciona "Cuestionario"';

$variables = array('titulo'=>$titulo,
    'contenido'=>$contenido);
view('home',$variables);

?>