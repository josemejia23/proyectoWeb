<?php

include('db.php');

if (isset($_POST['save_sede']) && $_POST['accion'] == "Agregar") {
  $stmt = $conn->prepare("INSERT INTO SEDE (NOMBRE,DIRECCION,TELEFONO,CODIGO_POSTAL) VALUES (?,?,?,?)");
  $stmt->bind_param('ssis', $NOMBRE, $DIRECCION, $TELEFONO, $CODIGO_POSTAL);
  $NOMBRE = $_POST['NOMBRE'];
  $DIRECCION = $_POST['DIRECCION'];
  $TELEFONO = $_POST['TELEFONO'];
  $CODIGO_POSTAL = $_POST['CODIGO_POSTAL'];
  $stmt->execute();
  $stmt->close();

  
} elseif (isset($_POST['save_sede']) && $_POST['accion'] == "Modificar") {
  echo $_POST['COD_SEDE'];
  echo $_POST['NOMBRE'];
  $stmt = $conn->prepare("UPDATE SEDE SET NOMBRE=? , DIRECCION=? ,TELEFONO =?, CODIGO_POSTAL=? WHERE COD_SEDE=" . $_POST['COD_SEDE']);
  $stmt->bind_param('ssis', $NOMBRE, $DIRECCION, $TELEFONO, $CODIGO_POSTAL);
  $NOMBRE = $_POST['NOMBRE'];
  $DIRECCION = $_POST['DIRECCION'];
  $TELEFONO = $_POST['TELEFONO'];
  $CODIGO_POSTAL = $_POST['CODIGO_POSTAL'];
  $accion = "Agregar";
  $stmt->execute();
  $stmt->close();

}