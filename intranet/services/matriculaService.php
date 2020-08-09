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
    
    function agregarMatricula($cod_periodo_lectivo,$cod_alumno,$cod_nivel_educativo)
    {
        $stmt = $this->conexion->prepare("INSERT INTO matricula_periodo (COD_PERIODO_LECTIVO,COD_ALUMNO,COD_NIVEL_EDUCATIVO) 
                                          VALUES (?,?,?)");
        $stmt->bind_param('sss',$cod_periodo_lectivo,$cod_alumno,$cod_nivel_educativo);
        $stmt->execute();
        $stmt->close();
    }
    function periodo()
    {
        return $this->conexion->query("SELECT * FROM periodo_lectivo WHERE ESTADO='ACT'");
    }

    function mostrarPeriodos()
    {
        return $this->conexion->query("SELECT * FROM periodo_lectivo ");
    }


    function insertarPeriodo($cod_periodo_lectivo,$estado,$fecha_inicio,$fecha_fin)
    {
        $stmt = $this->conexion->prepare("INSERT INTO periodo_lectivo(COD_PERIODO_LECTIVO,ESTADO,FECHA_INICIO,FECHA_FIN) 
                                          VALUES (?,?,?,?)");
        $stmt->bind_param('ssss',$cod_periodo_lectivo,$estado,$fecha_inicio,$fecha_fin);
        $stmt->execute();
        $stmt->close();
    }


}

?>