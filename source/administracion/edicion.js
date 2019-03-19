$(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  

      $(document).on('click', '.edit_data', function(){ 
             
           var employee_id = $(this).attr("id");  
           alert(employee_id); 
           $.ajax({  

                url:"fetch.php",  
                method:"POST",  

                data:{employee_id:employee_id},  
                 
                success:function(data){   
                     $('#nombre').val(data.Nombre);  
                     $('#fechaDeNacimiento').val(data.FechaDeNacimiento);  
                     $('#sexo').val(data.Sexo);  
                     $('#cargo').val(data.Cargo);  
                     $('#tipo').val(data.Tipo);  
                     $('#employee_id').val(data.IdVoluntario);  
                     $('#insert').val("Update"); 
                     $('#modificarVoluntario').modal('show');  
                },  
                dataType:"json" 
           });  
      });  

      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#nombre').val() == "")  
           {  
                alert("Se requiere ingresar el nombre");  
           }  
           else if($('#fechaDeNacimiento').val() == '')  
           {  
                alert("Se requiere ingresar la fecha de nacimiento");  
           }  
           else if($('#sexo').val() == '')  
           {  
                alert("Se requiere ingresar el sexo");  
           }  
           else if($('#cargo').val() == '')  
           {  
                alert("Se requiere ingresar el cargo");  
           }  
           else  
           {  
                $.ajax({  
                     url:"editar_voluntario.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#modificarVoluntario').modal('hide');  
                          //$('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      
 }); 