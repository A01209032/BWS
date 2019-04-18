<style type="text/css">
  .loader {
    position: fixed;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
}

.loader > img {
    width: 100px;
}

.loader.hidden {
    animation: fadeOut 1s;
    animation-fill-mode: forwards;
}

@keyframes fadeOut {
    100% {
        opacity: 0;
        visibility: hidden;
    }
}

.thumb {
    height: 100px;
    border: 1px solid black;
    margin: 10px;
}
</style>
<div class="loader">
    <img src="loading.gif" alt="Loading..." />
</div>

<script type="text/javascript">
  window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
  });
</script>

<?php
  //Carga la tabla de voluntarios con la opcion de modificar y eliminarlos
  session_start();
  include("../views/_header_carpetas.html");
  require_once ("modelo/util.php");

  include("partials/_voluntarios.html");
?>

<script type="text/javascript" src="js/edicion.js"></script>

<?php include("../views/_footer.html"); ?>
