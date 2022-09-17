<?php
    include 'conexion.php';
    $idComando=$_POST['idComandoD'];
    $sql = "DELETE FROM comandos WHERE id_comando = $idComando";
    mysqli_query($cx, $sql);
    mysqli_close($cx);
    header('Location:comandos.php');


?>