<?php
include('../helpers/conx.php');

switch ($_POST['option']) {
    case '1':
        # cedula
        $sql = 'SELECT m.id as movimiento, m.date, m.type, m.month, m.consecutivo, m.amount FROM tbl_movement m INNER JOIN tbl_client c ON m.client = c.id WHERE c.document = "' .$_POST['data'].'"';
        $result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
          $results_array[] = $row;
        }
        
        echo json_encode($results_array);

        break;
    case '2':
        # nombre
        $sql = 'SELECT m.id as movimiento, m.date, m.type, m.month, m.consecutivo, m.amount FROM tbl_movement m INNER JOIN tbl_client c ON m.client = c.id WHERE c.name LIKE "%' .$_POST['data'].'%"';
       $result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
          $results_array[] = $row;
        }
        
        echo json_encode($results_array);

        break;
    case '3':
        # apellido
        $sql = 'SELECT m.id as movimiento, m.date, m.type, m.month, m.consecutivo, m.amount FROM tbl_movement m INNER JOIN tbl_client c ON m.client = c.id WHERE c.surname LIKE "%' .$_POST['data'].'%"';

       $result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
          $results_array[] = $row;
        }
        
        echo json_encode($results_array);
        break;
   
    case '4':
        $sql = 'SELECT c.*, e.name, a.name, af.name FROM tbl_client c INNER JOIN tbl_eps e ON c.eps = e.id INNER JOIN tbl_arl a ON c.arl = a.id INNER JOIN tbl_afp af ON c.afp = af.id WHERE c.id = "' .$_POST['data'].'"';
       $result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
          $results_array[] = $row;
        }
        
        echo json_encode($results_array);
    break;
}