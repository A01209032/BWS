$(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  

      $(document).on('click', '.edit_data', function(){ 
             
           var employee_id = $(this).attr("id");  
          // alert(employee_id); 
           $.ajax({  

                url:"modelo/fetchS.php",  
                method:"POST",  

                data:{employee_id:employee_id},  
                 
                success:function(data){    
                     $('#depa2').val(data.IdDepartamento);  
                     parseInt($('#employee_id').val(data.idAtienden),10);  
                    $('#userInput').val(data.IdPaciente);  
                    $('#userInput2').val(data.IdVoluntario);  
                    $('#paciente2').val(data.IdPaciente);  
                     $('#asistente2').val(data.IdVoluntario); 
                    
                   //$('#userInput2').val(data.IdVoluntario);  
                     $('#date2').val(data.Fecha);  
                     $('#servicio2').val(data.IdServicio);  
                $('#Observaciones2').val(data.Observaciones);  
                     $('#cuota2').val(data.CuotaRecup);  
                     $('#insert').val("Actualizar"); 
                     $('#modificarServicio').modal('show');  
                },  
                dataType:"json" 
           });  
          var paciente2 = $(this).attr("paciente2");
          
          $.ajax({  

                url:"modelo/fetchvol.php",  
                method:"POST",  

                data:{employee_id:employee_id},  
                 
                success:function(data){ 
                    $('#userInput').val(data.IdPaciente);  
                    $('#userInput2').val(data.IdVoluntario);  
                },  
                dataType:"json" 
           }); 
           
      });  

      
 }); 
