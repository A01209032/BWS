$(document).ready(function(){

      $('#add').click(function(){
        $('#insert').val("Insert");
        $('#insert_form')[0].reset();
      });

      $(document).on('click', '.edit_data', function(){
        

        var employee_id = $(this).attr("id");
        $.ajax({
          url:"modelo/fetch.php",
          method:"POST",
          data: {employee_id: employee_id},
          dataType:"json",
          success:function(data){
            $('#nombreM').val(data.Nombre);
            $('#fechaDeNacimientoM').val(data.FechadeNacimiento);
            $('#sexoM').val(data.Sexo);
            $('#cargoM').val(data.Cargo);
            $('#tipoM').val(data.Tipo);
            $('#employee_id').val(data.IdVoluntario);
            $('#insert').val("Actualizar");
            $('#modificarVoluntario').modal('show');
          }
        });
      });

 });
