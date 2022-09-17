<?php

include 'conexion.php';
$idHerramienta=$_POST['idHerramienta'];
$nombreHerramienta=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$descripcion=base64_encode($descripcion);

$sql = "UPDATE herramientas SET nombre_herramienta='$nombreHerramienta', ayuda_herramienta='$descripcion' WHERE id_herramienta=$idHerramienta";
mysqli_query($cx , $sql);
mysqli_close($cx);
header('Location:herramientas.php');

?>