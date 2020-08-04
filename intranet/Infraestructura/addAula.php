<?php
session_start();

?>
<?php include("db.php"); ?>
<?php
$COD_SEDE = '';
$NOMBRE = '';
$CAPACIDAD = '';
$TIPO ='' ;
$PISO='';
$accion = "Agregar";
$COD_AULA = "";

if (isset($_GET['COD_AULA'])) {
    $result_AULA = $conn->query("SELECT * FROM AULA WHERE COD_AULA=" . $_GET['COD_AULA']);
    if (mysqli_num_rows($result_AULA) == 1) {
        $row = mysqli_fetch_array($result_AULA);
        $COD_SEDE = $row['COD_SEDE'];
        $NOMBRE = $row['NOMBRE'];
        $CAPACIDAD = $row['CAPACIDAD'];
        $TIPO = $row['TIPO'];
        $PISO=$row['PISO'];
        $COD_AULA = $row['COD_AULA'];
        $accion = "Modificar";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GALÁPAGOS ACADEMY SCHOOL| Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="icon" href="../../images/Logo.png" type="image/png" />
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../styles/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!------ Include the above in your HEAD tag ---------->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-power-off"></i>
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <div class="dropdown-divider"></div>
                        <a href="./login/php/logout.php" class="dropdown-item dropdown-footer">Cerrar Sesion</a>
                    </div>
                </li>

            </ul>
        </nav>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../images/Logo.png" class="img-circle" alt="logo">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['USER']['NOMBRE_USUARIO'] ?></a>

                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-header">GESTIÓN DEL SISTEMA</li>
                        <li class="nav-item">
                            <a href="calendar.html" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Horario
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>



                        <?php if ($_SESSION["USER"]['COD_ROL'] == '1') {
                            echo '<li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Gestión de Usuarios
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                  <a href="./addPerson.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Personal</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./addAlumn.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alumnos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./aspirants.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Aspirantes</p>
                  </a>
                </li>
              </ul>
            </li>';
                        } ?>



                        <?php if ($_SESSION["USER"]['COD_ROL'] == '1') {
                            echo '<li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                Gestión de Privilegios
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                  <a href="./privileges.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Privilegios</p>
                  </a>
                </li>
              </ul>
                </li>';
                        } ?>

                        <?php if ($_SESSION["USER"]['COD_ROL'] == '1') {
                            echo ' <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Infraestructura
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./sede.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sedes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./edifice.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Edificios</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./classroom.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Aulas</p>
                    </a>
                  </li>
                </ul>
              </li>
                ';
                        } ?>

                        <?php if ($_SESSION["USER"]['COD_ROL'] == '1') {
                            echo '<li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Infraestructura
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./sede.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sedes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./edifice.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Edificios</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./classroom.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Aulas</p>
                    </a>
                  </li>
                </ul>
              </li>
              ';
                        } ?>



                        <?php if ($_SESSION["USER"]['COD_ROL'] == '4' || $_SESSION["USER"]['COD_ROL'] == '5') {


                            echo '<li class="nav-item has-treeview">
                
                <a href="./notes_info.html" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Información Educativa
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="./attend.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asignaturas</p>
                </a>
              </li>
                  <li class="nav-item">
                    <a href="./attend.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Asistencias</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./notes_info.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Calificaciones</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./homework_info.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tareas</p>
                    </a>
                  </li>
                </ul>
              </li>
  
                  ';
                        } ?>


                        <?php if ($_SESSION["USER"]['COD_ROL'] == '3') {
                            echo ' <li class="nav-item has-treeview">
                <a href="./notes.html" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Manager Académico
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./notes.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Registrar Calificaciones
                      </p>
                    </a>
                  </li>
  
                  <li class="nav-item">
                    <a href="./attend_ges.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Registrar Asistencias</p>
                    </a>
                  </li>
              
                  <li class="nav-item">
                    <a href="./homework.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Registrar Tareas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./meets.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Reuniones  </p>
                    </a>
                  </li>
  
  
  
                </ul>
              </li>
  
                ';
                        } ?>





                        <?php if ($_SESSION["USER"]['COD_ROL'] == '1') {
                            echo '<li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Gestión Institución
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  </li>
                  <li class="nav-item">
                    <a href="./periodo.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Periodo</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./asignature.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Materias</p>
                    </a>
                  </li>
  
                  <li class="nav-item">
                    <a href="./teacherAsignature.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Asignación de Docentes</p>
                    </a>
                  </li>
                </ul>
              </li>
                  ';
                        } ?>


                        <?php if ($_SESSION["USER"]['COD_ROL'] == '1') {
                            echo '<li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Gestión de Reportes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  </li>
                  <li class="nav-item">
                    <a href="./report_student.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Reportes de Alumnos </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./report_teacher.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Reportes de Profesores</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./report_infraestructure.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Reportes de Infraestructura</p>
                    </a>
                  </li>
                </ul>
              </li>
  ';
                        } ?>


                    </ul>
                </nav>

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div id="content">

                <!-- Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <h5 class="h3 mb-4 text-gray-800" style="color: #fd5f00; text-align:center; ">GESTIÓN DE AULAS
                    </h5>


                    <!-- Page Heading -->
                    <main class="container p-4">
                        <div class="row ">

                            <div class="col-md-12 justify-content-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>COD_AULA</th>
                                            <th>NOMBRE</th>
                                            <th>SEDE</th>
                                            <th>EDIFICIO</th>
                                            <th>CAPACIDAD</th>
                                            <th>TIPO</th>
                                            <th>PISO</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $result_AULA = $conn->query("SELECT COD_AULA, AULA.NOMBRE AS AN, SEDE.NOMBRE AS SN, EDIFICIO.NOMBRE AS EN, CAPACIDAD,TIPO, PISO FROM AULA INNER JOIN EDIFICIO ON AULA.COD_EDIFICIO=EDIFICIO.COD_EDIFICIO INNER JOIN SEDE ON SEDE.COD_SEDE=EDIFICIO.COD_SEDE");

                                        while ($row = mysqli_fetch_assoc($result_AULA)) { ?>
                                            <tr>
                                                <td><?php echo $row['COD_AULA']; ?></td>
                                                <td><?php echo $row['AN']; ?></td>
                                                <td><?php echo $row['SN']; ?></td>
                                                <td><?php echo $row['EN']; ?></td>
                                                <td><?php echo $row['CAPACIDAD']; ?></td>
                                                <td><?php echo $row['TIPO']; ?></td>
                                                <td><?php echo $row['PISO']; ?></td>
                                                <td>
                                                    <a href="agregarAula.php?COD_AULA=<?php echo $row['COD_AULA'] ?>" class="btn btn-secondary">
                                                        <i class="fas fa-marker"></i>
                                                    </a>
                                                    <a href="delete_Aula.php?COD_AULA=<?php echo $row['COD_AULA'] ?>" class="btn btn-danger">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- ADD BOOKS FORM-->
                            <div class="col-md-4"></div>
                            <div class="col-md-4  ">
                                <div class="card card-body">
                                    <form action="actualizarAula.php" method="POST">
                                        <div class="form-group">
                                            <?php
                                            $query = 'SELECT * FROM SEDE';
                                            $result = $conn->query($query);
                                            ?>
                                            <select name="COD_SEDE" class="form-control form-control-user" id="mySelect" onchange="myFunction(this.value)" placeholder="Seleccione una sede" autofocus>
                                                <?php
                                                while ($row = $result->fetch_array()) {
                                                ?>
                                                    <option value=" <?php echo $row['COD_SEDE'] ?> ">
                                                        <?php echo $row['NOMBRE']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <?php
                                            ?>
                                        </div>
                                        <script>
                                            function myFunction(x) {
                                                $.ajax({
                                                    type: "POST",
                                                    url: 'consulta.php',
                                                    data: 'idproovedor=' + x,
                                                    success: function(resp) {
                                                        $('#productos').html(resp);
                                                        $('#respuesta').html("");
                                                    }
                                                });
                                            }
                                        </script>
                                        <select name="COD_EDIFICIO" class="form-control form-control-user" id="productos" p-1></select>
                                        <!-- listar edificios-->
                                        <div class="form-group">
                                            <input type="text" name="NOMBRE" class="form-control form-control-user" placeholder="NOMBRE" value="<?php echo $NOMBRE ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="CAPACIDAD" class="form-control form-control-user" placeholder="CAPACIDAD" min="1" max="15" value="<?php echo $CAPACIDAD ?>">
                                        </div>
                                        <div class="form-group">
                                            <select name="ESTADO" class="form-control form-control-user" id="TIPO" p-1>
                                                <option value="GEN">ACT</option>
                                                <option value="LAB">INT</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="PISO" class="form-control form-control-user" placeholder="PISO" min="1" max="15" value="<?php echo $PISO ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="COD_AULA" class="form-control form-control-user" value="<?php echo $COD_AULA; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="accion" class="form-control form-control-user" value="<?php echo $accion; ?>">
                                        </div>
                                        <input type="submit" name="save_Aula" class="btn btn-success btn-block" value="<?php echo $accion; ?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
        </main>



    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">


                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">

        <div class="float-right d-none d-sm-inline-block">

        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../js/pages/dashboard.js"></script>
    <!-- AdminLTE fo../r demo purposes -->
    <script src="../../js/demo.js"></script>
</body>

</html>