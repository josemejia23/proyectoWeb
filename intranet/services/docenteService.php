<?php
include 'mainService.php';
class DocenteService extends MainService{
    //DEVUELVE PERIODOS ACTIVOS
    function findAllPeriodosAct() {
        $result= $this->conex->query("SELECT p.COD_PERIODO_LECTIVO, p.FECHA_INICIO, p.FECHA_FIN FROM PERIODO_LECTIVO p WHERE p.ESTADO like'ACT'");
        return $result;
    }
    //DEVUELVE NIVEL Y ASIGNATURAS DEL DOCENTE
    function findAllAsigPerDocente($codPeriodo, $codDocente) {
        $result= $this->conex->query("SELECT  * FROM ASIGNATURA_PERIODO ap, PERIODO_LECTIVO p, ASIGNATURA a, NIVEL_EDUCATIVO n WHERE ap.COD_PERIODO_LECTIVO=p.COD_PERIODO_LECTIVO AND ap.COD_ASIGNATURA=a.COD_ASIGNATURA AND ap.COD_NIVEL_EDUCATIVO=n.COD_NIVEL_EDUCATIVO
        AND p.COD_PERIODO_LECTIVO='$codPeriodo' AND ap.COD_DOCENTE='$codDocente'");
        return $result;
    }
    //DEVUELVE ASISTENCIAS DE ALUMNOS DEL NIVEL Y FECHA ESCOGIDAS
    function findAllAlumnosFechaAsist($codNivel, $codFecha) {
        $result= $this->conex->query("SELECT * FROM ASISTENCIA_PERIODO a, MATRICULA_PERIODO m, PERSONA p WHERE 
        a.COD_ALUMNO= m.COD_ALUMNO AND m.COD_ALUMNO=p.COD_PERSONA AND
        a.COD_NIVEL_EDUCATIVO='$codNivel' AND a.FECHA='$codFecha'");
        return $result;
    }
    //DEVUELVE ESTUDIANTES DEL NIVEL
    function findAllEstudiantes($codNivel) {
        $result= $this->conex->query("SELECT * FROM MATRICULA_PERIODO m, NIVEL_EDUCATIVO n, PERSONA p, PERIODO_LECTIVO pe WHERE 
        m.COD_ALUMNO=p.COD_PERSONA AND m.COD_NIVEL_EDUCATIVO=n.COD_NIVEL_EDUCATIVO AND m.COD_PERIODO_LECTIVO=pe.COD_PERIODO_LECTIVO AND
        n.COD_NIVEL_EDUCATIVO='$codNivel'");
        return $result;
    }
    //DEVUELVO ALUMNOS DE ASIGNATURA Y MISMO DOCENTE - LISTA ALUMNOS
    function findAllAsigPerDocAlumno($codPeriodo) {
        $result= $this->conex->query("SELECT * FROM ASIGNATURA_PERIODO a, ASIGNATURA asi, NIVEL_EDUCATIVO n, ALUMNO_ASIGNATURA_PERIODO al, MATRICULA_PERIODO m, PERSONA p 
        WHERE a.COD_ASIGNATURA=asi.COD_ASIGNATURA AND a.COD_NIVEL_EDUCATIVO=n.COD_NIVEL_EDUCATIVO AND a.COD_ASIG_PERIODO= al.COD_ASIG_PERIODO AND al.COD_ALUMNO=m.COD_ALUMNO AND m.COD_ALUMNO=p.COD_PERSONA
        AND a.COD_ASIG_PERIODO='$codPeriodo'");
        return $result;
    }
    //DEVUELVE NOMBRE MATERIA Y NIVEL, NOMBRE NIVEL SEGUN EL COD_ASIG_PER-->ESTE CODIGO SE AGREGO EN TABLAS ASIGNATURA_PERIODO Y ALUMNO_ASSIGNATURA_PERIODO--EN EL MODELO NO ESTA SE AGREGO DIRECTO EN LA BASE
    function findByPKAsigPer($codAsigPer) {
        $result= $this->conex->query("SELECT * FROM ASIGNATURA_PERIODO a, ASIGNATURA asi, NIVEL_EDUCATIVO n 
        WHERE a.COD_ASIGNATURA=asi.COD_ASIGNATURA AND a.COD_NIVEL_EDUCATIVO=n.COD_NIVEL_EDUCATIVO AND a.COD_ASIG_PERIODO='$codAsigPer'");
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //BUSCA ALUMNO EN TABLA ALUMNO_ASIGNATURA_PERIODO
    function findByPKAlumAsigPeriodo($codAlumno) {
        $result= $this->conex->query("SELECT * FROM ALUMNO_ASIGNATURA_PERIODO WHERE COD_ALUMNO='$codAlumno'");
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //BUSCA DATOS ALUMNO SEGUN COD ALUMNO 
    function findByPKAlumno($codAlumno) {
        $result= $this->conex->query("SELECT * FROM PERSONA WHERE COD_PERSONA='$codAlumno'");
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //BUSCA SI EL ALUMNO TIENE REGISTRADO ASISTENCIAS PARA MODIFICAR
    function findByPKAlumnoAsistencia($codAlumno) {
        $result= $this->conex->query("SELECT * FROM ASISTENCIA_PERIODO WHERE COD_ALUMNO='$codAlumno'");
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //INGRESO DE CALIFICACIONES DE ALUMNO primer quimestre, modifica la tabla alumno_asignatura_periodo con las notas
    function updateNotasAlumnoPrimer($nota1,$nota2,$nota3, $nota4, $nota5,$codalumno) {
        $stmt = $this->conex->prepare("UPDATE ALUMNO_ASIGNATURA_PERIODO set NOTA1=?,NOTA2=?, NOTA3=?, NOTA4=?,NOTA5=?
        WHERE COD_ALUMNO= ?");
        $stmt->bind_param("dddddi", $nota1,$nota2,$nota3, $nota4, $nota5,$codalumno);
        $stmt->execute();
        $stmt->close();
    }
    function updateNotasAlumnoSegundo($nota6, $nota7, $nota8, $nota9, $nota10,$codalumno) {
        $stmt = $this->conex->prepare("UPDATE ALUMNO_ASIGNATURA_PERIODO set NOTA6=?, NOTA7=?, NOTA8=?, NOTA9=?, NOTA10=?
        WHERE COD_ALUMNO= ?");
        $stmt->bind_param("dddddi", $nota6, $nota7, $nota8, $nota9, $nota10,$codalumno);
        $stmt->execute();
        $stmt->close();
    }
    //ACTUALIZAR NOTAS PROMEDIOS EN TABLA MATRICULA PERIODO
    function updatePromedioAlumno1Q($promedioq1,$codalumno) {
        $stmt = $this->conex->prepare("UPDATE MATRICULA_PERIODO set PROMEDIOQ1=?
        WHERE COD_ALUMNO= ?");
        $stmt->bind_param("di", $promedioq1,$codalumno);
        $stmt->execute();
        $stmt->close();
    }
    function updatePromedioAlumno2Q($promedioq2,$codalumno) {
        $stmt = $this->conex->prepare("UPDATE MATRICULA_PERIODO set PROMEDIOQ2=?
        WHERE COD_ALUMNO= ?");
        $stmt->bind_param("di", $promedioq2,$codalumno);
        $stmt->execute();
        $stmt->close();
    }
    function updatePromedioAlumnoPF($promedio,$codalumno) {
        $stmt = $this->conex->prepare("UPDATE MATRICULA_PERIODO set PROMEDIO_FINAL=?
        WHERE COD_ALUMNO= ?");
        $stmt->bind_param("di", $promedio,$codalumno);
        $stmt->execute();
        $stmt->close();
    }
    //INSERTAR ASISTENCIA ALUMNO
    function insertAsistencia($codalumno, $codPeriodo, $codNivel, $estado, $fecha){
        $stmt = $this->conex->prepare("INSERT INTO ASISTENCIA_PERIODO (COD_ALUMNO, COD_PERIODO_LECTIVO, COD_NIVEL_EDUCATIVO, ESTADO, FECHA) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $codalumno, $codPeriodo, $codNivel, $estado, $fecha);
        $stmt->execute();
        $stmt->close();
    }
    //MODIFICAR ASISTENCIA ALUMNO
    function updateAsistenciaAlumno($estado, $codAlumno) {
        $stmt = $this->conex->prepare("UPDATE ASISTENCIA_PERIODO set ESTADO=?
        WHERE COD_ALUMNO= ?");
        $stmt->bind_param("si", $estado, $codAlumno);
        $stmt->execute();
        $stmt->close();
    }
}
?>