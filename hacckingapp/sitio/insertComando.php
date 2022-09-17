<?php
include 'conexion.php';
$etiquetas=$_POST['etiquetas'];
$comando=$_POST['comando'];
$comando=base64_encode($comando);
$descripcion=$_POST['descripcion'];
$detalles=$_POST['detalles'];
$detalles=base64_encode($detalles);
$idFase=$_POST['faseC'];
$idHerramienta=$_POST['herramientasC'];

$sql = "INSERT INTO comandos (etiquetas, comando, descripcion, detalles, id_fase, id_herramienta) VALUES
 ('$etiquetas', '$comando', '$descripcion', '$detalles', '$idFase', '$idHerramienta')";
mysqli_query($cx , $sql);
mysqli_close($cx);
header('Location:comandos.php'); 
?>