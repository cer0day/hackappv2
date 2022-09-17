<?php 
    $count=0;
	$search=$_POST['fasesF'];
	include 'conexion.php';
	echo "<table>";
    if($search==""){
	    $sql = mysqli_query($cx,"SELECT * FROM fases WHERE 1 ORDER BY nombre_fase");
    }else{
        $sql = mysqli_query($cx,"SELECT * FROM fases WHERE nombre_fase LIKE '%$search%'");
    }	
	while($row=mysqli_fetch_row($sql)){
    	$id_herramienta=$row[0];
        $nombreFase=$row[1];
        $datosF=json_encode($row);
		$datosF=htmlentities($datosF);

        if($count==0){$color="oscuro";}else{$color="claro";}
        echo "<tr class='$color'>
                <td>$nombreFase</td>
                <td>
                    <a class='link' onclick='update_fase(".$datosF.")'>
                        <div class='bEditar'><img src='editar.png'></div>
                    </a>
                </td>
                <td>
                    <a class='link' onclick='delete_fase(".$datosF.")'>
                        <div class='bEditar'><img src='eliminar.png'></div>
                    </a>
                </td>
            </tr>";
        $count++;
        if($count==2){$count=0;}   
	}
    echo "</table>";
    ?>