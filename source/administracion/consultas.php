<?php
  session_start();
  include("../views/_header_carpetas.html");
  include ("partials/_formulario_consultas.html");

require_once ("util.php"); 
$result=getservicios(); 
  if(mysqli_num_rows($result)>0){
    echo '<table align="center"><thead><h2 style="text-align: center">Listado de todas los servicios</h2><br><br><tr><th>IDDepartamento</th><th>Descripcion</th><th>Nombre</th><th>Fecha</th></tr></thead><tbody>';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result)){
      echo '<tr>';
      echo '  <td>'.$row["idDepartmaneto"].'</td>';
      echo '<td>'.$row["NombreServicio"].'</td>';
      echo '<td>'.$row["Descripcion"].'</td>  ';
      echo '<td>'.$row["Fecha"].'</td>  ';
      echo '</tr>';
    }
  }
    echo '</tbody></table>';
    
    mysqli_free_result($result); //Se libera la variable de memoria
  
  include("../views/_footer.html");
?>
