<?php
header('Content-Type: text/html; charset=UTF-8');
//Iniciar una nueva sesión o reanudar la existente.
session_start();
//Si existe la sesión "cliente"..., la guardamos en una variable.
if (isset($_SESSION['cliente'])) {
    $cliente = $_SESSION['cliente'];
} else {
    header('Location: index.html'); //Aqui lo redireccionas al lugar que quieras.
    die();
}
$today = getdate();

if (strlen($today['mday']) === 1) {
    $date = $today['year'] . '-' . $today['mon'] . '-0' . $today['mday'];
} else {
    $date = $today['year'] . '-' . $today['mon'] . '-' . $today['mday'];
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

    <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        .container {
            display: flex;
            /* align-items por defecto tiene el valor `stretch` */
            align-items: start;
        }

        .center-h {
            justify-content: center;
        }

        .center-v {
            align-items: center;
        }
    </style>
</head>

<body data-sidebar="dark" onload="getConsecutivo()">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">

                        <a href="index.html" class="logo logo-light">
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
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
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

        <!-- ========== Left Sidebar Start ========== -->
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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">REGISTRO DE MOVIMIENTOS</h4>


                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="checkout-tabs">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-shipping" role="tabpanel" aria-labelledby="v-pills-shipping-tab">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-3 container center-h center-v">
                                                            <div class="child">
                                                                <h4 class="card-title">Remisión</h4>
                                                                <p class="card-title-desc" style="text-align: center;"><span id="consecutivo"></span></p>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-3 container center-h center-v">
                                                            <div class="child">
                                                                <h4 class="card-title">Afiliado N°</h4>
                                                                <p class="card-title-desc" style="text-align: center;"><span id="afiliadoNo"></span></p>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-3 container center-h center-v">
                                                            <div class="child">
                                                                <h4 class="card-title">Orden</h4>
                                                                <p class="card-title-desc" style="text-align: center;"><span id="orden"></span></p>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-3 container center-h center-v">
                                                            <div class="child">
                                                                <h4 class="card-title">Tipo</h4>
                                                                <p class="card-title-desc" style="text-align: center;"><span id="tipo"></span></p>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <form>
                                                        <div class="form-group row mb-4">
                                                            <select class="form-control col-md-2" id="option" name="option">
                                                                <option value="">Seleciona</option>
                                                                <option value="1">Cédula</option>
                                                                <option value="2">Nombre</option>
                                                                <option value="3">Apellido</option>
                                                                <option value="4">Radicado</option>

                                                            </select>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="Enter your name" id="data" name="data">
                                                            </div>
                                                            <div class="col-md-1" style="font-size: 30px;">
                                                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                                                    <a data-placement="top" title="Buscar" data-toggle="tooltip" onclick="searchInfo()">
                                                                        <i class="bx bx-search-alt"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-4">
                                                            <label for="billing-email-address" class="col-md-2 col-form-label">Afiliado</label>
                                                            <div class="col-md-5">
                                                                <input type="email" class="form-control" id="name" name="name" disabled>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <input type="email" class="form-control" id="iden" name="iden" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-4">
                                                            <label for="billing-phone" class="col-md-2 col-form-label">Aportes</label>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control" id="eps" name="eps" placeholder="Enter your Phone no.">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" id="arl" name="arl" placeholder="Enter your Phone no.">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" id="afp" name="afp" placeholder="Enter your Phone no.">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" id="caja" name="caja" placeholder="Enter your Phone no.">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row mb-4">
                                                            <label for="billing-phone" class="col-md-2 col-form-label">Descripción</label>
                                                            <div class="col-md-4">
                                                                <select class="form-control" id="type">
                                                                    <option value="">Seleciona</option>
                                                                    <option value="aporte">Aporte</option>
                                                                    <option value="retiro">Retiro</option>
                                                                    <option value="reingreso">Reingreso</option>
                                                                    <option value="ingreso">Ingreso</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <select class="form-control" id="month">
                                                                    <option value="">Seleciona</option>
                                                                    <option value="enero">Enero</option>
                                                                    <option value="febrero">Febrero</option>
                                                                    <option value="marzo">Marzo</option>
                                                                    <option value="abril">Abril</option>
                                                                    <option value="mayo">Mayo</option>
                                                                    <option value="Junioi">Junio</option>
                                                                    <option value="julio">Julio</option>
                                                                    <option value="agosto">Agosto</option>
                                                                    <option value="septiembre">Septiembre</option>
                                                                    <option value="octubre">Octubre</option>
                                                                    <option value="noviembre">Noviembre</option>
                                                                    <option value="diciembre">Diciembre</option>
                                                                </select>
                                                            </div>


                                                        </div>
                                                        <div class="form-group row mb-4">
                                                            <label for="billing-address" class="col-md-2 col-form-label">Empresa</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" id="company" name="company" placeholder="Enter your Phone no.">
                                                            </div>
                                                            <label for="billing-address" class="col-md-2 col-form-label">Tipo de vehiculo</label>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control" id="vehicle" name="vehicle" placeholder="Enter your Phone no.">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row mb-4">
                                                            <label for="billing-address" class="col-md-2 col-form-label">Atentido por</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" id="billing-phone" value="Monica Narvaez">
                                                            </div>
                                                            <label for="billing-address" class="col-md-2 col-form-label">Fecha:</label>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control" id="billing-phone" value="<?php echo $date ?>">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row mb-4">
                                                            <label for="billing-address" class="col-md-2 col-form-label">Riesgo</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" id="riesgo" value="">
                                                            </div>
                                                            <label for="billing-address" class="col-md-2 col-form-label">Parcial</label>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control" id="parcial" value="">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row mb-4">
                                                            <label for="billing-address" class="col-md-2 col-form-label">Mora</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" id="mora" value="">
                                                            </div>
                                                            <label for="billing-address" class="col-md-2 col-form-label">Total</label>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control" id="total" value="">
                                                            </div>

                                                        </div>



                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6">
                                        <a href="ecommerce-cart.html" class="btn text-muted d-none d-sm-inline-block btn-link">
                                            <i class=" mr-1"></i> </a>
                                    </div> <!-- end col -->
                                    <div class="col-sm-6">
                                        <div class="text-sm-right">
                                            <!--<a href="api/control/generatePDF.php" class="btn btn-success">-->
                                            <a type="button" style="color: white" onclick="checkLastMovement()" class="btn btn-success">
                                                <i class="mdi mdi-check-underline mr-1"></i> PROCEDER </a>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                        </div>


                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


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
    <!-- MODAL -->


    <div id="miModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel"><span id="titulo"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Nombre</th>
                                        <th data-priority="3">Cédula</th>
                                        <th data-priority="3"></th>
                                    </tr>
                                </thead>
                                <tbody id="search_result">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="miModalPDF" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel"><span id="titulo"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalPDF">

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>


            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/libs/select2/js/select2.min.js"></script>

    <!-- init js -->
    <script src="assets/js/pages/ecommerce-select2.init.js"></script>
    <script src="assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
    <script src="assets/js/pages/sweet-alerts.init.js"></script>
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="utils.js"></script>

    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>


    <script src="assets/js/app.js"></script>

</body>
<script>
    var recibo = '';
    var afiliado = '';
    var orden = '';
    var searchInfo = function() {
        var option = $('#option').val();
        var data = $('#data').val();

        if (option == '') {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Debes elegir un método de busqueda'
            })
        }
        console.log('----------------', data, option)
        $.ajax({
            type: "POST",
            url: 'api/control/searchUser.php',
            data: {
                "option": option,
                "data": utf8_encode(data)
            }
        }).done(function(data_r) {
            console.log(data_r, '+++++')
            var response = JSON.parse(data_r)

            console.log(response, '+++++')
            if (response.length > 1) {
                // multiples registros
                console.log('=======>', response)
                var html = '';
                for (const user of response) {
                    console.log('USER ==>', user)
                    html = html + "<tr>" +
                        "<td>" + user['name'] + " " + user['surname'] + "</td>" +
                        "<td>" + user['document'] + "</td>" +
                        "<td><input class='form-check-input' type='checkbox' value='' id='defaultCheck1' onclick='select_client(" + user['id'] + ")'></td>" +
                        "</tr>";
                }
                document.getElementById('search_result').innerHTML = html;
                $('#titulo').text('MULTIPLES RESULTADOS');
                $("#miModal").modal("show");
            } else if (response.length === 0) {
                $('#titulo').text('SIN RESULTADOS');
                $("#miModal").modal("show");
            } else {
                // resultado unico
                console.log('respuesta', response)
                $('#name').val(response['name'] + ' ' + response['surname']);
                $('#eps').val(response['eps']);
                $('#arl').val(response['arl']);
                $('#afp').val(response['afp']);
                $('#caja').val(response['caja'] == '1' ? 'Aplica' : 'No aplica');
                $('#company').val(response['company']);
                $('#vehicle').val(response['vehicle_type']);
                $('#iden').val(response['document']);
                $('#afiliadoNo').html("<strong>" + response['id'] + "</strong>");
                $('#orden').html("<strong>" + response['internal'] + "</strong>");
                $('#riesgo').val(response['riesgo'])
                $('#tipo').html("<strong>" + response['tipo'].toUpperCase() + "</strong>")

                orden = response['internal'];
                afiliado = response['id'];

            }
        })
    }

    var select_client = function(id) {
        alert(id)
        $.ajax({
            type: "POST",
            url: 'api/control/searchUser.php',
            data: {
                "option": 5,
                "data": id
            }
        }).done(function(data) {
            console.log('DATA', data)
            var response = JSON.parse(data)
            console.log(response)
            $("#miModal").modal("hide");
            $('#name').val(utf8_decode(response['name'] + ' ' + response['surname']));
            $('#eps').val(response['eps']);
            $('#arl').val(response['arl']);
            $('#afp').val(response['afp']);
            $('#caja').val(response['caja'] == '1' ? 'Aplica' : 'No aplica');
            $('#company').val(response['company']);
            $('#vehicle').val(response['vehicle_type']);
            $('#afiliadoNo').html("<strong>" + response['id'] + "</strong>");
            $('#orden').html("<strong>" + response['internal'] + "</strong>");
            $('#iden').val(response['document']);
            $('#riesgo').val(response['riesgo'])
            $('#tipo').html("<strong>" + response['tipo'].toUpperCase() + "</strong>")

            orden = response['internal'];
            afiliado = response['id'];

        })
    }

    var getConsecutivo = function() {
        $.ajax({
            type: "POST",
            url: "api/control/configuration_api.php"
        }).done(function(data) {
            var response = JSON.parse(data);
            console.log('consecutivo', response)
            $('#consecutivo').html("N° <strong>" + response[0]['value'] + "</strong>")
            recibo = response[0]['value'];
        })
    }

    var checkLastMovement = function() {

        $.ajax({
            type: "POST",
            url: "api/control/historia_api.php",
            data: {
                option: '2',
                afiliado: afiliado
            }
        }).done(function(data) {
            var dataJSON = JSON.parse(data);
            console.log(dataJSON)
            if (Object.keys(dataJSON).length != 0) {
                var tabla = `<table id="tech-companies-1" class="table table-striped">
                        <tbody>
                            <tr>
                                <td style="text-align: center;"><strong>Fecha: </strong></td>
                                <td>
                                ${dataJSON[0].date}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><strong> Descripción: </strong></td>
                                <td>
                                ${dataJSON[0].type} en el mes de ${dataJSON[0].month}
                                </td>
                            </tr>
                      </tbody>
                    </table>
                    <br>
                    <strong>¿Registrar movimiento?</strong>`;
                Swal.fire({
                    title: "Último movimmiento registrado",
                    html: tabla,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#34c38f",
                    cancelButtonColor: "#f46a6a",
                    confirmButtonText: "Si, continuar",
                    cancelButtonText: "No, descartar"

                }).then(function(t) {
                    if (t.value) {
                        saveMovement()
                    }
                })
            }else{
                Swal.fire({
                    title: "Usuario registrado recientemente",
                    html: tabla,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#34c38f",
                    cancelButtonColor: "#f46a6a",
                    confirmButtonText: "Si, continuar",
                    cancelButtonText: "No, descartar"

                }).then(function(t) {
                    if (t.value) {
                        saveMovement()
                    }
                })
            }

        })

    }

    var saveMovement = function() {

        //client, amount, date, state, consecutivo, type, month, riesgo, parcial, vAjustado
        var objSend = {
            client: afiliado,
            amount: $('#total').val(),
            consecutivo: recibo,
            type: $('#type').val(),
            month: $('#month').val(),
            riesgo: $('#riesgo').val(),
            parcial: $('#parcial').val(),
            mora: $('#mora').val()
        }

        $.ajax({
            type: "POST",
            url: "api/control/movements_api.php",
            data: objSend
        }).done(function(data) {
            console.log('data afiliado', afiliado)
            if (data > 0) {
                // reiniciar formulario
                getConsecutivo();
                $('#total').val('')
                $('#type').val('')
                $('#month').val('')
                $('#riesgo').val('')
                $('#parcial').val('')
                $('#vAjustado').val('')
                $('#mora').val('')
                $('#afiliadoNo').html("<strong></strong>");
                $('#orden').html("<strong></strong>");
                //fin reiniciar formulario
                document.getElementById('modalPDF').innerHTML = '<embed src="api/control/generatePDF.php?id=' + data + '" type="application/pdf" width="100%" height="600px" />';
                $("#miModalPDF").modal("show");

            }


        })

        console.log('data send', objSend);
    }
</script>

</html>