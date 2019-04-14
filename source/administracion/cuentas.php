<?php
  session_start();
  include("../views/_header_carpetas.html");
  
  require_once ("modelo/util.php");

  $result=getDepartamentosImagen();

  include("partials/_cuentas.html");
if(mysqli_num_rows($result)>0){
  echo '<div class="container">
  <div class="row">';
  while($row=mysqli_fetch_assoc($result)){
    echo '
          <div class="col-lg-3">
            <div class="card" style="width: 14rem;">
              <img src="../'.$row["imagen"].'" class="card-img-top cortarImagen">
              <div class="card-body">
                <h5 class="card-title">'.$row["NombreDepartamento"].'</h5>
                <p class="card-text"><b>Contraseña actual:</b></p>';
                //$result=getContraseniaById($row["IdDepartamento"]);
                //while($row=mysqli_fetch_assoc($result)){
                    echo ''.$row["contrasena"].'<br><br>';
                //}
              echo  '
              <p class="card-text"><b>Ingrese nueva contraseña:</b></p>
                <form action="controlador/guardar_contrasena.php" method="POST" onsubmit="return cambiarContrasena();">
                  <input type="text" class="form-control" id="contrasenaNueva" name="contrasenaNueva"placeholder="Ejemplo: 4,8,1,5">
                  <input type="hidden" value="'.$row["IdDepartamento"].'" name="id" id="id">
                  <br>
                <input type="submit" class="btn btn-primary active" role="button" aria-pressed="true" value="Cambiar contraseña">
                </form></td>
              </div>
            </div>
         </div>';
  }
}
  echo '</div></div>';
  mysqli_free_result($result); //Se libera la variable de memoria

  include("../views/_footer.html");
?>
