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
        <h1>Objetivos<a href="index.php"><div class="boton_volver"><img src='volver.png'><div></a></h1>
        <form action="insert_objetivo.php" method="POST" name="formularioObjetivos">
        <table class="main_search">
            <thead>
                <tr>
                    <th>IP</th>
                    <th>Dominios</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input class="inputSearch" type="text" id="ip" name="ip" placeholder="0.0.0.0">
                    </td>
                    <td>
                        <input class="inputSearch" type="text" id="dominio" name="dominio" placeholder="dominio.org">
                    </td>
                    <td>
                    <a class='link' onclick="insert_objetivo()"><div class='bEditar'><img src='guardar.png'></div></a>
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
        <div id="objetivos"></div>
    </div>
    <!--Modal insert -->
    <div id="m_insertF" class="bgModal ocultar"> 
        <div class="modal m_insert">
            <div class="b_cancelar"><img src="cancelar.png"></div>
            <div onclick="save_objetivo()" class="b_guardar"><img src="guardar.png"></div>
            <h1 class="titulo">Guardar Objetivo</h1>
            <form method="post" action="updateObjetivo.php" name="updateObjetivo">
            <table class="tableInsert">
                <tr><td><input type="text" id="ipU" name="ipU"></td><td><input type="text" id="dominioU" name="dominioU"></td></tr>
                <input type="hidden" id="idObjetivoU" name="idObjetivoU">
            </table>
            </form>
        </div> 
    </div>
    <!--Modal delete -->
    <div id="m_delete" class="bgModal ocultar"> 
        <div class="modal m_delete">
            <div class="b_cancelar"><img src="cancelar.png"></div><div onclick="delete_objetivoD()" class="b_guardar"><img src="eliminar.png"></div>
            <h1 class="titulo">¿Desea eliminar este objetivo?</h1>
            <form method="POST" action="deleteObjetivo.php" name="deleteObjetivo">
            <table class="tableInsert">
                <tr><td><input type="text" id="ipD" name="ipD"></td><td><input type="text" id="dominioD" name="dominioD"></td></tr>
                <input type="hidden" id="idObjetivoD" name="idObjetivoD">
                
            </table>
            </form>
        </div> 
    </div>
</body>
</html>