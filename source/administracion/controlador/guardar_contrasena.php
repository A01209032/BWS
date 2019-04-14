<?php
    //session_start();
    require_once("../modelo/util.php");

    //Validación de datos
    if(isset($_POST["contrasenaNueva"]) && isset($_POST["contrasenaNueva"]) != ""){
        $password=htmlspecialchars($_POST["contrasenaNueva"]);
        $id=htmlspecialchars($_POST["id"]);
        $arr = explode(",", $password);
        $numero=True;
        $valores=True;
        $tamanio=count($arr);
        for($i=0; $i < $tamanio; $i++) { 
            if (!is_numeric($arr[$i])) {
                    $numero=False;
            }else{
                if(($arr[$i]<0) || ($arr[$i]>4)){
                    $valores=False;
                }
            }
        }
        if ($numero==True) {
            if($valores==True){
                modifyContraseniaById($id,$password);
                echo '<script language="javascript">';
                echo 'alert("¡La contraseña se cambio con éxito!");';
                echo 'window.location="../cuentas.php";';
                echo '</script>';
            }else{
                echo '<script language="javascript">';
                echo 'alert("Error: Ingrese números con valores del 0 al 4");';
                echo 'window.location="../cuentas.php";';
                echo '</script>';
            }
            
        } else {
            echo '<script language="javascript">';
            echo 'alert("¡Error! Porfavor ingrese adecuadamente los datos");';
            echo 'window.location="../cuentas.php";';
            echo '</script>';
        }
        //header('Location: ../cuentas.php');

    }else{
        //Error al cargar las datos
        echo '<script language="javascript">';
        echo 'alert("¡Error! Porfavor inserte los datos");';
        echo '</script>';
        var_dump($_POST);
    }
?>