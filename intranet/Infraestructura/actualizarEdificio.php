<?php

include('db.php');

if (isset($_POST['save_Edificio']) && $_POST['accion'] == "Agregar") {
  $stmt = $conn->prepare("INSERT INTO EDIFICIO (COD_SEDE, NOMBRE ,CANTIDAD_PISOS) VALUES (?,?,?)");
  $stmt->bind_param('isi', $COD_SEDE, $NOMBRE, $CANTIDAD_PISOS);
  $COD_SEDE = $_POST['COD_SEDE'];
  $NOMBRE = $_POST['NOMBRE'];
  $CANTIDAD_PISOS = $_POST['CANTIDAD_PISOS'];
  $stmt->execute();
  $stmt->close();
  header('Location: agregarEdificio.php');
  
} elseif (isset($_POST['save_Edificio']) && $_POST['accion'] == "Modificar") {
  echo $_POST['COD_EDIFICIO'];
  echo $_POST['COD_SEDE'];
  $stmt = $conn->prepare("UPDATE EDIFICIO SET COD_SEDE=? , NOMBRE=? ,CANTIDAD_PISOS =? WHERE COD_EDIFICIO=" . $_POST['COD_EDIFICIO']);
  $stmt->bind_param('isi', $COD_SEDE, $NOMBRE, $CANTIDAD_PISOS);
  $COD_SEDE = $_POST['COD_SEDE'];
  $NOMBRE = $_POST['NOMBRE'];
  $CANTIDAD_PISOS = $_POST['CANTIDAD_PISOS'];
  $accion = "Agregar";
  $stmt->execute();
  $stmt->close();
  header('Location: agregarEdificio.php');
}