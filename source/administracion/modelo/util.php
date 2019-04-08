<?php

function conectDb(){
  /*$servername="localhost";
  $username= "root";
  $password= "";
  $dbname="servicio_social";*/
    
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

function getservicios(){
    $con= conectDb();
    $sql ="SELECT idAtienden,IdDepartamento,IdPaciente,IdVoluntario,Fecha, IdServicio,Observaciones,CuotaRecup FROM atienden";
    $result = mysqli_query($con,$sql);
    closeDb($con);

    return $result;
}


function getServicioByDepartamentoyFecha($Depa,$Fecha){
  $conn=conectDb();

$year = date('Y', strtotime($Fecha));

$month = date('m', strtotime($Fecha));
    $date='';
    $date .=$year;
    $date .="-";
    $date .=$month;
    $date .="-01";

    $date2='';
    $date2 .=$year;
    $date2 .="-";
    $date2 .=$month;
    $date2 .="-31";
//INNER JOIN departamento as d ON d.IdDepartamento=a.IdDepartamento
   // var_dump($Depa);
    //var_dump($Fecha);
  $sql ="SELECT idAtienden,IdVoluntario,Fecha, IdServicio,Observaciones,CuotaRecup,p.Nombre,d.NombreDepartamento  FROM atienden as a INNER JOIN pacientes as p ON a.IdPaciente=p.IdPaciente INNER JOIN departamento as d ON a.IdDepartamento=d.IdDepartamento WHERE a.IdDepartamento = '".$Depa."' AND Fecha >=  '".$date."'  AND Fecha <=  '".$date2."'  ";
    /*
    $sql ="SELECT idAtienden,IdVoluntario,Fecha, IdServicio,Observaciones,CuotaRecup FROM atienden WHERE IdDepartamento = '".$Depa."' AND Fecha >=  '".$date."' AND Fecha <=  '".$date2."'  ";*/
    $result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    echo '<table  cellpadding="5px"cellspacing="5px"align="center"><thead><h2 style="text-align: center">Listado de todas los servicios</h2><br><br><tr><th>ID
    </th><th>Nombre</th><th>Departamento</th><th>Fecha</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result)){
        $temp=$row["idAtienden"];
        //echo temp2;
      echo '<tr>';
      echo '<td>' .$row["idAtienden"]. '</td> ';
      echo ' <td>' .$row["Nombre"]. '</td> ';
     echo ' <td>' .$row["NombreDepartamento"]. '</td> ';
      echo ' <td>' .$row["Fecha"]. '</td>';
        
        echo '<td>'.'<input type="button" name="edit" value="Modificar" id="'.$temp.'" class="btn btn-primary text-center edit_data"> </form>'.'</td>';
        //echo $row["NombreServicio"];
        echo  '<td>'.'<form method="POST" action="controlador/eliminar_servicio.php" onsubmit="return eliminarServicio('.$temp.');" ><button type="submit"  class="btn btn-danger "   value="Eliminar" " name="Eliminar" id="Eliminar"  > Eliminar </button> <input type="hidden" name="id" id="id" value='.$temp.' ></form>'.'</td> ';
      echo '</tr>';
    }
   echo '</tbody></table>';
  }

     else{
        echo "No hay registros en esa fecha o el departamento";
    }
    
    
    mysqli_free_result($result);
    closeDb($conn);
    return $result;
}

