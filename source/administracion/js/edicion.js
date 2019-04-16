$(document).ready(function(){

  $('#agregarVol').submit(function(e) {

    e.preventDefault();
    
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
              }
            });
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
