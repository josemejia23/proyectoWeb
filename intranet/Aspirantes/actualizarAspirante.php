<?php

include('db.php');

if (isset($_POST['save_Aspirante']) && $_POST['accion'] == "Agregar") {
  //CREAR ASPIRANTE
  $stmt = $conn->prepare("INSERT INTO ASPIRANTE (CEDULA,APELLIDO,NOMBRE,DIRECCION,TELEFONO,FECHA_NACIMIENTO,GENERO, CORREO_PERSONAL) VALUES (?,?,?,?,?,?,?,?)");
  $stmt->bind_param('ssssssss', $CEDULA, $APELLIDO, $NOMBRE, $DIRECCION, $TELEFONO, $FECHA_NACIMIENTO, $GENERO,$CORREO_PERSONAL);
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
  //AGREGAR CALIFICACION ASPIRANTE
  $resp = '"%' . $_POST['CEDULA'] .'%"';
  $result_code = $conn->query("SELECT COD_ASPIRANTE FROM ASPIRANTE WHERE CEDULA LIKE" . $resp);
  $row = mysqli_fetch_assoc($result_code);
  $COD_ASPIRANTE =$row['COD_ASPIRANTE'];
  $stmt2 = $conn->prepare("INSERT INTO CALIFICACION_PRUEBA_ASPIRANTE (COD_ASPIRANTE, COD_NIVEL_EDUCATIVO) VALUES (?,?)");
  $stmt2->bind_param('ii', $COD_ASPIRANTE, $COD_NIVEL_EDUCATIVO);
  $COD_ASPIRANTE =$row['COD_ASPIRANTE'];
  $COD_NIVEL_EDUCATIVO = $_POST['COD_NIVEL_EDUCATIVO'];
  $stmt2->execute();
  $stmt2->close();
  header('Location: agregarAspirante.php');
} elseif (isset($_POST['save_Aspirante']) && $_POST['accion'] == "Modificar") {
  $_POST['COD_ASPIRANTE'];
  $stmt = $conn->prepare("UPDATE ASPIRANTE SET CEDULA=? , APELLIDO=? , NOMBRE=? , DIRECCION=? , TELEFONO=? , FECHA_NACIMIENTO=? ,GENERO=? ,CORREO_PERSONAL=? WHERE COD_ASPIRANTE=" . $_POST['COD_ASPIRANTE']);
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
  $stmt = $conn->prepare("UPDATE CALIFICACION_PRUEBA_ASPIRANTE SET COD_NIVEL_EDUCATIVO=? WHERE COD_ASPIRANTE=" . $_POST['COD_ASPIRANTE']);
  $stmt->bind_param('i', $COD_NIVEL_EDUCATIVO); 
  $COD_NIVEL_EDUCATIVO = $_POST['COD_NIVEL_EDUCATIVO'];
  $stmt->execute();
  $stmt->close();
  header('Location: agregarAspirante.php');
}
elseif (isset($_POST['save_Nota_Aspirante']) && $_POST['accion'] == "Agregar") {
  $_POST['COD_ASPIRANTE'];
  $stmt = $conn->prepare("UPDATE CALIFICACION_PRUEBA_ASPIRANTE SET ESTADO=?,CALIFICACION=?  WHERE COD_ASPIRANTE=" . $_POST['COD_ASPIRANTE']);
  $stmt->bind_param('si', $ESTADO,$CALIFICACION); 
  $CALIFICACION = $_POST['NOTA'];
  echo $ESTADO=atualizarEstado($CALIFICACION);
  $stmt->execute();
  $stmt->close();
  header('Location: registroNotasAspirantes.php');
}
elseif (isset($_POST['save_Nota_Aspirante']) && $_POST['accion'] == "Modificar") {
  $_POST['COD_ASPIRANTE'];
  $stmt = $conn->prepare("UPDATE CALIFICACION_PRUEBA_ASPIRANTE SET ESTADO=?,CALIFICACION=?  WHERE COD_ASPIRANTE=" . $_POST['COD_ASPIRANTE']);
  $stmt->bind_param('si', $ESTADO,$CALIFICACION); 
  $CALIFICACION = $_POST['NOTA'];
  echo $ESTADO=atualizarEstado($CALIFICACION);
  $stmt->execute();
  $stmt->close();
  header('Location: registroNotasAspirantes.php');
}
?>

<?php
function atualizarEstado($CALIFICACION)
{
  $ESTADO='';
  if($CALIFICACION>=7)
  {
    $ESTADO='APR';
  }else
  {
    $ESTADO='REP';
  }

  return $ESTADO;
  
}
