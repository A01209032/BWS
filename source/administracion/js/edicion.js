   //nuevovoluntario
function agregarnuevovol(){
  $('#registrarVoluntario').modal('show');
}
$(document).ready(function(){

  const loader = document.querySelector(".loader");
  //cargar
  window.onload=requestVoluntarios();

  function requestVoluntarios(){
    $.ajax({
              url: 'controlador/obtener_voluntarios.php',
              method: 'GET',
              data: {
              },
              success: function(data) {

                var ajaxResponse = document.getElementById('listaVoluntarios');
                ajaxResponse.innerHTML = data;
                ajaxResponse.style.visibility = "visible";

                $('#tablaVoluntarios').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                } );
                loader.className += " hidden"; // class "loader hidden"
              }

            });
  }

  //agregar
  $('#agregarVol').on("submit", function(event){

    event.preventDefault();

        $.ajax({
              url: 'controlador/guardar_voluntario.php',
              method: 'POST',
              data: {
                nombre: $('#nombre').val(),
                fechaDeNacimiento: $('#fechaDeNacimiento').val(),
                sexo: $('#sexo').val(),
                cargo: $('#cargo').val(),
                tipo: $('#tipo').val()
              },
              success: function(data) {
                alert(data);

                requestVoluntarios();

                $('#registrarVoluntario').modal('hide');
              }

            });
        return false;
  });

  //modificar
  $('#insert_form').on("submit", function(event){

    event.preventDefault();

        $.ajax({
              url: 'controlador/editar_voluntario.php',
              method: 'POST',
              data: {
                nombreM: $('#nombreM').val(),
                fechaDeNacimientoM: $('#fechaDeNacimientoM').val(),
                sexoM: $('#sexoM').val(),
                cargoM: $('#cargoM').val(),
                tipoM: $('#tipoM').val(),
                employee_id: $('#employee_id').val()
              },
              success: function(data) {
                alert(data);
                $('#modificarVoluntario').modal('hide');
                requestVoluntarios();
              }

            });
        return false;
  });

    function eliminar() {
      var retVal = confirm("¿Esta seguro que desea eliminar el voluntario?");
      if( retVal == true ) {
      //document.write ("User wants to continue!");
        return true;
      }
      else {
        //document.write ("User does not want to continue!");
        return false;
      }
    }

    //eliminar
    
      $(document).on('click', '.delete_data', function(){
        if (eliminar()){
          let employee_id = $(this).attr("id");
          $.ajax({
            url:"controlador/eliminar_voluntario.php",
            method:"POST",
            data: {employee_id: employee_id},
            success:function(data){
              alert(data);
              requestVoluntarios();
            }
          });
        }
      });



    /*AJAX para modificar voluntarios: Carga los datos del seleccionado con modelo/fetch.php*/

      $(document).on('click', '.edit_data', function(){

        let employee_id = $(this).attr("id");
        $.ajax({
          url:"modelo/fetch.php",
          method:"POST",
          data: {employee_id: employee_id},
          dataType:"json",
          success:function(data){
            $('#nombreM').val(data.Nombre);
            $('#fechaDeNacimientoM').val(data.FechadeNacimiento);
            $('#sexoM').val(data.Sexo);
            $('#cargoM').val(data.idCargo);
            $('#tipoM').val(data.idTipo);
            $('#employee_id').val(data.IdVoluntario);
            $('#insert').val("Actualizar");
            $('#modificarVoluntario').modal('show');
          }
        });
      });
 });
