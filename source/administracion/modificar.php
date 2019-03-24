<?php 
    $id=htmlspecialchars($_POST["id"]);
    
   
if(isset($_POST["Modificar"])){
    $mod=htmlspecialchars($_POST["Modificar"]);
       echo "lol: ".$id."lol ".$mod;
}
elseif (isset($_POST["Eliminar"])){
    $elim=htmlspecialchars($_POST["Eliminar"]);
      echo "lol: ".$id."lol ".$elim;
}


?>