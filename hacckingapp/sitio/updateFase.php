<?php

include 'conexion.php';
$idFase=$_POST['idFase'];
$nombreFase=$_POST['nombreF'];

$sql = "UPDATE fases SET nombre_fase='$nombreFase' WHERE id_fase=$idFase";
mysqli_query($cx , $sql);
mysqli_close($cx);
header('Location:fases.php');

?>