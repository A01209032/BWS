<?php 

if (isset($_POST['user'])) {

	// include('administracion/util.php');

	// $conn = conectDb();

	// $query = "SELECT idDepartamento,nombre,constrasenia FROM departamentos WHERE nombre = ".$_POST['user']." AND contrasenia = ".$_POST['pass'];

	// $res = mysqli_query($conn, $query);

	// if (mysqli_num_rows($res) > 0) {
		// User Validated!

		if ($_POST['user'] == "administrador" &&
			$_POST['pass'] == "0,4,1,4") {
			header("Location: /admin.php");
		} else if ($_POST['pass'] == "0,3,2,0,0" ||
				   $_POST['pass'] == "3,2,1,0,4" ||
				   $_POST['user'] == "porteria") {
			header("Location: /registro.php");
		}
		else {
			$error = "Contraseña No Correcta!";
			include("views/_header_login.html");
			include("login_view.php");
		}

	// } else {
		// $error = "Contraseña No Correcta!";
		// include("login.html");
	// }

	// closeDb($conn);

} else {
	include("views/_header_login.html");
	include("login_view.php");
}

?>