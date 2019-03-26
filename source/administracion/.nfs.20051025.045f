<?php
  include("../views/_header_carpetas.html");
  include("partials/_cuentas.html");
  require_once ("util.php");


echo '
<div class="container">
  <div class="row">

    <div class="col-lg-3">
      <div class="card" style="width: 14rem;">
        <img src="../Images/sanjurjo.jpg" class="card-img-top cortarImagen" alt="Imagen de cuenta de Administrador">
        <div class="card-body">
          <h5 class="card-title">Administrador</h5>
          <p class="card-text"><b>Contraseña actual:</b></p>';
          $result=getContraseniaById(1);
          while($row=mysqli_fetch_assoc($result)){
              echo ''.$row["contrasena"].'<br><br>';
          }
        echo  '
        <p class="card-text"><b>Ingrese nueva contraseña:</b></p>
          <form action="guardar_contrasena.php" method="POST" onsubmit="return cambiarContrasena();">
            <input type="text" class="form-control" id="contrasenaNueva" name="contrasenaNueva"placeholder="Ejemplo: 4,8,1,5">
            <input type="hidden" value="1" name="id" id="id">
            <br>
            <!--input onsubmit="return cambiarContraseña();" type="submit" class="btn btn-primary" value="Cambiar contraseña"-->
          <input type="submit" class="btn btn-primary active" role="button" aria-pressed="true" value="Cambiar contraseña"></form></td>
        </div>
      </div>
   </div>';

echo '    <div class="col-lg-3">
      <div class="card" style="width: 14rem;">
        <img src="../Images/virgen_de_guadalupe2.jpg" class="card-img-top cortarImagen" alt="Imagen de cuenta de dispensario">
        <div class="card-body">
          <h5 class="card-title">Dispensario</h5>
          <p class="card-text"><b>Contraseña actual:</b></p>';
          $result=getContraseniaById(2);
          while($row=mysqli_fetch_assoc($result)){
              echo ''.$row["contrasena"].'<br><br>';
          }
        echo  '
        <p class="card-text"><b>Ingrese nueva contraseña:</b></p>
          <form action="guardar_contrasena.php" method="POST" onsubmit="return cambiarContrasena();">
            <input type="text" class="form-control" id="contrasenaNueva" name="contrasenaNueva"placeholder="Ejemplo: 4,8,1,5">
            <input type="hidden" value="2" name="id" id="id">
            <br>
            <!--input onclick="cambioContrasena()" type="submit" class="btn btn-primary" value="Cambiar contraseña"-->
          <input type="submit" class="btn btn-primary active" role="button" aria-pressed="true" value="Cambiar contraseña"></form></td>
        </div>
      </div>
    </div>';
echo '
    <div class="col-lg-3">
      <div class="card" style="width: 14rem;">
        <img src="../Images/sagrado_corazon_cuentas.jpg" class="card-img-top cortarImagen" alt="Imagen de cuenta de Porteria">
        <div class="card-body">
          <h5 class="card-title">Porteria</h5>
            <p class="card-text"><b>Contraseña actual:</b></p>';
            $result=getContraseniaById(3);
            while($row=mysqli_fetch_assoc($result)){
                echo ''.$row["contrasena"].'<br><br>';
            }
          echo  '
          <p class="card-text"><b>Ingrese nueva contraseña:</b></p>
            <form action="guardar_contrasena.php" method="POST" onsubmit="return cambiarContrasena();" >
              <input type="text" class="form-control" id="contrasenaNueva" name="contrasenaNueva"placeholder="Ejemplo: 4,8,1,5">
              <input type="hidden" value="3" name="id" id="id">
              <br>
              <!--input onclick="cambioContrasena()" type="submit" class="btn btn-primary" value="Cambiar contraseña"-->

            <input type="submit" class="btn btn-primary active" role="button" aria-pressed="true" value="Cambiar contraseña"></form></td>
        </div>
      </div>
    </div>';
echo '
      <div class="col-lg-3">
        <div class="card" style="width: 14rem;">
          <img src="../Images/cuadro.jpg" class="card-img-top cortarImagen" alt="...">
          <div class="card-body">
            <h5 class="card-title">Asistencias</h5>
            <p class="card-text"><b>Contraseña actual:</b></p>';
            $result=getContraseniaById(4);
            while($row=mysqli_fetch_assoc($result)){
                echo ''.$row["contrasena"].'<br><br>';
            }
          echo  '
          <p class="card-text"><b>Ingrese nueva contraseña:</b></p>
             <form action="guardar_contrasena.php" method="POST" onsubmit="return cambiarContrasena();" >
              <input type="text" class="form-control" id="contrasenaNueva" name="contrasenaNueva" placeholder="Ejemplo: 4,8,1,5">
              <input type="hidden" value="4" name="id" id="id">
              <br>
              <!--input onclick="cambioContrasena()" type="submit" class="btn btn-primary" value="Cambiar contraseña"-->
            <input type="submit" class="btn btn-primary active" role="button" aria-pressed="true" value="Cambiar contraseña"></form></td>
          </div>
        </div>
      </div>
    </div>';

  include("../views/_footer.html");
?>
