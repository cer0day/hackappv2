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
        <h1>Hacking</h1>
        <form action="">
        <table>
            <thead>
                <tr>
                    <th><a href="fases.php">Fases</a></th>
                    <th><a href="herramientas.php">Herramientas</a></th>
                    <th><a href="objetivo.php">Search</a></th>
                    <th>Limpiar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="fase" id="fase" onchange="get_fasess()"></select>
                    </td>
                    <td>
                        <select name="herramientas" id="herramientas" onchange="get_comandos()"></select>
                    </td>
                    <td>
                        <input type="text" class="inputSearch" id="search" onkeyup="get_comandos()">
                    </td>
                    <td>
                        <a class='link' onclick='limpiar();'><div class='bEditar'><img src='limpiar.png'></div></a>
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
        <div id="c_comandos"></div>
    </div>
    <!--Modal detalles -->
    <div id="m_view" class="bgModal ocultar">
        <div class="modal m_view">
            <div class="b_cancelar"><img src="cancelar.png"></div>
            <h1 class="titulo">Detalles del comando</h1>
            <table class="tableComandos">
                <tr><th>Comando</th><th>Descripción</th></tr>
                <tr>
                    <td><textarea id="comando"></textarea></td>
                    <td><textarea id="descripcion"></textarea></td>
                </tr>
                <tr><th colspan="2">Detalles</th></tr>
                <tr><td colspan="2"><textarea id="detalles"></textarea></td></tr>
            </table>
        </div> 
    </div>
    <!--Modal ayuda -->
    <div id="m_ayuda" class="bgModal ocultar"> 
        <div class="modal m_view">
            <div class="b_cancelar"><img src="cancelar.png"></div>
            <h1 class="titulo">Ayuda</h1>
            <table>
                <tr><td><pre><div id="ayuda"></div></pre></td></tr>
            </table>
        </div> 
    </div>
</body>
</html>
