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
                                <h4 class="mb-0 font-size-18">Formulario de registro</h4>

                           

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="card">
                        <div class="card-body" style="display: block;" id="form" name="form">

                            <h4 class="card-title">Afiliación</h4>
                            <p class="card-title-desc">Se presenta una serie de 3 etapas con la información
                                necesaria para la afiliación de un usuario</p>
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Datos personales</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Datos laborales</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Datos de afiliación</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-toggle="tab" href="#settings-1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Confirmación</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="home-1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Nombres</label>
                                                <div class="col-lg-9">
                                                    <input id="name" name="name" type="text" class="form-control" onblur="confirmName()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtLastNameBilling" class="col-lg-3 col-form-label">Apellidos</label>
                                                <div class="col-lg-9">
                                                    <input id="surname" name="surname" type="text" class="form-control" onblur="confirmName()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtCompanyBilling" class="col-lg-3 col-form-label">Cédula</label>
                                                <div class="col-lg-9">
                                                    <input id="identification" name="identification" type="text" class="form-control" onblur="confirmIdentification()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">Fecha de nacimiento</label>

                                                <div class="col-lg-9">
                                                    <input class="form-control" type="date" value="<?php echo $date ?>" id="date" name="date"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtAddress1Billing" class="col-lg-3 col-form-label">Dirección</label>
                                                <div class="col-lg-9">
                                                    <input id="address" name="address" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtAddress2Billing" class="col-lg-3 col-form-label">Teléfono</label>
                                                <div class="col-lg-9">
                                                    <input id="phone" name="phone" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile-1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtFirstNameShipping" class="col-lg-3 col-form-label">Cargo</label>
                                                <div class="col-lg-9">
                                                    <input id="ocupation" name="ocupation" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtLastNameShipping" class="col-lg-3 col-form-label">Empresa</label>
                                                <div class="col-lg-9">
                                                    <input id="company" name="company" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtCompanyShipping" class="col-lg-3 col-form-label">No. Interno</label>
                                                <div class="col-lg-9">
                                                    <input id="interno" name="interno" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="txtEmailAddressShipping" class="col-lg-3 col-form-label">Tipo de vehículo</label>
                                                <div class="col-lg-9">
                                                    <input id="vehicle" name="vehicle" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="messages-1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="ddlCreditCardType" class="col-lg-3 col-form-label">EPS</label>
                                                <div class="col-lg-7" id = "div_eps">
                                                    <select id="eps" name="eps" class="form-control" onchange="confirmEps()">
                                                        <option value="null">--Seleccionar--</option>
                                                        <?php
                                                        $sql = "SELECT * FROM tbl_eps WHERE state = 1";
                                                        $result_eps = $mysqli->query($sql);
                                                        if ($result_eps->num_rows === 0) {
                                                            echo '<option value="">Sin registros</option>';
                                                        } else {

                                                            while ($active_eps = $result_eps->fetch_assoc()) {
                                                                echo '<option value="' . $active_eps['id'] . '">' . $active_eps['name'] . '</option>';
                                                            }
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 icon-demo-content">
                                                    <div class="col-xl-3 col-lg-4 col-sm-6" style="margin-top: 8px !important">
                                                        <a data-placement="top" title="Añadir nuevo" data-toggle="modal" data-target="#modalEPS">
                                                            <i class="bx bx-plus-medical"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="ddlCreditCardType" class="col-lg-3 col-form-label">ARL</label>
                                                <div class="col-lg-7" id ="div_arl">
                                                    <select id="arl" name="arl" class="form-control" onchange="confirmArl()">
                                                        <option value="null">--Selecciona--</option>
                                                        <?php
                                                        $sql = "SELECT * FROM tbl_arl WHERE state = 1";
                                                        $result_eps = $mysqli->query($sql);
                                                        if ($result_eps->num_rows === 0) {
                                                            echo '<option value="">Sin registros</option>';
                                                        } else {

                                                            while ($active_eps = $result_eps->fetch_assoc()) {
                                                                echo '<option value="' . $active_eps['id'] . '">' . $active_eps['name'] . '</option>';
                                                            }
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 icon-demo-content">
                                                    <div class="col-xl-3 col-lg-4 col-sm-6" style="margin-top: 8px !important">
                                                        <a data-placement="top" title="Añadir nuevo" data-toggle="modal" data-target="#modalARL">
                                                            <i class="bx bx-plus-medical"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="ddlCreditCardType" class="col-lg-3 col-form-label">AFP</label>
                                                <div class="col-lg-7" id ="div_afp">
                                                    <select id="afp" name="afp" class="form-control" onchange="confirmAfp()">
                                                        <option value="null">--Selecciona--</option>
                                                        <?php
                                                        $sql = "SELECT * FROM tbl_afp WHERE state = 1";
                                                        $result_eps = $mysqli->query($sql);
                                                        if ($result_eps->num_rows === 0) {
                                                            echo '<option value="">Sin registros</option>';
                                                        } else {
                                                            while ($active_eps = $result_eps->fetch_assoc()) {
                                                                
                                                                echo '<option value="' . $active_eps['id'] . '">' . $active_eps['name'] . '</option>';
                                                            }
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 icon-demo-content">
                                                    <div class="col-xl-3 col-lg-4 col-sm-6" style="margin-top: 8px !important">
                                                        <a data-placement="top" title="Añadir nuevo" data-toggle="modal" data-target="#modalAFP">
                                                            <i class="bx bx-plus-medical"></i>
                                                        </a>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="ddlCreditCardType" class="col-lg-3 col-form-label">Caja de compensacion</label>
                                                <div class="col-lg-7" id ="div_caja">
                                                    <select id="caja" name="caja" class="form-control" onchange="confirmCaja()">
                                                        <option value="null">--Selecciona--</option>
                                                        <option value="1">Comfacauca</option>
                                                        <option value="0">No aplica</option>
                                                        <?php
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 icon-demo-content">
                                                    <div class="col-xl-3 col-lg-4 col-sm-6" style="margin-top: 8px !important">
                                                        <a data-placement="top" title="Añadir nuevo" data-toggle="modal" data-target="#modalAFP">
                                                            <i class="bx bx-plus-medical"></i>
                                                        </a>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-11">
                                            <div class="form-group row">
                                                <label for="txtEmailAddressBilling" class="col-lg-1 col-form-label">Fecha </label>

                                                <div class="col-lg-11">
                                                    <input class="form-control" type="date" value="<?php echo $date ?>" id="register_date" name="register_date"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings-1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">

                                                    <h4 class="card-title">Confirmación de registro</h4>

                                                    <div class="table-responsive">
                                                        <table class="table table-striped mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align: center;">CAMPO</th>
                                                                    <th>DATO</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="text-align: center;"><strong>Nombres y apellidos</strong>
                                                                    </td>
                                                                    <td>
                                                                        <span id="confirmationName"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: center;"><strong>Identificación</strong></td>
                                                                    <td>
                                                                    <span id="confirmationIdentification"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: center;"><strong> EPS</strong></td>
                                                                    <td>
                                                                    <span id="confirmationEps"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: center;"><strong> ARL</strong></td>
                                                                    <td>
                                                                    <span id="confirmationArl"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: center;"><strong> AFP</strong></td>
                                                                    <td>
                                                                    <span id="confirmationAfp"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: center;"><strong> Caja de Compensacion</strong></td>
                                                                    <td>
                                                                    <span id="confirmationCaja"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: center;"><strong> Riesgo</strong></td>
                                                                    <td>
                                                                    <input type="text" class="form-control" id="riesgo" name="riesgo" placeholder="0" required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: center;"><strong> Tipo de afiliación</strong></td>
                                                                    <td>
                                                                    <select id="tipo" name="tipo" class="form-control" onchange="confirmEps()">
                                                                        <option value="null">--Seleccionar--</option>
                                                                        <option value="dependiente">Dependiente</option>
                                                                        <option value="independiente">Independiente</option>
                                                                    </select>
                                                                    </td>
                                                                </tr>


                                                            </tbody>
                                                        </table>

                                                    </div>


                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                       
                                        <button type="button" class="btn btn-primary btn-lg btn-block waves-effect waves-light mb-1" style="margin-left: 20%; margin-right: 20%" onclick="saveClient()">GUARDAR</button>                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body" style="display: none;" id="loading" name="loading">
                            <div>
                                <div class="spinner-grow text-primary m-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="spinner-grow text-secondary m-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="spinner-grow text-success m-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="spinner-grow text-info m-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="spinner-grow text-warning m-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="spinner-grow text-danger m-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div class="spinner-grow text-dark m-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modales -->
                    <div class="row">

                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <!-- sample modal content -->
                            <div id="modalEPS" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myModalLabel">Registro EPS</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="needs-validation" novalidate>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Nombre</label>
                                                            <input type="text" class="form-control" id="epsNameInput" placeholder="EPS name " value="" required>
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="guardarEps()" >Guardar cambios EPS</button>  <!-- Alejandro modifico -->

                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- sample modal content -->
                            <div id="modalAFP" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myModalLabel">Modal Heading</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation" novalidate>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Nombre</label>
                                                            <input type="text" class="form-control" id="afpNameInput" placeholder="AFP name" value="" required>
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="guardarAfp()" >Guardar cambios AFP </button>

                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- sample modal content -->
                            <div id="modalARL" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myModalLabel">Modal Heading</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation" novalidate>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="validationCustom01">Nombre</label>
                                                            <input type="text" class="form-control" id="arlNameInput" placeholder="ARL name" value="" required>
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="guardarArl()" >Guardar cambios ARL </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
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

    
    <script>

    function mostrarEps(epsJson,selectedEps) {
        
        epsJson = JSON.parse(epsJson) // convertimos la respuesta a formato json
        var html = '<select id="eps" name="eps" class="form-control" onchange="confirmEps()">';
        for (var i=0;i<epsJson.length;i++) {
            html = html + '<option value = '+epsJson[i]["id"]+'>'+ epsJson[i]["name"]+'</option>';
        }
        html = html + '</select>';
        $('#div_eps').html(html)
        $('#eps').val(selectedEps)

        $.ajax({
            url: 'api/control/dataSearch.php',
            type: "POST",
            data: {"id": selectedEps, "option": "eps"}
        }).done(function(data) {
            $('#confirmationEps').text(data)
        })
       
    } 

    function mostrarArl(arlJson,selectedArl) {
        
        arlJson = JSON.parse(arlJson) // convertimos la respuesta a formato json
        var html = '<select id="arl" name="arl" class="form-control" onchange="confirmArl()">';
        for (var i=0;i<arlJson.length;i++) {
            html = html + '<option value = '+arlJson[i]["id"]+'>'+ arlJson[i]["name"]+'</option>';
        }
        html = html + '</select>';
        $('#div_arl').html(html)
        $('#arl').val(selectedArl)

        $.ajax({
            url: 'api/control/dataSearch.php',
            type: "POST",
            data: {"id": selectedArl , "option": "arl"}
        }).done(function(data) {
            $('#confirmationArl').text(data)
        })
    }

    function mostrarAfp(afpJson,selectedAfp) {
        
        afpJson = JSON.parse(afpJson) // convertimos la respuesta a formato json
        var html = '<select id="afp" name="afp" class="form-control" onchange="confirmAfp()">';
        for (var i=0;i<afpJson.length;i++) {
            html = html + '<option value = '+afpJson[i]["id"]+'>'+ afpJson[i]["name"]+'</option>';
        }
        html = html + '</select>';
        $('#div_afp').html(html)
        $('#afp').val(selectedAfp)

        $.ajax({
            url: 'api/control/dataSearch.php',
            type: "POST",
            data: {"id": selectedAfp, "option": "afp"}
        }).done(function(data) {
            $('#confirmationAfp').text(data)
        })
    }

    guardarAfp = function() {
        
        var afp_save = $('#afpNameInput').val() != "" ? $('#afpNameInput').val()  : null;
        var registerDate =  new Date().toISOString();
        
        var obj = {
            option: 1,
            register : registerDate,
            afp_save: afp_save
        }
        var obj2 = {
            option: 2,
        }
        $.ajax({
            url: 'api/control/saveAfp.php',
            type: "POST",
            data: obj
        }).done(function(data){
            $("#modalAFP").modal("hide")

            var selectedAfp = data
            if(data > 0){
                //alert("afp guardado");
                $.ajax({
                url: 'api/control/saveAfp.php',
                type: "POST",
                data: obj2
                }).done(function(data){mostrarAfp(data,selectedAfp)});
                //reset form
                $('#afpNameInput').val('')
            }
        });
    }

    guardarArl = function() {
        
        var arl_save = $('#arlNameInput').val() != "" ? $('#arlNameInput').val()  : null;
        var registerDate =  new Date().toISOString();
  
        var obj = {
            option: 1,
            register : registerDate,
            arl_save: arl_save
        }
        var obj2 = {
            option: 2,
        }
        $.ajax({
            url: 'api/control/saveArl.php',
            type: "POST",
            data: obj
        }).done(function(data){
            $("#modalARL").modal("hide")

            var selectedArl = data
            if(data > 0){
                //alert("arl guardado");
                $.ajax({
                url: 'api/control/saveArl.php',
                type: "POST",
                data: obj2
                }).done(function(data){mostrarArl(data,selectedArl)});
                //reset form
                $('#arlNameInput').val('')
            }
        });
    }
    
    guardarEps = function() {
        var eps_save = $('#epsNameInput').val() != "" ? $('#epsNameInput').val()  : null;
        var registerDate =  new Date().toISOString();
  
        var obj = {
            option: 1,
            register : registerDate,
            eps_save: eps_save
        }
        var obj2 = {
            option: 2,
        }
        $.ajax({
            url: 'api/control/saveEps.php',
            type: "POST",
            data: obj
        }).done(function(data){
            var selectedEps = data
            if(data > 0){
                $("#modalEPS").modal("hide")
                //alert("eps guardada");
                $.ajax({
                url: 'api/control/saveEps.php',
                type: "POST",
                data: obj2
                }).done(function(data){mostrarEps(data,selectedEps)});
                //reset form
                $('#epsNameInput').val('')
            }
        });
    }

    saveClient = function() {
        
        // datos personales
        var name = $('#name').val() != "" ? $('#name').val()  : null;
        var surname = $('#surname').val() != "" ? $('#surname').val() : null;
        var identification = $('#identification').val()!= "" ? $('#identification').val() : null;
        var birthdate = $('#date').val() != ""? $('#date').val() : null;
        var address = $('#address').val() != ""? $('#address').val() : null;
        var phone = $('#phone').val() != ""? $('#phone').val() : null;

        // datos laborales
        var occupation = $('#ocupation').val() != "" ? $('#ocupation').val() : null;
        var company = $('#company').val() != "" ? $('#company').val() : null;
        var noInterno = $('#interno').val() != "" ? $('#interno').val() : null;
        var vehicle = $('#vehicle').val() != ""?$('#vehicle').val() : null ;

        // datos afiliacion
        var eps = $('#eps').val() != "" ? $('#eps').val() : null;
        var arl = $('#arl').val() != "" ? $('#arl').val() : null;
        var afp = $('#afp').val() != ""? $('#afp').val() : null;
        var tipo = $('#tipo').val() != "" ? $('#tipo').val() : null;
        var registerDate = $('#register_date').val() != "" ? $('#register_date').val() : null;

        var caja = $('#caja').val() != "" ? $('#caja').val() : null;

        var riesgo = $('#riesgo').val() ?  $('#riesgo').val() : null;
       
        $('#form').css('display', 'none');
        $('#loading').css('display', 'block');
        var obj = {
            register: registerDate,
            name,
            surname,
            identification,
            birthdate,
            address,
            phone,
            occupation,
            company,
            noInterno,
            vehicle,
            eps,
            arl,
            afp,
            option: '1',
            riesgo,
            tipo,
            caja
        }
        $.ajax({
            url: 'api/control/user.php',
            type: "POST",
            data: obj
        }).done(function(data){
            if(data > 0){
                Swal.fire({
                    type: "success",
                    title: '¡Exito!',
                    text: 'La afiliación fue registrada'
                })
                $('#form').css('display', 'block');
                $('#loading').css('display', 'none');

                //reset form
                $('#name').val('');
                $('#surname').val('');
                $('#identification').val('');
                $('#date').val(<?php echo $date?>);
                $('#address').val('');
                $('#phone').val('');

                // datos laborales
                $('#ocupation').val('');
                $('#company').val('');
                $('#interno').val('');
                $('#vehicle').val('');

                // datos afiliacion
                $('#eps').val('');
                $('#arl').val('');
                $('#afp').val('');
                $('#register_date').val(<?php echo $date?>);

                //reset confirmación
                $('#confirmationName').text('')
                $('#confirmationIdentification').text('')
                $('#confirmationEps').text('')
                $('#confirmationArl').text('')
                $('#confirmationAfp').text('')

            }
        });
    }

    confirmName = function() {
        $('#confirmationName').text($('#name').val() + ' ' +$('#surname').val())
    }

    confirmIdentification = function() {
        $('#confirmationIdentification').text($('#identification').val())
    }

    confirmEps = function() {

        $.ajax({
            url: 'api/control/dataSearch.php',
            type: "POST",
            data: {"id": $('#eps').val(), "option": "eps"}
        }).done(function(data) {
            $('#confirmationEps').text(data)
        })
        
    }

    confirmArl = function() {
        $.ajax({
            url: 'api/control/dataSearch.php',
            type: "POST",
            data: {"id": $('#arl').val(), "option": "arl"}
        }).done(function(data) {
            $('#confirmationArl').text(data)
        })
    }

    confirmAfp = function() {
        $.ajax({
            url: 'api/control/dataSearch.php',
            type: "POST",
            data: {"id": $('#afp').val(), "option": "afp"}
        }).done(function(data) {
            $('#confirmationAfp').text(data)
        })
    }

    confirmCaja = function() {
        var valorCaja = $('#caja').val();

        var caja = valorCaja == '1' ? 'Aplica' : 'No aplica';
        $('#confirmationCaja').text(caja)
    }

</script>
</body>


</html>