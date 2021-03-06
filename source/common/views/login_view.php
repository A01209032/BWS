  <!-- Page Content -->
  <div class="container" id="images-container" >
    <div class="row">
      <div class="col-md-5 col-lg-5 mb-5">
        <div class="site-section">

      <div class="container overlap-section">
        <div class="row">
          <?php for($i = 0; $i < count($departamentos); $i++): ?>

          <div class="col-md-6 col-lg-6 mb-6 mb-lg-0" 
              id="cuenta-<?= ($i+1) ?>">
            <a href="#" class="unit-1 text-center" 
               data-depid='<?= $departamentos[$i]['Id'] ?>'>
              <img src="../<?= $departamentos[$i]['Imagen'] ?>" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading"><?= $departamentos[$i]['Nombre'] ?></h3>
              </div>
            </a>
          </div>

          <!-- 
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-0" id="cuenta-1">
            <a href="#" class="unit-1 text-center">
              <img src="../Images/sanjurjo.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Administrador</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-0" id="cuenta-2">
            <a href="#" class="unit-1 text-center">
              <img src="../Images/virgen_de_guadalupe1.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Dispensario</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-0" id="cuenta-3">
            <a href="#" class="unit-1 text-center">
              <img src="../Images/cuadro.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Asistencias</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-0" id="cuenta-4">
            <a href="#" class="unit-1 text-center">
              <img src="../Images/sagrado_corazon.jpg" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Portería</h3>
              </div>
            </a>
          </div> -->
        <?php endfor; ?>
        </div>
      </div>
    </div>
      </div>
      <div class="col-md-7 col-lg-7 mb-7" id="password-sect">
        <!-- <img src="images/rosario_contra.jpg" id="password-img"> -->
        <?php if(isset($error)): ?>
          <span class="error-span"><?= $error ?></span>
        <?php endif; ?>
        <div id="rosario">
          <img id="ros-cruz" src="../Images/ros_cruz.png" width=48 height=64>
        </div>
        <div id="txt-pass">
          <!-- <form action="<?= frombase('common/login.php') ?>" method="POST" id="h-form"> -->
          <form action="/source/common/login.php" method="POST" id="h-form">
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass">
            <input type="text"     name="user" id="user">
            <input type="submit"   name="submission" id="submission">
            <!-- <button id="submit" name="submit" type="submit">Entrar</button> -->
          </form>
        </div>
        <button id="enter-btn" class="btn boton">Amén</button>
        <form id="recuperarContrasena" method="POST">
            <input type="submit" class="btn btn-primary" role="button" aria-pressed="true" value="Olvidé mi contraseña">
        </form>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script type="text/javascript" src="../js/login.js"></script>

</body>

</html>
