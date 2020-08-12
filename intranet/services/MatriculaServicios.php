<?php

include 'MainService.php';

class MatriculaServicios extends MainService
{
    function encontrarAlumno($cedula)
    {
        return $this->conex->query("SELECT persona.COD_PERSONA,persona.DIRECCION, persona.NOMBRE, persona.APELLIDO
                                       FROM persona
                                       INNER JOIN tipo_persona_persona
                                       ON persona.COD_PERSONA = tipo_persona_persona.COD_PERSONA
                                       WHERE tipo_persona_persona.COD_TIPO_PERSONA=4 AND persona.CEDULA='".$cedula."'");
    }
    function nivelesEducativos()
    {
        return $this->conex->query("SELECT * FROM nivel_educativo ");   
    }


    function agregarMatricula($cod_periodo_lectivo,$cod_alumno,$cod_nivel_educativo)
    {
        $stmt = $this->conex->prepare("INSERT INTO matricula_periodo (COD_PERIODO_LECTIVO,COD_ALUMNO,COD_NIVEL_EDUCATIVO) 
                                          VALUES (?,?,?)");
        $stmt->bind_param('sss',$cod_periodo_lectivo,$cod_alumno,$cod_nivel_educativo);
        $stmt->execute();
        $stmt->close();
    }
    function periodo()
    {
        return $this->conex->query("SELECT * FROM periodo_lectivo WHERE ESTADO='ACT'");
    }

    function mostrarPeriodos()
    {
        return $this->conex->query("SELECT * FROM periodo_lectivo ");
    }

    //PERIODO ACADEMICO
    function insertarPeriodo($cod_periodo_lectivo,$estado,$fecha_inicio,$fecha_fin)
    {
        $stmt = $this->conex->prepare("INSERT INTO periodo_lectivo(COD_PERIODO_LECTIVO,ESTADO,FECHA_INICIO,FECHA_FIN) 
                                          VALUES (?,?,?,?)");
        $stmt->bind_param('ssss',$cod_periodo_lectivo,$estado,$fecha_inicio,$fecha_fin);
        $stmt->execute();
        $stmt->close();
    }

    //PARALELOS
    function insertarParalelo($cod_paralelo,$cod_nivel_educativo,$nombre)
    {
        $stmt = $this->conex>prepare("INSERT INTO paralelo (COD_PARALELO,COD_NIVEL_EDUCATIVO,NOMBRE) 
                                          VALUES (?,?,?)");
        $stmt->bind_param('sss',$cod_paralelo,$cod_nivel_educativo,$nombre);
        $stmt->execute();
        $stmt->close();
    }

    //PERIODO CON EL RESTO DE DATOS
    
    function asignaturas($cod_nivel_educativo)
    {
        return $this->conex->query("SELECT * FROM asignatura WHERE  COD_NIVEL_EDUCATIVO='".$cod_nivel_educativo."'");
    }
    function encontrarParalelo($cod_nivel_educativo)
    {
        return $this->conex->query("SELECT * FROM paralelo WHERE  COD_NIVEL_EDUCATIVO='".$cod_nivel_educativo."'");
    }
    function encontrarAula()
    {
        return $this->conex->query("SELECT * FROM aula");
    }
    function encontrarProfesor()
    {
        return $this->conex->query("SELECT persona.COD_PERSONA, persona.NOMBRE, persona.APELLIDO
                                       FROM persona
                                       INNER JOIN tipo_persona_persona
                                       ON persona.COD_PERSONA = tipo_persona_persona.COD_PERSONA
                                       WHERE tipo_persona_persona.COD_TIPO_PERSONA='PRO'
                                       ORDER BY persona.APELLIDO");
    }

    //AGREGAR DATOS DEL PERIODO
    function agregarDatosPeriodo($cod_nivel_educativo,$cod_asignatura,$cod_periodo_lectivo,$cod_paralelo,$cod_docente,$cod_aula)
    {
        $stmt = $this->conex->prepare("INSERT INTO asignatura_periodo (COD_NIVEL_EDUCATIVO,COD_ASIG_PERIODO,COD_PERIODO_LECTIVO,
                                                                          COD_PARALELO,COD_DOCENTE,COD_AULA) 
                                          VALUES (?,?,?,?,?,?)");
        $stmt->bind_param('ssssss',$cod_nivel_educativo,$cod_asignatura,$cod_periodo_lectivo,$cod_paralelo,$cod_docente,$cod_aula);
        $stmt->execute();
        $stmt->close();
    }

    //MATRICULAS PARA ANTIGUOS
    function encontrarAlumnos($periodo,$nivel)
    {
        return $this->conex->query("SELECT persona.COD_PERSONA,persona.DIRECCION, persona.NOMBRE, persona.APELLIDO
                                       FROM persona
                                       INNER JOIN matricula_periodo ON matricula_periodo.COD_ALUMNO = persona.COD_PERSONA
        WHERE matricula_periodo.COD_PERIODO_LECTIVO='".$periodo."' AND matricula_periodo.COD_NIVEL_EDUCATIVO='".$nivel."'");
    }
    function matricularAlumnos($cod_periodo_lectivo,$cod_alumno,$cod_nivel_educativo)
    {
        $stmt = $this->conex->prepare("INSERT INTO matricula_periodo (COD_PERIODO_LECTIVO,COD_ALUMNO,COD_NIVEL_EDUCATIVO) 
                                          VALUES (?,?,?)");
        $stmt->bind_param('sss',$cod_periodo_lectivo,$cod_alumno,$cod_nivel_educativo);
        $stmt->execute();
        $stmt->close();
        
    }
}

?>