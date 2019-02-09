<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php include("Varios/title.php");?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="Resources/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="Imagenes/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
<?php $t_tiempo = explode(" ",microtime()); $t_tiempo = $t_tiempo[0] + $t_tiempo[1]; $tiempoinicial = $t_tiempo; ?>
</head>
<body onload="index.user.focus();" oncontextmenu="return false" onMouseMove="coordenadas(event);">
<form name="index">        	
    <!--Barra de Navegacion-->
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">ARRSOFTWARE</a>
        </div>
    </nav>
<!--div><nav class="navbar navbar-default" role="navigation"-->
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><img src="Imagenes/lock_ok.ico">Bienvenido</div>
                    <div class="panel-body"> 
                        <div class="alert alert-danger text-center" style="display:none;" id="error">
                            <p>Usuario o Password no identificados</p>
                        </div>                     
                        <form role="form">
                            <div class="form-group">
                                <label for="user">Usuario:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" id="user" placeholder="Nombre de Usuario" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" class="form-control" id="pass" placeholder="Password" required>
                                </div>
                            </div>        
                            <div class="form-group" style="display:none;">
                                <label for="x">X: </label><input type="text" id="x" size="10">
                                <label for="y">Y: </label><input type="text" id="y" size="10">
                            </div>             
                            <button type="button" id="entrar" class="btn btn-primary" onclick='confirmar();'><span class="glyphicon glyphicon-lock"></span> Entrar</button>                               
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
<!--
<script type="text/javascript">
var eventoControlado = false;
window.onload = function() { document.onkeypress = mostrarInformacionCaracter;
document.onkeyup = mostrarInformacionTecla; }
function mostrarInformacionCaracter(evObject) {
                var msg = ''; var elCaracter = String.fromCharCode(evObject.which);
                if (evObject.which!=0 && evObject.which!=13) {
                msg = 'Tecla pulsada: ' + elCaracter;
                control.innerHTML += msg + '-----------------------------<br/>'; }
                else { msg = 'Pulsada tecla especial';
                control.innerHTML += msg + '-----------------------------<br/>';}
                eventoControlado=true;
}
function mostrarInformacionTecla(evObject) {
                var msg = ''; var teclaPulsada = evObject.keyCode;
                if (teclaPulsada == 20) { msg = 'Pulsado caps lock (act/des mayúsculas)';}
                else if (teclaPulsada == 16) { msg = 'Pulsado shift';}
                else if (eventoControlado == false) { msg = 'Pulsada tecla especial';}
                if (msg) {control.innerHTML += msg + '-----------------------------<br/>';}
                eventoControlado = false;
}
</script>
</head>
<body><div id="cabecera"><h2>Cursos aprenderaprogramar.com</h2><h3>Ejemplo JavaScript: pulse una tecla</h3></div>
<div id="control"> </div>--    
<!--/div-->    

	<script src="Resources/js/jquery-1.11.2.js"></script>
	<script src="Resources/js/bootstrap.min.js"></script>
    <script>
    document.onkeypress=function(e){
        var esIE=(document.all);
        var esNS=(document.layers);
        tecla=(esIE) ? event.keyCode : e.which;
        if(tecla==13){
            var Elemento=document.getElementById("user").value;
            var Elemento2=document.getElementById("pass").value;
            if($('#user').val().length == 0)
            {
                $("#user").focus();
                return false;
            }
            else{
                $("#pass").focus();            
                if($('#pass').val().length == 0)
                {
                    $("#pass").focus();
                    return false;
                }else{  
                confirmar();
                }
            }
                return false;
            }
        }
function coordenadas(event) 
{   x=event.clientX;
    y=event.clientY;
    document.getElementById("x").value = x;
    document.getElementById("y").value = y;
}        
        function confirmar(){
            var user = $('#user').val();
            var pass = $('#pass').val();
            $.ajax({
                url:'Varios/validar.php',
                type:'POST',
                data:'user='+user+'&pass='+pass+"&boton=ingresar"
            }).done(function(resp){
                if(resp=='0'){
                    $('#error').show();
                }else{
                    location.href='marco_new.php';                   
                }
            });
        }/*
function validar(form)
{   for(i=0; i <form. length; i++)
    {   if(form.item(i).value == "")
        {   self.alert("La Casilla  " + form.item(i).name + " esta Vacia");
            form.item(i).focus();
            return false;
        }
    }
}
function paginacionSQL($actual, $total, $por_pagina, $enlace,$maxpags=0) {
$total_paginas = ceil($total/$por_pagina);
$anterior = $actual - 1;
$posterior = $actual + 1;
$minimo = $maxpags ? max(1, $actual-ceil($maxpags/2)): 1;
$maximo = $maxpags ? min($total_paginas, $actual+floor($maxpags/2)): $total_paginas;
if ($actual>1)
$texto = "<a href=\"".$enlace."?pag=".$anterior."\">«</a> ";
else
$texto = "<b>«</b> ";
if ($minimo!=1) $texto.= "... ";
for ($i=$minimo; $i<$actual; $i++)
$texto .= "<a href=\"".$enlace."?pag=".$i."\">$i</a> ";
$texto .= "<b>$actual</b> ";
for ($i=$actual+1; $i<=$maximo; $i++)
$texto .= "<a href=\"".$enlace."?pag=".$i."\">$i</a> ";
if ($maximo!=$total_paginas) $texto.= "... ";
if ($actual<$total_paginas)
$texto .= "<a href=\"".$enlace."?pag=".$posterior."\">»</a>";
else
$texto .= "<b>»</b>";
return $texto;
}*/
    </script>
</body>
</html>
