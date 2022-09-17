$(document).ready(function() {
    var pathname = window.location.pathname;
    separador = "/";
    arregloDeSubCadenas = pathname.split(separador);
    var archivo=arregloDeSubCadenas[2];
    
    if(archivo=="index.php" || archivo==""){

        get_fases();
        get_herramientas();

        $('.b_cancelar').click(function() {
        $("#m_view").addClass("ocultar");
        $("#m_ayuda").addClass("ocultar");

        });
    }else if(archivo=="herramientas.php"){
        get_herramientasS();
        $('.b_cancelar').click(function() {
            console.log("cancelando");
            $("#m_insert").addClass("ocultar");
            $("#m_delete").addClass("ocultar");
       });

    }else if(archivo=="fases.php"){
        get_fasesF();
        $('.b_cancelar').click(function() {
            console.log("cancelando");
            $("#m_insertF").addClass("ocultar");
            $("#m_delete").addClass("ocultar");
        });
    }else if(archivo=="comandos.php"){
        get_fasesC();
        get_herramientasC();
        get_herramientasCE();

                     
        $('.b_cancelar').click(function() {
            console.log("cancelando");
            $("#m_view").addClass("ocultar");
            $("#m_delete").addClass("ocultar");
            $("#m_archivo").addClass("ocultar");
       });

    }
    else if(archivo=="objetivo.php"){
        $.ajax({
            type: "POST",
            url: "getObjetivos.php",
            success: function(response)
                {
                    $('#objetivos').html(response).fadeIn();
                }
        });

        $('.b_cancelar').click(function() {
            console.log("cancelando");
            $("#m_insertF").addClass("ocultar");
            $("#m_delete").addClass("ocultar");
        });
    }

    
});

var get_fases = ()=>{
    console.log("getfases");
    $.ajax({
            type: "POST",
            url: "getFases.php",
            success: function(response)
                {
                    $('#fase').html(response).fadeIn();
                }
    });
    
}
var get_fasess = ()=>{
    document.getElementById("herramientas").value="";
    document.getElementById("search").value="";
    get_herramientas();
    get_comandos();

}
var get_comandos = ()=>{
    console.log("getcomando");
    var idFase = document.getElementById("fase").value;
    var idHerramienta = document.getElementById("herramientas").value;
    var search = document.getElementById("search").value;

    var datos= {'idFase':idFase, 'idHerramienta':idHerramienta, 'search':search};
           
        $.ajax({
            type: "POST",
            url: "getComandos.php",
            data: datos,
            success: function(response)
                {                      
                    $("#c_comandos").html(response).fadeIn();
               }
         });
        
 }
 
var get_herramientas = ()=>{

    console.log("getHerramientas");
    var idFase = document.getElementById("fase").value;
    datos = 'idFase='+idFase;
    console.log("fase="+idFase);      
        $.ajax({
            type: "POST",
            url: "getHerramientas.php",
            data: datos,
            success: function(response)
                {                     
                    $("#herramientas").html(response).fadeIn();
               }
         });
        
 }
 var limpiar = ()=>{
    document.getElementById("fase").value="";
    document.getElementById("herramientas").value="";
    document.getElementById("search").value="";
    get_comandos();
}
var view_comando = (datos)=>{
    $("#m_view").removeClass("ocultar");
    document.getElementById("comando").innerHTML = atob(datos[2]);
    document.getElementById("descripcion").innerHTML = datos[3];
    document.getElementById("detalles").innerHTML = atob(datos[4]);
    console.log(datos[2]);
            
}
var view_ayuda = (datosH)=>{
    console.log(datosH);
    $("#m_ayuda").removeClass("ocultar");
    document.getElementById("ayuda").innerHTML = "<pre><code>"+atob(datosH)+"<pre><code>";
            
}

/*====================================================================================Herramientas*/

var get_herramientasS = ()=>{
    var herramientaS = document.getElementById("searchH").value;
    datos = 'herramientaS='+herramientaS;
    $.ajax({
            type: "POST",
            url: "getHerramientasS.php",
            data: datos,
            success: function(response)
            {                     
                $("#c_herramientas").html(response).fadeIn();
            }
    });
        
 }
 var insert_herramienta = ()=>{
    console.log("updating");
    document.formularioHerramientas.action = "insertHerramienta.php"
    document.getElementById("idHerramienta").value="";
    document.getElementById("nombre").value="";
    document.getElementById("descripcion").value="";
    $("#m_insert").removeClass("ocultar");
    console.log("insert");
 }
 var update_herramienta = (datos)=>{
    $("#m_insert").removeClass("ocultar");
    document.formularioHerramientas.action = "updateHerramienta.php"
    document.getElementById("idHerramienta").value=datos[0];
    document.getElementById("nombre").value=datos[1];
    document.getElementById("descripcion").value=atob(datos[2]);
}
 var delete_herramienta = (datos)=>{
    $("#m_delete").removeClass("ocultar");
    document.deleteHerramientas.action = "deleteHerramienta.php"
    document.getElementById("idHerramientaD").value=datos[0];
    document.getElementById("nombreD").value=datos[1];
        
 }
 var save_herramienta = ()=>{
    document.formularioHerramientas.submit()
}
var delete_herramientaD = ()=>{
    console.log("deleteHerramientaD");
    document.deleteHerramientas.submit()
}
 /*====================================================================================Fases*/
var get_fasesF = ()=>{
    var fasesF = document.getElementById("searchF").value;
    console.log(fasesF);
    datos = 'fasesF='+fasesF;
    $.ajax({
        type: "POST",
        url: "getFasesF.php",
        data: datos,
        success: function(response)
        {                     
              $("#c_fases").html(response).fadeIn();
        }
    });
        
 }
 var insert_fase = ()=>{
    console.log("inserting");
    document.formularioFases.action = "insertFases.php"
    document.getElementById("idFase").value="";
    document.getElementById("nombreF").value="";
    $("#m_insertF").removeClass("ocultar");
    console.log("insert");
 }

