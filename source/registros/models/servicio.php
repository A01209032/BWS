<?php 
    session_start();
    require_once('util.php');
    
    
    function registrar($nombre){
        $departamento=getIdDepartamento($_SESSION['departamento']);
        //echo $departamento;
        //$tipo = getIdServicio($tipo);
        //echo '<script type="text/javascript">','alert("'.$departamento.' '.$paciente.' '.$asistente.' '.$fecha.' '.$tipo.' '.$observaciones.' '.$cuota.'");','</script>';
       
            $res=addServicio($departamento,$nombre);
            return $res;
        }
    



?>