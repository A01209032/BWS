<?php

function header_html($titulo="Siervas de María Querétaro") {
   include("views/_header.html");
}

function info($mensaje) {
   $mensaje = '<div class="alert alert-primary" role="alert">'.$mensaje.'</div>';
   echo $mensaje;
}


function authSession($targetURL) {
	session_start();

	if (isset($_SESSION['user'])) {
		return true;
	}


}
    
?>