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

    function getservicios($aux){
        $con=conectDb();
        $sql="SELECT * FROM voluntarios  WHERE Nombre LIKE '%".$aux."%' ";
        $result=mysqli_query($con,$sql);
        closeDb($con);
        return $result;
    }
$pattern=strtolower($_GET['pattern2']);

$words=getservicios($pattern);

$response="";
$size=0;

if(mysqli_num_rows($words)>0){
    while($row=mysqli_fetch_assoc($words)){
       
         $response   .="<option value=\"".$row["IdVoluntario"]."\">".$row["Nombre"]."</option>";
         //var_dump($row["IdPaciente"]);
        $size++;
    }
}
else {
    echo "No existen registros con este nombre";
}
if($size>0){
  echo "<select style="."text-align: center"." id=\"list2\" size=$size onclick=\"selectValue2()\">$response</select>";
  
}
?>