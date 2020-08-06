
<?php
include("db.php");
session_start();
$COD_ASIGNATURA = '';
$COD_NIVEL_EDUCATIVO = '';
$COD_DOCENTE = '';
$COD_PARALELO = '';
$COD_AULA = '';
$COD_ASIG_PERIODO = '';
$FECHAI = '';
$FECHAF = '';
$accion = "Agregar";
$query = "SELECT * FROM PERIODO_LECTIVO WHERE ESTADO='ACT'";
$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);
$COD_PERIODO_LECTIVO = $row['COD_PERIODO_LECTIVO'];
$FECHAI = $row['FECHA_INICIO'];
$FECHAF = $row['FECHA_FIN'];

if (isset($_GET['COD_ASIG_PERIODO'])) {
    echo $COD_ASIG_PERIODO = $_GET['COD_ASIG_PERIODO'];
    $accion = "Modificar";
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

                    <h5 class="h3 mb-4 text-gray-800" style="color: #fd5f00; text-align:center; ">ASIGANCION DE DOCENTE A MATERIA
                    </h5>


                    <!-- Page Heading -->
                    <main class="container p-4">
            <div class="row ">

              <div class="table">
              <table class=" table table-striped w-auto" id="dtVerticalScrollExample">
                <thead style="background-color: #00427c; color:white;">
                    <tr>
                      <th>COD_ASIG</th>
                      <th>ASIGNATURA</th>
                      <th>AULA</th>
                      <th>PARALELO</th>
                      <th>NOMBRE</th>
                      <th>APELLIDO</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $result_sede = $conn->query("SELECT ASIGNATURA_PERIODO.COD_ASIGNATURA ,ASIGNATURA.NOMBRE AS ASIGNATURA, AULA.NOMBRE AS AULA,  PARALELO.NOMBRE AS PARALELO, PERSONA.NOMBRE AS NOM_PROF, PERSONA.APELLIDO AS APE_PROF FROM ASIGNATURA_PERIODO INNER JOIN ASIGNATURA ON ASIGNATURA_PERIODO.COD_ASIGNATURA=ASIGNATURA.COD_ASIGNATURA INNER JOIN PERIODO_LECTIVO ON ASIGNATURA_PERIODO.COD_PERIODO_LECTIVO=PERIODO_LECTIVO.COD_PERIODO_LECTIVO INNER JOIN PARALELO ON PARALELO.COD_PARALELO=ASIGNATURA_PERIODO.COD_PARALELO INNER JOIN  AULA ON ASIGNATURA_PERIODO.COD_AULA=AULA.COD_AULA INNER JOIN PERSONA ON PERSONA.COD_PERSONA=ASIGNATURA_PERIODO.COD_DOCENTE");

                    while ($row = mysqli_fetch_assoc($result_sede)) { ?>
                      <tr>
                        <td><?php echo $row['COD_ASIG_PERIODO']; ?></td>
                        <td><?php echo $row['ASIGNATURA']; ?></td>
                        <td><?php echo $row['AULA']; ?></td>
                        <td><?php echo $row['PARALELO']; ?></td>
                        <td><?php echo $row['NOM_PROF']; ?></td>
                        <td><?php echo $row['APE_PROF']; ?></td>
                        <td>
                          <a href="addDocenteXmateria.php?COD_ASIG_PERIODO=<?php echo $row['COD_ASIG_PERIODO'] ?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                          </a>
                          <a href="delete_DocenteXmateria.php?COD_ASIG_PERIODO=<?php echo $row['COD_ASIG_PERIODO'] ?>" class="btn btn-danger">
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
              <div class="col-md-4 py-3 ">
                <form class="user" action="actualizarDocenteXmateria.php" method="POST">

                  <div class="form-group">
                    <?php
                    $query = 'SELECT * FROM ASIGNATURA';
                    $result = $conn->query($query);
                    ?>
                    <select name="COD_ASIGNATURA" class="form-control" id="selector" >
                      <?php
                      while ($row = $result->fetch_array()) {
                      ?>
                        <option value=" <?php echo $row['COD_ASIGNATURA'] ?> ">
                          <?php echo $row['NOMBRE'] . '-' . $row['CREDITOS']; ?>
                        </option>
                      <?php
                      }
                      ?>
                    </select>
                    <?php
                    ?>
                  </div>

                  <div class="form-group">
                    <?php
                    $query = 'SELECT PERSONA.COD_PERSONA, PERSONA.CEDULA, PERSONA.NOMBRE, PERSONA.APELLIDO,PERSONA.DIRECCION,PERSONA.CORREO_PERSONAL, PERSONA.TELEFONO, PERSONA.FECHA_NACIMIENTO, TIPO_PERSONA_PERSONA.ESTADO FROM PERSONA INNER JOIN TIPO_PERSONA_PERSONA ON PERSONA.COD_PERSONA= TIPO_PERSONA_PERSONA.COD_PERSONA WHERE TIPO_PERSONA_PERSONA.COD_TIPO_PERSONA=3';
                    $result = $conn->query($query);
                    ?>
                    <select name="COD_PERSONA" class="form-control" id="selector">
                      <?php
                      while ($row = $result->fetch_array()) {
                      ?>
                        <option value=" <?php echo $row['COD_PERSONA'] ?> ">
                          <?php echo $row['NOMBRE'] . '-' . $row['APELLIDO']; ?>
                        </option>
                      <?php
                      }
                      ?>
                    </select>
                    <?php
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    $query = 'SELECT * FROM AULA';
                    $result = $conn->query($query);
                    ?>
                    <select name="COD_AULA" class="form-control" id="selector">
                      <?php
                      while ($row = $result->fetch_array()) {
                      ?>
                        <option value=" <?php echo $row['COD_AULA'] ?> ">
                          <?php echo $row['NOMBRE'] ?>
                        </option>
                      <?php
                      }
                      ?>
                    </select>
                    <?php
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    $query = 'SELECT PARALELO.COD_PARALELO, PARALELO.NOMBRE, NIVEL_EDUCATIVO.NOMBRE_NIVEL FROM PARALELO INNER JOIN NIVEL_EDUCATIVO ON PARALELO.COD_NIVEL_EDUCATIVO=NIVEL_EDUCATIVO.COD_NIVEL_EDUCATIVO ';
                    $result = $conn->query($query);
                    ?>
                    <select name="COD_PARALELO" class="form-control" id="selector">
                      <?php
                      while ($row = $result->fetch_array()) {
                      ?>
                        <option value=" <?php echo $row['COD_PARALELO'] ?> ">
                          <?php $NIVEL = $row['COD_PARALELO'] ?>
                          <?php echo $row['NOMBRE'] . '-' . $row['NOMBRE_NIVEL'] ?>
                        </option>
                      <?php
                      }
                      ?>
                    </select>
                    <?php
                    ?>
                  </div>

                  <div class="form-group text-center">
                    <input type="hidden" name="COD_PERIODO_LECTIVO" class="form-control form-control-user" placeholder="PERIODO" value="<?php echo $COD_PERIODO_LECTIVO; ?> ">
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="COD_ASIG_PERIODO" class="form-control form-control-user" value="<?php echo $COD_ASIG_PERIODO ?>">
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="accion" class="form-control form-control-user" value="<?php echo $accion; ?>">
                  </div>
                  <input type="submit" name="save_materia_profesor" class="btn btn-success btn-block" value="<?php echo $accion; ?>">
                </form>

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