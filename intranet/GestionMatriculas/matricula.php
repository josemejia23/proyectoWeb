<?php
session_start();

?>

<?php include("db.php"); ?>
<?php

$accion = "Matricular";
$accion2 = "disabled";
$COD_PERSONA = "";
$NOTA = "";
$CEDULA = "";
$NOMBRE = '';
$APELLIDO = "";
$NIVEL_SIG = "";
$ESTADO="";
$NOMBRE_NIVEL = '';
$NIVEL = '';
$COD_NIVEL_EDUCATIVO = '';
$accion2 = "style='display: none'";
$aux = '1726869991';


if (isset($_GET['COD_PERSONA'])) {
    echo $_GET['COD_PERSONA'];
    $result_sede = $conn->query("SELECT * FROM ASPIRANTE INNER JOIN CALIFICACION_PRUEBA_ASPIRANTE ON ASPIRANTE.COD_PERSONA=CALIFICACION_PRUEBA_ASPIRANTE.COD_PERSONA INNER JOIN NIVEL_EDUCATIVO ON NIVEL_EDUCATIVO.COD_NIVEL_EDUCATIVO=CALIFICACION_PRUEBA_ASPIRANTE.COD_NIVEL_EDUCATIVO WHERE ASPIRANTE.COD_PERSONA=" . $_GET['COD_PERSONA']);
    if (mysqli_num_rows($result_sede) == 1) {
        $row = mysqli_fetch_array($result_sede);
        $COD_PERSONA = $row['COD_PERSONA'];
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
    $aux = $resp;

    $result_sede = $conn->query("SELECT PERSONA.COD_PERSONA, PERSONA.APELLIDO, PERSONA.NOMBRE, PERSONA.CEDULA FROM PERSONA INNER JOIN TIPO_PERSONA_PERSONA ON TIPO_PERSONA_PERSONA.COD_PERSONA=PERSONA.COD_PERSONA INNER JOIN TIPO_PERSONA ON TIPO_PERSONA.COD_TIPO_PERSONA=TIPO_PERSONA_PERSONA.COD_TIPO_PERSONA
    WHERE TIPO_PERSONA.COD_TIPO_PERSONA=4 AND PERSONA.CEDULA LIKE" . $resp);
    if (mysqli_num_rows($result_sede) == 1) {
        $row = mysqli_fetch_array($result_sede);
        $COD_PERSONA = $row['COD_PERSONA'];
        $CEDULA = $row['CEDULA'];
        $APELLIDO = $row['APELLIDO'];
        $NOMBRE = $row['NOMBRE'];
        $accion2 = "";
        //$accion = "Modificar";
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
            <li class="nav-item has-treeview">
              <a href="calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Calendario Académico
                  <span class="badge badge-info right"></span>
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
                  <a href="./Administrator/addPerson.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Añadir Calendario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./Administrator/addPerson.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Actualizar Calendario</p>
                  </a>
                </li>
              </ul>
            </li>




            <?php if ($_SESSION["USER"]['COD_ROL'] == '1' || $_SESSION["USER"]['COD_ROL'] == '6') {
              echo '<li class="nav-item has-treeview">
              <a href="./Administrator/addPerson.php" class="nav-link">
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
                  <a href="../GestionUsuarios/addPerson.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Personal</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../GestionUsuarios/gestAlumno.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alumno-Representante</p>
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
                <a href="../Aspirantes/addAspirant.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestionar Aspirantes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Aspirantes/aspirantsGrades.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notas Aspirantes</p>
                </a>
              </li>
              
              
            </ul>
            
          </li>
          ';
            } ?>

            <?php if ($_SESSION["USER"]['COD_ROL'] == '1' || $_SESSION["USER"]['COD_ROL'] == '4' || $_SESSION["USER"]['COD_ROL'] == '6') {
              echo ' <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Gestión Matrículas
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./matricula.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Estudiantes Nuevos </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Estudiantes Antiguos</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
                ';
            } ?>

            <?php //if($_SESSION["USER"]['COD_ROL']=='1') { 
            /* echo '<li class="nav-item has-treeview">
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
                </li>'; */
            //} 
            ?>

            <?php if ($_SESSION["USER"]['COD_ROL'] == '1' || $_SESSION["USER"]['COD_ROL'] == '6') {
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
                    <a href="../Infraestructura/addSede.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sedes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Infraestructura/addEdificio.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Edificios</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Infraestructura/addAula.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Aulas</p>
                    </a>
                  </li>
                </ul>
              </li>
                ';
            } ?>




            <?php if ($_SESSION["USER"]['COD_ROL'] == '4' || $_SESSION["USER"]['COD_ROL'] == '5' || $_SESSION["USER"]['COD_ROL'] == '6' || $_SESSION["USER"]['COD_ROL'] == '2') {


              echo '<li class="nav-item has-treeview">
                
                <a href="./notes_info.html" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Gestión Escolar
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="../GestionAcademica/horario.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Horario</p>
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
                    <a href="../GestionAcademica/UserDocenteTareasReporte.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tareas</p>
                    </a>
                  </li>
                </ul>
              </li>
  
                  ';
            } ?>


            <?php if ($_SESSION["USER"]['COD_ROL'] == '3' || $_SESSION["USER"]['COD_ROL'] == '6') {
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
                    <a href="../GestionAcademica/UserDocenteTareasReporte.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Verificar Tareas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a href="../GestionAcademica/UserDocenteTareas.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registrar Tareas</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="../GestionAcademica/UserDocenteTareas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comunicados</p>
                </a>
              </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Reuniones  </p>
                    </a>
                  </li>
  
  
  
                </ul>
              </li>
  
                ';
            } ?>





            <?php if ($_SESSION["USER"]['COD_ROL'] == '1' || $_SESSION["USER"]['COD_ROL'] == '6') {
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
                    <a href="../GestionInstitucion/periodo.php" class="nav-link">
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
                    <a href="../GestionUsuarios/asigDocenteMateria.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p> Docente-Asignatura</p>
                    </a>
                  </li>
                </ul>
              </li>
                  ';
            } ?>


            <?php if ($_SESSION["USER"]['COD_ROL'] == '1' || $_SESSION["USER"]['COD_ROL'] == '6') {
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
                    <a href="../Reportes/restdiantes.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Reportes de Alumnos </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Reportes/rdocentes.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Reportes de Profesores</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Reportes/reporteAulas.php" class="nav-link">
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
          <main class="container p-4">
                        <form action="matricula.php" method="GET">
                            <p>
                                Búsqueda Cédula: <input type="search" name="CEDULA" placeholder="CEDULA">
                                <input type="submit" name="buscar" value="Buscar">
                            </p>
                        </form>
                        <div class="row">
                            <!-- ADD BOOKS FORM-->
                            <div class="col-md-4  ">
                                <form action="matricula.php" method="POST">
                                    <div class="form-group">
                                        <label for="" <?php echo $accion2; ?>><?php echo 'Cédula: ' . $CEDULA ?></label>
                                        <br>
                                        <label for="" <?php echo $accion2; ?>><?php echo 'Apellido: ' . $APELLIDO ?></label>
                                        <br>
                                        <label for="" <?php echo $accion2; ?>><?php echo 'Nombre: ' . $NOMBRE ?></label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="COD_PERSONA" class="form-control form-control-user" value="<?php echo $COD_PERSONA; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="accion" class="form-control form-control-user" value="<?php echo $accion; ?>">
                                </form>
                            </div>
                        </div>


                        <div class="col-md_8 table-responsive">
                            <table class=" table table-hover" id="dtVerticalScrollExample">
                                <thead>
                                    <tr>
                                        <th scope="col">CP</th>
                                        <th scope="col">NOMBRE_NIVEL</th>
                                        <th scope="col">NIVEL</th>
                                        <th scope="col">PROMEDIO</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $result_sede = $conn->query("SELECT PERSONA.COD_PERSONA ,PERSONA.NOMBRE, PERSONA.APELLIDO, PERSONA.CEDULA, MATRICULA_PERIODO.PROMEDIO_FINAL, NIVEL_EDUCATIVO.COD_NIVEL_EDUCATIVO, NIVEL_EDUCATIVO.NOMBRE_NIVEL, NIVEL_EDUCATIVO.NIVEL,PERIODO_LECTIVO.COD_PERIODO_LECTIVO,PERIODO_LECTIVO.ESTADO, ALUMNO_ASIGNATURA_PERIODO.NOTA11  from MATRICULA_PERIODO INNER JOIN PERSONA ON PERSONA.COD_PERSONA=MATRICULA_PERIODO.COD_ALUMNO INNER JOIN NIVEL_EDUCATIVO ON NIVEL_EDUCATIVO.COD_NIVEL_EDUCATIVO=MATRICULA_PERIODO.COD_NIVEL_EDUCATIVO INNER JOIN PERIODO_LECTIVO on PERIODO_LECTIVO.COD_PERIODO_LECTIVO=MATRICULA_PERIODO.COD_PERIODO_LECTIVO INNER JOIN ALUMNO_ASIGNATURA_PERIODO ON ALUMNO_ASIGNATURA_PERIODO.COD_MATRICULA=MATRICULA_PERIODO.COD_MATRICULA
                                WHERE PERSONA.CEDULA LIKE " . $aux);

                                    while ($row = mysqli_fetch_assoc($result_sede)) { ?>
                                        <tr>
                                            <td><?php echo $row['COD_PERIODO_LECTIVO']; ?></td>
                                            <td><?php echo $row['NOMBRE_NIVEL']; ?></td>
                                            <td><?php echo $row['NIVEL']; ?></td>
                                            <td><?php echo $ESTADO = $row['NOTA11']; ?></td>
                                            <?php $NIVEL_SIG = $row['COD_NIVEL_EDUCATIVO']; ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        if ($NIVEL_SIG != null) {
                            if ($ESTADO != null) {
                                $NIVEL_SIG = $NIVEL_SIG + 1;
                            }
                            $result = $conn->query("SELECT * FROM NIVEL_EDUCATIVO WHERE COD_NIVEL_EDUCATIVO =" . $NIVEL_SIG);
                            if (mysqli_num_rows($result) == 1) {
                                $row = mysqli_fetch_array($result);
                                $NOMBRE_NIVEL = $row['NOMBRE_NIVEL'];
                                $NIVEL = $row['NIVEL'];
                                $COD_NIVEL_EDUCATIVO = $row['COD_NIVEL_EDUCATIVO'];
                            }
                        }
                        ?>
                        <form class="user" action="matricularAlumno.php" method="POST">
                            <label for=""> MATRICULA CORRESPONDIENTE</label>
                            <div class="form-group">
                                <label for="" <?php echo $accion2; ?>><?php echo 'Nombre Nivel: ' . $NOMBRE_NIVEL ?></label>

                            </div>
                            <div class="form-group">
                                <label for="" <?php echo $accion2; ?>><?php echo 'Nivel: ' . $NIVEL ?></label>
                            </div>
                            <div class="form-group">
                                <label hidden for="" <?php echo $accion2; ?>><?php echo 'Cédula: ' . $COD_NIVEL_EDUCATIVO ?></label>
                            </div>
                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                <input type="hidden" name="COD_NIVEL_EDUCATIVO" class="form-control form-control-user" value="<?php echo $COD_NIVEL_EDUCATIVO; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="COD_PERSONA" class="form-control form-control-user" value="<?php echo $COD_PERSONA; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="ESTADO" class="form-control form-control-user" value="<?php echo $ESTADO; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="accion" class="form-control form-control-user" value="<?php echo $accion; ?>">
                            </div>
                            <input type="submit" name="save_sede" class="btn btn-success btn-block" value="<?php echo $accion; ?>">
                        </form>

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