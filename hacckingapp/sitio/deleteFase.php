<?php
    include 'conexion.php';
    $idFase=$_POST['idFaseFD'];
    $fase="";
    $sqlF = mysqli_query($cx,"SELECT * FROM comandos WHERE id_fase=$idFase");
	while($rowF=mysqli_fetch_row($sqlF)){
		$fase=$rowF[0];
	}

    //Solo si no tiene un comando relacionado se elimina
    if($fase==""){
        $sql = "DELETE FROM fases WHERE id_fase = $idFase";
        mysqli_query($cx, $sql);
    }
    mysqli_close($cx);
    header('Location:fases.php');
?>