<?php
//CONEXION
include 'mainService.php';

class AlumnoService extends MainService {

      //ESTUDIANTES Y REPRESENTANTES
      function añadirEstudiante($cod_representante,$cedula,$apellido,$nombre,$direccion,$telefono,$fecha_nacimiento,$genero,$correo,$correo_personal)
      {
          $stmt = $this->conexion->prepare("INSERT INTO persona (COD_PERSONA_REPRESENTANTE,CEDULA,APELLIDO,NOMBRE,DIRECCION,TELEFONO,FECHA_NACIMIENTO,
                                                                GENERO,CORREO,CORREO_PERSONAL) 
                                            VALUES (?,?,?,?,?,?,?,?,?,?)");
          $stmt->bind_param('isssssssss',$cod_representante,$cedula,$apellido,$nombre,$direccion,$telefono,$fecha_nacimiento,$genero,$correo,$correo_personal);
          $stmt->execute();
          $stmt->close();
      }
      function encontrarUsuario($cod_persona)
      {
          $result = $this->conexion->query("SELECT * FROM usuario WHERE COD_PERSONA='".$cod_persona."'");
          if($result->num_rows>0)
          {
              return $result->fetch_assoc();
          }
          else
          {
              return null;
          }
      }
      function añadirRolUsuario($cod_rol,$cod_usuario,$estado)
      {
          $stmt = $this->conexion->prepare("INSERT INTO rol_usuario(COD_ROL,COD_USUARIO,ESTADO) 
                                            VALUES (?,?,?)");
          $stmt->bind_param('sis',$cod_rol,$cod_usuario,$estado);
          $stmt->execute();
          $stmt->close();
      }
  

    function findGrades($codAlumno){
        return $this->conex->query("SELECT a.NOMBRE, c.NOTA1, c.NOTA2, c.NOTA3, 
        c.NOTA4, c.NOTA5, c.NOTA6, c.NOTA7, c.NOTA8, c.NOTA9, c.NOTA10 FROM 
        ASIGNATURA a, ALUMNO_ASIGNATURA_PERIODO c WHERE a.COD_ASIGNATURA = c.COD_ASIGNATURA 
        AND c.COD_ALUMNO =".$codAlumno);
    }
    
    function findSubjet($codAlumno){
        return $this->conex->query("SELECT n.NOMBRE_NIVEL, n.NIVEL, a.NOMBRE, a.COD_ASIGNATURA FROM ASIGNATURA a, NIVEL_EDUCATIVO n, ALUMNO_ASIGNATURA_PERIODO c
        WHERE a.COD_ASIGNATURA = c.COD_ASIGNATURA AND n.COD_NIVEL_EDUCATIVO = c.COD_NIVEL_EDUCATIVO 
        AND c.COD_ALUMNO =".$codAlumno);
    }
    
    function findLevel($codAlumno){
        return $this->conex->query("SELECT n.NOMBRE_NIVEL, n.NIVEL, a.COD_ASIGNATURA FROM NIVEL_EDUCATIVO n, ALUMNO_ASIGNATURA_PERIODO a
        WHERE n.COD_NIVEL_EDUCATIVO = a.COD_NIVEL_EDUCATIVO 
        AND a.COD_ALUMNO =".$codAlumno);
    }

    function findSubjetByCode($codAsignatura){
        return $this->conex->query("SELECT a.NOMBRE, a.COD_ASIGNATURA, n.NIVEL, n.NOMBRE_NIVEL FROM ASIGNATURA a, NIVEL_EDUCATIVO n
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

    function findAssistance($codAlumno){
        return $this->conex->query("SELECT FECHA, ESTADO FROM ASISTENCIA_PERIODO WHERE COD_ALUMNO =".$codAlumno);
    }

    function findHomework($codAsignatura){
        //$conex = getConection();
        return $this->conex->query("SELECT t.TEMA_TAREA, t.FECHA_ENTREGA, t.DETALLE_TAREA, t.HORA_ENTREGA, a.NOMBRE 
        FROM TAREA_ASIGNATURA t, ASIGNATURA a
        WHERE t.COD_ASIGNATURA=a.COD_ASIGNATURA 
        AND t.COD_ASIGNATURA=".$codAsignatura);
    }

    function findSchedule($codAlumno, $codAsignatura){
        return $this->conex->query("SELECT h.HORA_INICIO, h.HORA_FIN, a.DIA, p.NOMBRE 
        FROM ASIGNATURA_HORARIO a, HORARIO h, ALUMNO_ASIGNATURA_PERIODO c, PARALELO p
        WHERE a.COD_ASIG_PERIODO = c.COD_ASIG_PERIODO AND c.COD_PARALELO = p.COD_PARALELO AND h.COD_HORARIO = a.COD_HORARIO AND  
        c.COD_ALUMNO =".$codAlumno." AND c.COD_ASIGNATURA=".$codAsignatura);
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