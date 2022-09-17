<?php
include 'conexion.php';
$archivo = $_FILES["archivo"];
$idComando = $_POST["idComando"];
$nombreDB = $_POST["nombreDB"];
$r = rand(0,100000);
$ruta= "archivos/";
       
if($archivo["name"]!=""){
    //Carpeta donde guardaremos los archivos
    
    //Nombre aleatorio para el archivo
    $fecha=date('ymdhmi');
    
    $nombreTem= $archivo['tmp_name'];
    //echo "nombreTem=".$nombreTem.'<br/>';
    $nombreArchivo = $archivo['name'];
    //echo "NombreArchivo=".$nombreArchivo.'<br/>';
    $extensionArchivo = substr(strrchr($nombreArchivo, '.'), 1);
    $extensionArchivo = strtolower($extensionArchivo);//convertir las extensiones aminusculas

    if($extensionArchivo=="zip" || $extensionArchivo == "rar"){
        //echo "extencion archivo =".$extensionArchivo."<br/>";
        $nombreArchivo=$fecha.$r.'.'.$extensionArchivo;
        //echo "NombreArchivo2=".$nombreArchivo."<br/>";
        $archivo=$nombreTem;
        $path=$ruta.$nombreArchivo;
        //echo "Archivo=".$archivo."<br/>";

        //Insertamos el archivo en la carpeta
        move_uploaded_file($nombreTem, $path);
        //Si existe algun archivo lo eliminamos
        //echo "archivo que eliminaremos: ".$ruta.$nombreDB."<br/>";
        if ($nombreDB != "" && file_exists($ruta.$nombreDB)){
            //echo "Si existe y se elimina<br/>";
            unlink($ruta.$nombreDB);
        }
         //Guardamos el nombre del archivo en la tabla
        $sql = "UPDATE comandos SET archivo='$nombreArchivo' WHERE id_comando=".$idComando;
        mysqli_query($cx , $sql);
        mysqli_close($cx);
        header('Location:comandos.php');
    }
}
//Si viene vacio el input borramos el fichero
unlink($ruta.$nombreDB);
$sql = "UPDATE comandos SET archivo='' WHERE id_comando=".$idComando;
mysqli_query($cx , $sql);
mysqli_close($cx);
header('Location:comandos.php');
header('Location:comandos.php');
?>