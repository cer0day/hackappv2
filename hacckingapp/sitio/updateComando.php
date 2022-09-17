<?php

include 'conexion.php';
$idComando=$_POST['idComando'];
$idFase=$_POST['faseC'];
$idHerramienta=$_POST['herramientasC'];
$comando=$_POST['comando'];
$comando=base64_encode($comando);
$descripcion=$_POST['descripcion'];
$etiquetas=$_POST['etiquetas'];
$detalles=$_POST['detalles'];
$detalles=base64_encode($detalles);

$sql = "UPDATE comandos SET etiquetas='$etiquetas', comando='$comando', descripcion='$descripcion', detalles='$detalles', id_fase=$idFase, id_herramienta=$idHerramienta WHERE id_comando=$idComando";
mysqli_query($cx, $sql);
mysqli_close($cx);
header('Location:comandos.php');

?>