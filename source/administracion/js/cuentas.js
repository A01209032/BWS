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


  function confirmacion(mensaje, handler){
    
    //Se agrega el modal de confirmación de cambio de contraseña
    $(`<div class="modal" id="confirmModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title"></h4></h4>
                <button type="button" class="close"  onclick="$('#confirmModal').hide();">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" >
              <h2 id="confirmModalData"></h2>
              <div style="text-align: right;">
                <input type="button" name="confirmar" value="Confirmar" id="confirmar" class="clsButton btn btn-primary btn-yes">           
                <input type="button"  name="cancelar" value="Cancelar" id="cancelar" class="clsButton btn btn-danger btn-no">
              </div>
            </div>
          </div>
        </div>
      </div>`).appendTo('body');


    //Se muestra el modal
    $('#confirmModalData').html(mensaje);
    $('#confirmModal').show();

    //Pass true to a callback function
    $(".btn-yes").click(function () {
      handler(true);
      $("#confirmModal").hide();
      $("#confirmModal").remove();
    });
    
    //Pass false to callback function
    $(".btn-no").click(function () {
      handler(false);
     $("#confirmModal").hide();
     $("#confirmModal").remove();
    });

  }

  function insertar(){

    $('form.ajax').on("submit", function(event){
      event.preventDefault();

      //Fetch
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

    //if(cambiarContrasena()){
      confirmacion("¿Esta seguro que desea cambiar la contraseña?", function (res){
        if (res) {
          $.ajax({
            url: url,
            type:type,
            data: data,
            success: function(data) {
              //alert(data);
              $('#alertModal').show();
              $('#alertModalData').html(data);
              that[0].reset();
              requestCuentas();
            }
          });
        }
      });

      return false;
    });
  }

});
