<?php

include('db.php');
if (isset($_POST['save_materia_profesor']) && $_POST['accion'] == "Agregar") {
  $query = "SELECT * FROM ASIGNATURA WHERE COD_ASIGNATURA=".$_POST['COD_ASIGNATURA'];
  $result = $conn->query($query);
  $row = mysqli_fetch_assoc($result);
  echo $COD_NIVEL_EDUCATIVO = $row['COD_NIVEL_EDUCATIVO'];
$stmt = $conn->prepare("INSERT INTO ASIGNATURA_PERIODO (COD_ASIGNATURA,COD_NIVEL_EDUCATIVO, COD_PERIODO_LECTIVO ,COD_DOCENTE, COD_PARALELO , COD_AULA ) VALUES (?,?,?,?,?,?)");
  $stmt->bind_param('iiiiii', $COD_ASIGNATURA, $COD_NIVEL_EDUCATIVO, $COD_PERIODO_LECTIVO, $COD_DOCENTE,$COD_PARALELO , $COD_AULA);
  echo$COD_PERIODO_LECTIVO= $_POST['COD_PERIODO_LECTIVO'];
  echo$COD_ASIGNATURA = $_POST['COD_ASIGNATURA'];
  echo$COD_AULA = $_POST['COD_AULA'];
  echo$COD_DOCENTE = $_POST['COD_PERSONA'];
  echo$COD_PARALELO=$_POST['COD_PARALELO'];
  $stmt->execute();
  $stmt->close();

  
} elseif (isset($_POST['save_materia_profesor']) && $_POST['accion'] == "Modificar") {
  $query = "SELECT * FROM ASIGNATURA WHERE COD_ASIGNATURA=".$_POST['COD_ASIGNATURA'];
  $result = $conn->query($query);
  $row = mysqli_fetch_assoc($result);
  echo $COD_NIVEL_EDUCATIVO = $row['COD_NIVEL_EDUCATIVO'];
  $stmt = $conn->prepare("UPDATE ASIGNATURA_PERIODO SET COD_ASIGNATURA=?, COD_NIVEL_EDUCATIVO=?,COD_DOCENTE=?, COD_PARALELO=? ,COD_AULA=? WHERE COD_ASIG_PERIODO=" . $_POST['COD_ASIG_PERIODO']);
  $stmt->bind_param('iiiii', $COD_ASIGNATURA, $COD_NIVEL_EDUCATIVO, $COD_DOCENTE,$COD_PARALELO , $COD_AULA);
  echo$COD_ASIGNATURA = $_POST['COD_ASIGNATURA'];
  echo$COD_AULA = $_POST['COD_AULA'];
  echo$COD_DOCENTE = $_POST['COD_PERSONA'];
  echo$COD_PARALELO=$_POST['COD_PARALELO'];
  $accion = "Agregar";
  $stmt->execute();
  $stmt->close();

}