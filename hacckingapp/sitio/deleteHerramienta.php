<?php
    include 'conexion.php';
    $idHerramienta=$_POST['idHerramientaD'];
    $herramienta="";
    $sqlH = mysqli_query($cx,"SELECT * FROM comandos WHERE id_herramienta=$idHerramienta");
	while($rowH=mysqli_fetch_row($sqlH)){
		$herramienta=$rowH[0];
	}

    //Solo si no tiene un comando relacionado se elimina
    if($herramienta==""){
        $sql = "DELETE FROM herramientas WHERE id_herramienta = $idHerramienta";
        mysqli_query($cx, $sql);
    }
    mysqli_close($cx);
    header('Location:herramientas.php');


?>