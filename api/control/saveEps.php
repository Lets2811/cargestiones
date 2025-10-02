<?php
include('../helpers/conx.php');
switch ($_POST['option']) {// caso para adicionar una eps 
    case '1': 
        $sql = 'INSERT INTO tbl_eps (name, register_at, state) VALUES 
        ("'.$_POST['eps_save'].'", 
        "'.$_POST['register'].'",
        1)';
        //echo $sql;
         $mysqli->query($sql);
         echo $mysqli->insert_id;   
    break;
    case '2': // caso para leer las eps disponibles
        $sql = "SELECT * FROM tbl_eps WHERE state = 1";
        $result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
        $results_array[] = $row;
        }
        echo json_encode($results_array);    
    break;
    case '3': // caso para actulizar una eps 
        $sql = 'UPDATE tbl_eps SET 
        name = "'.$_POST['name'].'"  
        WHERE id = "'.$_POST['id'].'" ';
        echo $mysqli->query($sql);
    break;
    case '4': // caso para actulizar una eps 
        $sql = 'UPDATE tbl_eps SET state = 0  
        WHERE id = "'.$_POST['id'].'" ';
        echo $mysqli->query($sql);
    break;
}
