<?php

include("db.php");

if(isset($_GET['COD_EDIFICIO'])) {
  $stmt = $conn->prepare("DELETE FROM EDIFICIO WHERE COD_EDIFICIO = ?");
  $stmt->bind_param('i', $COD_EDIFICIO);
  $COD_EDIFICIO = $_GET['COD_EDIFICIO'];
  $stmt->execute();
  $stmt->close();
  header('Location: agregarEdificio.php');
}

?>
