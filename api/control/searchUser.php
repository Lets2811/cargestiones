<?php
include('../helpers/conx.php');

switch ($_POST['option']) {
    case '1':
        # cedula
       /* $sql = 'SELECT c.*, e.name as eps_name, a.name as arl_name, af.name as afp_name FROM tbl_client c INNER JOIN tbl_eps e ON c.eps = e.id INNER JOIN tbl_arl a ON c.arl = a.id INNER JOIN tbl_afp af ON c.afp = af.id WHERE document = "' .$_POST['data'].'"';
        echo $sql;
        $result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
          $results_array[] = $row;
        }
        */
        // nueva busqueda
        $sql = "SELECT * FROM tbl_client WHERE document = '".$_POST['data']."'";
     
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
      
          $data['internal'] = $data['internal'] != null ? $data['internal'] : 'No aplica';
        // fin nueva busqueda
        echo json_encode($data);
        break;
    case '2':
        # nnombre
        $nombre = $_POST['data'];
        $condicion = "%$nombre%";
        $sql = 'SELECT * FROM tbl_client WHERE name like "%'.$condicion.'"';
        $result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
          $results_array[] = $row;
        }
        
        echo json_encode($results_array);
       // echo $_POST['data'];
      
        break;
    case '3':
        # apellido
        $apellido = $_POST['data'];
        $condicion = "%$apellido%";
        $sql = 'SELECT * FROM tbl_client WHERE surname like "%'.$condicion.'"';        
        $result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
          $results_array[] = $row;
        }
        
        echo json_encode($results_array);
        break;
    case '4':
        # radicado
        break;
    case '5':
        //$sql = 'SELECT c.*, e.name as eps_name, a.name as arl_name, af.name as afp_name FROM tbl_client c INNER JOIN tbl_eps e ON c.eps = e.id INNER JOIN tbl_arl a ON c.arl = a.id INNER JOIN tbl_afp af ON c.afp = af.id WHERE c.id = "' .$_POST['data'].'"';
        
        $sql = "SELECT * FROM tbl_client WHERE id = '".$_POST['data']."'";
     
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
      
          $data['internal'] = $data['internal'] != null ? $data['internal'] : 'No aplica';
        // fin nueva busqueda
        echo json_encode($data);
        
    break;
    

}