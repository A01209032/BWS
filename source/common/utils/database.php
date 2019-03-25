<?php 

function connectDB(){
  $servername="sql9.freemysqlhosting.net";
  $username= "sql9284997";
  $password= "K2kRkpIfJR";
  $dbname="sql9284997";
        
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