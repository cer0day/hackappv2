<?php
    include 'conexion.php';
    $idObjetivo=$_POST['idObjetivoD'];
    $sql = "DELETE FROM objetivos WHERE id_objetivo = $idObjetivo";
    mysqli_query($cx, $sql);

    mysqli_close($cx);
    header('Location:objetivo.php');
?>