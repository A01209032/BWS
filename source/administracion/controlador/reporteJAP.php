<?php 
    require_once("../modelo/util.php");
    $_POST["date"]=htmlspecialchars($_POST["date"]);
    $_POST["date2"]=htmlspecialchars($_POST["date2"]);
    //metodo
        jap($_POST["date"],$_POST["date2"]);    

?>
