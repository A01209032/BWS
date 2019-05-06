<?php 

/*
 * BWS
 * Modulo: paciente.php
 *
 * Descripcion: Modulo con funciones respecto a los Pacientes.
 *
 * Funciones:
 * - listarPacientesCon($pattern) Devuelve un array de pacientes cuyo nombre contiene pattern.
 * - buscarPacientePorId($id) Busca en la base de datos el paciente con id $id y lo devuelve.
 *
*/

//include('common/utils/database.php');
require_once('util.php');

function listarPacientesCon($pattern) {
	$pacientes = array();
	$conn = conectDB();
	$counter=0;
	// For Table Pacientes con Nombre y Apellido
	$sqlQuery = "SELECT IdPaciente, Nombre, FechadeNacimiento,
						NivelEconomico,
						FLOOR(DATEDIFF(CURRENT_DATE,FechadeNacimiento)/365) as 'Edad'
				 FROM pacientes 
				 ORDER BY nombre";

	$res = mysqli_query($conn, $sqlQuery);
	
	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$id    = $row['IdPaciente'];
			$fname = $row['Nombre'];
			$nivel = $row['NivelEconomico'];
			$edad  = $row['Edad'];
			//$edad  = calcularEdad($row['FechadeNacimiento']);
			//echo json_encode(array($id,$fname,$nivel,$edad));
			array_push($pacientes, array("id"=>$id, "fname"=>$fname, "edad"=>$edad, "nivel"=>$nivel));
			//$pacientes[$counter]=array("id"=>$id, "fname"=>$fname, "edad"=>$edad, "nivel"=>$nivel);
			//$pacientes[$counter]=array($id,$fname,$edad,$nivel);
			//echo json_encode(array($pacientes[$counter],$counter));
			$counter++;
			//echo json_encode(array(count($pacientes)));
		}
		//echo json_encode(array($pacientes));
	}
	
	
	closeDB($conn);
	//echo json_encode(array(1,count($pacientes)));
	return $pacientes;
}

function calcularEdad($fecha) {
	$birthDate = explode("/", $fecha);

	// stackoverflow.co PHP calculate age
	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
		? ((date("Y") - $birthDate[0]) - 1)
		: (date("Y") - $birthDate[0]));

	return $age;
}

/*
 * Funcion A Implementar
*/
function buscarPacientePorId($id) {
	$paciente = array();

	$found = false;

	// Conectar, Consultar/Buscar, Cerrar Sesion

	if (!$found)
		return false;

	return $paciente;
}
function registrarPaciente($nombre,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel){
      
      //echo '<script type="text/javascript">','alert("'.$nombre.' '.$enfermedad.' '.$direccion.' '.$telefono.' '.$celular.' '.$fechaNacimiento.' '.$sexo.' '.$religion.'");','</script>';
      $res=addPaciente($nombre,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel);
      if($res){
      	return 100;    
        }
      return $nombre.' '.$enfermedad.' '.$direccion.' '.$telefono.' '.$celular.' '.$fechaNacimiento.' '.$sexo.' '.$religion;
    }
    
function actualizarPaciente($id,$nombre,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel){
	$res=updatePaciente($id,$nombre,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel);
	if($res){
      	return 100;    
        }
      return $id.' '.$nombre.' '.$enfermedad.' '.$direccion.' '.$telefono.' '.$celular.' '.$fechaNacimiento.' '.$sexo.' '.$religion.' '.$nivel;
}
    
function listarPacientes($id){
	return getPaciente($id);
}
    
 ?>