<?php

include('db.php');

if (isset($_POST['save_Personal']) && $_POST['accion'] == "Agregar") {
  $stmt = $conn->prepare("INSERT INTO PERSONA (CEDULA,APELLIDO,NOMBRE,DIRECCION,TELEFONO,FECHA_NACIMIENTO,GENERO,CORREO,CORREO_PERSONAL) VALUES (?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param('sssssssss', $CEDULA, $APELLIDO, $NOMBRE, $DIRECCION, $TELEFONO, $FECHA_NACIMIENTO, $GENERO,$CORRE0,$CORREO_PERSONAL);
  $CEDULA = $_POST['CEDULA'];
  $APELLIDO = $_POST['APELLIDO'];
  $NOMBRE = $_POST['NOMBRE'];
  $DIRECCION = $_POST['DIRECCION'];
  $TELEFONO = $_POST['TELEFONO'];
  $FECHA_NACIMIENTO = $_POST['FECHA_NACIMIENTO'];
  $GENERO = $_POST['GENERO'];
  $CORRE0= crearNombreUsuario($APELLIDO, $NOMBRE).'@homilton.com';
  $CORREO_PERSONAL = $_POST['CORREO_PERSONAL'];
  $stmt->execute();
  $stmt->close();
  //crear TIPO PERSONA-PERSONA
  $resp = '"%' . $_POST['CEDULA'] .'%"';
  $result_code = $conn->query("SELECT COD_PERSONA FROM PERSONA WHERE CEDULA LIKE" . $resp);
  $row = mysqli_fetch_assoc($result_code);
  $COD_PERSONA =$row['COD_PERSONA'];
  $stmt2 = $conn->prepare("INSERT INTO TIPO_PERSONA_PERSONA (COD_TIPO_PERSONA,COD_PERSONA,ESTADO,FECHA_INICIO) VALUES (?,?,?,?)");
  $stmt2->bind_param('iiss', $COD_TIPO_PERSONA, $COD_PERSONA, $ESTADO,$FECHA_INICIO);
  $COD_TIPO_PERSONA = $_POST['COD_ROL'];
  $ESTADO = 'ACT';
  echo $FECHA_INICIO=date("d/m/Y"); 
  $stmt2->execute();
  $stmt2->close();
  //CREAR USUARIO SISTEMA
  $stmt3 = $conn->prepare("INSERT INTO USUARIO (COD_PERSONA, NOMBRE_USUARIO,CLAVE,ESTADO,INTENTOS_FALLIDOS) VALUES (?,?,?,?,?)");
  $stmt3->bind_param('isssi', $COD_PERSONA, $NOMBRE_USUARIO, $CLAVE, $ESTADO, $INTENTOS_FALLIDOS);
  $NOMBRE_USUARIO=crearNombreUsuario($APELLIDO, $NOMBRE);
  $CLAVE=crearPassword($FECHA_NACIMIENTO);
  $ESTADO='ACT';
  $INTENTOS_FALLIDOS=0;
  $stmt3->execute();
  $stmt3->close();
  header('Location: agregarPersonal.php');
} elseif (isset($_POST['save_Personal']) && $_POST['accion'] == "Modificar") {
  $_POST['COD_PERSONA'];
  $stmt = $conn->prepare("UPDATE PERSONA SET CEDULA=? , APELLIDO=? , NOMBRE=? , DIRECCION=? , TELEFONO=? , FECHA_NACIMIENTO=? ,GENERO=? ,CORREO_PERSONAL=? WHERE COD_PERSONA=" . $_POST['COD_PERSONA']);
  $stmt->bind_param('ssssssss', $CEDULA, $APELLIDO, $NOMBRE, $DIRECCION, $TELEFONO, $FECHA_NACIMIENTO, $GENERO, $CORREO_PERSONAL); 
  $CEDULA = $_POST['CEDULA'];
  $APELLIDO = $_POST['APELLIDO'];
  $NOMBRE = $_POST['NOMBRE'];
  $DIRECCION = $_POST['DIRECCION'];
  $TELEFONO = $_POST['TELEFONO'];
  $FECHA_NACIMIENTO = $_POST['FECHA_NACIMIENTO'];
  $GENERO = $_POST['GENERO'];
  $CORREO_PERSONAL = $_POST['CORREO_PERSONAL'];
  $stmt->execute();
  $stmt->close();
  header('Location: agregarPersonal.php');
}elseif (isset($_POST['save_Alumno']) && $_POST['accion'] == "Modificar") {
  $_POST['COD_PERSONA'];
  $stmt = $conn->prepare("UPDATE PERSONA SET CEDULA=? , APELLIDO=? , NOMBRE=? , DIRECCION=? , TELEFONO=? , FECHA_NACIMIENTO=? ,GENERO=? ,CORREO_PERSONAL=? WHERE COD_PERSONA=" . $_POST['COD_PERSONA']);
  $stmt->bind_param('ssssssss', $CEDULA, $APELLIDO, $NOMBRE, $DIRECCION, $TELEFONO, $FECHA_NACIMIENTO, $GENERO, $CORREO_PERSONAL); 
  $CEDULA = $_POST['CEDULA'];
  $APELLIDO = $_POST['APELLIDO'];
  $NOMBRE = $_POST['NOMBRE'];
  $DIRECCION = $_POST['DIRECCION'];
  $TELEFONO = $_POST['TELEFONO'];
  $FECHA_NACIMIENTO = $_POST['FECHA_NACIMIENTO'];
  $GENERO = $_POST['GENERO'];
  $CORREO_PERSONAL = $_POST['CORREO_PERSONAL'];
  $stmt->execute();
  $stmt->close();
  header('Location: modificarDatosAlumno.php');
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
  echo$extDia=substr($FECHA_NACIMIENTO, -2);
  echo $extMes=substr($FECHA_NACIMIENTO, 5,2);
  echo$extAnio=substr($FECHA_NACIMIENTO, 0,4);
  $password= $extDia.$extMes.$extAnio;
  return $password;
  
}
?>
