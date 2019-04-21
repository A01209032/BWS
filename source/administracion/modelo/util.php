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
function jap($Fecha,$Fecha2){

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
    
     $sqlser ="SELECT ts.NombreServicio,count(idAtienden)as 'Total' FROM atienden as a INNER JOIN tipodeservicio as ts ON a.IdServicio=ts.IdServicio WHERE ts.IdServicio=a.IdServicio   AND  Fecha >=  '".$date."'  AND Fecha <=  '".$date2."'   GROUP BY ts.NombreServicio";
    $result= mysqli_query($conn,$sqlser);
      if(mysqli_num_rows($result)>0){
    echo '<div  style="width:75% ;  margin: 0 auto"><table id="tiposdeservicio" class="display nowrap" style="width:100%" align="center"><thead><h2 style="text-align: center">Productividad</h2><br><tr><th>Servicios
    </th><th>Total</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result)){
      echo '<tr>';
      echo '<td>'.$row["NombreServicio"].'</td>';
      echo '<td>'.$row["Total"].'</td>';

      echo '</tr>';
    }
                      echo '</tbody></table></div> <br><br>'; 

  }

    else{
        echo "No hay registros en esa fecha o es una fecha invalida";
    }
    
    mysqli_free_result($result);
    closeDb($conn);
    return $result;
}
//local
function local($Fecha,$Fecha2){

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
    
     $sqllocal ="SELECT v.Nombre as nombrev,p.Nombre as nombrep,e.nombre as enfermedad,fecha,p.Direccion as dir,Observaciones FROM atienden as a INNER JOIN pacientes as p on a.IdPaciente=p.IdPaciente INNER JOIN voluntarios as v ON a.IdVoluntario=v.IdVoluntario INNER JOIN enfermedades as e ON e.id=p.IdPaciente WHERE 	a.IdPaciente=p.IdPaciente AND v.IdVoluntario=a.IdVoluntario   AND  Fecha >=  '".$date."'  AND Fecha <=  '".$date2."'   ";
    $result= mysqli_query($conn,$sqllocal);
      if(mysqli_num_rows($result)>0){
    echo '<div  style="width:75% ;  margin: 0 auto"><table id="local" class="display nowrap" style="width:100%" align="center"><thead><h2 style="text-align: center">Reporte Local  </h2><br><tr><th>Voluntario
    </th><th>Paciente
    </th><th>Enfermedad
    </th><th>Fecha
    </th><th>Direccion
    </th><th>Observaciones</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result)){
      echo '<tr>';
      echo '<td>'.$row["nombrev"].'</td>';
      echo '<td>'.$row["nombrep"].'</td>';
      echo '<td>'.$row["enfermedad"].'</td>';
      echo '<td>'.$row["fecha"].'</td>';
      echo '<td>'.$row["dir"].'</td>';
      echo '<td>'.$row["Observaciones"].'</td>';

      echo '</tr>';
    }
                      echo '</tbody></table> <br><br>'; 

  }

    else{
        echo "No hay registros en esa fecha o es una fecha invalida";
    }
    //
      $sqlse ="SELECT p.Religion,count(idAtienden) as 'Total' FROM atienden as a INNER JOIN pacientes as p ON a.IdPaciente=p.IdPaciente WHERE a.IdPaciente=p.IdPaciente   AND  Fecha >=  '".$date."'  AND Fecha <=  '".$date2."'   GROUP BY p.Religion";
    $result2= mysqli_query($conn,$sqlse);
      if(mysqli_num_rows($result2)>0){
    echo '<div  style="width:75% ;  margin: 0 auto"><table id="religion" class="display nowrap" style="width:100%" align="center"><thead><h2 style="text-align: center">Religión</h2><br><tr><th> Religión
    </th><th>Total</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result2)){
      echo '<tr>';
      echo '<td>'.$row["Religion"].'</td>';
      echo '<td>'.$row["Total"].'</td>';

      echo '</tr>';
    }
                      echo '</tbody></table> <br><br></div></div>'; 

  }

    else{
        echo "No hay registros en esa fecha o es una fecha invalida";
    }
    
    mysqli_free_result($result);
    mysqli_free_result($result2);
    closeDb($conn);
    return $result;
}
//

