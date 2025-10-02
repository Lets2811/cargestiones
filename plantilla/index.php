<?php
function get_sheet(){
  include('../../api/helpers/conx.php');
  //$sql = "SELECT concat(c.name,' ', c.surname) as client_name, c.id as noAfiliado, c.*, e.name as eps, a.name as arl, af.name as afp, m.* FROM tbl_movement m INNER JOIN tbl_client c on m.client = c.id INNER JOIN tbl_eps e ON c.eps = e.id INNER JOIN tbl_arl a ON c.arl = a.id INNER JOIN tbl_afp af ON c.afp = af.id WHERE c.id = 7"/* . $_GET['id']*/;
    
  $sql = "SELECT concat(c.name,' ', c.surname) as client_name, c.id as noAfiliado, c.*,  m.* FROM tbl_movement m INNER JOIN tbl_client c on m.client = c.id WHERE m.id = ".$_GET['id'];
  $result_client = $mysqli->query($sql);
  if($result_client->num_rows > 0){
      $data = $result_client->fetch_assoc();
  
      // obtenemos la eps
      if($data['eps'] != null){
          $sql_eps = "SELECT name FROM tbl_eps WHERE id = ".$data['eps'];
          $result_eps = $mysqli->query($sql_eps);
          if($result_eps->num_rows > 0){
            $data_eps = $result_eps->fetch_assoc();
            $data['eps'] = $data_eps['name'];
          }
      }else{
          $data['eps'] = 'No aplica';
      }
     
  
      // obtenemos el arl
      if($data['arl'] != null){
          $sql_arl = "SELECT name FROM tbl_arl WHERE id = ".$data['arl'];
          $result_arl = $mysqli->query($sql_arl);
          if($result_arl->num_rows > 0){
            $data_arl = $result_arl->fetch_assoc();
            $data['arl'] = $data_arl['name'];
          }
      }else{
          $data['arl'] = 'No aplica';
      }
     
  
       // obtenemos el afp
       if($data['afp'] != null){
          $sql_afp = "SELECT name FROM tbl_afp WHERE id = ".$data['afp'];
          $result_afp = $mysqli->query($sql_afp);
          if($result_afp->num_rows > 0){
            $data_afp = $result_afp->fetch_assoc();
            $data['afp'] = $data_afp['name'];
          }
       }else{
           $data['afp'] = 'No aplica';
       }
      
    }

    $interno = $data['internal'] != null ? $data['internal'] : 'No aplica';
    $caja = $data['caja'] == '1' ? 'Aplica' : 'No aplica';
    $hoy = getdate();
      //echo json_encode($data);
$plantilla = '
<body>
  <header class="clearfix">
    <div id="logo">
    <h2 class="name"></h2>
      <div>TEL: 3008276958 - 8222595</div>
  </div>
    
    <div id="company">
      <h2 class="name">REMISIÓN N° '.$data['consecutivo'].'</h2>
      <div class="address">Fecha: '.$hoy['mday'].'-'.$hoy['mon'].'-'.$hoy['year'].'</div>
    </div>
    </div>
  </header>
  <div id="details" class="clearfix">
    <div id="client">
      <div class="to">AFILIADO:</div>
      <h2 class="name">'.strtoupper($data['client_name']).'</h2>
      <div class="email">'.ucwords($data['type']).' '.ucwords($data['month']).'</div>
      <div class="email">AFILIADO N° '.$data['noAfiliado'].'</div>
      <div class="email">C.C N° '.$data['document'].'</div>
    </div>
  </div>
  <main>
   <div id="body_container" style="width: 100%;">
    <div id="wide" style="width: 50%;">
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="desc"><h5>'.ucwords($data['type']).'</h5></th>
            <th class="unit">'.$data['date'].'</th>
          </tr>
          <tr>
            <th class="desc"><h5>EPS</h5></th>
            <th class="unit">'.$data['eps'].'</th>
          </tr>
          <tr>
          <th class="desc"><h5>Caja de compensacion</h5></th>
          <th class="unit">'.$caja.'</th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <td class="desc"><h5>ARL</h5></td>
            <th class="unit">'.$data['arl'].'</th>
          </tr>
          <tr>
            <td class="desc"><h5>RIESGO</h5></td>
            <th class="unit">'.$data['riesgo'].'</th>
          </tr>';

     
          
          if($data['afp'] != 'No aplica'){
            $plantilla = $plantilla.'<tr>
            <td class="desc"><h5>AFP</h5></td>
            <th class="unit">'.$data['afp'].'</th>
          </tr>';
          }

          if($interno != 'No aplica'){
            $plantilla = $plantilla.'<tr>
            <td class="desc"><h5>ORDEN</h5></td>
            <th class="unit">'.$interno.'</th>
      
          </tr>';
          }

         $plantilla = $plantilla.
        '</tbody>
        <tfoot>
          <tr>
            <td colspan="1">MORA</td>
            <td>'.$data['mora'].'</td>
          </tr>
          <tr>
            <td colspan="1">TOTAL</td>
            <td>'.$data['amount'].'</td>
          </tr>
        </tfoot>
      </table>
    </div>
    <div id="narrow">
      <div id="notices"></div>
        <strong>Importante: Requisito</strong>
        <br>
        <ol>
          <li>Sus fechas de pago son del día 30 al 05 del siguiente mes.</li>
          <li>En el evento en que usted incumpla con estas obligaciones, LA EPS exime su responsabilidad y no responderá por el pago de incapacidades, invalidez o muerte.</li>
          <li>Los accidentes de trabajo deben ser reportados en las primeras 24 Horas hábiles.</li>
          <li>Al no realizar sus aportes en las fechas estipuladas LA EPS le hará el retiro inmediato de la seguridad social.</li>
          <li>Al afiliarse o reingresar, LA EPS se hará responsable a partir del momento en que usted llene todos los requisitos exigidos por la EPS elegida y esta lo acepte y realice su afiliación. Tenga presente esta información por su bienestar y el de nuestra cooperativa.</li>
        </ol>
        <hr>
        <div>ATENDIDO POR:</div>
        <div class="notice">Monica Narvaez</div>
      </div>
    </div>
   </div>
  </main>
  <footer>
    POWERED BY NextCode 
  </footer>
  </body>   ';

  return $plantilla;
}