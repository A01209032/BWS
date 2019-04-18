<?php
    require_once("../modelo/util.php");
    $result=getVoluntarios();
    $text='';
    if(mysqli_num_rows($result)>0){
      $text=$text.'<br><table id="tablaVoluntarios" class="display nowrap" style="width:100%">
      <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Cargo</th>
            <th>Tipo</th>
            <th>Modificar</th>
        </tr>
      </thead>
      </tr></thead><tbody>';

      //Imprimir cada fila
      while($row=mysqli_fetch_assoc($result)){
          $temp=$row["IdVoluntario"];
          $text=$text.'<tr>';
          $text=$text.'<td>'.$temp.'</td> ';
          $text=$text.'<td>'.$row["Nombre"].'</td>';
          $cumpleanos = new DateTime($row["FechaDeNacimiento"]);
          $hoy = new DateTime();
          $annos = $hoy->diff($cumpleanos);
          $text=$text."<td>".$annos->y." años</td>";
          $text=$text.'<td>'.$row["Sexo"].'</td>';
          $text=$text.'<td>'.$row["NombreCargo"].'</td>';
          $text=$text.'<td>'.$row["NombreTipo"].'</td>';
          $text=$text.'  <td>
          <div class="btn-group-vertical">
          <input type="button" name="edit" value="Editar" id="'.$temp.'" class="clsButton btn btn-primary edit_data">
              <br>
                  <form class="ajax" method="POST" >
                  <input type="hidden" value='.$temp.' name="id" id="id">
                  <input type="submit" class="clsButton btn btn-danger active delete_data" role="button" aria-pressed="true" value="Eliminar">
          </div>
          </form></td>';
          $text=$text.'</tr>';
        }
    }else{
      echo "No hay voluntarios registrados";
    }
    $text=$text.'</tbody></table>';
    echo $text;
    mysqli_free_result($result); //Se libera la variable de memoria
?>
