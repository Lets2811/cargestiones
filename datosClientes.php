
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
                                    <h4 class="mb-0 font-size-18">Clientes </h4>

                          
                                    
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
                                                                        <input type="text" class="form-control" placeholder="Enter your id number" id="data" name="data">
                                                                    </div>
                                                                    <div class="col-md-1 icon-demo-content">
                                                                       
                                                                            <a data-placement="top" title="Buscar" data-toggle="tooltip" onclick="searchInfo()"> 
                                                                                <i class="bx bx-search-alt"></i>
                                                                            </a>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-4">
                                                                    <label for="billing-email-address" class="col-md-2 col-form-label">Afiliado </label>
                                                                    <div class="col-md-3">
                                                                        <input type="email" class="form-control" id="name" name="name" placeholder = "Full name">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input type="email" class="form-control" id="surname" name="surname" placeholder = "Full name">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input type="email" class="form-control" id="iden" name="iden" disabled placeholder = "Identification number">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-4">
                                                                    <label for="billing-phone" class="col-md-2 col-form-label">Aportes</label>
                                                                    <div class="col-md-3" id = "div_eps" >
                                                                        <select class="form-control" id="eps">
                                                                            <option value="">EPS</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2" id = "div_arl">
                                                                        <select class="form-control" id="arl">
                                                                            <option value="">ARL</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2" id="div_afp">
                                                                        <select class="form-control" id="afp">
                                                                            <option value="">AFP</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2" id="div_caja">
                                                                        <select class="form-control" id="caja">
                                                                            <option value="null" disabled>Caja de compensacion</option>
                                                                            <option value="1">Comfacauca</option>
                                                                            <option value="0">No Aplica</option>

                                                                        </select>
                                                                    </div>
                                                             
                                                                </div>


                                                                <div class="form-group row mb-4">
                                                                    <label for="billing-address" class="col-md-2 col-form-label">Empresa</label>
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control" id="company" name="company" placeholder="Enter your Phone no.">
                                                                    </div>
                                                                    <label for="billing-address" class="col-md-2 col-form-label">Cargo</label>
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="position" name="vehicle" placeholder="Enter your position.">
                                                                    </div>
                                                                 
                                                                </div>

                                                                <div class="form-group row mb-4">
                                                                    <label for="billing-address" class="col-md-2 col-form-label">Direccion</label>
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control" id="address" name="company" placeholder="Enter your adress ">
                                                                    </div>
                                                                    <label for="billing-address" class="col-md-2 col-form-label">Telefono</label>
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="phone" name="vehicle" placeholder="Enter your Phone no.">
                                                                    </div>
                                                                </div>    
                                                                <div class="form-group row mb-4">                                                    
                                                                    <label for="billing-address" class="col-md-2 col-form-label">Riesgo</label>
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control" id="risk" name="vehicle" placeholder="Enter your Risk">
                                                                    </div>
                                                                                                              
                                                                    <label for="billing-address" class="col-md-2 col-form-label">Tipo de afiliación</label>
                                                                    <div class="col-md-4">
                                                                    <select id="afiliacionT" name="afiliacionT" class="form-control" onchange="confirmEps()">
                                                                        <option value="null">--Seleccionar--</option>
                                                                        <option value="dependiente">Dependiente</option>
                                                                        <option value="independiente">Independiente</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="row" align="right">
                                            <div class="col-sm-6">
                                                <a href="ecommerce-cart.html" class="btn text-muted d-none d-sm-inline-block btn-link">
                                                    <i class=" mr-1"></i>  </a>
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <button onclick="saveDataUser()" class="btn btn-success" disabled id ="btnSave">
                                                        <i class="mdi mdi-check-underline mr-1"></i> Actualizar datos </a>
                                                     </button>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                            <!-- end row -->

                               
                            </div>
                            
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

<!-- Sweet alert init js-->
<script src="assets/js/pages/sweet-alerts.init.js"></script>


        <script src="assets/js/app.js"></script>
        
    </body>