function getServicioByFecha($Fecha,$Fecha2){

  $conn=conectDb();
  $year = date('Y', strtotime($Fecha));
  $month = date('m', strtotime($Fecha));

    $conn=conectDb();

$year = date('Y', strtotime($Fecha));

$month = date('m', strtotime($Fecha));
$year2 = date('Y', strtotime($Fecha2));

$month2 = date('m', strtotime($Fecha2));
    $date='';
    $date .=$year;
    $date .="-";
    $date .=$month;
    $date .="-01";

    $date2='';
    $date2 .=$year2;
    $date2 .="-";
    $date2 .=$month2;
    $date2 .="-31";

   $sql ="SELECT idAtienden,IdVoluntario,Fecha, IdServicio,Observaciones,CuotaRecup,p.Nombre,d.NombreDepartamento  FROM atienden as a INNER JOIN pacientes as p ON a.IdPaciente=p.IdPaciente INNER JOIN departamento as d ON a.IdDepartamento=d.IdDepartamento WHERE  Fecha >=  '".$date."'  AND Fecha <=  '".$date2."' AND p.IdPaciente=a.IdPaciente";
    $result= mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
    echo '<table align="center"><thead><h2 style="text-align: center">Listado de todas los servicios</h2><br><br><tr><th>Nombre
    </th><th>Departamento</th><th>Fecha</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result)){
        $i=1;
      echo '<tr>';
      echo '<td>'.$row["Nombre"].'</td>';
      echo '<td>'.$row["NombreDepartamento"].'</td>';
      echo '<td>'.$row["Fecha"].'</td>';

      echo '</tr>';
    }
           echo '</tbody></table>';
    include("../partials/_generar_reporte.html") ; 
  }

    else{
        echo "No hay registros en esa fecha o es una fecha invalida";
    }
   
    
    mysqli_free_result($result);
    closeDb($conn);
    return $result;
}
function insertnew($departamento,$paciente,$asistente,$fecha,$tipo,$observaciones,$cuota){
    $con= conectDb();
    $sql ="INSERT INTO `atienden`(`IdDepartamento`, `IdPaciente`, `IdVoluntario`, `Fecha`, `IdServicio`, `Observaciones`, `CuotaRecup`) values($departamento,$paciente,$asistente,'$fecha',$tipo,'$observaciones',$cuota)";
    $result = mysqli_query($con,$sql);
    closeDb($con);
    return $result;

    /*($IdDepartamento,$IdPaciente,$IdVoluntario,$Fecha,$IdServicio,$Observaciones,$CuotaRecup){
    $conn=conectDb();
    $sql ="INSERT INTO atienden(IdDepartamento,IdPaciente,IdVoluntario,Fecha, IdServicio,Observaciones,CuotaRecup)   VALUES (?,?,?,?,?,?,?); ";
     if (!($statement = $conn->prepare($sql))) {
            die("Preparation failed: (" . $conn->errno . ") " . $conn->error);
        }

   
$IdDepartamento = $conn->real_escape_string($IdDepartamento);
     $IdVoluntario = $conn->real_escape_string($IdVoluntario);
    $IdPaciente = $conn->real_escape_string($IdPaciente);
     $IdServicio = $conn->real_escape_string($IdServicio);
    $Fecha = $conn->real_escape_string($Fecha);
 $Observaciones = $conn->real_escape_string($Observaciones);
    $CuotaRecup = $conn->real_escape_string($CuotaRecup);

   if (!$statement->bind_param("sssssss", $IdDepartamento,$IdPaciente,$IdVoluntario,$Fecha,$IdServicio,$Observaciones,$CuotaRecup)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
        }
         // Executing the statement
         if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
          }

    closeDb($conn);*/
}

function delete_by_ID($ID){
    $conn=conectDb();
    $sql="DELETE FROM atienden WHERE idAtienden = '".$ID."' ";
       $ID = $conn->real_escape_string($ID);

    $result= mysqli_query($conn,$sql);
    closeDb($conn);
    return $result;
}
function update_Servicio($idAtienden,$IdDepartamento,$IdPaciente,$IdVoluntario,$Fecha,$IdServicio,$Observaciones,$CuotaRecup){
   $conn=conectDb();
    
    $idAtienden = $conn->real_escape_string($idAtienden);
$IdDepartamento = $conn->real_escape_string($IdDepartamento);
     $IdVoluntario = $conn->real_escape_string($IdVoluntario);
    $IdPaciente = $conn->real_escape_string($IdPaciente);
     $IdServicio = $conn->real_escape_string($IdServicio);
    $Fecha = $conn->real_escape_string($Fecha);
 $Observaciones = $conn->real_escape_string($Observaciones);
    $CuotaRecup = $conn->real_escape_string($CuotaRecup);
    
    $sql ="UPDATE atienden SET IdDepartamento='$IdDepartamento', IdPaciente='$IdPaciente', IdVoluntario='$IdVoluntario',Fecha='$Fecha', IdServicio='$IdServicio', Observaciones='$Observaciones', CuotaRecup='$CuotaRecup' WHERE idAtienden ='".$idAtienden."' ";
   

    
     $result = mysqli_query($conn,$sql);
    closeDb($conn);
    return $result;

}

