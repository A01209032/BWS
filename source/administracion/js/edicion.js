$(document).ready(function(){

      $('#add').click(function(){
        $('#insert').val("Insert");
        $('#insert_form')[0].reset();
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