<script>

    function mostrarEps(selectedEps) {
        
        var obj2 = {
            option: 2,
        }
        var epsId = 0
        $.ajax({
            url: 'api/control/saveEps.php',
            type: "POST",
            data: obj2
            }).done(function(data){
                epsJson = JSON.parse(data)
                var html = '<select id="eps" name="eps" class="form-control" >';
                for (var i=0;i<epsJson.length;i++) {
                    if(selectedEps==epsJson[i]["name"])
                    {
                        var epsId =   epsJson[i]["id"]
                    }
                    html = html + '<option value = '+epsJson[i]["id"]+'>'+ epsJson[i]["name"]+'</option>';
                }
                html = html + '</select>';
                $('#div_eps').html(html);
                console.log(selectedEps,'///////',epsId);
                $('#eps').val(epsId)
            });
    } 

    function mostrarArl(selectedArl) {
        
        var obj2 = {
            option: 2,
        }
        var arlId = 0
        $.ajax({
            url: 'api/control/saveArl.php',
            type: "POST",
            data: obj2
            }).done(function(data){
                arlJson = JSON.parse(data)
                var html = '<select id="arl" name="arl" class="form-control" >';
                for (var i=0;i<arlJson.length;i++) {
                    if(selectedArl==arlJson[i]["name"])
                    {
                        var arlId =   arlJson[i]["id"]
                    }
                    html = html + '<option value = '+arlJson[i]["id"]+'>'+ arlJson[i]["name"]+'</option>';
                }
                html = html + '</select>';
                $('#div_arl').html(html);
                //console.log(selectedEps);
                $('#arl').val(arlId)
            });
    }

    function mostrarAfp(selectedAfp) {
        
        var obj2 = {
            option: 2,
        }
        var afpId = 0
        $.ajax({
            url: 'api/control/saveAfp.php',
            type: "POST",
            data: obj2
            }).done(function(data){
                afpJson = JSON.parse(data)
                var html = '<select id="afp" name="afp" class="form-control" >'+
                            '<option value="0" disabled>---Seleciona---</option>';
                for (var i=0;i<afpJson.length;i++) {
                    if(selectedAfp==afpJson[i]["name"])
                    {
                        var afpId =   afpJson[i]["id"]
                    }
                    html = html + '<option value = '+afpJson[i]["id"]+'>'+ afpJson[i]["name"]+'</option>';
                }
                html = html + '</select>';
                $('#div_afp').html(html);
                //console.log(selectedEps);
                //$('#afp').val(selectedAfp)
                $('#afp').val(afpId)
            });
    }

    function mostrarCaja(selectedCaja) {
        $('#caja').val(selectedCaja)
    }
    
    var searchInfo = function(){

         var option = $('#option').val();
         var data = $('#data').val();

         if(option == ''){
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
        data: {"option": option, "data":data}
    }).done(function(data){
        console.log(data,'+++++')
        var response = JSON.parse(data)
        //console.log(response,'+++++')
        if(response.length > 1){
            // multiples registros
            console.log('=======>', response)
            var html = '';
            for (const user of response) {
               console.log('USER ==>', user)
               html = html + "<tr>" +
               "<td>" + user['name'] + " " + user['surname'] + "</td>" +
               "<td>" + user['document'] + "</td>" +
               "<td><input class='form-check-input' type='checkbox' value='' id='defaultCheck1' onclick='select_client("+user['id'] +")'></td>" +
               "</tr>";
            }
            document.getElementById('search_result').innerHTML = html;
            $('#titulo').text('MULTIPLES RESULTADOS');
            $("#miModal").modal("show");
        }else if(response.length === 0){
            $('#titulo').text('SIN RESULTADOS');
            $("#miModal").modal("show");
        }else{
            // resultado unico
            $("#btnSave").removeAttr("disabled");//habilita boton
            console.log('respuesta', response)
           
            $('#name').val(response['name']);
            $('#surname').val(response['surname']);
            $('#iden').val(response['document']);
            $('#company').val(response['company']);
            $('#position').val(response['position']);
            $('#address').val(response['address']);
            $('#phone').val(response['phone']);
            $('#afiliadoNo').html("<strong>" + response['id']+ "</strong>");
            $('#orden').html("<strong>" + response['internal']+ "</strong>");
            $('#risk').val(response['riesgo'])

            $('#afiliacionT').val(response['tipo'])
            
            mostrarEps(response['eps'])
            mostrarArl(response['arl'])
            mostrarAfp(response['afp'])

            var caja = response['caja'] == '0' ? 'null' : response['caja'];
            mostrarCaja(caja)
        
        }
    })
    }

    var select_client = function(id){
        $.ajax({
        type: "POST",
        url: 'api/control/searchUser.php',
        data: {"option": 5, "data":id}
    }).done(function(data){
        console.log('RES', data)
        var response = JSON.parse(data)
        console.log('RES', response)

        $("#miModal").modal("hide");
        $('#name').val(response[0]['name']);
        $('#surname').val(response['surname']);
     
        mostrarEps(response[0]['eps_name'])
            mostrarArl(response[0]['arl_name'])
            mostrarAfp(response[0]['afp_name'])

        $('#company').val(response[0]['company']);
        $('#vehicle').val(response[0]['vehicle_type']);
        $('#afiliadoNo').html("<strong>" + response[0]['id']+ "</strong>");
        $('#orden').html("<strong>" + response[0]['internal']+ "</strong>");
        $('#iden').val(response[0]['document']);
        $('#riesgo').val(response[0]['riesgo'])
        $('#tipo').html("<strong>"+response[0]['tipo'].toUpperCase()+"</strong>")
        $('#afiliacionT').val(response['tipo'])

        orden = response[0]['internal'];
        afiliado = response[0]['id'];

    })
    }

    var getConsecutivo = function(){
        $.ajax({
            type: "POST",
            url: "api/control/configuration_api.php"
        }).done(function(data){
            var response = JSON.parse(data);
            console.log('consecutivo', response)
            $('#consecutivo').html("N° <strong>"+response[0]['value']+"</strong>")
            recibo = response[0]['value'];
        })
    }

    var saveDataUser = function () {

        // datos personales
        var iden = $('#iden').val()!= "" ? $('#iden').val() : null;
        var name = $('#name').val()!= "" ? $('#name').val() : null;
        var surname = $('#surname').val()!="" ? $('#surname').val() : null;
        var company = $('#company').val()!= "" ? $('#company').val() : null;
        var position = $('#position').val() != ""? $('#position').val() : null;
        var address = $('#address').val() != ""? $('#address').val() : null;
        var phone = $('#phone').val() != ""? $('#phone').val() : null;
        var risk = $('#risk').val() != ""? $('#risk').val() : null;
        // datos afiliacion
        
        var eps = $('#eps option:selected').val() != undefined ||  $('#eps option:selected').val() != "" ? $('#eps option:selected').val() : null;
        var arl = $('#arl option:selected').val() != undefined ||  $('#arl option:selected').val() != "" ? $('#arl option:selected').val() : null;
        var afp = $('#afp option:selected').val() != undefined ||  $('#afp option:selected').val() != "" ?  $('#afp option:selected').val() : null;
        var caja = $('#caja option:selected').val() != undefined ||  $('#caja option:selected').val() != "" ?  $('#caja option:selected').val() : null;
        var afiliacionT = $('#afiliacionT option:selected').val() != "" ?  $('#afiliacionT option:selected').val() : null;

        //console.log(name);
        //console.log(surname);

        var objSend = {
            name:name,
            surname:surname,
            iden:iden,         
            company:company,
            position:position,
            address:address,
            phone:phone,
            eps:eps,
            arl:arl,
            afp:afp,
            caja:caja,
            risk:risk,
            option:2,
            afiliacionT
        }
        console.log(afp);
        //return
        $.ajax({
            type: "POST",
            url: "api/control/user.php",
            data: objSend
        }).done(function(data){
                console.log('data ', data);
                
         
                // reiniciar formulario
                $('#name').val('');
                $('#surname').val('');

                $('#iden').val(''); 
                $('#name').val('');
                $('#company').val('');
                $('#position').val('');
                $('#address').val('');
                $('#phone').val('');
                $('#eps').text('EPS');
                $('#arl').text('ARL');
                $('#afp').text('AFP');
                $('#caja').val("");
                $('#risk').val('');
                $('#btnSave').attr("disabled", true);
                
                //fin reiniciar formulario
            
        

        })

        console.log('data send', objSend);
    }
 
   
</script>
</html>

