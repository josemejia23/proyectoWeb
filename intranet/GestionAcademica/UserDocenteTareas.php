<?php
session_start();

?>

<?php
include '../services/TareaServicios.php';
$tarea = new TareaServicios();

$cod_docente = $_SESSION['user']['COD_PERSONA'];

$accion = "Aceptar";

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
               
              </ul>
            </li>';
                            echo '<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 Aspirantes
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
                <a href="./Administrator/addAspirant.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestionar Aspirantes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Administrator/addAlumn.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notas Aspirantes</p>
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

                    <h5 class="h3 mb-4 text-gray-800" style="color: #fd5f00; text-align:center; ">GESTIÓN DE PERSONAL ADMINISTRATIVO
                    </h5>


                    <!-- Page Heading -->
                    <div class="content-page-container full-reset custom-scroll-containers">
                        <nav class="navbar-user-top full-reset">
                            <ul class="list-unstyled full-reset">

                                <li style="color:#fff; cursor:default;">
                                    <span class="all-tittles">Docente <?php echo $_SESSION['user']['NOMBRE_USUARIO']  ?></span>
                                </li>
                                <li class="tooltips-general exit-system-button" data-href="../../LogOut.php" data-placement="bottom" title="Salir del sistema">
                                    <i class="zmdi zmdi-power"></i>
                                </li>
                                <li class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                                </li>
                                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                                    <i class="zmdi zmdi-menu"></i>
                                </li>
                            </ul>
                        </nav>
                        <div class="container">
                            
                        </div>
                        <div class="container-fluid" style="margin: 50px 0;">
                            <div class="row">

                               
                            </div>
                        </div>

                        <section class="full-reset text-center" style="padding: 40px 0;">
                            <div class="">
                                <div class="">
                                    <div class="">TAREA</div>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-8 col-sm-offset-1">

                                                <div class="group-material col-md-6 mb-3">
                                                    <span style="color: #E34724;">
                                                        <h2>Seleccione el periodo lectivo</h2>
                                                    </span>
                                                    <select class="form-control" name="periodo">
                                                        <option value="" disabled="" selected="">Selecciona el periodo</option>
                                                        <?php
                                                        $result2 = $tarea->periodo();
                                                        foreach ($result2 as $opciones) :
                                                        ?>
                                                            <option value="<?php echo $opciones['COD_PERIODO_LECTIVO'] ?>"><?php echo $opciones['COD_PERIODO_LECTIVO'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="group-material col-md-6 mb-5">
                                                    <span style="color: #E34724;">
                                                        <h2>Seleccione la asignatura</h2>
                                                    </span>
                                                    <select class="form-control" name="asignatura">
                                                        <option value="" disabled="" selected="">Selecciona la asignatura</option>
                                                        <?php
                                                        $result = $tarea->asignaturaParaleloNivel($cod_docente);
                                                        foreach ($result as $opciones) :
                                                        ?>
                                                            <option value="<?php echo $opciones['COD_NIVEL_EDUCATIVO'] ?>|<?php echo $opciones['COD_ASIGNATURA'] ?>|<?php echo $opciones['COD_PARALELO'] ?>|<?php echo $opciones['NOMBRE'] ?>"><?php echo $opciones['NOMBRE'] ?>--<?php echo $opciones['NOMPARALELO'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div><br>
                                                <!--<form action="../../form-result.php" method="post" enctype="multipart/form-data"
                                    target="_blank">
                                    <p>
                                        Sube un archivo :<br></br>
                                        
                                    </p>
                                    <p>
                                        Nota Importante <br></br>(Adjuntar archivos con un peso máximo de 7 MB):
                                        <br></br>
                                        <input type="file" name="archivosubido">
                                    </p>
                                    <br></br>
                                </form>-->
                                                <p class="text-center">
                                                    <input type="submit" name="accionTarea" value="<?php echo $accion ?>" class="btn btn-primary" style="margin-right: 20px;">
                                                    <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <?php
                                if (isset($_POST['accionTarea']) && ($_POST['accionTarea'] == 'Aceptar')) {
                                    $valores = $_POST['asignatura'];
                                    $result_explode = array_map('trim', explode('|', $valores));
                                    $cod_nivel_educativo = $result_explode[0];
                                    $cod_asignatura = $result_explode[1];
                                    $cod_paralelo = $result_explode[2];
                                    $nombre_asignatura = $result_explode[3];
                                    $cod_periodo_lectivo = $_POST['periodo'];
                                ?>
                                    <form action="" method="post" id="registroTareas" name="registroTareas" enctype="multipart/form-data">
                                        <input type="hidden" name="cod_nivel_educativo" value="<?php echo $cod_nivel_educativo ?>">
                                        <input type="hidden" name="cod_asignatura" value="<?php echo $cod_asignatura ?>">
                                        <input type="hidden" name="cod_paralelo" value="<?php echo $cod_paralelo ?>">
                                        <input type="hidden" name="cod_periodo_lectivo" value="<?php echo $cod_periodo_lectivo ?>">
                                        <div class="title-flat-form title-flat-green">Nueva Tarea para la asignatura <?php echo $nombre_asignatura ?></div>
                                        <h1 class="all-tittles">Título/Tema de la Tarea</h1>
                                        <div class="group-material col-xs-12 col-sm-8 col-sm-offset-2">
                                            <input type="text" class="material-control tooltips-general" placeholder="Título de la tarea" required="" data-toggle="tooltip" data-placement="top" title="Escriba el título de la tarea a realizar" name="titulo_tarea">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                        </div><br><br><br><br>
                                        <h1 class="all-tittles">Detalles de la Tarea</h1>
                                        <div class="group-material col-xs-12 col-sm-8 col-sm-offset-2">
                                            <input type="text" class="material-control tooltips-general" placeholder="Detalles de la tarea" required="" data-toggle="tooltip" data-placement="top" title="Escriba los detalles de la tarea a realizar" name="detalle_tarea">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                        </div><br><br><br><br>
                                        <h1 class="all-tittles">Fecha de Entrega</h1>
                                        <div class="group-material col-xs-12 col-sm-8 col-sm-offset-2">
                                            <input type="datetime-local" class="material-control tooltips-general" placeholder="Fecha de Entrega" required="" data-toggle="tooltip" data-placement="top" title="Seleccione la fecha de entrega" name="fecha_entrega" onchange="obtenerFecha(this)">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                        </div><br><br><br><br>
                                        <h1 class="all-tittles">Archivos</h1>
                                        <div class="group-material col-xs-12 col-sm-8 col-sm-offset-2">
                                            <input type="file" class="material-control tooltips-general" placeholder="Archivos para la tarea" required="" data-toggle="tooltip" data-placement="top" title="Seleccione un archivo" name="archivo">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                        </div>
                                        <input type="submit" name="accionTareas" value="Hecho" class="btn btn-primary" style="margin-right: 20px;">
                                    </form>
                                <?php
                                }
                                ?>


                                <?php
                                if (isset($_POST['accionTareas']) && ($_POST['accionTareas'] == 'Hecho')) {
                                    $archivoTarea = $_FILES['archivo']['name'];
                                    $archivo = $_FILES['archivo']['tmp_name'];
                                    $ruta = "../assets/files/" . $archivoTarea;
                                    move_uploaded_file($archivo, $ruta);
                                    $tarea->ingresarTarea(
                                        $_POST['cod_nivel_educativo'],
                                        $_POST['cod_asignatura'],
                                        $_POST['cod_periodo_lectivo'],
                                        $_POST['cod_paralelo'],
                                        $cod_docente,
                                        $_POST['titulo_tarea'],
                                        $_POST['detalle_tarea'],
                                        $_POST['fecha_entrega'],
                                        $archivoTarea
                                    );
                                }
                                ?>

                            </div>
                        </section>

                        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                                    </div>
                                    <div class="modal-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias
                                        ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam
                                        ipsa accusamus error. Animi mollitia corporis iusto.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                  




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

        <script>
            $(document).ready(function() {
                $('#dtVerticalScrollExample').DataTable({
                    "scrollY": "200px",
                    "scrollCollapse": true,
                });
                $('.dataTables_length').addClass('bs-select');
            });
        </script>
</body>

</html>