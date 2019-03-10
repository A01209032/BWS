<?php
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
      echo '<tr>';
      echo '<td>'.$row["IdVoluntario"].'</td> ';
      echo '<td>'.$row["Nombre"].'</td>';
      $cumpleanos = new DateTime($row["FechaDeNacimiento"]);
      $hoy = new DateTime();
      $annos = $hoy->diff($cumpleanos);
      echo '<td>'.$annos->y/*getdate()-date($row["FechaDeNacimiento"])*/.' años</td>';
      echo '<td>'.$row["Sexo"].'</td>';
      echo '<td>'.$row["Cargo"].'</td>';
      echo '<td>'.$row["Tipo"].'</td>';
      echo ' <td><button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#modificarVoluntario">Modificar</button>  <button type="button" class="btn btn-danger">Eliminar</button></td>';
      echo '</tr>';
    }
  }
  echo '</tbody></table>';

  mysqli_free_result($result); //Se libera la variable de memoria
    
  include("../views/_footer.html");

?>
