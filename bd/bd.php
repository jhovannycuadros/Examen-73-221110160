<?php

$bd_name= "proyecto";
$bd_server="localhost";
$bd_user="root";
$bd_pass="";
$bd_connection = mysql_connect($bd_server,$bd_user,$bd_pass)or die ("error en la conexion de la base de datos");
mysql_select_db($bd_name,$bd_connection) or die("la base de datos no existe");
mysql_query("SET NAMES utf8");
?>