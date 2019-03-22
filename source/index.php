<?php
  /*session_start();

  if (isset($_SESSION['departamento']) && !empty($_SESSION['departamento']))
  {
  	// Send To Corresponding Dashboard
  	if ($_SESSION['departamento'] == "administrador") {
  		header("Location: ".frombase("admin.php"));
  	} else {
  		header("Location: ".frombase("registro.php"));
  	}
  }
  else
  {
  	header('Location: ');
  }*/
  include("views/_header_login.html");
  include("login_view.php");
 ?>
