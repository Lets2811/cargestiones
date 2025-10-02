<?php
include('../helpers/conx.php');
switch ($_POST['option']) {// caso para adicionar una eps 
    case '1': 
        $sql = 'INSERT INTO tbl_afp (name, register_at, state) VALUES 
        ("'.$_POST['afp_save'].'", 
        "'.$_POST['register'].'",
        1)';
        //echo $sql;
         $mysqli->query($sql);
         echo $mysqli->insert_id;   
    break;
    case '2': // caso para leer las eps disponibles
        $sql = "SELECT * FROM tbl_afp WHERE state = 1";
        $result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
        $results_array[] = $row;
        }
        echo json_encode($results_array);    
    break;
    case '3': // caso para actulizar el afp
        $sql = 'UPDATE tbl_afp SET 
        name = "'.$_POST['name'].'"  
        WHERE id = "'.$_POST['id'].'" ';
        echo $mysqli->query($sql);
    break;
    case '4': // caso para actulizar el afp
        $sql = 'UPDATE tbl_afp SET state = 0  
        WHERE id = "'.$_POST['id'].'" ';
        echo $mysqli->query($sql);
    break;
}
