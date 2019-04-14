<?php
    //session_start();
    require_once("../modelo/util.php");

    //Validación de datos ingresados
    if(isset($_POST["contrasenaNueva"]) && isset($_POST["contrasenaNueva"]) != ""){
        $password=htmlspecialchars($_POST["contrasenaNueva"]);
        $id=htmlspecialchars($_POST["id"]);
        $arr = explode(",", $password);
        $numero=True;
        $valores=True;
        $tamanio=count($arr);
        //checa para cada cosa ingresada si es numero y si es un número valido
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
            //Si son números validos se cambia la contraseña
            if($valores==True){
                modifyContraseniaById($id,$password);
                echo '<script language="javascript">';
                echo 'alert("¡La contraseña se cambio con éxito!");';
                //echo 'window.location="../cuentas.php";';
                echo '</script>';
            //Si son números invalidos no se cambia la contraseña
            }else{
                echo '<script language="javascript">';
                echo 'alert("Error: Ingrese números con valores del 0 al 4");';
                //echo 'window.location="../cuentas.php";';
                echo '</script>';
            }
        //Si no son números no se cambia la contraseña
        } else {
            echo '<script language="javascript">';
            echo 'alert("¡Error! Porfavor ingrese adecuadamente los datos");';
            //echo 'window.location="../cuentas.php";';
            echo '</script>';
        }
        header( "refresh:.1; url=../cuentas.php" );
        //header('Location: ../cuentas.php');

    }else{
        //Error al cargar las datos
        echo '<script language="javascript">';
        echo 'alert("¡Error! Porfavor inserte los datos");';
        echo '</script>';
        eader( "refresh:.1; url=../cuentas.php" );
        var_dump($_POST);
    }
?>