<?php

include('db.php');

if (isset($_POST['save_Aula']) && $_POST['accion'] == "Agregar") {
  $stmt = $conn->prepare("INSERT INTO AULA (COD_EDIFICIO, NOMBRE ,CAPACIDAD, TIPO, PISO) VALUES (?,?,?,?,?)");
  $stmt->bind_param('isisi', $COD_EDIFICIO, $NOMBRE, $CAPACIDAD,$TIPO,$PISO);
  $COD_EDIFICIO = $_POST['COD_EDIFICIO'];
  $NOMBRE = $_POST['NOMBRE'];
  $CAPACIDAD = $_POST['CAPACIDAD'];
  $TIPO = $_POST['TIPO'];
  $PISO=$_POST['PISO'];
  $stmt->execute();
  $stmt->close();

  
} 