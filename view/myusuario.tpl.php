<?php
$usuario01 = new Usuario();
?>
<html>
<head></head>
<body>
<h1><?=$titulo ?></h1>
<p><?=$contenido ?></p>
<p><?=$nombre ?></p>
<?php
$usuario01->setUsuario();
$usuario01->getUsuario();

$usuario01 ->ConsultarDatos();

?>



</body>


</html>

