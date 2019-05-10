<?php
  session_start();
  $_SESSION['sbase'] = substr($_SERVER['PHP_SELF'], 0, strlen($_SERVER['PHP_SELF'])-9);

  //echo $_SESSION['sbase'];
  require_once('common/utils/server.php');
  //echo 'Location: '.frombase('common/login.php');

  if (isset($_SESSION['departamento'])) {
  	if ($_SESSION['departamento'] == 'administrador') {
  		header('Location: /source/administracion/admin.php');
      //header('Location: '.frombase('administracion/admin.php'));
  	} else {
  		header('Location: /source/registros/registro.php');
      //header('Location: '.frombase('registros/registro.php'));
  	}
  }
  else {
  	header('Location: /source/common/login.php');
    //header('Location: '.frombase('common/login.php'));
  }
  /*include("common/views/_header_login.html");
  include("common/views/login_view.php");*/
?>