<?php
    //session_start();
    require_once("util.php");
    include("partials/_head.html");
        
    //Validación de datos
    if(isset($_POST["nombre"])){
        $name=htmlspecialchars($_POST["nombre"]);
        $units=htmlspecialchars($_POST["unidades"]);
        $quantity=htmlspecialchars($_POST["cantidad"]);
        $price=htmlspecialchars($_POST["precio"]);
        $country=htmlspecialchars($_POST["pais"]);
      
        update_by_name($name, $units, $quantity, $price, $country);
          //Se cargaron los datos
          echo '<script language="javascript">';
            echo 'alert("Se edito la fruta")';
            echo '</script>';
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }else{
          //Error al cargar las datos
          echo '<script language="javascript">';
            echo 'alert("No se encontro el registro de la")';
            echo '</script>';
            var_dump($_POST);
    }
    /*
    if (isset($_POST["id"])) {
        if(update_fruit()){
            echo '<script language="javascript">';
            echo 'alert("Se borró la fruta")';
            echo '</script>';
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }else{
            
        }
    }else{
        echo '<script language="javascript">';
        echo 'alert("Ingresa el nombre de la fruta correctamente")';
        echo '</script>';
        var_dump($_POST);
    }*/
    include("partials/_footer.html"); 
    
  
?>