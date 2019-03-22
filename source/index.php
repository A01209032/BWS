<?php
  // include("views/_header_login.html");
  // include("login_view.php");

  require_once("common/utils/server.php");

  header("Location: " . serverEndPoint('common/login.php'));
 ?>
