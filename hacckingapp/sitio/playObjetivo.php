<?php
include 'conexion.php';
$idObjetivo=$_POST['idObjetivo'];
$ipU=$_POST['ipU'];
$dominioU=$_POST['dominioU'];

$sql = "UPDATE objetivos SET estado_objetivo = 0 WHERE 1";
mysqli_query($cx , $sql);

$sql = "UPDATE objetivos SET estado_objetivo=1 WHERE id_objetivo=$idObjetivo";
mysqli_query($cx , $sql);

mysqli_close($cx);

?>