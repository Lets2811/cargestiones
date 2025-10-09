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

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />


    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>

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
                            <a href="usuarios.php" class="waves-effect">
                                <i class="bx bx-user-pin"></i>
                                <span>Usuarios</span>
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
                                <h4 class="mb-0 font-size-18"> Historial movimientos </h4>
                                <p>El siguiente reporte presenta un patrón de colores que funciona de la siguiente manera:
                                    <br><label style="background-color: #6666ff; width: 100%; padding-top: 1%; padding-bottom: 1%; color:white" align="center">Retirados</label>
                                    <br><label style="background-color: #ff9999; width: 100%; padding-top: 1%; padding-bottom: 1%; color:black" align="center">Último movimiento con mas de 30 días</label>

                                </p>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Filtro global retirados / todos -->
<div class="row mb-3">
  <div class="col-12 d-flex justify-content-end">
    <div class="btn-group" role="group" aria-label="Filtro de estado">
      <button id="btnVerTodos" class="btn btn-outline-secondary btn-sm">
        Ver todos
      </button>
      <button id="btnVerRetirados" class="btn btn-primary btn-sm">
        Ver retirados
      </button>
    </div>
  </div>
</div>



                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="table-rep-plugin">
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="historial-table-dependientes" class="table table-striped">
                                                <caption> USUARIOS DEPENDIENTES</caption>


                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">

                                    <div class="table-rep-plugin">
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="historial-table-independientes" class="table table-striped">
                                                <caption>USUARIOS INDEPENDIENTES</caption>


                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <h1>Movimientos mes de <span id="mes"> - </span></h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">

                                    <div class="table-rep-plugin">
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <span>Mostrar movimientos entre el <input type="number" id="sDate"> y el <input type="number" id="fDate"> de 
                                            <select name="mesSelect" id="mesSelect" onchange="searchInfoMes()">
                                                <option value="0" disabled selected>Selecciona</option>
                                                <option value="1" >Enero</option>
                                                <option value="2" >Febrero</option>
                                                <option value="3" >Marzo</option>
                                                <option value="4" >Abril</option>
                                                <option value="5" >Mayo</option>
                                                <option value="6" >Junio</option>
                                                <option value="7" >Julio</option>
                                                <option value="8" >Agosto</option>
                                                <option value="9" >Septiembre</option>
                                                <option value="10" >Octubre</option>
                                                <option value="11" >Noviembre</option>
                                                <option value="12" >Diciembre</option>
                                            </select>
                                        </span> 
                                            <table id="historial-table-mes-dependiente" class="table table-striped">
                                                <caption>Usuarios Dependientes</caption>

                                            </table>

                                            <hr>

                                            <table id="historial-table-mes-independiente" class="table table-striped">
                                                <caption>Usuarios Independientes</caption>

                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
       
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

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

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <script src="assets/js/pages/sweet-alerts.init.js"></script>
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>


        <script src="assets/js/app.js"></script>

</body>

<script>
    function daysInMonth(year, month1to12) {
  return new Date(year, month1to12, 0).getDate(); // 1..12
}
function enableAndClampDayInputs(last) {
  $('#sDate, #fDate').prop('disabled', false).attr({ min: 1, max: last });
  if (!$('#sDate').val()) $('#sDate').val(1);
  if (!$('#fDate').val()) $('#fDate').val(last);

  let s = Math.max(1, Math.min(parseInt($('#sDate').val(), 10) || 1, last));
  let f = Math.max(s, Math.min(parseInt($('#fDate').val(), 10) || last, last));
  $('#sDate').val(s);
  $('#fDate').val(f);
}
function bindDayGuards() {
  $('#sDate, #fDate').on('input', function () {
    const month = parseInt($('#mesSelect').val(), 10);
    if (!month) return;
    const last = daysInMonth(new Date().getFullYear(), month);
    let s = Math.max(1, Math.min(parseInt($('#sDate').val(), 10) || 1, last));
    let f = Math.max(1, Math.min(parseInt($('#fDate').val(), 10) || last, last));
    if (f < s) f = s;
    $('#sDate').val(s);
    $('#fDate').val(f);
  });
}
function getDayRange(year, month) {
  const last = daysInMonth(year, month);
  let s = parseInt($('#sDate').val(), 10) || 1;
  let f = parseInt($('#fDate').val(), 10) || last;
  s = Math.max(1, Math.min(s, last));
  f = Math.max(s, Math.min(f, last));
  return { dStart: s, dEnd: f };
}

