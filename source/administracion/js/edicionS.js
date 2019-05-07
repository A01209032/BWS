$(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
/*$('#modificar-registros').on("submit", function(event){

    event.preventDefault();

        $.ajax({
              url: 'controlador/editar_servicio.php',
              method: 'POST',
              data: {
                depa2: $('#depa2').val(),
                paciente2: $('#paciente2').val(),
                asistente2: $('#asistente2').val(),
                date2: $('#date2').val(),
                servicio2: $('#servicio2').val(),
                Observaciones2: $('#Observaciones2').val(),
                cuota2: $('#cuota2').val(),
                   employee_id: $('#employee_id').val()
              },
              success: function(data) {
                alert(data);
                 $('#modificar-registros').modal('hide');
                /*$('#alertModal').show();
                $('#alertModalData').html(data);
                *//*
    
               
              }

            });
        return false;
  });*/
      $(document).on('click', '.edit_data', function(){ 
             
           var employee_id = $(this).attr("id");  
          // alert(employee_id); 
           $.ajax({  

                url:"modelo/fetchS.php",  
                method:"POST",  

                data:{employee_id:employee_id},  
                 
                success:function(data){
                    console.log(data);
                     $('#depa2').val(data.IdDepartamento);  
                     $('#employee_id').val(data.IdAtienden);  
                   //$('#userInput2').val(data.IdVoluntario);  
                     $('#date2').val(data.Fecha);  
                     $('#servicio2').val(data.IdServicio);  
                $('#Observaciones2').val(data.Observaciones);  
                     $('#cuota2').val(data.CuotaRecup);

                     $('#paciente').val(data.NombrePaciente);  
                     $('#asistente').val(data.NombreVoluntario);  
                     pacienteActual.id = data.IdPaciente;
                     voluntarioActual.id = data.IdVoluntario


                     $('#insert').val("Actualizar"); 
                     $('#modificarServicio').modal('show');  
                },  
                dataType:"json" 
           });  
          var paciente2 = $(this).attr("paciente2");
          

          //TODO: var pacienteActual   = { id: -1 };, var voluntarioActual = { id: -1 };
          // Input Field
          // $.ajax({  

          //       url:"modelo/fetchvol.php",  
          //       method:"POST",  

          //       data:{employee_id:employee_id},  
                 
          //       success:function(data){ 
          //           pacienteActual.id = data.IdPaciente;
          //           voluntarioActual.id = data.IdVoluntario
          //           $('#userInput').val(data.IdPaciente);  
          //           $('#userInput2').val(data.IdVoluntario);  
          //       },  
          //       dataType:"json" 
          //  }); 
           
      });  
    
    
    

      
 }); 
