<?php 
    require_once("../modelo/util.php");
    $result=getDepartamentosImagen();   
    $text='';
	  if(mysqli_num_rows($result)>0){
	    $text=$text.'<div class="container">
	    <div class="row">';
	    while($row=mysqli_fetch_assoc($result)){
	      $text=$text.'
	            <div class="col-lg-3">
              <div class="card" style="width: 14rem;">
                <img src="../'.$row["imagen"].'" class="card-img-top cortarImagen">
                <div class="card-body">
                  <h5 class="card-title">'.$row["NombreDepartamento"].'</h5>
                  <p class="card-text"><b>Contraseña actual:</b></p>'.$row["contrasena"].'<br><br>
                <p class="card-text"><b>Ingrese nueva contraseña:</b></p>
                  <form method="POST" class="ajax">
                    <input type="text" class="form-control" id="contrasenaNueva" name="contrasenaNueva"placeholder="Ejemplo: 0,4,1,2">
                    <input type="hidden" value="'.$row["IdDepartamento"].'" name="id" id="id">
                    <br>
                  <input type="submit" id="'.$row["IdDepartamento"].'" class="btn btn-primary active" role="button" aria-pressed="true" value="Cambiar contraseña">
                  </form></td>
                </div>
              </div>
           </div>';
	    }
	  }
	  $text=$text.'</div></div>';
	  echo $text;
	  mysqli_free_result($result); //Se libera la variable de memoria
?>

