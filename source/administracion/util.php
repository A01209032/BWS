
<?php 
    function conectDb(){
        $servername="localhost";
        $username= "root";
        $password= "";
        $dbname="servicio_social";
        
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
    $sql ="SELECT IdServicio,idDepartmaneto,NombreServicio,Descripcion,Fecha FROM tipodeservicio";
    $result = mysqli_query($con,$sql);
    closeDb($con);
      return $result;
}
//

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
    
   $sql ="SELECT IdServicio,idDepartmaneto,NombreServicio,Descripcion,Fecha FROM tipodeservicio WHERE idDepartmaneto = '".$Depa."' AND Fecha >=  '".$date."'  AND Fecha <=  '".$date2."' ";
    $result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    echo '<<table align="center"><thead><h2 style="text-align: center">Listado de todas los servicios</h2><br><br><tr><th>Nombre
    </th><th>Descripcion</th><th>Fecha</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result)){
      echo '<tr>';
      echo '<td>'.$row["NombreServicio"].'</td>';
      echo '<td>'.$row["Descripcion"].'</td>';
      echo '<td>'.$row["Fecha"].'</td>';
      echo '</tr>';
    }
  }
    echo '</tbody></table>';
    
    mysqli_free_result($result);
    closeDb($conn);
    return $result;
}

function getServicioByFecha($Fecha){
    
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
    
   $sql ="SELECT IdServicio,idDepartmaneto,NombreServicio,Descripcion,Fecha FROM tipodeservicio WHERE  Fecha >=  '".$date."'  AND Fecha <=  '".$date2."' ";
    $result= mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
    echo '<table align="center"><thead><h2 style="text-align: center">Listado de todas los servicios</h2><br><br><tr><th>Nombre
    </th><th>Descripcion</th><th>Fecha</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result)){
      echo '<tr>';
      echo '<td>'.$row["NombreServicio"].'</td>';
      echo '<td>'.$row["Descripcion"].'</td>';
      echo '<td>'.$row["Fecha"].'</td>';
      echo '</tr>';
    }
  }
    echo '</tbody></table>';
    
    mysqli_free_result($result);
    closeDb($conn);
    return $result;
}



?>
<?php

  function conectDb(){

  	$conexion=mysqli_connect("localhost","root","","bws");
  	//Validar la conexion
  	if($conexion==NULL){
  		die("Error en la conexión");
  	}
  	$conexion->set_charset("utf8");

  	return $conexion;
  }

  //ciErra la base de datos
  function closeDb ($conexion){
  	mysqli_close($conexion);
  }

  //Obtiene todos los voluntarios 
  function getVoluntarios(){
  	$conn=conectDb();
  	$sql="SELECT IdVoluntario, Nombre, FechaDeNacimiento, Sexo, Cargo, Tipo FROM voluntarios";
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
        $query='INSERT INTO voluntarios (Nombre,FechaDeNacimiento,Sexo,Cargo,Tipo) VALUES (?,?,?,?,?)';
        // Preparing the statement 
        if (!($statement = $bd->prepare($query))) {
            die("Preparation failed: (" . $bd->errno . ") " . $bd->error);
        }
        
        $nombre = $bd->real_escape_string($nombre);
        $fechaNacimiento = $bd->real_escape_string($fechaNacimiento);
        $genero = $bd->real_escape_string($genero);
        $cargo = $bd->real_escape_string($cargo);
        $tipo = $bd->real_escape_string($tipo);
        
        if (!$statement->bind_param("sssss", $nombre,$fechaNacimiento,$genero,$cargo,$tipo)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
          } 

        closeDb($bd);
    }
?>
