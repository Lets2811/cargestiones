<?php
  header('Content-Type: text/html; charset=UTF-8');
  //Iniciar una nueva sesión o reanudar la existente.
  session_start();
  //Si existe la sesión "cliente"..., la guardamos en una variable.
  if (isset($_SESSION['cliente'])){
      $cliente = $_SESSION['cliente'];
  }else{
header('Location: index.html');//Aqui lo redireccionas al lugar que quieras.
   die() ;
  }
?>
<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>APORTES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/img_aportes/logo1.png">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                       
                        <a href="dashboard.php" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/img_aportes/logo1.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/img_aportes/logo2.png" alt="" height="19">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

          
                </div>

                <div class="d-flex">

                    <div class="dropdown d-none d-lg-inline-block ml-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>

                   

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ml-1">ADMINISTRADOR</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          
                        <a class="dropdown-item text-danger" href="api/control/logout.php"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Cerrar sesión</a>
                        </div>
                    </div>

        
                </div>
            </div>
        </header>
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="dashboard.php" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="afiliacion.php" class="waves-effect">
                                <i class="mdi mdi-pencil-plus-outline"></i>
                                <span>Afiliación</span>
                            </a>
                        </li>
                        <li>
                            <a href="aportes.php" class="waves-effect">
                                <i class="mdi mdi-coin-outline"></i>
                                <span>Aportes</span>
                            </a>
                        </li>
                        <li>
                            <a href="infoAfiliados.php" class="waves-effect">
                                <i class="mdi mdi-file-document-box-search"></i>
                                <span>Información del afiliado</span>
                            </a>
                        </li>
                      
                        <li>
                            <a href="datosClientes.php" class="waves-effect">
                                <i class="bx bx-user-pin"></i>
                                <span>Datos Clientes</span>
                            </a>
                        </li>
                        <li>
                              <a href="gastos.php" class="waves-effect">
                                <i class="bx bx-dollar-circle"></i>
                                <span>Gastos</span>
                            </a>
                        </li>
                     
                        <li>
                            <a href="configuracion.php" class="waves-effect">
                                <i class="mdi mdi-tools"></i>
                                <span>Configuracion</span>
                            </a>
                        </li>

                        <li>
                            <a href="historial.php" class="waves-effect">
                                <i class="bx bx-time-five"></i>
                                <span>Historial</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <section class="my-5 pt-sm-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="home-wrapper">
                                        <div class="mb-5">
                                            <img src="assets/images/img_aportes/logo2.png" alt="logo" height="24" />
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-sm-4">
                                                <div class="maintenance-img">
                                                    <img src="assets/logo2.png" alt=""
                                                        class="img-fluid mx-auto d-block" style="width: 300%;">
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="mt-5">¡BIENVENIDO!</h3>

                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- Modal -->
            <div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                            <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <div>
                                                    <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                                </div>
                                            </th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Wireless Headphone (Black)
                                                    </h5>
                                                    <p class="text-muted mb-0">$ 225 x 1</p>
                                                </div>
                                            </td>
                                            <td>$ 255</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div>
                                                    <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                                </div>
                                            </th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                                    <p class="text-muted mb-0">$ 145 x 1</p>
                                                </div>
                                            </td>
                                            <td>$ 145</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Sub Total:</h6>
                                            </td>
                                            <td>
                                                $ 400
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Shipping:</h6>
                                            </td>
                                            <td>
                                                Free
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Total:</h6>
                                            </td>
                                            <td>
                                                $ 400
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Skote.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                               <strong> POWERED BY </strong><img src="assets/images/img_aportes/logo2.png" alt="logo" height="24" />

                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

 

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>

    <script src="assets/js/app.js"></script>
</body>


</html>