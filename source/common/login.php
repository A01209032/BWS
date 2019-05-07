<?php
session_start();
require_once('utils/server.php');
require_once('models/departamento.php');

function renderView($err) {
	$departamentos = findAllDepartments();
	$error = $err;
	include("views/_header_login.html");
	include("views/login_view.php");
	include("../common/views/alertModal.html");
}

if (isset($_POST['user'])) {

	$user = findDepartmentByName($_POST['user']);

	if (!$user) {
		$error = "¡No se seleccionó ningún departamento!";
		renderView($error);

		exit;
	}

	if ($user['pass'] != $_POST['pass']) {
		$error = "¡La contraseña no es correcta!";
		renderView($error);
		exit;
	}

	$_SESSION['departamento'] = $user['name'];

	if (strtoupper($user['name']) == 'ADMINISTRADOR') {
		header("Location: ".frombase("administracion/admin.php"));
	} else {
		header("Location: ".frombase("registros/registro.php"));
	}

} else {
	renderView(NULL);
}

?>

<script type="text/javascript" src="../js/recuperar_contrasena.js"></script>