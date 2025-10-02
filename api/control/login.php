<?php
include('../helpers/conx.php');

$sql = 'SELECT * FROM tbl_settings WHERE name ="'.$_POST['usuario'].'" AND value = "'.$_POST['password'].'"';
$result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
          $results_array[] = $row;
          session_start();
          $_SESSION['cliente'] = '1';
        }
        
        echo json_encode($results_array);