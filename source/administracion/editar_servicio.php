<?php
    //session_start();
    require_once("util.php");
    include("../views/_header_carpetas.html");
        
    //Validación de datos
    if(isset($_POST["nombre2"]) && isset($_POST["nombre2"]) != "" &&
        isset($_POST["descripcion2"]) && isset($_POST["descripcion2"]) != "" &&
        isset($_POST["depa2"]) && isset($_POST["depa2"]) != "" ){
        
        $temp=htmlspecialchars($_POST["employee_id"]);
        $nombre=htmlspecialchars($_POST["nombre2"]);
        $descripcion=htmlspecialchars($_POST["descripcion2"]);
        $depa=htmlspecialchars($_POST["depa2"]);
        $id=intval($temp,10);
      
        if(update_Servicio($id,$nombre,$descripcion,$depa)){
          //Se cargaron los datos
          echo '<script language="javascript">';
            echo 'alert("Se edito el servicio")';
            echo '</script>';
            echo '<script language="javascript">';
 //echo 'window.location.href="../administracion/consultas.php"';
            echo 'javascript:history.back()';
                echo '</script>';}
            //header('Location: '.$_SERVER['HTTP_REFERER']);
        else{
          //Error al cargar las datos
          echo '<script language="javascript">';
            echo 'alert("No se encontro el registro del servicio")';
            echo '</script>';
            echo '<script language="javascript">';
 //echo 'window.location.href="../administracion/consultas.php"';
            echo 'javascript:history.back()';
                echo '</script>';
            //var_dump($_POST);
    }
}
    include("../views/_footer.html");
    
  
?>
