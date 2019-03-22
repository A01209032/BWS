<?php

require_once('utils/server.php');

if (isset($_POST['user'])) {

	// include('administracion/util.php');

	// $conn = conectDb();

	// $query = "SELECT IdDepartamento,NombreDepartamento,contraseña FROM departamento WHERE NombreDepartamento = " . $_POST['user'] . " AND contraseña = ".$_POST['pass'];

	// $res = mysqli_query($conn, $query);

	// if (mysqli_num_rows($res) > 0) {S
		// User Validated

		if ($_POST['user'] == "administrador" &&
			$_POST['pass'] == "0,4,1,4") {

			session_start();
			$_SESSION['departamento'] = $_POST['user'];

			// $urlParts = explode('/',$_SERVER['PHP_SELF']);
			// $baseUrl = "";
			// for ($i=0; $i < count($urlParts)-1; $i++) {
			// 	$baseUrl = $baseUrl . $urlParts[$i] . "/";
			// }

			header("Location: /".frombase("admin.php"));
		} else if ($_POST['pass'] == "0,3,2,0,0" ||
				   $_POST['pass'] == "3,2,1,0,4" ||
				   $_POST['user'] == "porteria") {

			session_start();
			$_SESSION['departamento'] = $_POST['user'];

			// $urlParts = explode('/',$_SERVER['PHP_SELF']);
			// $baseUrl = "";
			// for ($i=0; $i < count($urlParts)-1; $i++) {
			// 	$baseUrl = $baseUrl . $urlParts[$i] . "/";
			// }
			
			header("Location: /".frombase("registros/registro.php"));
		}
		else {
			$error = "Contraseña No Correcta!";
			include("views/_header_login.html");
			include("views/login_view.php");
		}

	// } else {
		// $error = "Contraseña No Correcta!";
		// include("login.html");
	// }

	// closeDb($conn);

} else {
	
	include("views/_header_login.html");
	//echo __FILE__."<br>";
	//echo $_SERVER['PHP_SELF']."<br>";
	
	include("views/login_view.php");
}

?>