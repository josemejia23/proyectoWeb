<?php

include("db.php");

if(isset($_GET['COD_SEDE'])) {
  $stmt = $conn->prepare("DELETE FROM SEDE WHERE COD_SEDE = ?");
  $stmt->bind_param('i', $COD_SEDE);
  $COD_SEDE = $_GET['COD_SEDE'];
  $stmt->execute();
  $stmt->close();
  header('Location: agregarSede.php');
}

?>
