<!DOCTYPE html>
<html lang="en">

<head>
    <title>ACERCA DE NOSOTROS|GALÁPAGOS ACADEMY</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../images/Logo.png" type="image/png" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../styles/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../../styles/animate.css">
    <link rel="stylesheet" href="../../styles/owl.carousel.min.css">
    <link rel="stylesheet" href="../../styles/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../styles/magnific-popup.css">
    <link rel="stylesheet" href="../../styles/aos.css">
    <link rel="stylesheet" href="../../styles/ionicons.min.css">
    <link rel="stylesheet" href="../../styles/flaticon.css">
    <link rel="stylesheet" href="../../styles/icomoon.css">
    <link rel="stylesheet" href="../../styles/style.css">
</head>
<hr>
<table>
    <tr>
        <td>
            <div>
                <h6 style="color:rgb(252, 252, 252);">esp</h6>
            </div>
        </td>
        <td>

            <div>
                <div>
                    <div>
                        <div class style="margin-top: -40px;">
                            <img src="../../images/intranet.png" style="width: 650px; ">
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <div>
                <h6 style="color:rgb(252, 252, 252);">sdfsdfs</h6>
            </div>
        </td>
        <td>
            <br>
            <div class="wpb_column vc_column_container vc_col-sm-8">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
                            <div class="container">
                                <div class="row d-flex align-items-stretch no-gutters">
                                    <div class="col-md-16 p-8 p-md-7 order-md-last bg-light">
                                       
                                            <div class="text-center">
                                                <img src="../../images/Logo.png" style="width: 200px;">
                                            </div>
                                            <br>
                                            <form action="./php/login.php" method="POST">
                                                <h3 style="text-align: center;">BIENVENIDO! INICIE SESIÓN AQUÍ ABAJO
                                                </h3>

                                                <h4 class="text-center">Nombre de usuario:</h4>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="username">
                                                </div>
                                                <h4 class="text-center">Contraseña:</h4>
                                                <input type="password" class="form-control" name="password">
                                                <div class="form-group">
                                                <?php
                                      if(isset($_GET["fallo"])&&isset($_GET["fallo"])=='true'){?>
                                        <label class="form-control-label" style="color:#9C2222;">
                                            * Usuario o contraseña incorrectos
                                        </label>
                                        <?php }?>
                                        <?php if(isset($_GET["row"])&&isset($_GET["row"])=='true'){?>
                                        <label class="form-control-label" style="color:#9C2222;">
                                            * Por favor llene todos los campos
                                        </label>
                                        <?php } ?>
                                                </div>
                                                <div class="contact100-form-checkbox">
                                                    <input class="input-checkbox100" id="ckb1" type="checkbox"
                                                        name="remember-me">
                                                    <label class="label-checkbox100" for="ckb1">
                                                        Recordarme
                                                    </label>
                                                </div>
                                                <div class="text-center">
                                                    <a href="./forgetPass.html" class="txt1">
                                                        Olvidó su contraseña?
                                                    </a>
                                                </div>
                                                <br>
                                                <div class="form-group text-center">

                                                    <button class="btn btn-primary py-3 px-5" type="submit"
                                                      >INGRESAR</button>
                                                </div>
                                            </form>

                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="vc_tta-container" data-vc-action="collapse">
                            <div
                                class="vc_general vc_tta vc_tta-accordion vc_tta-color-grey vc_tta-style-outline vc_tta-shape-square vc_tta-o-shape-group vc_tta-controls-align-left vc_tta-o-no-fill  ztl-accordion">
                                <div class="vc_tta-panels-container">

                                </div>
                            </div>
                        </div>
                        <div class="vc_empty_space" style="height: 40px"><span class="vc_empty_space_inner"></span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </td>
        <td>
            <div>
                <h6 style="color:rgb(252, 252, 252);">sep</h6>
            </div>
        </td>
    </tr>
</table>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" />
    </svg></div>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/jquery-migrate-3.0.1.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.easing.1.3.js"></script>
<script src="../../js/jquery.waypoints.min.js"></script>
<script src="../../js/jquery.stellar.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/jquery.magnific-popup.min.js"></script>
<script src="../../js/aos.js"></script>
<script src="../../js/jquery.animateNumber.min.js"></script>
<script src="../../js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="../../js/google-map.js"></script>
<script src="../../js/main.js"></script>

</body>

</html>