<?php 


 ?>
  <!-- Page Content -->
  <div class="container" id="login-container" >
    <div class="row">
      <div class="col-md-5 col-lg-5 mb-5">
        <div class="site-section">

      <div class="container overlap-section">
        <div class="row">
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-0" id="cuenta-1">
            <a href="#" class="unit-1 text-center">
              <img src="Images/sanjurjo.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Administrador</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-0" id="cuenta-2">
            <a href="#" class="unit-1 text-center">
              <img src="Images/virgen_de_guadalupe1.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Dispensario</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-0" id="cuenta-3">
            <a href="#" class="unit-1 text-center">
              <img src="Images/cuadro.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Asistencias</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-0" id="cuenta-4">
            <a href="#" class="unit-1 text-center">
              <img src="Images/sagrado_corazon.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Portería</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
      </div>
      <div class="col-md-7 col-lg-7 mb-7" id="password-sect">
        <!-- <img src="images/rosario_contra.jpg" id="password-img"> -->
        <span class="error-span"><?php if(isset($error)) echo $error; ?></span>
        <div id="rosario">
          <img id="ros-cruz" src="Images/ros_cruz.png" width=48 height=64>
        </div>
        <div id="txt-pass">
          <form action="<?= frombase('login.php') ?>" method="POST" id="h-form">
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass">
            <input type="text"     name="user" id="user">
            <input type="submit"   name="submission" id="submission">
            <!-- <button id="submit" name="submit" type="submit">Entrar</button> -->
          </form>
        </div>
        <button id="enter-btn">Entrar</button>
      </div>
    </div>

  </div>

  

  <script type="text/javascript" src="js/login.js"></script>

</body>

</html>
