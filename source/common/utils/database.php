<?php 

function connectDB(){
  $servername="mysql1006.mochahost.com";
  $username= "a1209032_pagina";
  $password= "^\$5T4D%c^ifrHE^R6qWp0n&oo&BhST%3dZ0\$f*8#hXOpRfFyTIUtgJ^fiafnd33SocmpHj^l^Zy30KCr5y51JB6lCvAHTC3l5c&";
  $dbname="a1209032_main";
        
  $conn = mysqli_connect($servername,$username,$password,$dbname);
        
  if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }

  mysqli_set_charset($conn,"utf8");
  
  return $conn;  
}

function closeDB($conn){
  mysqli_close($conn);
}

function test_input($conn, $pstr) {
  return mysqli_escape_string($conn, $pstr);
}

 ?>