// Deshabilitar hasta elegir mes
$(function () {
  $('#sDate, #fDate').prop('disabled', true).attr({ min: 1, max: 31 });
  bindDayGuards();
});
    var searchInfo = function() {

        $.ajax({
            type: "POST",
            url: 'api/control/historia_api.php',
            data: {
                "option": 1
            }
        }).done(function(data) {
                    var today = moment();

            var rta = JSON.parse(data)
            var html = '';
            var dataSource = [];
            for (var data of rta) {
                var rowDate = moment(data['date']);
                var diferencia = today.diff(rowDate, 'days');
                var obj = [
                    data['name'] + ' ' + data["lastName"],
                    data['document'],
                    data['tipo_afiliacion'],
                    data['eps'],
                    data['afp'],
                    data['arl'],
                    data['riesgo'],
                    data['date'],
                    data['type'] + ' ' + data['month'],
                    data['estado'] == 1 ? 'Activo' : 'Retirado',
                    diferencia > 30 ? '>30' : '0'
                ]

                dataSource.push(obj)
            }


            $('#historial-table-dependientes').DataTable({
                destroy: true,
                data: dataSource,
                'rowCallback': function(row, data, index){
                    var rowDate = moment(data[7]);

                    var diferencia = today.diff(rowDate, 'days');
                    console.log(diferencia, 'hola si');

                    if (data[9] === 'Retirado') {
                         $(row).css('background', '#6666ff');
                         $(row).css('color', 'white');
                         $(row).css('font-weight', 'bold');

                    } else if (diferencia > 45) {
                        $(row).css('background', '#ff9999');
                        $(row).css('font-weight', 'bold');
                    }
                },
                columns: [{
                        title: "Nombre "
                    },
                    {
                        title: "Documento "
                    },
                    {
                        title: "Tipo de afiliación "
                    },
                    {
                        title: "EPS"
                    },
                    {
                        title: "AFP"
                    },
                    {
                        title: "ARL"
                    },
                    {
                        title: "Riesgo"
                    },
                    {
                        title: "Ultimo Movimiento"
                    },
                    {
                        title: "Descripcion"
                    },
                    {
                        title: "Estado"
                    },
                    {
                        title: 'Diferencia'
                    }
                ],
                dom: 'Bfrtip',

                buttons: [
                    'excel', 'pdf'
                ]
            });


        })
    }

    var searchInfoIn = function() {

        $.ajax({
            type: "POST",
            url: 'api/control/historia_api.php',
            data: {
                "option": 3
            }
        }).done(function(data) {

            var rta = JSON.parse(data)

            var today = moment();
            var html = '';
            var dataSource = [];
            for (var data of rta) {
                var rowDate = moment(data['date']);
                var diferencia = today.diff(rowDate, 'days');
                var obj = [
                    data['name'] + ' ' + data["lastName"],
                    data['document'],
                    data['tipo_afiliacion'],
                    data['eps'],
                    data['afp'],
                    data['arl'],
                    data['riesgo'],
                    data['date'],
                    data['type'] + ' ' + data['month'],
                    data['estado'] == 1 ? 'Activo' : 'Retirado',
                    diferencia > 30 ? '>30' : '0'
                ]

                dataSource.push(obj)
            }


            $('#historial-table-independientes').DataTable({
                destroy: true,
                data: dataSource,
                'rowCallback': function(row, data, index){
                    var today = moment();
                    var rowDate = moment(data[7]);

                    var diferencia = today.diff(rowDate, 'days');

                    if (data[9] === 'Retirado') {
                         $(row).css('background', '#6666ff');
                         $(row).css('color', 'white');
                         $(row).css('font-weight', 'bold');

                    } else if (diferencia > 30) {
                        $(row).css('background', '#ff9999');
                        $(row).css('font-weight', 'bold');
                    }
                },
                columns: [{
                        title: "Nombre "
                    },
                    {
                        title: "Documento "
                    },
                    {
                        title: "Tipo de afiliación "
                    },
                    {
                        title: "EPS"
                    },
                    {
                        title: "AFP"
                    },
                    {
                        title: "ARL"
                    },
                    {
                        title: "Riesgo"
                    },
                    {
                        title: "Ultimo Movimiento"
                    },
                    {
                        title: "Descripcion"
                    },
                    {
                        title: "Estado"
                    },
                    {
                        title: "Diferencia"
                    },
                ],
                dom: 'Bfrtip',

                buttons: [
                    'excel', 'pdf'
                ]
            });


        })
    }

