<?php
//CONEXION
include 'mainService.php';

class RepresentanteService extends MainService {

    function findGrades($codRepresentante){
        return $this->conex->query("SELECT a.NOMBRE, c.NOTA1, c.NOTA2, c.NOTA3, 
        c.NOTA4, c.NOTA5, c.NOTA6, c.NOTA7, c.NOTA8, c.NOTA9, c.NOTA10 
        FROM ASIGNATURA a, ALUMNO_ASIGNATURA_PERIODO c, PERSONA p 
        WHERE a.COD_ASIGNATURA = c.COD_ASIGNATURA 
        AND c.COD_ALUMNO = p.COD_PERSONA_REPRESENTANTE AND p.COD_PERSONA=".$codRepresentante);
    }
    
    function findSubjet($codRepresentante){
        return $this->conex->query("SELECT n.NOMBRE_NIVEL, n.NIVEL, a.NOMBRE, a.COD_ASIGNATURA 
        FROM ASIGNATURA a, NIVEL_EDUCATIVO n, ALUMNO_ASIGNATURA_PERIODO c, PERSONA p
        WHERE a.COD_ASIGNATURA = c.COD_ASIGNATURA AND n.COD_NIVEL_EDUCATIVO = c.COD_NIVEL_EDUCATIVO 
        AND c.COD_ALUMNO = p.COD_PERSONA_REPRESENTANTE AND p.COD_PERSONA=".$codRepresentante);
    }
    
    function findLevel($codRepresentante){
        return $this->conex->query("SELECT n.NOMBRE_NIVEL, n.NIVEL, a.COD_ASIGNATURA FROM NIVEL_EDUCATIVO n, ALUMNO_ASIGNATURA_PERIODO a
        WHERE n.COD_NIVEL_EDUCATIVO = a.COD_NIVEL_EDUCATIVO 
        AND a.COD_ALUMNO =".$codRepresentante);
    }

    function findSubjetByCode($codAsignatura){
        return $this->conex->query("SELECT a.NOMBRE, a.COD_ASIGNATURA, n.NIVEL, n.NOMBRE_NIVEL 
        FROM ASIGNATURA a, NIVEL_EDUCATIVO n
        WHERE a.COD_NIVEL_EDUCATIVO = n.COD_NIVEL_EDUCATIVO AND a.COD_ASIGNATURA =".$codAsignatura);
    }

    function findAll(){
        return $this->conex->query("SELECT NOMBRE FROM ASIGNATURA");
    }

    function findRelease($codAsignatura){
        //$conex = getConection();
        return $this->conex->query("SELECT c.ASUNTO_COMUNICADO, c. DETALLE_COMUNICADO, a.NOMBRE
        FROM COMUNICADO_ASIGNATURA c, ASIGNATURA a
        WHERE c.COD_ASIGNATURA=a.COD_ASIGNATURA 
        AND c.COD_ASIGNATURA=".$codAsignatura);
    }

    function findAssistance($codRepresentante){
        return $this->conex->query("SELECT a.FECHA, a.ESTADO FROM ASISTENCIA_PERIODO a, PERSONA p
        WHERE a.COD_ALUMNO = p.COD_PERSONA_REPRESENTANTE AND p.COD_PERSONA=".$codRepresentante);
    }

    function findHomework($codAsignatura){
        //$conex = getConection();
        return $this->conex->query("SELECT t.TEMA_TAREA, t.FECHA_ENTREGA, t.DETALLE_TAREA, t.HORA_ENTREGA, a.NOMBRE 
        FROM TAREA_ASIGNATURA t, ASIGNATURA a
        WHERE t.COD_ASIGNATURA=a.COD_ASIGNATURA 
        AND t.COD_ASIGNATURA=".$codAsignatura);
    }

    function findSchedule($codRepresentante, $codAsignatura){
        return $this->conex->query("SELECT h.HORA_INICIO, h.HORA_FIN, a.DIA, p.NOMBRE 
        FROM ASIGNATURA_HORARIO a, HORARIO h, ALUMNO_ASIGNATURA_PERIODO c, PARALELO p, PERSONA r
        WHERE a.COD_ASIG_PERIODO = c.COD_ASIG_PERIODO AND c.COD_PARALELO = p.COD_PARALELO AND h.COD_HORARIO = a.COD_HORARIO AND  
        c.COD_ALUMNO = r.COD_PERSONA_REPRESENTANTE AND r.COD_PERSONA=".$codRepresentante." AND c.COD_ASIGNATURA=".$codAsignatura);
    }
    function updatePassword($password, $codUsuario){
        $stmt = $this->conex->prepare("UPDATE USUARIO set CLAVE=?
        WHERE COD_USUARIO= ?");
        $stmt->bind_param("si", $password,$codUsuario);
        $stmt->execute();
        $stmt->close();
    }
}
?>