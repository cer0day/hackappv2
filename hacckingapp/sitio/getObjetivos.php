<?php 
    $count=0;
	include 'conexion.php';
	echo "<table>";
    $sql = mysqli_query($cx,"SELECT * FROM objetivos WHERE 1");
    while($row=mysqli_fetch_row($sql)){
    	$ipObjetivo=$row[1];
        $dominioObjetivo=$row[2];
        $estado=$row[3];
        $datosF=json_encode($row);
		$datosF=htmlentities($datosF);

        if($count==0){$color="oscuro";}else{$color="claro";}
        if($estado==1){$color="seleccionado";}
        echo "<tr class='$color'>
                <td>
                    <a class='link' onclick='play_objetivo(".$datosF.")'>
                        <div class='bEditar'><img src='play.png'></div>
                    </a>
                </td>
                <td>$ipObjetivo</td>
                <td>$dominioObjetivo</td>
                <td>
                    <a class='link' onclick='update_objetivo(".$datosF.")'>
                        <div class='bEditar'><img src='editar.png'></div>
                    </a>
                </td>
                <td>
                    <a class='link' onclick='delete_objetivo(".$datosF.")'>
                        <div class='bEditar'><img src='eliminar.png'></div>
                    </a>
                </td>
            </tr>";
        $count++;
        if($count==2){$count=0;}   
	}
    echo "</table>";
    ?>