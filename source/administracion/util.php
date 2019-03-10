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