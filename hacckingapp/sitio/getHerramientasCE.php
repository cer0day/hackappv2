<?php 
    $herramientas=[];
	$id_tema="";
	$nombre="";
    echo "<option value=''>Selecione la herramienta</option>";
	$idFase=$_POST['idFaseC'];
	date_default_timezone_set('Mexico/General');
	include 'conexion.php';
	
	
        $sql = mysqli_query($cx,"SELECT * FROM herramientas WHERE 1 ORDER BY nombre_herramienta");		
		while($row=mysqli_fetch_row($sql)){
			$id_herramienta=$row[0];
            $nombre=$row[1];
			echo "<option value=$id_herramienta>$nombre</option>";
		}
    
?>