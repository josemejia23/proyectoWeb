<?php

include("db.php");

if (isset($_GET['COD_PERSONA'])) {
  $result_code = $conn->query("SELECT * fROM TIPO_PERSONA_PERSONA WHERE COD_PERSONA=" . $_GET['COD_PERSONA']);
  $row = mysqli_fetch_assoc($result_code);
  $ESTADO =$row['ESTADO'];
  if($ESTADO=='INT')
  {
    $ESTADO='ACT';
  }else
  {
    $ESTADO='INT';
  }
  $stmt = $conn->prepare("UPDATE TIPO_PERSONA_PERSONA SET ESTADO=? WHERE COD_PERSONA=" . $_GET['COD_PERSONA']);
  $stmt->bind_param('s', $ESTADO); 
  $stmt->execute();
  $stmt->close();
  header('Location: addPerson.php');
}
if (isset($_GET['COD_ALUMNO'])) {
  echo $_GET['COD_ALUMNO'];
  $result_code = $conn->query("SELECT ESTADO FROM TIPO_PERSONA_PERSONA WHERE COD_PERSONA=" . $_GET['COD_ALUMNO']);
 $row = mysqli_fetch_assoc($result_code);
 $ESTADO = $row['ESTADO'];
  if($ESTADO=='INT')
  {
    $ESTADO='ACT';
  }else
  {
    $ESTADO='INT';
  }
  $stmt = $conn->prepare("UPDATE TIPO_PERSONA_PERSONA SET ESTADO=? WHERE COD_PERSONA=" . $_GET['COD_ALUMNO']);
  echo $ESTADO;
  $stmt->bind_param('s', $ESTADO); 
  $stmt->execute();
  $stmt->close();
  header('Location: modificarDatosAlumno.php');
}
?>