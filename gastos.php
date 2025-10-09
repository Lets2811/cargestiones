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
include('api/helpers/conx.php');
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

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark" onload="getExpenses()">

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
                                <h4 class="mb-0 font-size-18">Gastos</h4>

                           

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
           
                
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <h4 class="card-title">Cierre de caja para el día: </h4>
                                    
                                    <p class="card-title-desc"></p>


                                    <form class="needs-validation" novalidate>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="validationCustom01">Fecha</label>
                                                        <input class="form-control" type="date" name="gasto_fecha" id="gasto_fecha" value="<?php echo date('Y-m-d'); ?>">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <a class="btn btn-primary" type="button" onclick="searchGastos()" style="color: white; margin-top: 20%">BUSCAR</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
            
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Descripción</label>
                                                            <input type="text" class="form-control" name="gasto_descripcion" id="gasto_descripcion" placeholder="Descripcion del gasto " required">
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Monto</label>
                                                            <input name="" id="gasto_monto" class="form-control input-mask text-left" data-inputmask="">
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="btn btn-primary" type="button" onclick="saveExpenses()" style="color: white;">GUARDAR</a>
                                            </div>
                                            
                                            <div class="col-md-6">
                                            <div class="table-rep-plugin">
                                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                            <table id="costos_table" class="table table-striped">
                                                                <thead>
                                                                <th ><span  class="co-name">Resumen gastos del dia </span></th>
                                                                <tr>
                                                                    <th data-priority="3">Descripcion</th>
                                                                    <th data-priority="1">Valor </th>
                                                                    <th data-priority="2">Fecha</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="gasto-resultado">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                   </div>
                                        </div>
                                        
                                    </form>

                                    <div>
                                            <div class="table-rep-plugin">
                                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                            <br>
                                                            <h4 style="text-align: center"; > Resumen valores totales del dia </h4>
                                                            <table id="costos_table" class="table table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th data-priority="3">Ingresos</th>
                                                                    <th data-priority="1">Gastos </th>
                                                                    <th data-priority="2">Diferencia</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="totales-resultado">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                           </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div> <!-- end col -->
              

                    <!-- modales -->
              
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
    <!-- END layout-wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- form wizard -->
    <script src="assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>
    <!-- form wizard init -->
    <script src="assets/js/pages/form-wizard.init.js"></script>

    <script src="assets/js/app.js"></script>


    <!-- OTRAS-->
     
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/libs/parsleyjs/parsley.min.js"></script>

    <script src="assets/js/pages/form-validation.init.js"></script>

    <script src="assets/js/app.js"></script>

    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/pages/datatables.init.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>


    <!-- form mask -->
    <script src="assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- form mask init -->
    <script src="assets/js/pages/form-mask.init.js"></script>
      <!-- Sweet Alerts js -->
      <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>
    <!--OTRAS -->


<script>
 
    function saveExpenses() {
        var monto = $('#gasto_monto').val() != "" ?      $('#gasto_monto').val()  : null;
        var fecha = $('#gasto_fecha').val() != "" ?      $('#gasto_fecha').val() : null;
        var descripcion = $('#gasto_descripcion').val()!= "" ? $('#gasto_descripcion').val() : null;
        
        var obj = {
            option: '1',
            monto: monto,
            fecha: fecha,
            descripcion: descripcion
            }
        //console.log(obj)

        $.ajax({
            url: 'api/control/gastos_api.php',
            type: "POST",
            data: obj
        }).done(function(data){

            //console.log(data);
            var today = new Date();
            var fecha = today.getFullYear() +'-'+(today.getMonth()+1).toString()+ '-'+today.getDate(); 

            $('#gasto_monto').val('');
            $('#gasto_fecha').val($('#gasto_fecha').val());
            $('#gasto_descripcion').val('');

            getExpenses();
        })
    } 

    function getExpenses() { 

        var obj = { option: '2', date: $('#gasto_fecha').val() }
        $.ajax({
            url: 'api/control/gastos_api.php',
            type: "POST",
            data: obj
        }).done(function(data){
            //console.log("gastos");
            var html = '';
            responce = JSON.parse(data);
            for (var data of responce)
            {
                html = html +  '<tr>'+
                '<td>'+data['description']+'</td>'+
                '<td align="center">'+data['value']+'</td>'+
                '<td>'+data['date']+'</td>'+
                '</tr>';
            }
            $('#gasto-resultado').html(html);

            getSum();
        })
    }

    function getSum() { 

        var obj = { option: '3', date: $('#gasto_fecha').val() }
        $.ajax({
            url: 'api/control/gastos_api.php',
            type: "POST",
            data: obj
        }).done(function(data){
            var responce = JSON.parse(data);
            //console.log(data) 
            var html = '';
            movimientos = responce[1]["SUM(amount)"];
            gastos      = responce[0]["SUM(value)"];

            diferencia =movimientos - gastos;
            if(diferencia < 0 || diferencia == null){
                diferencia = 0;
            }
     
            if(movimientos < 0 || movimientos == null) {
                movimientos = 0;
            }
            
            html = html +  '<tr>'+
                '<td>'+movimientos+'</td>'+
                '<td>'+gastos +'</td>'+
                '<td>'+diferencia+'</td>'+
                '</tr>';
            
            $('#totales-resultado').html(html);
        })

    }

    var searchGastos = function(){
        getExpenses();
    }

</script>
</body>


</html>