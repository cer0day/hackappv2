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
        <h1>Editar Comandos<a href="index.php"><div class="boton_volver"><img src='volver.png'><div></a></h1>
        <form action="">
        <table>
            <thead>
                <tr>
                    <th><a href="fases.php">Fases</a></th>
                    <th><a href="herramientas.php">Herramientas</a></th>
                    <th>Search</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="fase" id="fase" onchange="get_fasessC()"></select>
                    </td>
                    <td>
                        <select name="herramientas" id="herramientas" onchange="get_comandosC()"></select>
                    </td>
                    <td>
                        <input class="inputSearch" type="text" id="search" onkeyup="get_comandosC()">
                    </td>
                    <td>
                        <a class='link' onclick="insert_comando()"><div class='bEditar'><img src='add.png'></div></a>
                    </td>
                    <td>
                        <a class='link' onclick='limpiar();'><div class='bEditar'><img src='limpiar.png'></div></a>
                    </td>
                    

                </tr>
            </tbody>
        </table>
        </form>
        </form>
        <div id="c_comandosC"></div>
    </div>
    <!--Modal detalles -->
    <div id="m_view" class="bgModal ocultar"> 
        <div class="modal m_view">
            <div class="b_cancelar"><img src="cancelar.png"></div>
            <div onclick="save_comando()" class="b_guardar"><img src="guardar.png"></div>
            <h1 class="titulo">Guardar comando</h1>
            <form action="updateComando.php" method="POST" name="formularioInsert">
                <table class="tableComandos">
                    <tr><th>Fase</th><th>Herramienta</th></tr>
                    <tr><th><select name="faseC" id="faseC"></th><th><select name="herramientasC" id="herramientasC"></select></th></tr>
                    <tr><th>Comando</th><th>Etiquetas</th></tr>
                    <tr>
                        <td><textarea id="comando" name="comando"></textarea></td>
                        <td><textarea id="etiquetas" name="etiquetas"></textarea></td>
                    </tr>
                    <tr><th colspan="2">Descripcion</th></tr>
                    <tr><td colspan="2"><textarea id="descripcion" name="descripcion"></textarea></td></tr>
                    <tr><th colspan="2">Detalles</th></tr>
                    <tr><td colspan="2"><textarea id="detalles" name="detalles"></textarea></td></tr>
                    <input type="hidden" name="idComando" id="idComando">
                </table>
            </form>
        </div> 
    </div>
    <!--Modal archivos -->s
    <div id="m_archivo" class="bgModal ocultar"> 
        <div class="modal m_archivos">
            <div class="b_cancelar"><img src="cancelar.png"></div>
            <div onclick="$(document).ready(function() {document.formArchivo.submit()});" class="b_guardar"><img src="guardar.png"></div>
            <h1 class="titulo">Guardar archivo</h1>
            <form action="insertArchivo.php" method="POST" name="formArchivo" enctype="multipart/form-data">
                <table class="tableComandos">
                    <tr><th>Archivo</th></tr>
                    <tr><td><input type="file" name="archivo" id="archivo"></td></tr>
                    <input type="hidden" name="nombreDB" id="nombreDB">
                    <input type="hidden" name="idComando" id="idComandoA">
                </table>
            </form>
        </div> 
    </div>
    <!--Modal delete -->
    <div id="m_delete" class="bgModal ocultar"> 
        <div class="modal m_delete">
            <div class="b_cancelar"><img src="cancelar.png"></div><div onclick="delete_comandoD()" class="b_guardar"><img src="eliminar.png"></div>
            <h1 class="titulo">¿Desea eliminar este comando?</h1>
            <form method="POST" action="deleteComando.php" name="deleteComando">
            <table class="tableInsert">
                <tr><td><div id="nombreComando"></div></td></tr>
                <input type="hidden" id="idComandoD" name="idComandoD">
            </table>
            </form>
        </div> 
    </div>
</body>
</html>
