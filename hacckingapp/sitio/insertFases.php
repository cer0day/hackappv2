<?php
include 'conexion.php';
$nombreFase=$_POST['nombreF'];


$sql = "INSERT INTO fases (nombre_fase) VALUES ('$nombreFase')";
mysqli_query($cx , $sql);
mysqli_close($cx);
header('Location:fases.php'); 
?>