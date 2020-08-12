 
<?php
include 'mainService.php';
class DoceService extends MainService{
    //DEVUELVE PERIODOS ACTIVOS
    function findAllPeriodosAct() {
        $result= $this->conex->query("SELECT p.COD_PERIODO_LECTIVO, p.FECHA_INICIO, p.FECHA_FIN FROM PERIODO_LECTIVO p WHERE p.ESTADO like'ACT'");
        return $result;
    }
    //DEVUELVE HORARIO DE ASIGNATURAS
    function findAllAsignaturasHorario($codAsignatura) {
        $result= $this->conex->query("SELECT *, asi.NOMBRE as ASIGNATURA, p.NOMBRE as PARALELO, al.NOMBRE as AULA FROM ASIGNATURA_HORARIO a, HORARIO h, ASIGNATURA_PERIODO ap, ASIGNATURA asi, PARALELO p, NIVEL_EDUCATIVO n, AULA al WHERE a.COD_HORARIO=h.COD_HORARIO AND a.COD_ASIG_PERIODO=ap.COD_ASIG_PERIODO AND ap.COD_ASIGNATURA=asi.COD_ASIGNATURA AND ap.COD_PARALELO=p.COD_PARALELO AND ap.COD_NIVEL_EDUCATIVO=n.COD_NIVEL_EDUCATIVO AND ap.COD_AULA=al.COD_AULA AND a.COD_ASIG_PERIODO='$codAsignatura'");
        return $result;
    }
    //DEVUELVE TAREAS ENVIADAS POR DOCENTE DE LA ASIGNATURA
    function findAllTareasAsignatura($codAsigPeriodo) {
        $result= $this->conex->query("SELECT * FROM TAREA_ASIGNATURA WHERE COD_ASIG_PERIODO='$codAsigPeriodo'");
        return $result;
    }
    //DEVUELVE TAREAS ENVIADAS POR DOCENTE DE LA ASIGNATURA
    function findAllComunicadosAsignatura($codAsigPeriodo) {
        $result= $this->conex->query("SELECT * FROM COMUNICADO_ASIGNATURA WHERE COD_ASIG_PER='$codAsigPeriodo'");
        return $result;
    }
    //DEVUELVE PERIODOS ACTIVOS
    function findbyPkPeriodosAct() {
        $result= $this->conex->query("SELECT p.COD_PERIODO_LECTIVO, p.FECHA_INICIO, p.FECHA_FIN FROM PERIODO_LECTIVO p WHERE p.ESTADO like'ACT'");
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //DEVUELVE TAREA POR CODIGO TAREA
    function findbyPkTarea($codTarea) {
        $result= $this->conex->query("SELECT * FROM TAREA_ASIGNATURA WHERE COD_TAREA='$codTarea'");
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //DEVUELVE COMUNICADO
    function findbyPkComunicado($codComunicado) {
        $result= $this->conex->query("SELECT * FROM COMUNICADO_ASIGNATURA WHERE COD_COMUNICADO='$codComunicado'");
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //DEVUELVE NOMBRE Y NIVEL ASIGNATURA 
    function findbyPkAsignaturaNivel($codAsignatura) {
        $result= $this->conex->query("SELECT * FROM ASIGNATURA a, NIVEL_EDUCATIVO n WHERE a.COD_NIVEL_EDUCATIVO=n.COD_NIVEL_EDUCATIVO AND a.COD_ASIGNATURA='$codAsignatura'");
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //DEVUELVE LA MATRICULA
    function findbyPkMatricula($codAlumno, $codNivel, $codPeriodo) {
        $result= $this->conex->query("SELECT * FROM MATRICULA_PERIODO WHERE COD_ALUMNO='$codAlumno' AND COD_NIVEL_EDUCATIVO='$codNivel' AND COD_PERIODO_LECTIVO='$codPeriodo'");
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //DEVUELVE NIVEL Y ASIGNATURAS DEL DOCENTE---borrar luego
    function findAllAsigPerDocente($codPeriodo, $codDocente) {
        $result= $this->conex->query("SELECT  *, pr.NOMBRE AS PARALELO, a.NOMBRE AS ASIGNATURA, al.NOMBRE as AULA FROM AULA al, ASIGNATURA_PERIODO ap, PERIODO_LECTIVO p, ASIGNATURA a, NIVEL_EDUCATIVO n, PARALELO pr WHERE ap.COD_AULA=al.COD_AULA AND ap.COD_PARALELO=pr.COD_PARALELO AND ap.COD_PERIODO_LECTIVO=p.COD_PERIODO_LECTIVO AND ap.COD_ASIGNATURA=a.COD_ASIGNATURA AND ap.COD_NIVEL_EDUCATIVO=n.COD_NIVEL_EDUCATIVO
        AND p.COD_PERIODO_LECTIVO='$codPeriodo' AND ap.COD_DOCENTE='$codDocente'");
        return $result;
    }
    //DEVUELVE NIVEL Y ASIGNATURAS DEL DOCENTE---se queda
    function findAllAsignaturasDocente($codPeriodo, $codDocente, $codNivel) {
        $result= $this->conex->query("SELECT * FROM ASIGNATURA_PERIODO al, ASIGNATURA a WHERE al.COD_ASIGNATURA=a.COD_ASIGNATURA AND al.COD_PERIODO_LECTIVO='$codPeriodo' AND al.COD_DOCENTE='$codDocente' AND al.COD_NIVEL_EDUCATIVO='$codNivel' GROUP BY al.COD_ASIGNATURA");
        return $result;
    }
    //DEVUELVE NIVELES DEL PERIODO SELECCIONADO EN LOS QUE DOCENTE DA CLASES 
    function findAllNivelesDocente($codPeriodo, $codDocente) {
        $result= $this->conex->query("SELECT * FROM ASIGNATURA_PERIODO a, NIVEL_EDUCATIVO n WHERE a.COD_NIVEL_EDUCATIVO=n.COD_NIVEL_EDUCATIVO AND a.COD_DOCENTE='$codDocente' AND a.COD_PERIODO_LECTIVO='$codPeriodo' GROUP BY a.COD_NIVEL_EDUCATIVO");
        return $result;
    }
    //DEVUELVE ASISTENCIAS DE ALUMNOS DEL NIVEL Y FECHA ESCOGIDAS
    function findAllAlumnosFechaAsist($codNivel, $codFecha) {
        $result= $this->conex->query("SELECT * FROM ASISTENCIA_PERIODO a, PERSONA p WHERE a.COD_ALUMNO=p.COD_PERSONA AND
        a.COD_NIVEL_EDUCATIVO='$codNivel' AND a.FECHA='$codFecha' ORDER BY p.APELLIDO");
        return $result;
    }
    //DEVUELVE ESTUDIANTES DEL NIVEL
    function findAllEstudiantes($codNivel) {
        $result= $this->conex->query("SELECT * FROM MATRICULA_PERIODO m, NIVEL_EDUCATIVO n, PERSONA p, PERIODO_LECTIVO pe WHERE 
        m.COD_ALUMNO=p.COD_PERSONA AND m.COD_NIVEL_EDUCATIVO=n.COD_NIVEL_EDUCATIVO AND m.COD_PERIODO_LECTIVO=pe.COD_PERIODO_LECTIVO AND
        n.COD_NIVEL_EDUCATIVO='$codNivel'");
        return $result;
    }
    //DEVUELVE PARALELOS DE ASIGNATURA
    function findAllParalelos($codPeriodo, $codNivel, $codAsignatura, $codDocente) {
        $result= $this->conex->query("SELECT * FROM ASIGNATURA_PERIODO ap, PARALELO p WHERE ap.COD_PARALELO=p.COD_PARALELO AND ap.COD_PERIODO_LECTIVO='$codPeriodo' AND ap.COD_NIVEL_EDUCATIVO='$codNivel' AND ap.COD_ASIGNATURA='$codAsignatura' AND ap.COD_DOCENTE=$codDocente");
        return $result;
    }
    //DEVUELVO ALUMNOS DE ASIGNATURA Y MISMO DOCENTE - LISTA ALUMNOS--ya no
    function findAllAsigPerDocAlumno($codPeriodo) {
        $result= $this->conex->query("SELECT * FROM ASIGNATURA_PERIODO a, ASIGNATURA asi, NIVEL_EDUCATIVO n, ALUMNO_ASIGNATURA_PERIODO al, MATRICULA_PERIODO m, PERSONA p 
        WHERE a.COD_ASIGNATURA=asi.COD_ASIGNATURA AND a.COD_NIVEL_EDUCATIVO=n.COD_NIVEL_EDUCATIVO AND a.COD_ASIG_PERIODO= al.COD_ASIG_PERIODO AND al.COD_ALUMNO=m.COD_ALUMNO AND m.COD_ALUMNO=p.COD_PERSONA
        AND a.COD_ASIG_PERIODO='$codPeriodo'");
        return $result;
    }
    //DEVUELVO ALUMNOS DE ASIGNATURA Y MISMO DOCENTE y PARALELO - LISTA ALUMNOS--esta si
    function findAllAlumnosAsignatura($codPeriodo, $codNivel, $codDocente, $codAsignatura, $codParalelo) {
        $result= $this->conex->query("SELECT * FROM PERSONA p, ALUMNO_ASIGNATURA_PERIODO asp WHERE asp.COD_ALUMNO=p.COD_PERSONA AND asp.COD_PERIODO_LECTIVO='$codPeriodo' AND asp.COD_NIVEL_EDUCATIVO='$codNivel' AND asp.COD_DOCENTE='$codDocente' AND asp.COD_ASIGNATURA='$codAsignatura' AND asp.COD_PARALELO='$codParalelo' ORDER BY p.APELLIDO");
        return $result;
    }
    //DEVUELVE NOMBRE MATERIA Y NIVEL, NOMBRE NIVEL SEGUN EL COD_ASIG_PER-->ESTE CODIGO SE AGREGO EN TABLAS ASIGNATURA_PERIODO Y ALUMNO_ASSIGNATURA_PERIODO--EN EL MODELO NO ESTA SE AGREGO DIRECTO EN LA BASE
    function findByPKAsigPer($codAsigPer) {
        $result= $this->conex->query("SELECT *, p.NOMBRE as PARALELO, asi.NOMBRE as ASIGNATURA FROM ASIGNATURA_PERIODO a, ASIGNATURA asi, NIVEL_EDUCATIVO n, PARALELO p 
        WHERE a.COD_PARALELO=p.COD_PARALELO AND a.COD_ASIGNATURA=asi.COD_ASIGNATURA AND a.COD_NIVEL_EDUCATIVO=n.COD_NIVEL_EDUCATIVO AND a.COD_ASIG_PERIODO='$codAsigPer'");
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //DEVUELVE COD_ASIG_PER DEL ALUMNO 
    function findByPKCodAsigAlumno($codPeriodo, $codNivel, $codDocente, $codAsignatura, $codParalelo, $codAlumno) {
        $result= $this->conex->query("SELECT * FROM PERSONA p, ALUMNO_ASIGNATURA_PERIODO asp WHERE asp.COD_ALUMNO=p.COD_PERSONA AND asp.COD_PERIODO_LECTIVO='$codPeriodo' AND asp.COD_NIVEL_EDUCATIVO='$codNivel' AND asp.COD_DOCENTE='$codDocente' AND asp.COD_ASIGNATURA='$codAsignatura' AND asp.COD_PARALELO='$codParalelo' AND asp.COD_ALUMNO='$codAlumno'");
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
    function updateNotasAlumnoPrimer($nota1,$nota2,$nota3, $nota4, $nota5,$codAsigPeriodo, $codAlumno) {
        $stmt = $this->conex->prepare("UPDATE ALUMNO_ASIGNATURA_PERIODO set NOTA1=?,NOTA2=?, NOTA3=?, NOTA4=?,NOTA5=?
        WHERE COD_ASIG_PERIODO= ? AND COD_ALUMNO=?");
        $stmt->bind_param("dddddii", $nota1,$nota2,$nota3, $nota4, $nota5,$codAsigPeriodo, $codAlumno);
        $stmt->execute();
        $stmt->close();
    }
    function updateNotasAlumnoSegundo($nota6, $nota7, $nota8, $nota9, $nota10, $nota11, $codAsigPeriodo, $codAlumno) {
        $stmt = $this->conex->prepare("UPDATE ALUMNO_ASIGNATURA_PERIODO set NOTA6=?, NOTA7=?, NOTA8=?, NOTA9=?, NOTA10=?, NOTA11=?
        WHERE COD_ASIG_PERIODO= ? AND COD_ALUMNO=?");
        $stmt->bind_param("ddddddii", $nota6, $nota7, $nota8, $nota9, $nota10, $nota11, $codAsigPeriodo, $codAlumno);
        $stmt->execute();
        $stmt->close();
    }
    /*//ACTUALIZAR NOTAS PROMEDIOS EN TABLA MATRICULA PERIODO
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
    }*/
    function updatePromedioAlumnoAsigPer($promedio,$codalumno) {
        $stmt = $this->conex->prepare("UPDATE ALUMNO_ASIGNATURA_PERIODO set NOTA11=?
        WHERE COD_ALUMNO= ?");
        $stmt->bind_param("di", $promedio,$codalumno);
        $stmt->execute();
        $stmt->close();
    }
    //MODIFICAR TAREA
    function updateTareas($tema, $fecha, $detalle, $hora, $codTarea) {
        $stmt = $this->conex->prepare("UPDATE TAREA_ASIGNATURA set TEMA_TAREA=?, FECHA_ENTREGA=?, DETALLE_TAREA=?, HORA_ENTREGA=?
        WHERE COD_TAREA= ?");
        $stmt->bind_param("ssssi", $tema, $fecha, $detalle, $hora, $codTarea);
        $stmt->execute();
        $stmt->close();
    }
    //MODIFICAR COMUNICADO
    function updateComunicados($asunto, $detalle, $fecha, $codComunicado) {
        $stmt = $this->conex->prepare("UPDATE COMUNICADO_ASIGNATURA set ASUNTO_COMUNICADO=?, DETALLE_COMUNICADO=?, FECHA=?
        WHERE COD_COMUNICADO= ?");
        $stmt->bind_param("sssi", $asunto, $detalle, $fecha, $codComunicado);
        $stmt->execute();
        $stmt->close();
    }
    //INSERTAR ASISTENCIA ALUMNO
    function insertAsistencia($codMatricula, $codalumno, $codPeriodo, $codNivel, $estado, $fecha){
        $stmt = $this->conex->prepare("INSERT INTO ASISTENCIA_PERIODO (COD_MATRICULA, COD_ALUMNO, COD_PERIODO_LECTIVO, COD_NIVEL_EDUCATIVO, ESTADO, FECHA) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiiss", $codMatricula, $codalumno, $codPeriodo, $codNivel, $estado, $fecha);
        $stmt->execute();
        $stmt->close();
    }
    //INSERTAR TAREA ASIGNATURA
    function insertTarea($codAsignatura, $codNivel, $codPeriodo, $codDocente, $codParalelo, $tema, $fecha, $detalle, $hora, $codAsiPer){
        $stmt = $this->conex->prepare("INSERT INTO TAREA_ASIGNATURA (COD_ASIGNATURA,  COD_NIVEL_EDUCATIVO, COD_PERIODO_LECTIVO, COD_DOCENTE, COD_PARALELO, TEMA_TAREA, FECHA_ENTREGA, DETALLE_TAREA, HORA_ENTREGA, COD_ASIG_PERIODO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiiissssi", $codAsignatura, $codNivel, $codPeriodo, $codDocente, $codParalelo, $tema, $fecha, $detalle, $hora, $codAsiPer);
        $stmt->execute();
        $stmt->close();
    }
    //INSERTAR COMUNICADO ASIGNATURA
    function insertComunicado($codAsignatura, $codNivel, $codPeriodo, $codDocente, $codParalelo, $asunto, $detalle, $fecha, $codAsigPeriodo){
        $stmt = $this->conex->prepare("INSERT INTO COMUNICADO_ASIGNATURA (COD_ASIGNATURA,  COD_NIVEL_EDUCATIVO, COD_PERIODO_LECTIVO, COD_DOCENTE, COD_PARALELO, ASUNTO_COMUNICADO, DETALLE_COMUNICADO, FECHA, COD_ASIG_PER) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiiisssi", $codAsignatura, $codNivel, $codPeriodo, $codDocente, $codParalelo, $asunto, $detalle, $fecha, $codAsigPeriodo);
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
    //DEVUELVE LA MATRICULA
    function findbyPkPersona($codPersona) {
        $result= $this->conex->query("SELECT * FROM PERSONA WHERE COD_PERSONA='$codPersona' ");
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    function updatePersona($direccion, $telefono, $fecha, $correo, $codPersona) {
        $stmt = $this->conex->prepare("UPDATE PERSONA set DIRECCION=?, TELEFONO=?, FECHA_NACIMIENTO=?, CORREO_PERSONAL=?
        WHERE COD_PERSONA= ?");
        $stmt->bind_param("ssssi", $direccion, $telefono, $fecha, $correo, $codPersona);
        $stmt->execute();
        $stmt->close();
    }
}
?>