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
        <h1>Fases<a href="index.php"><div class="boton_volver"><img src='volver.png'><div></a></h1>
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
                        <input class="inputSearch" type="text" id="searchF" onkeyup="get_fasesF()">
                    </td>
                    <td>
                    <a class='link' onclick="insert_fase()"><div class='bEditar'><img src='add.png'></div></a>
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
        <div id="c_fases"></div>
    </div>
    <!--Modal insert -->
    <div id="m_insertF" class="bgModal ocultar"> 
        <div class="modal m_insert">
            <div class="b_cancelar"><img src="cancelar.png"></div>
            <div onclick="save_fase()" class="b_guardar"><img src="guardar.png"></div>
            <h1 class="titulo">Guardar Fase</h1>
            <form method="post" action="insertFases.php" name="formularioFases">
            <table class="tableInsert">
                <tr><td><input type="text" id="nombreF" name="nombreF" require></td></tr>
                <input type="hidden" id="idFase" name="idFase">
            </table>
            </form>
        </div> 
    </div>
    <!--Modal delete -->
    <div id="m_delete" class="bgModal ocultar"> 
        <div class="modal m_delete">
            <div class="b_cancelar"><img src="cancelar.png"></div><div onclick="delete_faseD()" class="b_guardar"><img src="eliminar.png"></div>
            <h1 class="titulo">¿Desea eliminar esta fase?</h1>
            <form method="post" action="deleteFase.php" name="deleteFase">
            <table class="tableInsert">
                <tr><td><input type="text" id="nombreFD" name="nombreFD"></td></tr>
                <input type="hidden" id="idFaseFD" name="idFaseFD">
                
            </table>
            </form>
        </div> 
    </div>
</body>
</html>
