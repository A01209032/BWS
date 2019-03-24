<?php 
    
    
    
    function registrar($paciente,$asistente,$fecha,$tipo,$observaciones,$cuota){
        $paciente=getIdPaciente($paciente);
        $asistente=getIdVoluntario($asistente);
        $departamento=getIdDepartamento($_SESSION['departamento']);
        $tipo = getIdServicio($tipo);
        if($tipo!="Error" or $paciente!="Error" and $paciente!="Error" and $departamento!="Error"){
            addRegistro($departamento,$paciente,$asistente,$fecha,$tipo,$observaciones,$cuota);
        }
        else return "Error";
    }



?>