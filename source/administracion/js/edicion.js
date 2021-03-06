//nuevovoluntario
function agregarnuevovol(){
  $('#registrarVoluntario').modal('show');
}

function soloLetras(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.";
   especiales = "8-37-39-46";

   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
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

                let tituloListaVoluntarios='Lista de voluntarios';
                $('#tablaVoluntarios').DataTable( {

                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,
                    
                    dom: 'Bfrtip',
                    buttons: [ {
		                extend: 'csv',
		                title: tituloListaVoluntarios
		            }, {
		                extend: 'pdf',
		                title: tituloListaVoluntarios
		            }, {
		                extend: 'excel',
		                title: tituloListaVoluntarios
		            },
                      {
                        extend: 'print',
                        text: 'Imprimir',
                        title: tituloListaVoluntarios
                      }
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
                //alert(data);
                  $('#alertModal').show();
                  $('#alertModalData').html(data);
                
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
                //alert(data);
                $('#alertModal').show();
                $('#alertModalData').html(data);
                
                $('#modificarVoluntario').modal('hide');
                requestVoluntarios();
              }

            });
        return false;
  });
/*
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
    }*/

    //eliminar
    var employee_id;


      $('#confirmarBorrar').on("click", function(event){
        $.ajax({
              url:"controlador/eliminar_voluntario.php",
              method:"POST",
              data: {employee_id: employee_id},
              success:function(data){
                //alert(data);
                $('#confirmModalBorrarVoluntario').hide();

                $('#alertModal').show();
                $('#alertModalData').html(data);
                
                requestVoluntarios();
              }
            });
        
      });

      $('#cancelarBorrar').on("click", function(event){
        employee_id="";
        $('#confirmModalBorrarVoluntario').hide();
      });


      $(document).on('click', '.delete_data', function(){
        //mostrar el de eliminar
        $('#confirmModalBorrarVoluntario').show();
        $('#confirmModalBorrarVoluntarioData').html("¿Estas seguro que desea eliminar el voluntario?");

          employee_id = $(this).attr("id");

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
