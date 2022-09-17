<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.4.1.min.js"></script>
    <script src="scripts.js" type="text/javascript"></script>
    <link rel="stylesheet" href= "styles.css">
    <title>osint</title>
</head>
<body>
    <div class="c_main">
        <h1>Herramientas<a href="index.php"><div class="boton_volver"><img src='volver.png'><div></a></h1>
        <form action="">
        <table class="main_search">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input class="inputSearch" type="text" id="searchH" onkeyup="get_herramientasS()">
                    </td>
                    <td>
                        <a class='link' onclick="insert_herramienta()"><div class='bEditar'><img src='add.png'></div></a>
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
        <div id="c_herramientas"></div>
    </div>
    <!--Modal insert -->
    <div id="m_insert" class="bgModal ocultar"> 
        <div class="modal m_insert">
            <div class="b_cancelar"><img src="cancelar.png"></div>
            <div onclick="save_herramienta()" class="b_guardar"><img src="guardar.png"></div>
            <h1 class="titulo">Guardar herramienta</h1>

            <form method="post" action="insertHerramienta.php" name="formularioHerramientas">
            <table class="tableInsert">
                
                <tr><td><input type="text" id="nombre" name="nombre"></td></tr>
                <tr><td><textarea id="descripcion" name="descripcion"></textarea></td></tr>
                <input type="hidden" id="idHerramienta" name="idHerramienta">
                
            </table>
            </form>
        </div> 
    </div>
    <!--Modal delete -->
    <div id="m_delete" class="bgModal ocultar"> 
        <div class="modal m_delete">
            <div class="b_cancelar"><img src="cancelar.png"></div><div onclick="delete_herramientaD()" class="b_guardar"><img src="eliminar.png"></div>
            <h1 class="titulo">¿Desea eliminar esta herramienta?</h1>
            <form method="post" action="deleteHerramienta.php" name="deleteHerramientas">
            <table class="tableInsert">
                <tr><td><input type="text" id="nombreD" name="nombreD"></td></tr>
                <input type="hidden" id="idHerramientaD" name="idHerramientaD">
                
            </table>
            </form>
        </div> 
    </div>
</body>
</html>