var delete_fase = (datos)=>{
    $("#m_delete").removeClass("ocultar");
    document.formularioFases.action = "deleteFase.php"
    document.getElementById("idFaseFD").value=datos[0];
    document.getElementById("nombreFD").value=datos[1];
        
 }
 var update_fase = (datos)=>{
    $("#m_insertF").removeClass("ocultar");
    document.formularioFases.action = "updateFase.php"
    document.getElementById("idFase").value=datos[0];
    document.getElementById("nombreF").value=datos[1];
   
}
var save_fase = ()=>{
    document.formularioFases.submit()
}
var delete_faseD = ()=>{
    document.deleteFase.submit()
}
/*===========================================================================================Comandos*/
var get_fasesC = ()=>{
    $.ajax({
            type: "POST",
            url: "getFasesC.php",
            success: function(response)
                {
                    $('#fase').html(response).fadeIn();
                    $('#faseC').html(response).fadeIn();
                   
                }
    });
}
var get_herramientasCE = ()=>{
    $.ajax({
        type: "POST",
        url: "getHerramientasCE.php",
        success: function(response)
        {                     
            $("#herramientasC").html(response).fadeIn();
           
        }
    });
        
 }
var get_fasessC = ()=>{
    document.getElementById("herramientas").value="";
    document.getElementById("search").value="";
    get_herramientasC();
    get_comandosC();
}

var get_herramientasC = ()=>{
    console.log("herramientasC");
    var idFase = document.getElementById("fase").value;
    datos = 'idFase='+idFase;
    $.ajax({
        type: "POST",
        url: "getHerramientasC.php",
        data: datos,
        success: function(response)
        {                     
            $("#herramientas").html(response).fadeIn();
            
           
        }
    });
        
 }
 
var get_comandosC = ()=>{
    console.log("getcomandoC");   
    var idFase = document.getElementById("fase").value;
    var idHerramienta = document.getElementById("herramientas").value;
    var search = document.getElementById("search").value;

    var datos= {'idFase':idFase, 'idHerramienta':idHerramienta, 'search':search};
           
        $.ajax({
            type: "POST",
            url: "getComandosC.php",
            data: datos,
            success: function(response)
                {                      
                    $("#c_comandosC").html(response).fadeIn();
               }
         });
        
 }
 var insert_comando = (datos)=>{
    console.log("insert_comando");
    document.formularioInsert.action = "insertComando.php";
    $("#m_view").removeClass("ocultar");
    document.getElementById("idComando").value = "";
    document.getElementById("etiquetas").innerHTML = "";
    document.getElementById("comando").innerHTML = "";
    document.getElementById("descripcion").innerHTML = ""
    document.getElementById("detalles").innerHTML = "";
    document.getElementById("faseC").value = "";
    document.getElementById("herramientasC").value = "";
}
 var view_comandoC = (datos)=>{
    console.log(datos);
    $("#m_view").removeClass("ocultar");
    document.getElementById("idComando").value = datos[0];
    document.getElementById("etiquetas").innerHTML = datos[1];
    document.getElementById("comando").innerHTML = atob(datos[2]);
    document.getElementById("descripcion").innerHTML = datos[3];
    document.getElementById("detalles").innerHTML = atob(datos[4]);
    document.getElementById("faseC").value = datos[5];
    document.getElementById("herramientasC").value = datos[6];
}
var view_archivoC = (datos)=>{
    console.log(datos);
    $("#m_archivo").removeClass("ocultar");
    document.getElementById("idComandoA").value = datos[0];
    document.getElementById("faseC").value = datos[5];
    document.getElementById("herramientasC").value = datos[6];
    document.getElementById("nombreDB").value = datos[7];
     document.getElementById("archivo").value = "";
}
var deleteC= (datos)=>{
    console.log("deleteC");
    $("#m_delete").removeClass("ocultar");
    document.getElementById("idComandoD").value=datos[0];
    document.getElementById("nombreComando").innerHTML=datos[2];
}
var limpiarC = ()=>{
    document.getElementById("fase").value="";
    document.getElementById("herramientas").value="";
    document.getElementById("search").value="";
    get_comandosC();
}
var save_comando = ()=>{
    document.formularioInsert.submit();
}
var delete_comandoD = ()=>{
    console.log("deleteHerramientaD");
    document.deleteComando.submit()
}
var insert_objetivo = ()=>{
    console.log("dinsertobjetivo");
    document.formularioObjetivos.submit()
}
var delete_objetivo = (datos)=>{
    console.log(datos);
    $("#m_delete").removeClass("ocultar");
    document.getElementById("idObjetivoD").value=datos[0];
    document.getElementById("ipD").value=datos[1];
    document.getElementById("dominioD").value=datos[2];
    
}
var delete_objetivoD = (datos)=>{
    document.deleteObjetivo.submit()
}
var update_objetivo = (datos)=>{
    $("#m_insertF").removeClass("ocultar");
    document.getElementById("idObjetivoU").value=datos[0];
    document.getElementById("ipU").value=datos[1];
    document.getElementById("dominioU").value=datos[2];
 }
var save_objetivo = ()=>{
    document.updateObjetivo.submit()
}
var play_objetivo = (datos)=>{
    console.log("play");   
    var idObjetivo = datos[0];
    var datos= {'idObjetivo':idObjetivo};
           
        $.ajax({
            type: "POST",
            url: "playObjetivo.php",
            data: datos,
            success: function(response)
                {                      
                   url = "objetivo.php";
                    $(location).attr('href',url);
               }
         });
    
}