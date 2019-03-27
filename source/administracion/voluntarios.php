<?php
  session_start();
  include("../views/_header_carpetas.html");
  require_once ("util.php");

  $result=getVoluntarios();
  //$edad=getEdadVoluntario();
  

  include("partials/_voluntarios.html");

  if(mysqli_num_rows($result)>0){
    echo '<br><table class="table table-white "><thead><h2>Listado de todos los voluntarios</h2><tr>
    <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
	      <th>Edad</th>
	      <th>Sexo</th>
	      <th>Cargo</th>
	      <th>Tipo</th>
	    </tr>
    </thead>
    </tr></thead><tbody>';

    //Imprimir cada fila

  while($row=mysqli_fetch_assoc($result)){
  	//$row2=mysqli_fetch_assoc($edad);
      $temp=$row["IdVoluntario"];
      echo '<tr>';
      echo '<td>'.$temp.'</td> ';
      echo '<td>'.$row["Nombre"].'</td>';
      $cumpleanos = new DateTime($row["FechaDeNacimiento"]);
      $hoy = new DateTime();
      $annos = $hoy->diff($cumpleanos);
      echo "<td>".$annos->y." años</td>";
      echo '<td>'.$row["Sexo"].'</td>';
      echo '<td>'.$row["Cargo"].'</td>';
      echo '<td>'.$row["Tipo"].'</td>';
      /*echo ' <td><button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#modificarVoluntario" value='.$temp.'>Modificar</button> */
      echo '  <td>
<div class="btn-group-vertical">
<input type="button" name="edit" value="Editar" id="'.$temp.'" class="clsButton btn btn-primary edit_data">

        <form action="eliminar_voluntario.php" method="POST" onsubmit="return eliminar();" >
        <input type="hidden" value='.$temp.' name="id" id="id">
        <input type="submit" class=" clsButton btn btn-danger active  " role="button" aria-pressed="true" value="Eliminar">
</div>
      </form></td>';

  /*<button type="button" onclick="eliminar()" class="btn btn-danger" value='.$temp.'>Eliminar</button></td>'*/
      echo '</tr>';
    }
  }
  echo '</tbody></table>';

  mysqli_free_result($result); //Se libera la variable de memoria
?>


<script type="text/javascript">
  $(document).ready(function(){
      $("#myBtn").click(function(){
    $("#myModal").modal("toggle");
  });
      $('#add').click(function(){
           $('#insert').val("Insert");
           $('#insert_form')[0].reset();
      });

      $(document).on('click', '.edit_data', function(){
          var employee_id = $(this).attr("id");
          $.ajax({
                url:"fetch.php",
                method:"POST",
                data: {employee_id: employee_id},
                dataType:"json",
                success:function(data){
                //alert(employee_id);
                  //alert(data.FechadeNacimiento);
                  $('#nombreM').val(data.Nombre);
                  $('#fechaDeNacimientoM').val(data.FechadeNacimiento);
                  //if(data.Sexo==){

                  $('#sexoM').val(data.Sexo);
                  $('#cargoM').val(data.Cargo);
                  $('#tipoM').val(data.Tipo);
                  $('#employee_id').val(data.IdVoluntario);
                  $('#insert').val("Actualizar");
                  $('#modificarVoluntario').modal('show');
                }
           });
      });
/*
      $('#insert_form').on("submit", function(event){
           event.preventDefault();
           if($('#nombreM').val() == "")
           {
                alert("Se requiere ingresar el nombre");
           }
           else if($('#fechaDeNacimientoM').val() == '')
           {
                alert("Se requiere ingresar la fecha de nacimiento");
           }
           else if($('#sexoM').val() == '')
           {
                alert("Se requiere ingresar el sexo");
           }
           else if($('#cargoM').val() == '')
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
                          alert("Se requiere ingresar el sexo");
                     }
                });
           }
      });  */

 });
</script>
<?php include("../views/_footer.html"); ?>
