<?php

include("db.php");

if(isset($_GET['COD_AULA'])) {
  $stmt = $conn->prepare("DELETE FROM AULA WHERE COD_AULA = ?");
  $stmt->bind_param('i', $COD_AULA);
  $COD_AULA = $_GET['COD_AULA'];
  $stmt->execute();
  $stmt->close();

}

?>