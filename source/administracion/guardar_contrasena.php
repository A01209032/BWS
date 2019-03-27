<?php
    //session_start();
    require_once("util.php");
    //include("../views/_header_carpetas.html");
        
    //Validación de datos
    if(isset($_POST["contrasenaNueva"]) && isset($_POST["contrasenaNueva"]) != ""){
        $password=htmlspecialchars($_POST["contrasenaNueva"]);
        $id=htmlspecialchars($_POST["id"]);
        modifyContraseniaById($id,$password);
        //echo '<script language="javascript">';
        //echo 'alert("Se edito la contraseña de manera correcta);window.location="cuentas.php";';
        //echo '</script>';
        //Se cargaron los datos
        //var_dump($_POST);
        //echo '<script language="javascript">';
        //echo 'alert("Se edito el voluntario");
        //echo 'window.location="cuentas.php";';
        //echo '</script>';
        header('Location: cuentas.php');
    }else{
        //Error al cargar las datos
        echo '<script language="javascript">';
        echo 'alert("No se encontro el registro de volutario");';
        echo '</script>';
        var_dump($_POST);
    }
    //include("../views/_footer.html");
    
  
?>