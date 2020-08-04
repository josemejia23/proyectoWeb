<?php
include('db.php');
if (isset($_POST['save_Alumno']) && $_POST['accion'] == "Agregar") {
  //-------------------------CREAR REPRESENTANTE--------------------
  $stmt = $conn->prepare("INSERT INTO PERSONA (CEDULA,APELLIDO,NOMBRE,DIRECCION,TELEFONO,FECHA_NACIMIENTO,GENERO,CORREO,CORREO_PERSONAL) VALUES (?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param('sssssssss', $CEDULA_R, $APELLIDO_R, $NOMBRE_R, $DIRECCION_R, $TELEFONO_R, $FECHA_NACIMIENTO_R, $GENERO_R,$CORRE0_R,$CORREO_PERSONAL_R);
  $CEDULA_R = $_POST['CEDULA_R'];
  $APELLIDO_R = $_POST['APELLIDO_R'];
  $NOMBRE_R = $_POST['NOMBRE_R'];
  $DIRECCION_R = $_POST['DIRECCION_R'];
  $TELEFONO_R = $_POST['TELEFONO_R'];
  $FECHA_NACIMIENTO_R = $_POST['FECHA_NACIMIENTO_R'];
  $GENERO_R = $_POST['GENERO_R'];
  $CORRE0_R= crearNombreUsuario($APELLIDO_R, $NOMBRE_R).'@hamilton.com';
  $CORREO_PERSONAL_R = $_POST['CORREO_PERSONAL_R'];
  $stmt->execute();
  $stmt->close();
  //ASIGNAR ROL REPRESENTANTE
  $resp = '"%' . $_POST['CEDULA_R'] .'%"';
  $result_code = $conn->query("SELECT COD_PERSONA FROM PERSONA WHERE CEDULA LIKE" . $resp);
  $row = mysqli_fetch_assoc($result_code);
  $COD_PERSONA_R =$row['COD_PERSONA'];
  $stmt2 = $conn->prepare("INSERT INTO TIPO_PERSONA_PERSONA (COD_TIPO_PERSONA,COD_PERSONA,ESTADO,FECHA_INICIO) VALUES (?,?,?,?)");
  $stmt2->bind_param('iiss', $COD_TIPO_PERSONA_R, $COD_PERSONA_R, $ESTADO_R,$FECHA_INICIO_R);
  $COD_TIPO_PERSONA_R = 5;
  $ESTADO_R = 'ACT';
  $FECHA_INICIO_R=date("d/m/Y"); 
  $stmt2->execute();
  $stmt2->close();
  //CREAR USUARIO REPRESENTANTE
  $stmt3 = $conn->prepare("INSERT INTO USUARIO (COD_PERSONA, NOMBRE_USUARIO,CLAVE,ESTADO,INTENTOS_FALLIDOS) VALUES (?,?,?,?,?)");
  $stmt3->bind_param('isssi', $COD_PERSONA_R, $NOMBRE_USUARIO_R, $CLAVE_R, $ESTADO_R, $INTENTOS_FALLIDOS_R);
  $NOMBRE_USUARIO_R=crearNombreUsuario($APELLIDO_R, $NOMBRE_R);
  $CLAVE_R=crearPassword($FECHA_NACIMIENTO_R);
  $ESTADO_R='ACT';
  $INTENTOS_FALLIDOS_R=0;
  $stmt3->execute();
  $stmt3->close();

  //-------------------------CREAR ALUMNO--------------------
  $stmt = $conn->prepare("INSERT INTO PERSONA (COD_PERSONA_REPRESENTANTE, CEDULA,APELLIDO,NOMBRE,DIRECCION,TELEFONO,FECHA_NACIMIENTO,GENERO,CORREO,CORREO_PERSONAL) VALUES (?,?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param('isssssssss',$COD_PERSONA_R, $CEDULA, $APELLIDO, $NOMBRE, $DIRECCION, $TELEFONO, $FECHA_NACIMIENTO, $GENERO,$CORRE0,$CORREO_PERSONAL);
  $CEDULA = $_POST['CEDULA'];
  $APELLIDO = $_POST['APELLIDO'];
  $NOMBRE = $_POST['NOMBRE'];
  $DIRECCION = $_POST['DIRECCION'];
  $TELEFONO = $_POST['TELEFONO'];
  $FECHA_NACIMIENTO = $_POST['FECHA_NACIMIENTO'];
  $GENERO = $_POST['GENERO'];
  $CORRE0= crearNombreUsuario($APELLIDO, $NOMBRE).'@hamilton.com';
  $CORREO_PERSONAL = $_POST['CORREO_PERSONAL'];
  $stmt->execute();
  $stmt->close();
  //ASIGNAR ROL ROL ALUMNO
  $resp = '"%' . $_POST['CEDULA'] .'%"';
  $result_code = $conn->query("SELECT COD_PERSONA FROM PERSONA WHERE CEDULA LIKE" . $resp);
  $row = mysqli_fetch_assoc($result_code);
  $COD_PERSONA =$row['COD_PERSONA'];
  $stmt2 = $conn->prepare("INSERT INTO TIPO_PERSONA_PERSONA (COD_TIPO_PERSONA,COD_PERSONA,ESTADO,FECHA_INICIO) VALUES (?,?,?,?)");
  $stmt2->bind_param('iiss', $COD_TIPO_PERSONA, $COD_PERSONA, $ESTADO,$FECHA_INICIO);
  $COD_TIPO_PERSONA = 4;
  $ESTADO = 'ACT';
  $FECHA_INICIO=date("d/m/Y"); 
  $stmt2->execute();
  $stmt2->close();
  //CREAR USUARIO ALUMNO
  $stmt3 = $conn->prepare("INSERT INTO USUARIO (COD_PERSONA, NOMBRE_USUARIO,CLAVE,ESTADO,INTENTOS_FALLIDOS) VALUES (?,?,?,?,?)");
  $stmt3->bind_param('isssi', $COD_PERSONA, $NOMBRE_USUARIO, $CLAVE, $ESTADO, $INTENTOS_FALLIDOS);
  $NOMBRE_USUARIO=crearNombreUsuario($APELLIDO, $NOMBRE);
  $CLAVE=crearPassword($FECHA_NACIMIENTO);
  $ESTADO='ACT';
  $INTENTOS_FALLIDOS=0;
  $stmt3->execute();
  $stmt3->close();
  header('Location: addAlumn.php');
} 

?>

<?php
function crearNombreUsuario($APELLIDO,$NOMBRE)
{
  $inicial=substr(strtolower ($NOMBRE), 0, 2);
  return $inicial.strtolower ($APELLIDO);
}
?>
<?php
function crearPassword($FECHA_NACIMIENTO)
{
  $extDia=substr($FECHA_NACIMIENTO, -2);
   $extMes=substr($FECHA_NACIMIENTO, 5,2);
  $extAnio=substr($FECHA_NACIMIENTO, 0,4);
  $password= $extDia.$extMes.$extAnio;
  return $password;
  
}
?>



