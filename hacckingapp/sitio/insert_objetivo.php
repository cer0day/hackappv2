<?php
include 'conexion.php';
$ip=$_POST['ip'];
$dominio=$_POST['dominio'];


$sql = "INSERT INTO objetivos (ip_objetivo, dominio_objetivo) VALUES ('$ip', '$dominio')";
mysqli_query($cx , $sql);
mysqli_close($cx);
header('Location:objetivo.php');
?>