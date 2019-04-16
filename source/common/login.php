<?php
session_start();
require_once('utils/server.php');
require_once('models/departamento.php');

if (isset($_POST['user'])) {

	$user = findDepartmentByName($_POST['user']);

	if (!$user) {
		$error = "¡No se seleccionó ningún departamento!";
		include("views/_header_login.html");
		include("views/login_view.php");

		exit;
	}

	if ($user['pass'] != $_POST['pass']) {
		$error = "¡La contraseña no es correcta!";
		include("views/_header_login.html");
		include("views/login_view.php");

		exit;
	}

	$_SESSION['departamento'] = strtolower($user['name']);

	if ($user['name'] == 'administrador') {
		header("Location: ".frombase("administracion/admin.php"));
	} else {
		header("Location: ".frombase("registros/registro.php"));
	}

} else {
	include("views/_header_login.html");
	include("views/login_view.php");
	include("views/forgotPassword_view.php");
}

?>