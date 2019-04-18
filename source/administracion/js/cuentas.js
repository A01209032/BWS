$(document).ready(function(){

  const loader = document.querySelector(".loader");
  window.onload=requestCuentas();

  function requestCuentas(){
    $.get( "controlador/obtenerCuentas.php")
          .done(function( data ) {
              var ajaxResponse = document.getElementById('reporteCuentas');
              ajaxResponse.innerHTML = data;
              ajaxResponse.style.visibility = "visible";
              insertar();
              loader.className += " hidden"; // class "loader hidden"
          });
  }

  function cambiarContrasena() {
  var retVal = confirm("¿Esta seguro que desea cambiar la contraseña?");
    if( retVal == true ) {
      //document.write ("User wants to continue!");
      return true;
    } else {
      //document.write ("User does not want to continue!");
      return false;
    }
  }

  function insertar(){
    $('form.ajax').on("submit", function(event){
    event.preventDefault();
    if(cambiarContrasena()){
      var that=$(this),
        url = 'controlador/guardar_contrasena.php',
        type=that.attr('method'),
        data={};
      that.find('[name]').each(function(index,value){
        var eso=$(this);
        name=eso.attr('name'),
        value=eso.val();

        data[name]=value;
      });
      //var boton=data[id];
      //boton='#'+boton;
      $.ajax({
        url: url,
        type:type,
        data: data,
        /*
        beforeSend:function(){
          echo (boton);
          $(boton).val("Insertando");
        }, */
        success: function(data) {
          alert(data);
          that[0].reset();
          requestCuentas();
        }
      });
    }
      return false;
  });
  }

});
