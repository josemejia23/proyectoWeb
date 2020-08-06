<?php

include('db.php');

if (isset($_POST['save_AnioLectivo']) && $_POST['accion'] == "Agregar") {
  $stmt = $conn->prepare("INSERT INTO PERIODO_LECTIVO (ESTADO,FECHA_INICIO,FECHA_FIN) VALUES (?,?,?)");
  $stmt->bind_param('sss', $ESTADO, $FECHA_INICIO, $FECHA_FIN);
  $ESTADO = 'ACT';
  $FECHA_INICIO = $_POST['FECHA_INICIO'];
  $FECHA_FIN = $_POST['FECHA_FIN'];
  $stmt->execute();
  $stmt->close();
  header('Location: agregarAnioLectivo.php');
  
} elseif (isset($_POST['save_AnioLectivo']) && $_POST['accion'] == "Modificar") {
  $stmt = $conn->prepare("UPDATE PERIODO_LECTIVO SET  FECHA_INICIO=? ,FECHA_FIN =? WHERE COD_PERIODO_LECTIVO=" . $_POST['COD_PERIODO_LECTIVO']);
  $stmt->bind_param('ss', $FECHA_INICIO, $FECHA_FIN );
  $FECHA_INICIO = $_POST['FECHA_INICIO'];
  $FECHA_FIN = $_POST['FECHA_FIN'];
  $accion = "Agregar";
  $stmt->execute();
  $stmt->close();
  header('Location: agregarAnioLectivo.php');
}
if(isset($_GET['COD_PERIODO_LECTIVO'])) {
    $stmt = $conn->prepare("UPDATE PERIODO_LECTIVO SET  ESTADO=?  WHERE COD_PERIODO_LECTIVO=" . $_GET['COD_PERIODO_LECTIVO']);
    $stmt->bind_param('s', $ESTADO );
    $ESTADO = 'INT';
    $accion = "Agregar";
    $stmt->execute();
    $stmt->close();
    header('Location: agregarAnioLectivo.php');
  }

?>