var searchInfoMes = function () {
  const month = parseInt($('#mesSelect').val(), 10);
  if (!month) return;

  const meses = ['', 'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
  $('#mes').text(meses[month]);

  const year = new Date().getFullYear();
  const last = daysInMonth(year, month);

  enableAndClampDayInputs(last);

  // Render de tablas con el rango correcto
  searchInfoMesDependientes();
  searchInfoMesIndependientes();
};

    var searchInfoMesDependientes = function () {
  const month = parseInt($('#mesSelect').val(), 10);
  const year = new Date().getFullYear();
  const { dStart, dEnd } = getDayRange(year, month);

  $.ajax({
    type: "POST",
    url: 'api/control/historia_api.php',
    data: {
      "option": 4,
      "mes": month,
      "dStart": dStart,
      "dEnd": dEnd
    }
  }).done(function (data) {

            var rta = JSON.parse(data)
            var html = '';
            var dataSource = [];
            for (var data of rta) {
                var obj = [
                    data['name'] + ' ' + data["lastName"],
                    data['document'],
                    data['tipo_afiliacion'],
                    data['eps'],
                    data['afp'],
                    data['arl'],
                    data['riesgo'],
                    data['date'],
                    data['type'] + ' ' + data['month'],
                    data['estado'] == 1 ? 'Activo' : 'Retirado'
                ]

                dataSource.push(obj)
            }

            $('#historial-table-mes-dependiente').DataTable({
                destroy: true,
                data: dataSource,
                columns: [{
                        title: "Nombre "
                    },
                    {
                        title: "Documento "
                    },
                    {
                        title: "Tipo de afiliación "
                    },
                    {
                        title: "EPS"
                    },
                    {
                        title: "AFP"
                    },
                    {
                        title: "ARL"
                    },
                    {
                        title: "Riesgo"
                    },
                    {
                        title: "Ultimo Movimiento"
                    },
                    {
                        title: "Descripcion"
                    },
                    {
                        title: "Estado"
                    },
                ],
                dom: 'Bfrtip',

                buttons: [
                    'excel', 'pdf'
                ]
            });
        })
    }

    // === NUEVO: Cargar solo RETIRADOS para ambas tablas ===
function cargarRetirados() {
  const today = moment();

  // Dependientes (tipo=dependiente)
  $.ajax({
    type: "POST",
    url: 'api/control/historia_api.php',
    data: { option: 6, estado: 'retirado', tipo: 'dependiente' }
  }).done(function(data) {
    const rta = JSON.parse(data);
    const dataSource = [];

    for (const item of rta) {
      const rowDate = moment(item['date']);
      const diferencia = today.diff(rowDate, 'days');
      dataSource.push([
        item['name'] + ' ' + item["lastName"],
        item['document'],
        item['tipo_afiliacion'],
        item['eps'],
        item['afp'],
        item['arl'],
        item['riesgo'],
        item['date'],
        item['type'] + ' ' + item['month'],
        item['estado'] == 1 ? 'Activo' : 'Retirado',
        diferencia > 30 ? '>30' : '0'
      ]);
    }

    $('#historial-table-dependientes').DataTable({
      destroy: true,
      data: dataSource,
      'rowCallback': function(row, data, index){
        // Como todos son retirados, pinta igual para mantener consistencia visual
        $(row).css('background', '#6666ff');
        $(row).css('color', 'white');
        $(row).css('font-weight', 'bold');
      },
      columns: [
        { title: "Nombre " },
        { title: "Documento " },
        { title: "Tipo de afiliación " },
        { title: "EPS" },
        { title: "AFP" },
        { title: "ARL" },
        { title: "Riesgo" },
        { title: "Ultimo Movimiento" },
        { title: "Descripcion" },
        { title: "Estado" },
        { title: "Diferencia" }
      ],
      dom: 'Bfrtip',
      buttons: ['excel', 'pdf']
    });
  });

  // Independientes (tipo=independiente)
  $.ajax({
    type: "POST",
    url: 'api/control/historia_api.php',
    data: { option: 6, estado: 'retirado', tipo: 'independiente' }
  }).done(function(data) {
    const rta = JSON.parse(data);
    const dataSource = [];

    for (const item of rta) {
      const rowDate = moment(item['date']);
      const diferencia = today.diff(rowDate, 'days');
      dataSource.push([
        item['name'] + ' ' + item["lastName"],
        item['document'],
        item['tipo_afiliacion'],
        item['eps'],
        item['afp'],
        item['arl'],
        item['riesgo'],
        item['date'],
        item['type'] + ' ' + item['month'],
        item['estado'] == 1 ? 'Activo' : 'Retirado',
        diferencia > 30 ? '>30' : '0'
      ]);
    }

    $('#historial-table-independientes').DataTable({
      destroy: true,
      data: dataSource,
      'rowCallback': function(row, data, index){
        $(row).css('background', '#6666ff');
        $(row).css('color', 'white');
        $(row).css('font-weight', 'bold');
      },
      columns: [
        { title: "Nombre " },
        { title: "Documento " },
        { title: "Tipo de afiliación " },
        { title: "EPS" },
        { title: "AFP" },
        { title: "ARL" },
        { title: "Riesgo" },
        { title: "Ultimo Movimiento" },
        { title: "Descripcion" },
        { title: "Estado" },
        { title: "Diferencia" }
      ],
      dom: 'Bfrtip',
      buttons: ['excel', 'pdf']
    });
  });
}


    var searchInfoMesIndependientes = function() {
        const month = parseInt($('#mesSelect').val(), 10);
        const year = new Date().getFullYear();
        const { dStart, dEnd } = getDayRange(year, month);
        $.ajax({
            type: "POST",
            url: 'api/control/historia_api.php',
            data: {
                "option": 5,
                "mes": month,
                "dStart": dStart,
                "dEnd": dEnd
            }
        }).done(function(data) {

            var rta = JSON.parse(data)
            var html = '';
            var dataSource = [];
            //  var pos = 0;
            for (var data of rta) {

                
                var obj = [
                    data['name'] + ' ' + data["lastName"],
                    data['document'],
                    data['tipo_afiliacion'],
                    data['eps'],
                    data['afp'],
                    data['arl'],
                    data['riesgo'],
                    data['date'],
                    data['type'] + ' ' + data['month'],
                    data['estado'] == 1 ? 'Activo' : 'Retirado'
                ]

                dataSource.push(obj)
            }

            var table = $('#historial-table-mes-independiente').DataTable({
                destroy: true,
                data: dataSource,
               
                columns: [{
                        title: "Nombre "
                    },
                    {
                        title: "Documento "
                    },
                    {
                        title: "Tipo de afiliación "
                    },
                    {
                        title: "EPS"
                    },
                    {
                        title: "AFP"
                    },
                    {
                        title: "ARL"
                    },
                    {
                        title: "Riesgo"
                    },
                    {
                        title: "Ultimo Movimiento"
                    },
                    {
                        title: "Descripcion"
                    },
                    {
                        title: "Estado"
                    },
                ],
                dom: 'Bfrtip',

                buttons: [
                    'excel', 'pdf'
                ]
            });


        })
    }



    searchInfo()
    searchInfoIn()
    $(function () {
  // Ver retirados (usa option=6 que ya construiste en el backend)
  $('#btnVerRetirados').on('click', function (e) {
    e.preventDefault();
    cargarRetirados();
  });

  // Ver todos (restaura las tablas originales)
  $('#btnVerTodos').on('click', function (e) {
    e.preventDefault();
    // Si quieres, puedes limpiar primero, pero con destroy:true no hace falta
    searchInfo();   // dependientes (option=1)
    searchInfoIn(); // independientes (option=3)
  });
});
</script>

</html>