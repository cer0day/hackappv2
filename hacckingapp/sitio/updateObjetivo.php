<?php
include 'conexion.php';
$idObjetivo=$_POST['idObjetivoU'];
$ipU=$_POST['ipU'];
$dominioU=$_POST['dominioU'];

$sql = "UPDATE objetivos SET ip_objetivo='$ipU', dominio_objetivo='$dominioU' WHERE id_objetivo=$idObjetivo";
mysqli_query($cx , $sql);
mysqli_close($cx);
header('Location:objetivo.php');

?>