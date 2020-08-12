<?php
session_start();

include '../services/DocenteService.php';
$DocenteServicio=new DocenteService();
$result= $DocenteServicio->findAllPeriodosAct();
if(isset($_POST["agregar"])){
    $registrado='false';
    $error='false';
    $message='false';
    $alumno= $DocenteServicio->findByPKCodAsigAlumno($_POST["codperiodo"], $_POST["selectNivel"], $_SESSION['USER']['COD_PERSONA'], $_POST["selectAsignatura"], $_POST["selectParalelo"], $_POST["selectStudents"]);
    if($alumno["NOTA5"]==null || $alumno["NOTA10"]==null){
        if($_POST["selectQuimestre"]=='1'){
            if($alumno["NOTA5"]==null){
            $promedio=($_POST["nota1"]+$_POST["nota2"]+$_POST["nota3"]+$_POST["nota4"])/4;
            $DocenteServicio->updateNotasAlumnoPrimer($_POST["nota1"],$_POST["nota2"], $_POST["nota3"],$_POST["nota4"], $promedio, $alumno["COD_ASIG_PERIODO"], $alumno["COD_ALUMNO"]);
            $registrado='false';
            }else{
                $registrado='true';
            }
        }else{
            if($alumno["NOTA5"]!=null){
                $promedio=($_POST["nota1"]+$_POST["nota2"]+$_POST["nota3"]+$_POST["nota4"])/4;
                $promedioFinal=($alumno["NOTA5"]+$promedio)/2;
                $DocenteServicio->updateNotasAlumnoSegundo($_POST["nota1"],$_POST["nota2"], $_POST["nota3"],$_POST["nota4"], $promedio, $promedioFinal, $alumno["COD_ASIG_PERIODO"], $alumno["COD_ALUMNO"]);
                $error='false';
            }else{
                $error='true';
            }
        }
    $message='false';
    }else{
        $message='true';
    }
    
}
?>
<!USERTYPE html>
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
              <a href="../Administrator/addPerson.php" class="nav-link">
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
                    <a href="../GestionMatriculas/matricula.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Estudiantes Nuevos </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Infraestructura/addEdificio.php" class="nav-link">
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
                    <a href="../attend.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Asistencias</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../notes_info.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Calificaciones</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../GestionAcademica/UserUSERenteTareasReporte.php" class="nav-link">
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
                    <a href="./ingresoCalificacion.php" class="nav-link">
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
                    <a href="./UserUSERenteTareasReporte.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Verificar Tareas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a href="./UserUSERenteTareas.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registrar Tareas</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="./UserUSERenteTareas.php" class="nav-link">
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
                    <a href="../GestionUsuarios/asigUSERenteMateria.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p> USERente-Asignatura</p>
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
                    <a href="../Reportes/rUSERentes.php" class="nav-link">
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

                    <h5 class="h3 mb-4 text-gray-800" style="color: #fd5f00; text-align:center; ">Registro Calificaciones
                    </h5>


                    <!-- Page Heading -->
                    <div class="content-page-container full-reset custom-scroll-containers">
                        <nav class="navbar-user-top full-reset">
                            <ul class="list-unstyled full-reset">

                                <li style="color:#fff; cursor:default;">
                                    <span class="all-tittles">USERente <?php echo $_SESSION['user']['NOMBRE_USUARIO']  ?></span>
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

                    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div style="display: flex;align-items: center;justify-content: center;">
                            <div class="abs-center">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <form action="ingresoCalificacion.php" id="form" method="POST" class="user">
                                        <div ALIGN=center>
                                            <div class="container text-content-center">
                                                <div class="btn-group">
                                                    <div class="form-group">
                                                        <label for="sel1">Periodo</label>
                                                        <select class="form-control" id="codperiodo" name="codperiodo"
                                                            required>
                                                            <?php
                                                            if($result->num_rows>0){
                                                                while($row = $result->fetch_assoc()) {
                                                        ?>
                                                            <option value="<?php echo $row["COD_PERIODO_LECTIVO"]?>">
                                                                <?php 
                                                            $inicio=$row["FECHA_INICIO"];
                                                            $inicio= date("M Y", strtotime($inicio));
                                                            $fin=$row["FECHA_FIN"];
                                                            $fin=date("M Y", strtotime($fin));
                                                            echo "$inicio - $fin"?>
                                                            </option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="btn-group">
                                                    <div class="form-group">
                                                        <label for="sel1">Nivel educativo</label>
                                                        <select class="form-control" id="selectNivel" name="selectNivel"
                                                            required required style="width: 200px;">
                                                            <option value="">Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="btn-group">
                                                    <div class="form-group">
                                                        <label for="sel1">Asignaturas</label>
                                                        <select class="form-control" id="selectAsignatura" required
                                                            name="selectAsignatura" style="width: 200px;">
                                                            <option value="">Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="btn-group">
                                                    <div class="form-group">
                                                        <label for="sel1">Paralelo</label>
                                                        <select class="form-control" id="selectParalelo"
                                                            name="selectParalelo" required required
                                                            style="width: 200px;">
                                                            <option value="">Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="btn-group">
                                                    <div class="form-group">
                                                        <label for="sel1">Quimestre</label>
                                                        <select class="form-control" id="selectQuimestre" required
                                                            name="selectQuimestre" style="width: 200px;">
                                                            <option value="" selected hidden>Seleccione</option>
                                                            <option value="1">Primer Quimestre</option>
                                                            <option value="2">Segundo Quimestre</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="btn-group">
                                                    <div class="form-group">
                                                        <label for="sel1">Alumno</label>
                                                        <select class="form-control" id="selectStudents"
                                                            name="selectStudents" required style="width: 200px;">
                                                            <option value="">Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div><br>
                                                <hr>
                                                <div class="btn-group">
                                                    <div class="form-group">
                                                        <label for="sel1">Deberes</label>
                                                        <input type="number" min="0" max="10" step="any"
                                                            class="form-control" required value="" placeholder="10"
                                                            id="nota1" name="nota1" style="width: 200px;">
                                                    </div>
                                                </div>
                                                <div class="btn-group">
                                                    <div class="form-group">
                                                        <label for="sel1">Talleres</label>
                                                        <input type="number" min="0" max="10" step="any"
                                                            class="form-control" required value="" placeholder="10"
                                                            id="nota2" name="nota2" style="width: 200px;">
                                                    </div>
                                                </div>
                                                <div class="btn-group">
                                                    <div class="form-group">
                                                        <label for="sel1">Pruebas</label>
                                                        <input type="number" min="0" max="10" step="any"
                                                            class="form-control" required value="" placeholder="10"
                                                            id="nota3" name="nota3" style="width: 200px;">
                                                    </div>
                                                </div>
                                                <div class="btn-group">
                                                    <div class="form-group">
                                                        <label for="sel1">Examenes</label>
                                                        <input type="number" min="0" max="10" step="any"
                                                            class="form-control" required value="" placeholder="10"
                                                            id="nota4" name="nota4" style="width: 200px;">
                                                    </div>
                                                </div><br>
                                                <div class="form-group row py-4" style="justify-content: center;">
                                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                                        <input class="btn btn-primary btn-user btn-block" name="agregar"
                                                            type="submit" value="Registrar">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <a style="text-decoration:none;" href="./index.php"><input
                                                                class="btn btn-secondary btn-user btn-block"
                                                                type="button" value="Cancelar"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" container-fluid" style="width: auto; margin: auto auto">
                                            <?php if(isset($_POST["agregar"])){if($message=='true'){ ?>
                                            <p style="color:red;">* Alumno ya se encuentra
                                                registrado</p>
                                            <?php }if($error=='true'){?>
                                            <p style="color:red;">* Primero debe registrar notas del
                                                PRIMER
                                                QUIMESTRE</p>
                                            <?php }if($registrado=='true'){?>
                                            <p style="color:red;">* Calificaciones del PRIMER
                                                QUIMESTRE ya se
                                                encuentran registradas</p>
                                            <?php }}?>
                                        </div>
                                    </form>
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
            $(USERument).ready(function() {
                $('#dtVerticalScrollExample').DataTable({
                    "scrollY": "200px",
                    "scrollCollapse": true,
                });
                $('.dataTables_length').addClass('bs-select');
            });
        </script>
</body>

</html>