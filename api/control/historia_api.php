<?php
include('../helpers/conx.php');

switch ($_POST['option']) {
    case '1':
        $sql = 'SELECT * FROM tbl_client WHERE tipo = "dependiente"';
        $result = $mysqli->query($sql);
        $results_array = array();
        $rta = array();
        while ($row = $result->fetch_assoc()) {
          //$results_array[] = $row['id'];
            $sqlMovimientos = "SELECT * FROM tbl_movement where client = '".$row['id']."' and id = (SELECT max(id) FROM tbl_movement where client = '".$row['id']."')";
            $resultM = $mysqli->query($sqlMovimientos);

          if($rowM = $resultM->fetch_assoc()){
            $eps = '';
            $afp = '';
            $arl = '';

              if($row['eps'] != ''){
                $sqlEps = "SELECT name FROM tbl_eps WHERE id = ".$row['eps'];
                $result_eps = $mysqli->query($sqlEps);
                $eps_data = $result_eps->fetch_assoc();
                $eps = $eps_data['name'] ?? '';
              }else{
                $eps = 'No aplica';
              }

              if($row['afp'] != ''){
                $sqlAfp = "SELECT name FROM tbl_afp WHERE id = ".$row['afp'];
                $result_afp = $mysqli->query($sqlAfp);
                $afp_data = $result_afp->fetch_assoc();
                $afp = $afp_data['name'] ?? '';
              }else{
                $afp = 'No aplica';
              }

              if($row['arl'] != ''){
                $sqlArl = "SELECT name FROM tbl_arl WHERE id = ".$row['arl'];
                $result_arl = $mysqli->query($sqlArl);
                $arl_data = $result_arl->fetch_assoc();
                $arl = $arl_data['name'] ?? '';
              }else{
                $arl = 'No aplica';
              }
           

              $obj = [
                  "name" => $row['name'],
                  "lastName" => $row['surname'],
                  "date" => $rowM['date'],
                  "id" => $row['id'],
                  "type" =>$rowM['type'],
                  "month" => $rowM['month'],
                  "sql" => $sqlMovimientos,
                  "document" => $row['document'],
                  "tipo_afiliacion" => $row['tipo'],
                  "eps" =>  $eps,
                  "afp" => $afp,
                  "arl" => $arl,
                  "riesgo" => $row['riesgo'],
                  "estado" => $row['state']

              ];
              $rta[] = $obj;
          }
        }
        
        echo json_encode($rta);
        break;

        case '2':
          $sql = "SELECT * FROM `tbl_movement` where client = ".$_POST['afiliado']." and date = (SELECT MAX(date) FROM tbl_movement WHERE client = ".$_POST['afiliado'].")";
          $result = $mysqli->query($sql);
          $results_array = array();
          while ($row = $result->fetch_assoc()) {
            $results_array[] = $row;
          }
          
          echo json_encode($results_array);
        break;
        case '3':
          $sql = 'SELECT * FROM tbl_client WHERE tipo = "independiente"';
          $result = $mysqli->query($sql);
          $results_array = array();
          $rta = array();
          while ($row = $result->fetch_assoc()) {
            //$results_array[] = $row['id'];
              $sqlMovimientos = "SELECT * FROM tbl_movement where client = '".$row['id']."' and id = (SELECT max(id) FROM tbl_movement where client = '".$row['id']."')";
              $resultM = $mysqli->query($sqlMovimientos);
  
            if($rowM = $resultM->fetch_assoc()){
              $eps = '';
              $afp = '';
              $arl = '';
  
                if($row['eps'] != ''){
                  $sqlEps = "SELECT name FROM tbl_eps WHERE id = ".$row['eps'];
                  $result_eps = $mysqli->query($sqlEps);
                  $eps_data = $result_eps->fetch_assoc();
                  $eps = $eps_data['name'];
                }else{
                  $eps = 'No aplica';
                }
  
                if($row['afp'] != ''){
                  $sqlAfp = "SELECT name FROM tbl_afp WHERE id = ".$row['afp'];
                  $result_afp = $mysqli->query($sqlAfp);
                  $afp_data = $result_afp->fetch_assoc();
                  $afp = $afp_data['name'] ?? '';
                }else{
                  $afp = 'No aplica';
                }
  
                if($row['arl'] != ''){
                  $sqlArl = "SELECT name FROM tbl_arl WHERE id = ".$row['arl'];
                  $result_arl = $mysqli->query($sqlArl);
                  $arl_data = $result_arl->fetch_assoc();
                  $arl = $arl_data['name'] ?? '';
                }else{
                  $arl = 'No aplica';
                }
             
  
                $obj = [
                    "name" => $row['name'],
                    "lastName" => $row['surname'],
                    "date" => $rowM['date'],
                    "id" => $row['id'],
                    "type" =>$rowM['type'],
                    "month" => $rowM['month'],
                    "sql" => $sqlMovimientos,
                    "document" => $row['document'],
                    "tipo_afiliacion" => $row['tipo'],
                    "eps" =>  $eps,
                    "afp" => $afp,
                    "arl" => $arl,
                    "riesgo" => $row['riesgo'],
                    "estado" => $row['state']
  
                ];
                $rta[] = $obj;
            }
          }
          
          echo json_encode($rta);
          break;

        case '4':
          // movimientos del mes
          $sql = 'SELECT * FROM tbl_client WHERE tipo = "dependiente"';
          $result = $mysqli->query($sql);
          $results_array = array();
          $rta = array();
          while ($row = $result->fetch_assoc()) {
            //$results_array[] = $row['id'];
              $sqlMovimientos = "SELECT * FROM tbl_movement where client = '".$row['id']."' and MONTH(date) = ".$_POST['mes']." and YEAR(date) = YEAR(now()) and DAY(date) BETWEEN ".$_POST['dStart']." and ".$_POST['dEnd'];
              $resultM = $mysqli->query($sqlMovimientos);
  
            if($rowM = $resultM->fetch_assoc()){
              $eps = '';
              $afp = '';
              $arl = '';
  
                if($row['eps'] != ''){
                  $sqlEps = "SELECT name FROM tbl_eps WHERE id = ".$row['eps'];
                  $result_eps = $mysqli->query($sqlEps);
                  $eps_data = $result_eps->fetch_assoc();
                  $eps = $eps_data['name'] ?? '';
                }else{
                  $eps = 'No aplica';
                }
  
                if($row['afp'] != ''){
                  $sqlAfp = "SELECT name FROM tbl_afp WHERE id = ".$row['afp'];
                  $result_afp = $mysqli->query($sqlAfp);
                  $afp_data = $result_afp->fetch_assoc();
                  $afp = $afp_data['name'] ?? '';
                }else{
                  $afp = 'No aplica';
                }
  
                if($row['arl'] != ''){
                  $sqlArl = "SELECT name FROM tbl_arl WHERE id = ".$row['arl'];
                  $result_arl = $mysqli->query($sqlArl);
                  $arl_data = $result_arl->fetch_assoc();
                  $arl = $arl_data['name'];
                }else{
                  $arl = 'No aplica';
                }
             
  
                $obj = [
                    "name" => $row['name'],
                    "lastName" => $row['surname'],
                    "date" => $rowM['date'],
                    "id" => $row['id'],
                    "type" =>$rowM['type'],
                    "month" => $rowM['month'],
                    "sql" => $sqlMovimientos,
                    "document" => $row['document'],
                    "tipo_afiliacion" => $row['tipo'],
                    "eps" =>  $eps,
                    "afp" => $afp,
                    "arl" => $arl,
                    "riesgo" => $row['riesgo'],
                    "estado" => $row['state']
  
                ];
                $rta[] = $obj;
            }
          }
          
          echo json_encode($rta);
          break;

          case '5':
           // movimientos del mes

          $sql = 'SELECT * FROM tbl_client WHERE tipo = "independiente"';
           $result = $mysqli->query($sql);
           $results_array = array();
           $rta = array();
           while ($row = $result->fetch_assoc()) {
             //$results_array[] = $row['id'];
               $sqlMovimientos = "SELECT * FROM tbl_movement where client = '".$row['id']."' and MONTH(date) = ".$_POST['mes']." and YEAR(date) = YEAR(now()) and DAY(date) BETWEEN ".$_POST['dStart']." and ".$_POST['dEnd'];
               $resultM = $mysqli->query($sqlMovimientos);
   
             if($rowM = $resultM->fetch_assoc()){
               $eps = '';
               $afp = '';
               $arl = '';
   
                 if($row['eps'] != ''){
                   $sqlEps = "SELECT name FROM tbl_eps WHERE id = ".$row['eps'];
                   $result_eps = $mysqli->query($sqlEps);
                   $eps_data = $result_eps->fetch_assoc();
                   $eps = $eps_data['name'] ?? '';
                 }else{
                   $eps = 'No aplica';
                 }
   
                 if($row['afp'] != ''){
                   $sqlAfp = "SELECT name FROM tbl_afp WHERE id = ".$row['afp'];
                   $result_afp = $mysqli->query($sqlAfp);
                   $afp_data = $result_afp->fetch_assoc();
                   $afp = $afp_data['name'] ?? '';
                 }else{
                   $afp = 'No aplica';
                 }
   
                 if($row['arl'] != ''){
                   $sqlArl = "SELECT name FROM tbl_arl WHERE id = ".$row['arl'];
                   $result_arl = $mysqli->query($sqlArl);
                   $arl_data = $result_arl->fetch_assoc();
                   $arl = $arl_data['name'] ?? '';
                 }else{
                   $arl = 'No aplica';
                 }
              
   
                 $obj = [
                     "name" => $row['name'],
                     "lastName" => $row['surname'],
                     "date" => $rowM['date'],
                     "id" => $row['id'],
                     "type" =>$rowM['type'],
                     "month" => $rowM['month'],
                     "sql" => $sqlMovimientos,
                     "document" => $row['document'],
                     "tipo_afiliacion" => $row['tipo'],
                     "eps" =>  $eps,
                     "afp" => $afp,
                     "arl" => $arl,
                     "riesgo" => $row['riesgo'],
                     "estado" => $row['state']
   
                 ];
                 $rta[] = $obj;
             }
           }
           
           echo json_encode($rta);
           break;

           case '6':
  // Filtrar personas con estado "retirado"
  // Puedes enviar opcionalmente $_POST['tipo'] = 'dependiente' | 'independiente'
  $estado = $_POST['estado'] ?? 'retirado';
  $tipo   = $_POST['tipo']   ?? null;

  if ($tipo) {
    $sql = "SELECT * FROM tbl_client WHERE state = ? AND tipo = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $estado, $tipo);
  } else {
    $sql = "SELECT * FROM tbl_client WHERE state = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $estado);
  }

  $stmt->execute();
  $result = $stmt->get_result();

  $rta = [];

  while ($row = $result->fetch_assoc()) {
    // Último movimiento del cliente
    $stmtM = $mysqli->prepare("SELECT * FROM tbl_movement WHERE client = ? ORDER BY id DESC LIMIT 1");
    $stmtM->bind_param('i', $row['id']);
    $stmtM->execute();
    $resultM = $stmtM->get_result();

    if ($rowM = $resultM->fetch_assoc()) {
      // EPS
      if (!empty($row['eps'])) {
        $stmtE = $mysqli->prepare("SELECT name FROM tbl_eps WHERE id = ?");
        $stmtE->bind_param('i', $row['eps']);
        $stmtE->execute();
        $eps = $stmtE->get_result()->fetch_assoc()['name'] ?? 'No aplica';
      } else { $eps = 'No aplica'; }

      // AFP
      if (!empty($row['afp'])) {
        $stmtA = $mysqli->prepare("SELECT name FROM tbl_afp WHERE id = ?");
        $stmtA->bind_param('i', $row['afp']);
        $stmtA->execute();
        $afp = $stmtA->get_result()->fetch_assoc()['name'] ?? 'No aplica';
      } else { $afp = 'No aplica'; }

      // ARL
      if (!empty($row['arl'])) {
        $stmtR = $mysqli->prepare("SELECT name FROM tbl_arl WHERE id = ?");
        $stmtR->bind_param('i', $row['arl']);
        $stmtR->execute();
        $arl = $stmtR->get_result()->fetch_assoc()['name'] ?? 'No aplica';
      } else { $arl = 'No aplica'; }

      $obj = [
        "name"            => $row['name'],
        "lastName"        => $row['surname'],
        "date"            => $rowM['date'],
        "id"              => $row['id'],
        "type"            => $rowM['type'],
        "month"           => $rowM['month'],
        "document"        => $row['document'],
        "tipo_afiliacion" => $row['tipo'],
        "eps"             => $eps,
        "afp"             => $afp,
        "arl"             => $arl,
        "riesgo"          => $row['riesgo'],
        "estado"          => $row['state']
      ];
      $rta[] = $obj;
    }
  }

  echo json_encode($rta);
  break;

}