<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
if (!isset($_SESSION['cliente'])) {
  header('Location: index.html');
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
  <link rel="shortcut icon" href="assets/images/img_aportes/logo1.png">

  <!-- DataTables -->
  <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <!-- Bootstrap / App -->
  <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

  <!-- (Opcional) SweetAlert2: lo seguimos usando para cargas/otros, NO para eliminación -->
  <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
  <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <script src="assets/js/pages/sweet-alerts.init.js"></script>

  <style>
    /* Asegurar toast visible sobre modales */
    #appToast { z-index: 1080; }
  </style>
</head>

<body data-sidebar="dark">
  <div id="layout-wrapper">
    <header id="page-topbar">
      <div class="navbar-header">
        <div class="d-flex">
          <div class="navbar-brand-box">
            <a href="dashboard.php" class="logo logo-light">
              <span class="logo-sm"><img src="assets/images/img_aportes/logo1.png" alt="" height="22"></span>
              <span class="logo-lg"><img src="assets/images/img_aportes/logo2.png" alt="" height="19"></span>
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
              <a class="dropdown-item text-danger" href="api/control/logout.php">
                <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Cerrar sesión
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Sidebar -->
    <div class="vertical-menu">
      <div data-simplebar class="h-100">
        <div id="sidebar-menu">
          <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>
            <li><a href="dashboard.php" class="waves-effect"><i class="bx bx-home-circle"></i><span>Dashboard</span></a></li>
            <li><a href="afiliacion.php" class="waves-effect"><i class="mdi mdi-pencil-plus-outline"></i><span>Afiliación</span></a></li>
            <li><a href="aportes.php" class="waves-effect"><i class="mdi mdi-coin-outline"></i><span>Aportes</span></a></li>
            <li><a href="infoAfiliados.php" class="waves-effect"><i class="mdi mdi-file-document-box-search"></i><span>Información del afiliado</span></a></li>
            <li><a href="datosClientes.php" class="waves-effect"><i class="bx bx-user-pin"></i><span>Datos Clientes</span></a></li>
            <li><a href="usuarios.php" class="waves-effect"><i class="bx bx-user-pin"></i><span>Usuarios</span></a></li>
            <li><a href="gastos.php" class="waves-effect"><i class="bx bx-dollar-circle"></i><span>Gastos</span></a></li>
            <li><a href="configuracion.php" class="waves-effect"><i class="mdi mdi-tools"></i><span>Configuracion</span></a></li>
            <li><a href="historial.php" class="waves-effect"><i class="bx bx-time-five"></i><span>Historial</span></a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Content -->
    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">

          <!-- Título + Filtros -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Usuarios</h4>
              </div>
            </div>
          </div>

          <!-- Tabla principal -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-rep-plugin">
                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                      <table id="historial-table-dependientes" class="table table-striped">
                        <caption>USUARIOS</caption>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Right bar -->
  <div class="right-bar">
    <div data-simplebar class="h-100">
      <div class="rightbar-title px-3 py-4">
        <a href="javascript:void(0);" class="right-bar-toggle float-right"><i class="mdi mdi-close noti-icon"></i></a>
        <h5 class="m-0">Settings</h5>
      </div>
      <hr class="mt-0" />
      <h6 class="text-center mb-0">Choose Layouts</h6>
      <div class="p-4">
        <div class="mb-2"><img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt=""></div>
        <div class="custom-control custom-switch mb-3">
          <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
          <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
        </div>
        <div class="mb-2"><img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt=""></div>
        <div class="custom-control custom-switch mb-3">
          <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
          <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
        </div>
        <div class="mb-2"><img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt=""></div>
        <div class="custom-control custom-switch mb-5">
          <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
          <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
        </div>
      </div>
    </div>
  </div>
  <div class="rightbar-overlay"></div>

  <!-- Modal de confirmación (Bootstrap) -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="confirmDeleteTitle">Eliminar usuario</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="mb-2">¿Seguro que deseas eliminar al siguiente usuario?</p>
          <ul class="list-unstyled mb-0">
            <li><strong>Nombre:</strong> <span id="delNombre"></span></li>
            <li><strong>ID:</strong> <code id="delId"></code></li>
            <li><strong>Documento:</strong> <code id="delDoc"></code></li>
          </ul>
          <small class="text-danger d-block mt-3">Esta acción no se puede deshacer.</small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" id="btnConfirmDelete" class="btn btn-danger">
            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
            <span class="btn-text">Eliminar</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Toast de notificación (Bootstrap) -->
  <div aria-live="polite" aria-atomic="true" style="position:fixed; top:1rem; right:1rem; z-index:1080">
    <div class="toast" id="appToast" data-delay="3000">
      <div class="toast-header">
        <strong class="mr-auto" id="toastTitle">Notificación</strong>
        <small class="text-muted">Ahora</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body" id="toastBody">Mensaje</div>
    </div>
  </div>

  <!-- JS libs -->
  <script src="assets/libs/jquery/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/metismenu/metisMenu.min.js"></script>
  <script src="assets/libs/simplebar/simplebar.min.js"></script>
  <script src="assets/libs/node-waves/waves.min.js"></script>

  <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/libs/jszip/jszip.min.js"></script>
  <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
  <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
  <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
  <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

  <script src="assets/js/pages/datatables.init.js"></script>
  <script src="assets/js/app.js"></script>

  <!-- Lógica específica -->
  <script>
    /* ===================== Utils fechas (buscador por mes, igual) ===================== */
    function daysInMonth(year, month1to12) { return new Date(year, month1to12, 0).getDate(); }
    function enableAndClampDayInputs(last) {
      $('#sDate, #fDate').prop('disabled', false).attr({ min: 1, max: last });
      if (!$('#sDate').val()) $('#sDate').val(1);
      if (!$('#fDate').val()) $('#fDate').val(last);
      let s = Math.max(1, Math.min(parseInt($('#sDate').val(), 10) || 1, last));
      let f = Math.max(s, Math.min(parseInt($('#fDate').val(), 10) || last, last));
      $('#sDate').val(s); $('#fDate').val(f);
    }
    function bindDayGuards() {
      $('#sDate, #fDate').on('input', function () {
        const month = parseInt($('#mesSelect').val(), 10);
        if (!month) return;
        const last = daysInMonth(new Date().getFullYear(), month);
        let s = Math.max(1, Math.min(parseInt($('#sDate').val(), 10) || 1, last));
        let f = Math.max(1, Math.min(parseInt($('#fDate').val(), 10) || last, last));
        if (f < s) f = s;
        $('#sDate').val(s); $('#fDate').val(f);
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

    /* ===================== Helper para “Compañía” ===================== */
    function _strip(s){ try{ return s.normalize('NFD').replace(/[\u0300-\u036f]/g,''); }catch(e){ return s; } }
    function _isObj(v){ return v && typeof v === 'object' && !Array.isArray(v); }
    function _get(o,p){ return p.split('.').reduce((a,k)=> (a && a[k]!=null ? a[k] : undefined), o); }
    function pickCompany(item){
      if(!item || typeof item!=='object') return '';
      const directPaths = [
        'company','compania','compañia','compa\u00f1ia','compa\u00c3\u00b1ia',
        'empresa','empleador','employer','razon_social','razonsocial',
        'company_name','empresa_nombre','compania_nombre','compañia_nombre'
      ];
      for(const p of directPaths){
        const v = item[p];
        if(v==null) continue;
        if(typeof v==='string' && v.trim()) return v.trim();
        if(_isObj(v)){
          const nested = v.nombre || v.name || v.razon_social || v.razonsocial;
          if(typeof nested==='string' && nested.trim()) return nested.trim();
        }
      }
      const nestedPaths = [
        'empresa.nombre','empresa.name','empresa.razon_social',
        'compania.nombre','compania.name','compañia.nombre','compañia.name'
      ];
      for(const p of nestedPaths){
        const v = _get(item,p);
        if(typeof v==='string' && v.trim()) return v.trim();
      }
      for(const k of Object.keys(item||{})){
        const nk = _strip(k.toLowerCase());
        if(/(compania|compa\u00f1ia|empresa|employer|empleador|razon.?social)/.test(nk)){
          const v = item[k];
          if(typeof v==='string' && v.trim()) return v.trim();
          if(_isObj(v)){
            const nested = v.nombre || v.name || v.razon_social || v.razonsocial;
            if(typeof nested==='string' && nested.trim()) return nested.trim();
          }
        }
      }
      return '';
    }

    /* ===================== Tabla principal: 6 campos + botón eliminar ===================== */
    function renderTablaPrincipal(rows){
  $('#historial-table-dependientes').DataTable({
    destroy: true,
    data: rows,
    columns: [
      { title: "Nombre" },     // 0
      { title: "Apellido" },   // 1
      { title: "AFP" },        // 2
      { title: "ARL" },        // 3
      { title: "EPS" },        // 4
      { title: "Compañía" },   // 5
      { title: "ID", visible: false },        // 6 (oculto)
      { title: "Documento", visible: false }, // 7 (oculto)
      {
        title: "Acciones",
        orderable: false,
        searchable: false,
        data: null,
        render: function(data, type, row){
          const id  = row[6] || '';
          const doc = row[7] || '';
          const disabled = (id || doc) ? '' : 'disabled';
          const fullName = `${row[0] || ''} ${row[1] || ''}`.trim();
          return `
            <button class="btn btn-sm btn-danger btn-eliminar"
                    data-id="${id}" data-doc="${doc}" data-nombre="${fullName}" ${disabled}
                    title="Eliminar">
              <i class="mdi mdi-delete-outline"></i>
            </button>`;
        }
      }
    ],
    dom: 'Bfrtip',
    buttons: [
      { extend: 'excel', exportOptions: { columns: [0,1,2,3,4,5] } },
      { extend: 'pdf',   exportOptions: { columns: [0,1,2,3,4,5] } }
    ]
  });
}


// Helper: detecta estado activo en distintos formatos (1, "1", "activo", true, etc.)
function isActiveVal(v){
  if (v === undefined || v === null) return false;
  const s = String(v).toLowerCase().trim();
  return s === '1' || s === 'activo' || s === 'active' || s === 'activa' || s === 'true';
}

/* ===================== Cargar SOLO ACTIVOS ===================== */
function searchInfoAll(){
  // (Opcional) Loading con SweetAlert
  Swal.fire({
    title: 'Cargando...',
    text: 'Obteniendo usuarios activos',
    allowOutsideClick: false,
    didOpen: () => { Swal.showLoading(); }
  });

  const reqDep = $.ajax({ type: "POST", url: 'api/control/historia_api.php', data: { option: 1 }, timeout: 15000 });
  const reqInd = $.ajax({ type: "POST", url: 'api/control/historia_api.php', data: { option: 3 }, timeout: 15000 });

  $.when(reqDep, reqInd).done(function(depRes, indRes){
    Swal.close();
    try {
      const dep = typeof depRes[0] === 'string' ? JSON.parse(depRes[0] || '[]') : (depRes[0] || []);
      const ind = typeof indRes[0] === 'string' ? JSON.parse(indRes[0] || '[]') : (indRes[0] || []);
      const merged = dep.concat(ind);

      // FILTRO: solo activos (state/estado == 1/activo)
      const activos = merged.filter(u => isActiveVal(u.state) || isActiveVal(u.estado));

      const rows = activos.map(it => ([
        it.name || '',
        it.lastName || '',
        it.afp || '',
        it.arl || '',
        it.eps || '',
        (function pickCompany(item){
          if(!item || typeof item!=='object') return '—';
          const direct = item.company || item.compania || item['compañia'] || item.empresa || item.employer || item.empleador || item.razon_social || item.razonsocial || item.company_name || item.empresa_nombre || item.compania_nombre || item['compañia_nombre'];
          if (typeof direct === 'string' && direct.trim()) return direct.trim();
          const emp = (item.empresa && (item.empresa.nombre || item.empresa.name || item.empresa.razon_social)) ||
                      (item.compania && (item.compania.nombre || item.compania.name)) ||
                      (item['compañia'] && (item['compañia'].nombre || item['compañia'].name));
          return (typeof emp === 'string' && emp.trim()) ? emp.trim() : '—';
        })(it),
        it.id || '',        // ID oculto
        it.document || '',  // DOC oculto
        null
      ]));

      renderTablaPrincipal(rows);
      $('#historial-table-dependientes caption').text('USUARIOS ACTIVOS (' + rows.length + ')');

    } catch (e) {
      Swal.fire('Error', 'Error al procesar los datos: ' + e.message, 'error');
    }
  }).fail(function(){
    Swal.close();
    Swal.fire('Error', 'No se pudieron cargar los datos de usuarios', 'error');
  });
}


    /* ===================== Ver retirados ===================== */
    function cargarRetirados(){
      const r1 = $.ajax({ type: "POST", url: 'api/control/historia_api.php', data: { option: 6, estado: 'retirado' }});
      const r2 = $.ajax({ type: "POST", url: 'api/control/historia_api.php', data: { option: 6, estado: 'retirado', tipo: 'independiente' }});
      $.when(r1, r2).done(function(a,b){
        const arr1 = JSON.parse(a[0] || '[]');
        const arr2 = JSON.parse(b[0] || '[]');
        const rta = arr1.concat(arr2);

        const rows = rta.map(it => ([
          it.name || '',
          it.lastName || '',
          it.afp || '',
          it.arl || '',
          it.eps || '',
          pickCompany(it) || '—',
          it.id || '',
          it.document || '',
          null
        ]));

        renderTablaPrincipal(rows);
        $('#historial-table-dependientes caption').text('USUARIOS (Retirados)');
      });
    }


    /* ===================== Toast helper ===================== */
    function showToast(title, body){
      $('#toastTitle').text(title || 'Aviso');
      $('#toastBody').text(body || '');
      $('#appToast').toast('show');
    }
    function setDeleteBtnLoading(isLoading){
      const $btn = $('#btnConfirmDelete');
      $btn.prop('disabled', isLoading);
      $btn.find('.spinner-border').toggleClass('d-none', !isLoading);
      $btn.find('.btn-text').text(isLoading ? 'Eliminando...' : 'Eliminar');
    }

/* ===================== Eliminar usuario (Modal + Toast) ===================== */
let _delRowRef = null;
let _delId = '';
let _delDoc = '';

const API_URL = 'api/control/historia_api.php';

// Abrir modal
$(document).on('click', '#historial-table-dependientes .btn-eliminar', function(){
  const $btn   = $(this);
  const id     = $btn.data('id') || '';
  const doc    = $btn.data('doc') || '';
  const nombre = $btn.data('nombre') || 'este usuario';

  console.log('[Eliminar] Click en botón', { id, doc, nombre });

  const table = $('#historial-table-dependientes').DataTable();
  _delRowRef = table.row($btn.closest('tr'));
  _delId  = id;
  _delDoc = doc;

  $('#delNombre').text(nombre);
  $('#delId').text(id || '—');
  $('#delDoc').text(doc || '—');

  setDeleteBtnLoading(false);
  $('#confirmDeleteModal').modal('show');
});

// Confirmar eliminación (soft delete: state = 0)
$('#btnConfirmDelete').on('click', function(){
  if (!_delId && !_delDoc){
    showToast('Datos incompletos', 'No se pudo identificar el usuario (id/document vacío).');
    return;
  }

  setDeleteBtnLoading(true);

  console.log('[Eliminar] Enviando...', { option:'delete_user', id:_delId, document:_delDoc, target_state:0 });

  $.ajax({
    type: 'POST',
    url: API_URL,
    data: { option: 'delete_user', id: _delId, document: _delDoc, target_state: 0 }
    // ¡No pongas dataType:'json' aquí!
  })
  .done(function(respText, textStatus, xhr){
    console.log('[Eliminar] HTTP OK', { textStatus, status: xhr.status, respText });
    let resp;
    try {
      resp = (typeof respText === 'string') ? JSON.parse(respText) : respText;
    } catch (e) {
      console.error('[Eliminar] Error parseando JSON:', e, respText);
      setDeleteBtnLoading(false);
      showToast('Error', 'Respuesta no es JSON válido. Revisa consola.');
      return;
    }

    if (resp && resp.success === true) {
      if (_delRowRef) { _delRowRef.remove().draw(false); }
      $('#confirmDeleteModal').modal('hide');
      showToast('Eliminado', 'Usuario marcado como inactivo (oculto).');
    } else {
      setDeleteBtnLoading(false);
      const msg = (resp && (resp.message || resp.error)) || 'No se pudo inactivar.';
      showToast('Error', msg);
      console.warn('[Eliminar] Respuesta de error del back:', resp);
    }
  })
  .fail(function(xhr, textStatus, errorThrown){
    console.error('[Eliminar] HTTP FAIL', { textStatus, errorThrown, status: xhr.status, resp: xhr.responseText });
    setDeleteBtnLoading(false);
    showToast('Error HTTP', `Status: ${xhr.status} - ${textStatus}. Ver consola.`);
  });
});

// Reset al cerrar modal
$('#confirmDeleteModal').on('hidden.bs.modal', function(){
  setDeleteBtnLoading(false);
  _delRowRef = null;
  _delId = '';
  _delDoc = '';
});


    /* ===================== Init ===================== */
    $(function(){
      // preparar inputs de día
      $('#sDate, #fDate').prop('disabled', true).attr({ min: 1, max: 31 });
      bindDayGuards();

      // cargar todos al inicio
      searchInfoAll();

      // botones
      $('#btnVerRetirados').on('click', function(e){ e.preventDefault(); cargarRetirados(); });
      $('#btnVerTodos').on('click', function(e){ e.preventDefault(); searchInfoAll(); });
    });
  </script>
</body>
</html>
