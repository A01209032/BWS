<?php
    require_once("util.php");

    if(isset($_POST["submit"])) {
       $_POST["nombre"] = htmlentities($_POST["nombre"]);
       $_POST["apellido"] = htmlentities($_POST["apellido"]);
       if (isset($_POST["nombre"]) && isset($_POST["apellido"])
           && isset($_POST["fecha_nacimiento"]) && isset($_POST["sexo"])
           && $_POST["nombre"] != "" && $_POST["apellido"] != ""
           && $_POST["fecha_nacimiento"] != "") {

               $info = "Se guardó el paciente ".$_POST["nombre"]." ".$_POST["apellido"];
               info($info);
               include("views/_footer.html");
       } else {

            $error = "Los datos tienen errores";
            include("registro_paciente.html");
            include("views/_footer.html");
       }
    } else {
      
        include("registro_paciente.html");
        include("views/_footer.html");
    }

?>
