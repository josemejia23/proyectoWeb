<?php

include 'mainService.php';

class MatriculaServicios extends MainService
{
    function encontrarAlumno($cedula)
    {
        return $this->conexion->query("SELECT persona.COD_PERSONA,persona.DIRECCION, persona.NOMBRE, persona.APELLIDO
                                       FROM persona
                                       INNER JOIN tipo_persona_persona
                                       ON persona.COD_PERSONA = tipo_persona_persona.COD_PERSONA
                                       WHERE tipo_persona_persona.COD_TIPO_PERSONA='EST' AND persona.CEDULA='".$cedula."'");
    }
    function nivelesEducativos()
    {
        return $this->conexion->query("SELECT * FROM nivel_educativo ");   
    }

}

?>