function getServicioByFecha($Fecha,$Fecha2){

  $conn=conectDb();
  $year = date('Y', strtotime($Fecha));
  $month = date('m', strtotime($Fecha));

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
//dispensario consulta
   $sqldis ="SELECT idAtienden,v.Nombre as Nombrev,Fecha, ts.NombreServicio,Observaciones,p.Nombre,d.NombreDepartamento  FROM atienden as a INNER JOIN pacientes as p ON a.IdPaciente=p.IdPaciente INNER JOIN departamento as d ON a.IdDepartamento=d.IdDepartamento INNER JOIN voluntarios as v ON a.IdVoluntario=v.IdVoluntario INNER JOIN tipodeservicio as ts ON a.IdServicio=ts.IdServicio WHERE  Fecha >=  '".$date."'  AND Fecha <=  '".$date2."' AND p.IdPaciente=a.IdPaciente AND a.IdDepartamento=3";
    $result= mysqli_query($conn,$sqldis);
      if(mysqli_num_rows($result)>0){
    echo '<div style=" margin: 0 auto"> <div style="width:75% ;  margin: 0 auto"> <table id="dispensario" class="display nowrap" style="width:100%" align="center"><thead><h2 style="text-align: center">Listado de todas los servicios en Dispensario</h2><br><tr><th>Nombre
    </th><th>Voluntario</th><th>Departamento</th><th>Servicio</th><th>Fecha</th><th>Observaciones</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result)){
        $i=1;
      echo '<tr>';
      echo '<td>'.$row["Nombre"].'</td>';
      echo '<td>'.$row["Nombrev"].'</td>';
      echo '<td>'.$row["NombreDepartamento"].'</td>';
      echo '<td>'.$row["NombreServicio"].'</td>';
      echo '<td>'.$row["Fecha"].'</td>';
      echo '<td>'.$row["Observaciones"].'</td>';

      echo '</tr>';
    }
           echo '</tbody></table> <br><br>'; 
  }

    else{
        echo "No hay registros en esa fecha o es una fecha invalida";
    }
   //asistencia consulta
    
   $sqlasi ="SELECT idAtienden,v.Nombre as Nombrev,Fecha, ts.NombreServicio,Observaciones,p.Nombre,d.NombreDepartamento  FROM atienden as a INNER JOIN pacientes as p ON a.IdPaciente=p.IdPaciente INNER JOIN departamento as d ON a.IdDepartamento=d.IdDepartamento INNER JOIN voluntarios as v ON a.IdVoluntario=v.IdVoluntario INNER JOIN tipodeservicio as ts ON a.IdServicio=ts.IdServicio WHERE  Fecha >=  '".$date."'  AND Fecha <=  '".$date2."' AND p.IdPaciente=a.IdPaciente AND a.IdDepartamento=2";
    $result2= mysqli_query($conn,$sqlasi);
      if(mysqli_num_rows($result2)>0){
    echo '<table id="asistencias" class="display nowrap" style="width:100%" align="center"><thead><h2 style="text-align: center">Listado de todas los servicios en Asistencias</h2><br><tr><th>Nombre
    </th><th>Voluntario</th><th>Departamento</th><th>Servicio</th><th>Fecha</th><th>Observaciones</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result2)){
        $i=1;
      echo '<tr>';
      echo '<td>'.$row["Nombre"].'</td>';
      echo '<td>'.$row["Nombrev"].'</td>';
      echo '<td>'.$row["NombreDepartamento"].'</td>';
      echo '<td>'.$row["NombreServicio"].'</td>';
      echo '<td>'.$row["Fecha"].'</td>';
      echo '<td>'.$row["Observaciones"].'</td>';

      echo '</tr>';
    }
                      echo '</tbody></table> <br><br>'; 
  }

    else{
        echo "No hay registros en esa fecha o es una fecha invalida";
    }
   
    //porteria consulta
    
   $sqlpor ="SELECT idAtienden,v.Nombre as Nombrev,Fecha, ts.NombreServicio,Observaciones,p.Nombre,d.NombreDepartamento  FROM atienden as a INNER JOIN pacientes as p ON a.IdPaciente=p.IdPaciente INNER JOIN departamento as d ON a.IdDepartamento=d.IdDepartamento INNER JOIN voluntarios as v ON a.IdVoluntario=v.IdVoluntario INNER JOIN tipodeservicio as ts ON a.IdServicio=ts.IdServicio WHERE  Fecha >=  '".$date."'  AND Fecha <=  '".$date2."' AND p.IdPaciente=a.IdPaciente AND a.IdDepartamento=4";
    $result3= mysqli_query($conn,$sqlpor);
      if(mysqli_num_rows($result3)>0){
    echo '<table id="porteria" class="display nowrap" style="width:100%" align="center"><thead><h2 style="text-align: center">Listado de todas los servicios en Porteria</h2><br><tr><th>Nombre
    </th><th>Voluntario</th><th>Departamento</th><th>Servicio</th><th>Fecha</th><th>Observaciones</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result3)){
        $i=1;
      echo '<tr>';
      echo '<td>'.$row["Nombre"].'</td>';
      echo '<td>'.$row["Nombrev"].'</td>';
      echo '<td>'.$row["NombreDepartamento"].'</td>';
      echo '<td>'.$row["NombreServicio"].'</td>';
      echo '<td>'.$row["Fecha"].'</td>';
      echo '<td>'.$row["Observaciones"].'</td>';

      echo '</tr>';
    }
                      echo '</tbody></table> </div><br><br>'; 

  }

    else{
        echo "No hay registros en esa fecha o es una fecha invalida";
    }
   //numeros finales
    $sqlcount1 ="SELECT COUNT(idAtienden) AS total1 FROM atienden WHERE IdDepartamento=3";
    $res1= mysqli_query($conn,$sqlcount1);
    if(mysqli_num_rows($res1)>0){
          while($row=mysqli_fetch_assoc($res1)){
      $dis=$row["total1"];
    }
  }
    $sqlcount2 ="SELECT COUNT(idAtienden) AS total2 FROM atienden WHERE IdDepartamento=2";
    $res2= mysqli_query($conn,$sqlcount2);
    if(mysqli_num_rows($res2)>0){
          while($row=mysqli_fetch_assoc($res2)){
      $asis=$row["total2"];
    }
  }
    $sqlcount3 ="SELECT COUNT(idAtienden) AS total3 FROM atienden WHERE IdDepartamento=4";
    $res3= mysqli_query($conn,$sqlcount3);
    if(mysqli_num_rows($res3)>0){
          while($row=mysqli_fetch_assoc($res3)){
      $port=$row["total3"];
    }
  }
    echo "<br>Total de servicios dados:<br>Departamento Dispensario fue de ".$dis."<br>Departamento Asistencias fue de ".$asis."<br>Departamento Porteria fue de ".$port."<br><br>" ;
    //Productividad
    $sqlcount4 ="SELECT COUNT(idAtienden) AS total4 FROM atienden WHERE IdServicio=1";
    $res4= mysqli_query($conn,$sqlcount4);
    if(mysqli_num_rows($res4)>0){
          while($row=mysqli_fetch_assoc($res4)){
      $dom=$row["total4"];
    }
  }
     $sqlcount5 ="SELECT COUNT(idAtienden) AS total5 FROM atienden WHERE IdServicio=2";
    $res5= mysqli_query($conn,$sqlcount5);
    if(mysqli_num_rows($res5)>0){
          while($row=mysqli_fetch_assoc($res5)){
      $noc=$row["total5"];
    }
  }
     $sqlcount6 ="SELECT COUNT(idAtienden) AS total6 FROM atienden WHERE IdServicio=3";
    $res6= mysqli_query($conn,$sqlcount6);
    if(mysqli_num_rows($res6)>0){
          while($row=mysqli_fetch_assoc($res6)){
      $diu=$row["total6"];
    }
  }
     $sqlcount7 ="SELECT COUNT(idAtienden) AS total7 FROM atienden WHERE IdServicio=4";
    $res7= mysqli_query($conn,$sqlcount7);
    if(mysqli_num_rows($res7)>0){
          while($row=mysqli_fetch_assoc($res7)){
      $hos=$row["total7"];
    }
  }
    
    //
     $sqlasistencias ="SELECT ts.NombreServicio,count(idAtienden)as 'Total' FROM atienden as a INNER JOIN tipodeservicio as ts ON a.IdServicio=ts.IdServicio WHERE ts.IdServicio=a.IdServicio AND a.IdDepartamento=2 AND     Fecha >=  '".$date."'  AND Fecha <=  '".$date2."'   GROUP BY ts.NombreServicio";
    $result6= mysqli_query($conn,$sqlasistencias);
      if(mysqli_num_rows($result6)>0){
    echo '<div style="width:50%; margin: 0 auto"> <table id="asistenciasnum" class="display nowrap" style="width:100%" align="center"><thead><h2 style="text-align: center">Asistencias</h2><br><tr><th>Servicios
    </th><th>Total</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result6)){
      echo '<tr>';
      echo '<td>'.$row["NombreServicio"].'</td>';
      echo '<td>'.$row["Total"].'</td>';

      echo '</tr>';
    }
                      echo '</tbody></table> <br><br>'; 

  }

    else{
        echo "No hay registros en esa fecha o es una fecha invalida";
    }
    //
    $sqlser ="SELECT ts.NombreServicio,count(idAtienden)as 'Total' FROM atienden as a INNER JOIN tipodeservicio as ts ON a.IdServicio=ts.IdServicio WHERE ts.IdServicio=a.IdServicio   AND  Fecha >=  '".$date."'  AND Fecha <=  '".$date2."'   GROUP BY ts.NombreServicio";
    $result4= mysqli_query($conn,$sqlser);
      if(mysqli_num_rows($result4)>0){
    echo '<table id="tiposdeservicio" class="display nowrap" style="width:100%" align="center"><thead><h2 style="text-align: center">Productividad</h2><br><tr><th>Servicios
    </th><th>Total</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result4)){
      echo '<tr>';
      echo '<td>'.$row["NombreServicio"].'</td>';
      echo '<td>'.$row["Total"].'</td>';

      echo '</tr>';
    }
                      echo '</tbody></table> <br><br>'; 

  }

    else{
        echo "No hay registros en esa fecha o es una fecha invalida";
    }
    //
     $sqlse ="SELECT p.NivelEconomico,count(idAtienden)as 'Total' FROM atienden as a INNER JOIN pacientes as p ON a.IdPaciente=p.IdPaciente WHERE a.IdPaciente=p.IdPaciente   AND  Fecha >=  '".$date."'  AND Fecha <=  '".$date2."'   GROUP BY p.NivelEconomico";
    $result5= mysqli_query($conn,$sqlse);
      if(mysqli_num_rows($result5)>0){
    echo '<table id="socioeconomico" class="display nowrap" style="width:100%" align="center"><thead><h2 style="text-align: center">Nivel Socioeconomico</h2><br><tr><th>Estado Socioeconomico
    </th><th>Total</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result5)){
      echo '<tr>';
      echo '<td>'.$row["NivelEconomico"].'</td>';
      echo '<td>'.$row["Total"].'</td>';

      echo '</tr>';
    }
                      echo '</tbody></table> <br><br></div></div>'; 

  }

    else{
        echo "No hay registros en esa fecha o es una fecha invalida";
    }
    //
    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_free_result($result3);
    mysqli_free_result($result4);
    mysqli_free_result($result5);
    mysqli_free_result($result6);
    mysqli_free_result($res1);
    mysqli_free_result($res2);
    mysqli_free_result($res3);
    mysqli_free_result($res4);
    mysqli_free_result($res5);
    mysqli_free_result($res6);
    mysqli_free_result($res7);
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
function getdepas(){
    $conn=conectDb();
    $sql="SELECT * FROM departamento";
    $result = mysqli_query($conn, $sql);
    closeDb($conn);
    return $result;
  }

  function getTiposdeServicio(){
    $conn=conectDb();
    $sql="SELECT * FROM tipodeservicio";
    $result = mysqli_query($conn, $sql);
    closeDb($conn);
    return $result;
  }


