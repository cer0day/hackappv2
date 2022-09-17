
<?php 
	include 'conexion.php';
	date_default_timezone_set('Mexico/General');
	$id_tema="";
	$nombre="";
	$idFase=$_POST['idFase'];
	$idHerramienta=$_POST['idHerramienta'];
	$search=$_POST['search'];
	echo "<table><tr><th><a href='comandos.php'>Comandos</a></th><th>Descripcion</th><th>Herramienta</th><th></th><th>Detalles</th></tr>";
	$count=0;
	//Checamos si hay objetivos
	$ip="";
	$ip="";
	$dominio="";
	$sql = mysqli_query($cx,"SELECT * FROM objetivos WHERE estado_objetivo=1");	
	while($row=mysqli_fetch_row($sql)){
		$ip=$row[1];
		$ips=$separar = explode(".", $ip);
		$ips=$ips[0].".".$ips[1].".".$ips[2];
		$dominio=$row[2];
	}
	
	//Fases
	if($idFase!="" && $idHerramienta == "" && $search ==""){	
		$sql = mysqli_query($cx,"SELECT * FROM comandos, fases WHERE comandos.id_fase=fases.id_fase AND comandos.id_fase=$idFase");	
		while($row=mysqli_fetch_row($sql)){
			$nombre=$row[2];
			$nombre=base64_decode($nombre);
			if($ip!=""){$nombre=str_replace('0.0.0.0', $ip, $nombre);}
			if($ip!=""){$nombre=str_replace('0.0.0', $ips, $nombre);}
			if($dominio!=""){$nombre=str_replace('dominio.org', $dominio, $nombre);}
			$descripcion=$row[3];
			$id_herramienta=$row[6];
			$descargar=$row[7];
			if($descargar!=""){$imagen="datosa.png";$link="href='archivos/$descargar'"; }else{$imagen="datosan.png";$link="";}

			$sqlH = mysqli_query($cx,"SELECT * FROM herramientas WHERE id_herramienta=$id_herramienta");
			while($rowH=mysqli_fetch_row($sqlH)){
				$herramienta=$rowH[1];
				$datosH=$rowH[2];
				$datosH=json_encode($datosH);
			}
			//Buscamos si el comando trae varias instrucciones (li)
			$cadena_de_texto=$nombre;
			$cadena_buscada   = '#';
			$coincidencia = strrpos($cadena_de_texto, $cadena_buscada);
			$datosC=json_encode($row);
			
			if($count==0){$color="oscuro";}else{$color="claro";}

			if($coincidencia){
				echo "<tr class='$color'>
				<td><textarea class='varias comando'>$nombre</textarea></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}else{
				echo "<tr class='$color'>
				<td><textarea class='comando'>$nombre</textarea></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}
			$count++;
			if($count==2){$count=0;}
		}
	}
	//herramientas
	elseif($idFase=="" && $idHerramienta != "" && $search ==""){	
		$sql = mysqli_query($cx,"SELECT * FROM comandos WHERE id_herramienta=$idHerramienta");		
		while($row=mysqli_fetch_row($sql)){
			$nombre=$row[2];
			$nombre=base64_decode($nombre);
			if($ip!=""){$nombre=str_replace('0.0.0.0', $ip, $nombre);}
			if($ip!=""){$nombre=str_replace('0.0.0', $ips, $nombre);}
			if($dominio!=""){$nombre=str_replace('dominio.org', $dominio, $nombre);}
			$descripcion=$row[3];
			$id_herramienta=$row[6];
			$descargar=$row[7];
			if($descargar!=""){$imagen="datosa.png";$link="href='archivos/$descargar'"; }else{$imagen="datosan.png";$link="";}
			$sqlH = mysqli_query($cx,"SELECT * FROM herramientas WHERE id_herramienta=$id_herramienta");
			while($rowH=mysqli_fetch_row($sqlH)){
				$herramienta=$rowH[1];
				$datosH=$rowH[2];
				$datosH=json_encode($datosH);
			}
			//Buscamos si el comando trae varias instrucciones (li)
			$cadena_de_texto=$nombre;
			$cadena_buscada   = 'li';
			$coincidencia = strrpos($cadena_de_texto, $cadena_buscada);
			$datosC=json_encode($row);
			
			if($count==0){$color="oscuro";}else{$color="claro";}

			if($coincidencia){
				echo "<tr class='$color'>
				<td class='varias'><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}else{
				echo "<tr class='$color'>
				<td><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}
			$count++;
			if($count==2){$count=0;}
		}
	}
	//search
	elseif($idFase=="" && $idHerramienta == "" && $search !=""){
		$sql = mysqli_query($cx,"SELECT * FROM comandos WHERE etiquetas LIKE '%$search%'");		
		while($row=mysqli_fetch_row($sql)){
			$nombre=$row[2];
			$nombre=base64_decode($nombre);
			if($ip!=""){$nombre=str_replace('0.0.0.0', $ip, $nombre);}
			if($ip!=""){$nombre=str_replace('0.0.0', $ips, $nombre);}
			if($dominio!=""){$nombre=str_replace('dominio.org', $dominio, $nombre);}
			$descripcion=$row[3];
			$id_herramienta=$row[6];
			$descargar=$row[7];
			if($descargar!=""){$imagen="datosa.png";$link="href='archivos/$descargar'"; }else{$imagen="datosan.png";$link="";}
			$sqlH = mysqli_query($cx,"SELECT * FROM herramientas WHERE id_herramienta=$id_herramienta");
			while($rowH=mysqli_fetch_row($sqlH)){
				$herramienta=$rowH[1];
				$datosH=$rowH[2];
				$datosH=json_encode($datosH);
			}
			//Buscamos si el comando trae varias instrucciones (li)
			$cadena_de_texto=$nombre;
			$cadena_buscada   = 'li';
			$coincidencia = strrpos($cadena_de_texto, $cadena_buscada);
			$datosC=json_encode($row);
									
			if($count==0){$color="oscuro";}else{$color="claro";}

			if($coincidencia){
				echo "<tr class='$color'>
				<td class='varias'><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}else{
				echo "<tr class='$color'>
				<td><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}
			$count++;
			if($count==2){$count=0;}
		}
	}
	//Fase y herramienta
	elseif($idFase!="" && $idHerramienta != "" && $search ==""){
		$sqlC = mysqli_query($cx,"SELECT comandos.comando, comandos.descripcion FROM comandos, fases, herramientas WHERE comandos.id_fase=fases.id_fase 
		AND comandos.id_herramienta=herramientas.id_herramienta AND comandos.id_herramienta=$idHerramienta");		
		while($rowC=mysqli_fetch_row($sqlC)){
			$nombre=$rowC[0];
			$nombre=base64_decode($nombre);
			if($ip!=""){$nombre=str_replace('0.0.0.0', $ip, $nombre);}
			if($ip!=""){$nombre=str_replace('0.0.0', $ips, $nombre);}
			if($dominio!=""){$nombre=str_replace('dominio.org', $dominio, $nombre);}
			$descripcion=$rowC[1];
			if($descargar!=""){$imagen="datosa.png";$link="href='archivos/$descargar'"; }else{$imagen="datosan.png";$link="";}
			
			$sqlH = mysqli_query($cx,"SELECT * FROM herramientas WHERE id_herramienta=$idHerramienta");
			while($rowH=mysqli_fetch_row($sqlH)){
				$herramienta=$rowH[1];
				$datosH=$rowH[2];
				$datosH=json_encode($datosH);
			}
			//Buscamos si el comando trae varias instrucciones (li)
			$cadena_de_texto=$nombre;
			$cadena_buscada   = 'li';
			$coincidencia = strrpos($cadena_de_texto, $cadena_buscada);
			$datosC=json_encode($rowC);
			
			if($count==0){$color="oscuro";}else{$color="claro";}

			if($coincidencia){
				echo "<tr class='$color'>
				<td class='varias'><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}else{
				echo "<tr class='$color'>
				<td><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}
			$count++;
			if($count==2){$count=0;}
		}
	}
	//Fase, herramienta y search
	elseif($idFase!="" && $idHerramienta != "" && $search !=""){
		$sql = mysqli_query($cx,"SELECT comandos.comando, comandos.descripcion FROM comandos, fases, herramientas WHERE comandos.id_fase=fases.id_fase 
		AND comandos.id_herramienta=herramientas.id_herramienta AND comandos.id_herramienta=$idHerramienta AND comandos.etiquetas LIKE '%$search%'");		
		while($row=mysqli_fetch_row($sql)){
			$nombre=$row[0];
			$nombre=base64_decode($nombre);
			if($ip!=""){$nombre=str_replace('0.0.0.0', $ip, $nombre);}
			if($ip!=""){$nombre=str_replace('0.0.0', $ips, $nombre);}
			if($dominio!=""){$nombre=str_replace('dominio.org', $dominio, $nombre);}
			$descripcion=$row[1];
			if($descargar!=""){$imagen="datosa.png";$link="href='archivos/$descargar'"; }else{$imagen="datosan.png";$link="";}
			$sqlH = mysqli_query($cx,"SELECT * FROM herramientas WHERE id_herramienta=$idHerramienta");
			while($rowH=mysqli_fetch_row($sqlH)){
				$herramienta=$rowH[1];
				$datosH=$rowH[2];
				$datosH=json_encode($datosH);
			}
			//Buscamos si el comando trae varias instrucciones (li)
			$cadena_de_texto=$nombre;
			$cadena_buscada   = 'li';
			$coincidencia = strrpos($cadena_de_texto, $cadena_buscada);
			$datosC=json_encode($row);
			
			if($count==0){$color="oscuro";}else{$color="claro";}

			if($coincidencia){
				echo "<tr class='$color'>
				<td class='varias'><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}else{
				echo "<tr class='$color'>
				<td><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}
			$count++;
			if($count==2){$count=0;}		
		}
	}
	//herramienta y search
	elseif($idFase=="" && $idHerramienta != "" && $search !=""){
		$sqlC = mysqli_query($cx,"SELECT * FROM comandos WHERE
		id_herramienta=$idHerramienta AND etiquetas LIKE '%$search%'");		
		while($rowC=mysqli_fetch_row($sqlC)){
			$nombre=$rowC[2];
			$nombre=base64_decode($nombre);
			if($ip!=""){$nombre=str_replace('0.0.0.0', $ip, $nombre);}
			if($ip!=""){$nombre=str_replace('0.0.0', $ips, $nombre);}
			if($dominio!=""){$nombre=str_replace('dominio.org', $dominio, $nombre);}
			$descripcion=$rowC[3];
			if($descargar!=""){$imagen="datosa.png";$link="href='archivos/$descargar'"; }else{$imagen="datosan.png";$link="";}
			$sqlH = mysqli_query($cx,"SELECT * FROM herramientas WHERE id_herramienta=$idHerramienta");
			while($rowH=mysqli_fetch_row($sqlH)){
				$herramienta=$rowH[1];
				$datosH=$rowH[2];
				$datosH=json_encode($datosH);
			}
			//Buscamos si el comando trae varias instrucciones (li)
			$cadena_de_texto=$nombre;
			$cadena_buscada   = 'li';
			$coincidencia = strrpos($cadena_de_texto, $cadena_buscada);
			$datosC=json_encode($rowC);
			$datosC=htmlentities($datosC);

			if($count==0){$color="oscuro";}else{$color="claro";}

			if($coincidencia){
				echo "<tr class='$color'>
				<td class='varias'><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}else{
				echo "<tr class='$color'>
				<td><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}
			$count++;
			if($count==2){$count=0;}
		}
	}
	//Fase y search
	elseif($idFase!="" && $idHerramienta == "" && $search !=""){
		$sqlC = mysqli_query($cx,"SELECT * FROM comandos, fases WHERE comandos.id_fase=fases.id_fase 
		AND comandos.id_fase=$idFase AND comandos.etiquetas LIKE '%$search%'");		
		while($rowC=mysqli_fetch_row($sqlC)){
			$nombre=$rowC[2];
			$nombre=base64_decode($nombre);
			if($ip!=""){$nombre=str_replace('0.0.0.0', $ip, $nombre);}
			if($ip!=""){$nombre=str_replace('0.0.0', $ips, $nombre);}
			if($dominio!=""){$nombre=str_replace('dominio.org', $dominio, $nombre);}   
			$descripcion=$rowC[3];
			$id_herramienta=$rowC[6];
			if($descargar!=""){$imagen="datosa.png";$link="href='archivos/$descargar'"; }else{$imagen="datosan.png";$link="";}
			$sqlH = mysqli_query($cx,"SELECT * FROM herramientas WHERE id_herramienta=$id_herramienta");
			while($rowH=mysqli_fetch_row($sqlH)){
				$herramienta=$rowH[1];
				$datosH=$rowH[2];
				$datosH=json_encode($datosH);
			}
			//Buscamos si el comando trae varias instrucciones (li)
			$cadena_de_texto=$nombre;
			$cadena_buscada   = 'li';
			$coincidencia = strrpos($cadena_de_texto, $cadena_buscada);
			$datosC=json_encode($rowC);
			
			if($count==0){$color="oscuro";}else{$color="claro";}

			if($coincidencia){
				echo "<tr class='$color'>
				<td class='varias'><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}else{
				echo "<tr class='$color'>
				<td><pre><code>$nombre</code></pre></td>
				<td width='300px'>$descripcion</td>
				<td width='100px'><a class='link' onclick='view_ayuda(".$datosH.")'><pre><code>$herramienta</code></pre></a></td>
				<td width='50px'><a class='link' $link)'><div class='bEditar'><img src='$imagen'.png'></div></a></td>
				<td width='50px'><a class='link' onclick='view_comando(".$datosC.")'><div class='bEditar'><img src='detalles.png'></div></a></td>
				</tr>";
			}
			$count++;
			if($count==2){$count=0;}
		}
	}
	echo "</table>";

?>