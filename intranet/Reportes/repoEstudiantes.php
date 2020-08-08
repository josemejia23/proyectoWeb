<?php
session_start();

?>

<?php include("db.php"); ?>
<?php
$NOMBRE = '';
$DIRECCION = '';
$TELEFONO = '';
$FECHA_NACIMIENTO = '';
$accion = "Agregar";
$COD_PERSONA = "";
$CEDULA = "";
$APELLIDO = "";
$CORREO = "";
$CORREO_PERSONAL = "";

if (isset($_GET['COD_PERSONA'])) {
  $result_sede = $conn->query("SELECT * FROM PERSONA WHERE COD_PERSONA=" . $_GET['COD_PERSONA']);
  if (mysqli_num_rows($result_sede) == 1) {
    $row = mysqli_fetch_array($result_sede);
    $COD_PERSONA = $row['COD_PERSONA'];
    $CEDULA = $row['CEDULA'];
    $APELLIDO = $row['APELLIDO'];
    $NOMBRE = $row['NOMBRE'];
    $DIRECCION = $row['DIRECCION'];
    $TELEFONO = $row['TELEFONO'];
    $FECHA_NACIMIENTO = $row['FECHA_NACIMIENTO'];
    $GENERO = $row['GENERO'];
    $CORREO_PERSONAL = $row['CORREO_PERSONAL'];
    $accion = "Modificar";
  }
}

}