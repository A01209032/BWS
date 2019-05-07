<?php

    require_once("../modelo/util.php");
    

     $id=$_POST['employee_id'];

    /*CONTROLADOR*/
   //Funcion para eliminar
    if (isset($_POST['employee_id'])) {
        
        if(delete_by_ID($id))
            echo 'Se elimino el servicio correctamente';
            
    }else{
         echo 'No se pudo eliminar';
    
        
       
    }
    
  
  
?>