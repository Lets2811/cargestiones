<?php
include('../helpers/conx.php');

$sql = "SELECT value FROM tbl_settings WHERE name = 'consecutivo'";

$result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
          $results_array[] = $row;
        }
        
        echo json_encode($results_array);