//Aqui va lo de tony----------------


  //Obtiene todos los voluntarios
  function getVoluntarios(){
  	$conn=conectDb();
  	$sql="SELECT IdVoluntario, Nombre, FechaDeNacimiento, Sexo, Cargo, Tipo FROM voluntarios WHERE Activo=1";
  	$result = mysqli_query($conn, $sql);
  	closeDb($conn);
  	return $result;
  }

  //Obtiene todos los departamentos
  function getDepartamentos(){
    $conn=conectDb();
    $sql="SELECT IdDepartamento, NombreDepartamento, contraseña, IdRol FROM departamento";
    $result = mysqli_query($conn, $sql);
    closeDb($conn);
    return $result;
  }

  //Modifica una contraseña
  function modifyContraseniaById($id,$nuevaContrasena){
    $conn=conectDb();
    $sql="UPDATE departamento SET IdDepartamento='$id', contrasena='$nuevaContrasena' WHERE IdDepartamento = '".$id."' ";
    $result = mysqli_query($conn, $sql);
    $id = $conn->real_escape_string($id);
    $nuevaContrasena = $conn->real_escape_string($nuevaContrasena);
    closeDb($conn);
    return $result;
  }

  //Obtiene la contraaseña del departamento
  function getContraseniaById($id){
    $conn=conectDb();
    $sql="SELECT contrasena FROM departamento WHERE IdDepartamento = '".$id."' ";
    $result = mysqli_query($conn, $sql);
    closeDb($conn);
    return $result;
  }


  function getEdadVoluntario(){
    $conn=conectDb();
    $sql="SELECT GETDATE() - FechaDeNacimiento as 'Edad' FROM voluntarios";
    $result = mysqli_query($conn, $sql);
   closeDb($conn);
    return $result;
  }

  function insertVoluntario($nombre,$fechaNacimiento,$genero,$cargo,$tipo) {
    $bd = conectDb();

    // insert command specification
    $query='INSERT INTO voluntarios (Nombre,FechaDeNacimiento,Sexo,Cargo,Tipo,Activo) VALUES (?,?,?,?,?,?)';
    // Preparing the statement
    if (!($statement = $bd->prepare($query))) {
      die("Preparation failed: (" . $bd->errno . ") " . $bd->error);
    }

    $nombre = $bd->real_escape_string($nombre);
    $fechaNacimiento = $bd->real_escape_string($fechaNacimiento);
    $genero = $bd->real_escape_string($genero);
    $cargo = $bd->real_escape_string($cargo);
    $tipo = $bd->real_escape_string($tipo);
    $uno=1;

    if (!$statement->bind_param("ssssss", $nombre,$fechaNacimiento,$genero,$cargo,$tipo,$uno)) {
      die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
    }
    // Executing the statement
    if (!$statement->execute()) {
      die("Execution failed: (" . $statement->errno . ") " . $statement->error);
    }

    closeDb($bd);
  }

  function deleteVoluntarioById($id){
    /*
    $conn=conectDb();
    $sql="DELETE FROM voluntarios WHERE IdVoluntario = '".$id."' ";
    $id = $conn->real_escape_string($id);
    $result= mysqli_query($conn,$sql);
    closeDb($conn);
    return $result;*/
    $conn=conectDb();
    $sql ="UPDATE voluntarios SET Activo='0' WHERE IdVoluntario= '".$id."' ";
    $result = mysqli_query($conn,$sql);

    $id = $conn->real_escape_string($id);

    closeDb($conn);
    return $result;
  }

  function updateVoluntarioById($id,$nombre,$fechaNacimiento,$genero,$cargo,$tipo){
    $conn=conectDb();
    $sql ="UPDATE voluntarios SET Nombre='$nombre', FechaDeNacimiento='$fechaNacimiento', Sexo='$genero', Cargo='$cargo', Tipo='$tipo' WHERE IdVoluntario= '".$id."' ";
      $result = mysqli_query($conn,$sql);

      $id = $conn->real_escape_string($id);
      $nombre = $conn->real_escape_string($nombre);
      $fechaNacimiento = $conn->real_escape_string($fechaNacimiento);
      $genero = $conn->real_escape_string($genero);
      $cargo = $conn->real_escape_string($cargo);
      $tipo = $conn->real_escape_string($tipo);

      closeDb($conn);
      return $result;

  }
?>