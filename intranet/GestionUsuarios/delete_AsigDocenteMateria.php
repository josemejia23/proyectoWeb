<?php

include("db.php");

if(isset($_GET['COD_ASIG_PERIODO'])) {
  $stmt = $conn->prepare("DELETE FROM ASIGNATURA_PERIODO WHERE COD_ASIG_PERIODO = ?");
  $stmt->bind_param('s', $COD_ASIG_PERIODO);
  $COD_ASIG_PERIODO = $_GET['COD_ASIG_PERIODO'];
  $stmt->execute();
  $stmt->close();
  header('Location: asigDocenteMateria.php');
}

?>