//Aqui va lo de tony----------------


  //Obtiene todos los voluntarios activos
  function getVoluntarios(){
  	$conn=conectDb();
  	$sql="SELECT IdVoluntario, Nombre, FechaDeNacimiento, Sexo, c.NombreCargo, t.NombreTipo FROM voluntarios AS v, tipo AS t, cargo AS c WHERE v.Activo=1 AND v.idCargo=c.idCargo AND v.idTipo=t.idTipoVoluntario";
  	$result = mysqli_query($conn, $sql);
  	closeDb($conn);
  	return $result;
  }

  function getCargos(){
    $conn=conectDb();
    $sql="SELECT * FROM cargo";
    $result = mysqli_query($conn, $sql);
    closeDb($conn);
    return $result;
  }

  function getTipos(){
    $conn=conectDb();
    $sql="SELECT * FROM tipo";
    $result = mysqli_query($conn, $sql);
    closeDb($conn);
    return $result;
  }
/*
  //Obtiene todos los departamentos
  function getDepartamentos(){
    $conn=conectDb();
    $sql="SELECT IdDepartamento, NombreDepartamento, contraseña, IdRol FROM departamento";
    $result = mysqli_query($conn, $sql);
    closeDb($conn);
    return $result;
  }*/

  //Obtiene todos los departamentos
  function getDepartamentosImagen(){
    $conn=conectDb();
    $sql="SELECT IdDepartamento, NombreDepartamento, contrasena, IdRol, imagen FROM departamento";
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
    $query='INSERT INTO voluntarios (Nombre,FechaDeNacimiento,Sexo,idCargo,idTipo,Activo) VALUES (?,?,?,?,?,?)';
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

    $id = $conn->real_escape_string($id);
    $nombre = $conn->real_escape_string($nombre);
    $fechaNacimiento = $conn->real_escape_string($fechaNacimiento);
    $genero = $conn->real_escape_string($genero);
    $cargo = $conn->real_escape_string($cargo);
    $tipo = $conn->real_escape_string($tipo);

    $sql ="UPDATE voluntarios SET Nombre='$nombre', FechaDeNacimiento='$fechaNacimiento', Sexo='$genero', idCargo='$cargo', idTipo='$tipo' WHERE IdVoluntario= '".$id."' ";
      $result = mysqli_query($conn,$sql);

      closeDb($conn);
      return $result;

  }
?>