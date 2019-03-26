
<?php 

function conectDb(){
  $servername="sql9.freemysqlhosting.net";
  $username= "sql9284997";
  $password= "K2kRkpIfJR";
  $dbname="sql9284997";
        
  $con = mysqli_connect($servername,$username,$password,$dbname);
        
  if(!$con){
    die("Connection failed: " . mysqli_connect_error());
  }
  
  return $con;  
}

function closeDb($mysql){
  mysqli_close($mysql);
}

  
function getIdDepartamento($departamento){
    $conn=conectDb();
    $query = "SELECT IdDepartamento FROM departamento WHERE NombreDepartamento like '%$departamento%'";
    $res = mysqli_query($conn, $query);
    $resultado;
    if(mysqli_num_rows($res) > 0){//If there are actually results
        $row = mysqli_fetch_array($res);
        $resultado=$row['IdDepartamento'];
        closeDB($conn);
        
    }else{
        closeDB($conn);
        $resultado="Error";
    }
    return $resultado;       
}




function getIdPaciente($paciente){
    $conn=conectDb();
    $query = "SELECT IdPaciente FROM pacientes WHERE Nombre like '$paciente%'";
    $res = mysqli_query($conn, $query);
    $resultado;
    if(mysqli_num_rows($res) > 0){//If there are actually results
        $row = mysqli_fetch_array($res);
        $resultado=$row['IdPaciente'];
        closeDB($conn);
        
    }else{
        closeDB($conn);
        $resultado="Error";
    }
    return $resultado;    
}

function getIdVoluntario($voluntario){
    $conn=conectDb();
    $query = "SELECT IdVoluntario FROM voluntarios WHERE Nombre like '$voluntario'";
    $res = mysqli_query($conn, $query);
    $resultado;
    if(mysqli_num_rows($res) > 0){//If there are actually results
        $row = mysqli_fetch_array($res);
        $resultado=$row['IdVoluntario'];
        closeDB($conn);
        
    }else{
        closeDB($conn);
        $resultado="Error";
    }
    return $resultado;  
}

function getIdServicio($servicio){
    $conn=conectDb();
    $query = "SELECT IdServicio FROM tipodeservicio WHERE NombreServicio like '$servicio'";
    $res = mysqli_query($conn, $query);
    $resultado;
    if(mysqli_num_rows($res) > 0){//If there are actually results
        $row = mysqli_fetch_array($res);
        $resultado=$row['IdServicio'];
        closeDB($conn);
        
    }else{
        closeDB($conn);
        $resultado="Error";
    }
    return $resultado;  
}


function addRegistro($departamento,$paciente,$asistente,$fecha,$tipo,$observaciones,$cuota){
    $con= conectDb();
    //echo '<script type="text/javascript">','alert("'.$departamento.' '.$paciente.' '.$asistente.' '.$fecha.' '.$tipo.' '.$observaciones.' '.$cuota.'");','</script>';
    $sql ="INSERT INTO `atienden`(`IdDepartamento`, `IdPaciente`, `IdVoluntario`, `Fecha`, `IdServicio`, `Observaciones`, `CuotaRecup`) values($departamento,$paciente,$asistente,'$fecha',$tipo,'$observaciones',$cuota)";
    $result = mysqli_query($con,$sql);
    closeDb($con);
    return $result;
}

function addPaciente($nombre,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel){
    $con= conectDb();
    //echo '<script type="text/javascript">','alert("'.$nombre.' '.$enfermedad.' '.$direccion.' '.$telefono.' '.$celular.' '.$fechaNacimiento.' '.$sexo.' '.$religion.' '.$nivel.'");','</script>';
    $sql ="INSERT INTO `pacientes`(`Nombre`, `FechadeNacimiento`, `Sexo`, `Activo`, `Direccion`, `Telefono`, `Celular`,`Religion`,`NivelEconomico`) values('$nombre','$fechaNacimiento','$sexo',1,'$direccion',$telefono,$celular,'$religion','$nivel')";
    $result = mysqli_query($con,$sql);
    closeDb($con);
    return $result;
}








?>
