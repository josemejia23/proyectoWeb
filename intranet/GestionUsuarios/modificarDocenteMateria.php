<?php

include('db.php');
if (isset($_POST['save_materia_profesor']) && $_POST['accion'] == "Agregar") {
 $asig=$_POST['COD_ASIGNATURA'];
  echo$str=''.$_REQUEST['COD_ASIGNATURA'].'';

  $query = "SELECT * FROM ASIGNATURA WHERE COD_ASIGNATURA='$str'";
  echo $query;
  $result = $conn->query($query);
  $row = mysqli_fetch_assoc($result); 
    
  echo 'nivel educativo';
  
$stmt = $conn->prepare("INSERT INTO ASIGNATURA_PERIODO (COD_ASIG_PERIODO,COD_NIVEL_EDUCATIVO, COD_PERIODO_LECTIVO ,COD_DOCENTE, COD_PARALELO , COD_AULA ) VALUES (?,?,?,?,?,?)");
  $stmt->bind_param('sisiss', $COD_ASIGNATURA, $COD_NIVEL_EDUCATIVO, $COD_PERIODO_LECTIVO, $COD_DOCENTE,$COD_PARALELO , $COD_AULA);
  
  echo $COD_ASIGNATURA = $_POST['COD_ASIGNATURA'];
  echo $COD_NIVEL_EDUCATIVO = $row['COD_NIVEL_EDUCATIVO'];
  echo $COD_PERIODO_LECTIVO= $_POST['COD_PERIODO_LECTIVO'];
  echo $COD_DOCENTE = $_POST['COD_PERSONA'];
  echo $COD_PARALELO=$_POST['COD_PARALELO'];
  echo $COD_AULA = $_POST['COD_AULA'];
  
  

  $stmt->execute();
  $stmt->close();
  
  
} elseif (isset($_POST['save_materia_profesor']) && $_POST['accion'] == "Modificar") {
  echo$str=''.$_REQUEST['COD_ASIGNATURA'].'';
  echo$str1=''.$_REQUEST['COD_ASIG_PERIODO'].'';
  $query = "SELECT * FROM ASIGNATURA WHERE COD_ASIGNATURA='$str'";

  $result = $conn->query($query);
  $row = mysqli_fetch_assoc($result);
  echo $COD_NIVEL_EDUCATIVO = $row['COD_NIVEL_EDUCATIVO'];
  $stmt = $conn->prepare("UPDATE ASIGNATURA_PERIODO SET COD_ASIGNATURA=?, COD_NIVEL_EDUCATIVO=?, COD_PERIODO_LECTIVO=?, COD_PERSONA=?, COD_PARALELO=? ,COD_AULA=? WHERE COD_ASIG_PERIODO='$str1'");
  $stmt->bind_param('sisiss', $COD_ASIGNATURA, $COD_NIVEL_EDUCATIVO,  $COD_PERIODO_LECTIVO, $COD_DOCENTE,$COD_PARALELO , $COD_AULA);
  echo$COD_ASIGNATURA = $_POST['COD_ASIGNATURA'];
  echo$COD_AULA = $_POST['COD_AULA'];
  $COD_PERIODO_LECTIVO= $_POST['COD_PERIODO_LECTIVO'];
  echo$COD_DOCENTE = $_POST['COD_PERSONA'];
  echo$COD_PARALELO=$_POST['COD_PARALELO'];
  echo $COD_AULA = $_POST['COD_AULA'];
  $accion = "Agregar";
  $stmt->execute();
  $stmt->close();
  header('Location: asigDocenteMateria.php');
}