
<?php 

function conectDb(){
  $servername="remotemysql.com";
  $username= "thdR7Lb9W9";
  $password= "e52rzReZ8d";
  $dbname="thdR7Lb9W9";
        
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
    /*echo "|Paciente: " .$paciente . "| Asistente: " . $asistente .
            "| Fecha: " . $fecha . "| Tipo: " . $tipo . "| observaciones: ". $observaciones . "| Cuota: " . $cuota;*/

    //$sql ="INSERT INTO `atienden`(`IdDepartamento`, `IdPaciente`, `IdVoluntario`, `Fecha`, `IdServicio`, `Observaciones`, `CuotaRecup`) values($departamento,$paciente,$asistente,'$fecha',$tipo,'$observaciones',$cuota)";
    $sql = "call creaServicio($departamento,$paciente,$asistente,'$fecha',$tipo,'$observaciones',$cuota)";
    $result = mysqli_query($con,$sql);
    closeDb($con);
    return $result;
}

function addPaciente($nombre,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel){
    $con= conectDb();
    //echo '<script type="text/javascript">','alert("'.$nombre.' '.$enfermedad.' '.$direccion.' '.$telefono.' '.$celular.' '.$fechaNacimiento.' '.$sexo.' '.$religion.' '.$nivel.'");','</script>';
    $sql ="INSERT INTO `pacientes`(`IdEnfermedad`, `Nombre`, `FechadeNacimiento`, `Sexo`, `Activo`, `Direccion`, `Telefono`, `Celular`, `Religion`, `NivelEconomico`) values($enfermedad,'$nombre','$fechaNacimiento','$sexo',1,'$direccion','$telefono','$celular','$religion','$nivel')";
    $result = mysqli_query($con,$sql);
    closeDb($con);
    return $result;
}

function updatePaciente($id,$nombre,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel){
    $con= conectDb();
    //echo '<script type="text/javascript">','alert("'.$nombre.' '.$enfermedad.' '.$direccion.' '.$telefono.' '.$celular.' '.$fechaNacimiento.' '.$sexo.' '.$religion.' '.$nivel.'");','</script>';
    $sql ="update `pacientes` set `IdEnfermedad` = $enfermedad, `Nombre`='$nombre', `FechadeNacimiento`='$fechaNacimiento', `Sexo`='$sexo', `Direccion`='$direccion', `Telefono`='$telefono', `Celular`='$celular', `Religion`='$religion', `NivelEconomico`='$nivel') where `IdPaciente`=$id";
    $result = mysqli_query($con,$sql);
    closeDb($con);
    return $result;
}

function getPaciente($id){
    $conn=conectDb();
    $query = "SELECT * FROM pacientes WHERE idPaciente = $id";
    $res = mysqli_query($conn, $query);
    $resultado;
    if(mysqli_num_rows($res) > 0){//If there are actually results
        $row = mysqli_fetch_array($res);
        $resultado[0]=$row['IdEnfermedad'];
        $resultado[1]=$row['Nombre'];
        $resultado[2]=$row['FechadeNacimiento'];
        $resultado[3]=$row['Sexo'];
        $resultado[4]=$row['Direccion'];
        $resultado[5]=$row['Telefono'];
        $resultado[6]=$row['Celular'];
        $resultado[7]=$row['Religion'];
        $resultado[8]=$row['NivelEconomico'];
        closeDB($conn);
        
    }else{
        closeDB($conn);
        $resultado="Error";
    }
    return $resultado;  
}

function getTipodeServicio($id){
    $conn=conectDb();
    $query = "SELECT idServicio,NombreServicio FROM tipodeservicio WHERE idDepartamento = $id";
    $res = mysqli_query($conn, $query);
    $resultado;
    if(mysqli_num_rows($res) > 0){//If there are actually results
        while($row=mysqli_fetch_assoc($res)){
        echo '<option value="'.$row["idServicio"].'">'.$row["NombreServicio"].'</option>';
    }

        closeDB($conn);
        
    }else{
        closeDB($conn);
        $resultado="Error";
        echo $resultado;
        
    }
     
}

 




?>
