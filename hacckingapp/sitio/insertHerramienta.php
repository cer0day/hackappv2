<?php
include 'conexion.php';
$nombreHerramienta=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$descripcion=base64_encode($descripcion);
$sql = "INSERT INTO herramientas (nombre_herramienta, ayuda_herramienta) VALUES ('$nombreHerramienta', '$descripcion')";
mysqli_query($cx , $sql);
mysqli_close($cx);
header('Location:herramientas.php');



?>