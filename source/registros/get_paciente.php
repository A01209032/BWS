<?php
    require_once("../util.php");
    require_once("models/paciente.php");
    require_once("models/enfermedad.php");
    $id = test_input($_POST["id"]);
    $error=getPaciente($id);
    if($error=="Error")
       echo json_encode(array("Error",$error));
       else echo json_encode($error);
      



  




?>
