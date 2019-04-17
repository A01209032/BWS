<?php
  session_start();
?>
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


 <?php
  include("../views/_header_carpetas.html");
  include("../administracion/partials/_admin.html");
  include("../views/_footer.html");
?>

<div class="loader">
    <img src="loading.gif" alt="Loading..." />
</div>

<script type="text/javascript">
  window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
  });
</script>