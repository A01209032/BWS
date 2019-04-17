<?php 
    
    require_once('util.php');
    
    
    function registrar($paciente,$asistente,$fecha,$tipo,$observaciones,$cuota){
        //$paciente=getIdPaciente($paciente);
        
        //$asistente=getIdVoluntario($asistente);
        $departamento=getIdDepartamento($_SESSION['departamento']);
        $tipo = getIdServicio($tipo);
        //echo '<script type="text/javascript">','alert("'.$departamento.' '.$paciente.' '.$asistente.' '.$fecha.' '.$tipo.' '.$observaciones.' '.$cuota.'");','</script>';
        if($tipo!="Error" or $asistente!="Error" and $paciente!="Error" and $departamento!="Error"){
            $res=addRegistro($departamento,$paciente,$asistente,$fecha,$tipo,$observaciones,$cuota);
            if($res){
                return 100;    
            }
            return "Error";
        }
        if($tipo=="Error"){
            return "Error servicio";
        }
        if($paciente=="Error"){
            return "Error paciente";
        }
        if($departamento=="Error"){
            return "Error departamento";
        }
        if($asistente=="Error"){
            return "Error asistente";
        }
        else return "Error";
    }



?>