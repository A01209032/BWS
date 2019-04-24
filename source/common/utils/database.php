<?php 

function connectDB(){
  $servername="remotemysql.com";
  $username= "thdR7Lb9W9";
  $password= "e52rzReZ8d";
  $dbname="thdR7Lb9W9";
        
  $conn = mysqli_connect($servername,$username,$password,$dbname);
        
  if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }
  
  return $conn;  
}

function closeDB($conn){
  mysqli_close($conn);
}

function test_input($conn, $pstr) {
  return $pstr;
  // return mysqli_escape_string($conn, $pstr);
}

 ?>