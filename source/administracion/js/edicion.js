$(document).ready(function(){

  //cargar
  window.onload=requestVoluntarios();

  function requestVoluntarios(){
    $.get( "controlador/obtener_voluntarios.php")
          .done(function( data ) {
              var ajaxResponse = document.getElementById('listaVoluntarios');
              ajaxResponse.innerHTML = data;
              ajaxResponse.style.visibility = "visible";
              eliminarVoluntario();
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
    
                $('#registrarVoluntario').hide();
                requestVoluntarios();
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
    function eliminarVoluntario(){

      $('form.ajax').on("submit", function(event){  

        event.preventDefault(); 
          if (eliminar()){
              var that=$(this),
              url = 'controlador/eliminar_voluntario.php',
              type=that.attr('method'),
              data={};
            that.find('[name]').each(function(index,value){
              var eso=$(this);
              name=eso.attr('name'),
              value=eso.val();

              data[name]=value;
            });

            $.ajax({
              url: url,
              type:type,
              data: data,
              success: function(data) {
                alert(data);
                requestVoluntarios();
              }
            });
          }
          
          return false;
      });
    }
    

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
