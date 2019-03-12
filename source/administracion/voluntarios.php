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
      $temp=$row["IdVoluntario"];
      echo '<tr>';
      echo '<td>'.$temp.'</td> ';
      echo '<td>'.$row["Nombre"].'</td>';
      $cumpleanos = new DateTime($row["FechaDeNacimiento"]);
      $hoy = new DateTime();
      $annos = $hoy->diff($cumpleanos);
      echo '<td>'.$annos->y/*getdate()-date($row["FechaDeNacimiento"])*/.' años</td>';
      echo '<td>'.$row["Sexo"].'</td>';
      echo '<td>'.$row["Cargo"].'</td>';
      echo '<td>'.$row["Tipo"].'</td>';
      echo ' <td><button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#modificarVoluntario" value='.$temp.'>Modificar</button> <a href="eliminar_voluntario.php" class="btn btn-primary btn-lg active align-middle" role="button" aria-pressed="true" onclick="('.$temp.')"">Eliminar</a><div class="text-center"> ';
  /*<button type="button" onclick="eliminar()" class="btn btn-danger" value='.$temp.'>Eliminar</button></td>'*/
      echo '</tr>';
    }
  }
  echo '</tbody></table>';

  mysqli_free_result($result); //Se libera la variable de memoria
    
  include("../views/_footer.html");

?>
