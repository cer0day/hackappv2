<?php 
    $count=0;
	$search=$_POST['herramientaS'];
	include 'conexion.php';
	echo "<table>";
    if($search==""){
	    $sql = mysqli_query($cx,"SELECT * FROM herramientas WHERE 1 ORDER BY nombre_herramienta");
    }else{
        $sql = mysqli_query($cx,"SELECT * FROM herramientas WHERE nombre_herramienta LIKE '%$search%'");
    }	
	while($row=mysqli_fetch_row($sql)){
    	$id_herramienta=$row[0];
        $nombreHerramienta=$row[1];
        $datosH=json_encode($row);
        
		if($count==0){$color="oscuro";}else{$color="claro";}
        echo "<tr class='$color'>
                <td>$nombreHerramienta</td>
                <td>
                    <a class='link' onclick='update_herramienta(".$datosH.")'>
                        <div class='bEditar'><img src='editar.png'></div>
                    </a>
                </td>
                <td>
                    <a class='link' onclick='delete_herramienta(".$datosH.")'>
                        <div class='bEditar'><img src='eliminar.png'></div>
                    </a>
                </td>
            </tr>";
        $count++;
        if($count==2){$count=0;}
        
        
	}
    echo "</table>";


    ?>