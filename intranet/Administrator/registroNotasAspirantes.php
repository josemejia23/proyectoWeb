<?php include("db.php"); ?>
<?php

$accion = "Agregar";
$accion2 = "disabled";
$COD_ASPIRANTE = "";
$NOTA = "";
$CEDULA = "";
$NOMBRE = '';
$APELLIDO = "";


if (isset($_GET['COD_ASPIRANTE'])) {
    echo $_GET['COD_ASPIRANTE'];
    echo 'HOA';
    $result_sede = $conn->query("SELECT * FROM ASPIRANTE INNER JOIN CALIFICACION_PRUEBA_ASPIRANTE ON ASPIRANTE.COD_ASPIRANTE=CALIFICACION_PRUEBA_ASPIRANTE.COD_ASPIRANTE INNER JOIN NIVEL_EDUCATIVO ON NIVEL_EDUCATIVO.COD_NIVEL_EDUCATIVO=CALIFICACION_PRUEBA_ASPIRANTE.COD_NIVEL_EDUCATIVO WHERE ASPIRANTE.COD_ASPIRANTE=" . $_GET['COD_ASPIRANTE']);
    if (mysqli_num_rows($result_sede) == 1) {
        $row = mysqli_fetch_array($result_sede);
        $COD_ASPIRANTE = $row['COD_ASPIRANTE'];
        $NOTA = $row['CALIFICACION'];
        $CEDULA = $row['CEDULA'];
        $APELLIDO = $row['APELLIDO'];
        $NOMBRE = $row['NOMBRE'];
        $accion = "Modificar";
        $accion2 = "autofocus";
    }
}
if (isset($_GET['buscar'])) {
    $resp = '"%' . $_GET['CEDULA'] . '%"';
    $result_sede = $conn->query("SELECT * FROM ASPIRANTE INNER JOIN CALIFICACION_PRUEBA_ASPIRANTE ON ASPIRANTE.COD_ASPIRANTE=CALIFICACION_PRUEBA_ASPIRANTE.COD_ASPIRANTE INNER JOIN NIVEL_EDUCATIVO ON NIVEL_EDUCATIVO.COD_NIVEL_EDUCATIVO=CALIFICACION_PRUEBA_ASPIRANTE.COD_NIVEL_EDUCATIVO WHERE CEDULA LIKE" . $resp);
    if (mysqli_num_rows($result_sede) == 1) {
        $row = mysqli_fetch_array($result_sede);
        $COD_ASPIRANTE = $row['COD_ASPIRANTE'];
        $NOTA = $row['CALIFICACION'];
        $CEDULA = $row['CEDULA'];
        $APELLIDO = $row['APELLIDO'];
        $NOMBRE = $row['NOMBRE'];
        $accion2 = "autofocus";
        //$accion = "Modificar";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include('includes/header.php'); ?>

    <title>Notas Aspirantes</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('includes/navbar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('includes/notification.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h5 class="h3 mb-4 text-gray-800"><a href="./gestAspirantes.php">Gestión Aspirantes
                            </a>-Registrar Notas Aspirantes</h5>
                    </div>

                    <!-- Page Heading -->
                    <main class="container p-4">
                        <form action="registroNotasAspirantes.php" method="GET">
                            <p>
                                Búsqueda Cédula: <input type="search" name="CEDULA" placeholder="CEDULA">
                                <input type="submit" name="buscar" value="Buscar">
                            </p>
                        </form>

                        <div class="col-md_8 table-responsive my-custom-scrollbar" ">
                             <table class=" table table-hover" id="dtVerticalScrollExample">
                            <thead>
                                <tr>
                                    <th scope="col">CP</th>
                                    <th scope="col">CI</th>
                                    <th scope="col">APELLIDO</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">DIRECCION</th>
                                    <th scope="col">TEL</th>
                                    <th scope="col">FECHA_NAC</th>
                                    <th scope="col">NIVEL</th>
                                    <th scope="col">ESTADO</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $result_sede = $conn->query("SELECT * FROM ASPIRANTE INNER JOIN CALIFICACION_PRUEBA_ASPIRANTE ON ASPIRANTE.COD_ASPIRANTE=CALIFICACION_PRUEBA_ASPIRANTE.COD_ASPIRANTE INNER JOIN NIVEL_EDUCATIVO ON NIVEL_EDUCATIVO.COD_NIVEL_EDUCATIVO=CALIFICACION_PRUEBA_ASPIRANTE.COD_NIVEL_EDUCATIVO ");
                                //table-wrapper-scroll-y my-custom-scrollbar-> agregar scroll a tabla
                                while ($row = mysqli_fetch_assoc($result_sede)) { ?>
                                    <tr>
                                        <td><?php echo $row['COD_ASPIRANTE']; ?></td>
                                        <td><?php echo $row['CEDULA']; ?></td>
                                        <td><?php echo $row['APELLIDO']; ?></td>
                                        <td><?php echo $row['NOMBRE']; ?></td>
                                        <td><?php echo $row['DIRECCION']; ?></td>
                                        <td><?php echo $row['TELEFONO']; ?></td>
                                        <td><?php echo $row['FECHA_NACIMIENTO']; ?></td>
                                        <td><?php echo $row['CALIFICACION']; ?></td>
                                        <td><?php echo $row['ESTADO']; ?></td>
                                        <td>
                                            <a href="registroNotasAspirantes.php?COD_ASPIRANTE=<?php echo $row['COD_ASPIRANTE'] ?>" class="btn btn-secondary">
                                                <i class="fas fa-marker"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            </table>

                        </div>

                        <div class="row">
                            <!-- ADD BOOKS FORM-->
                            <div class="col-md-4"></div>
                            <div class="col-md-4  ">
                                <form action="actualizarAspirante.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="CEDULA" class="form-control form-control-user" placeholder="CEDULA" minlength="10" maxlength="10" value="<?php echo $CEDULA ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="APELLIDO" class="form-control form-control-user" placeholder="APELLIDO" value="<?php echo $APELLIDO ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="NOMBRE" class="form-control form-control-user" placeholder="NOMBRE" value="<?php echo $NOMBRE ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="NOTA" class="form-control form-control-user" placeholder="NOTA" min="0" max="10" value="<?php echo $NOTA ?>" <?php echo $accion2; ?>>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="COD_ASPIRANTE" class="form-control form-control-user" value="<?php echo $COD_ASPIRANTE; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="accion" class="form-control form-control-user" value="<?php echo $accion; ?>">
                                    </div>
                                    <input type="submit" name="save_Nota_Aspirante" class="btn btn-success btn-block" value="<?php echo $accion; ?>">
                                </form>
                            </div>
                        </div>
                    </main>



                </div>


                <script>
                    $(document).ready(function() {
                        $('#dtVerticalScrollExample').DataTable({
                            "scrollY": "200px",
                            "scrollCollapse": true,
                        });
                        $('.dataTables_length').addClass('bs-select');
                    });
                </script>


                <?php include('includes/footer.php'); ?>