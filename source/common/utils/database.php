<?php 

function connectDB(){
  $servername="localhost";
  $username= "root";
  $password= "";
  $dbname="servicio_social";
        
  $conn = mysqli_connect($servername,$username,$password,$dbname);
        
  if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }
  
  return $conn;  
}

function closeDB($conn){
  mysqli_close($conn);
}

 ?>