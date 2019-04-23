<?php
    session_start();
    $pacienteErr= $asistenteErr = $fechaError = $tipoErr = "*";
    $nombreErr = $enfermedadErr=$apellidoErr = $fechaNacimientoErr = '*';
    $nivelErr = $sexoErr = $religionErr = '';
    include("../views/_header.html");
    include("registro.html"); 
    include("../views/_footer.html");
 ?>
