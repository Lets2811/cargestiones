<?php
include('../helpers/conx.php');

switch ($_POST['option']) {
    case '1': 
        $sql = 'INSERT INTO tbl_expenses (description, date, value) VALUES 
        ("'.$_POST['descripcion'].'", 
        "'.$_POST['fecha'].'",
        "'.$_POST['monto'].'"
        )';

         $mysqli->query($sql);
         echo $mysqli->insert_id;   
    break;

    case '2': // caso para mostrar los datos del dia 
        $hoy  = date('Y-m-d');
        $sql = 'SELECT * FROM tbl_expenses WHERE date = "'.$_POST['date'].'" LIMIT 10 ';
        $result = $mysqli->query($sql);
        $results_array = array();
        while ($row = $result->fetch_assoc()) {
        $results_array[] = $row;
        }
        echo json_encode($results_array);    
    break;

    case '3': // 
        $hoy  = date('Y-m-d');
        $sqlAmount   = 'SELECT SUM(amount) FROM tbl_movement WHERE date = "'.$_POST['date'].'" ';
        $sqlExpenses = 'SELECT SUM(value)  FROM tbl_expenses WHERE date = "'.$_POST['date'].'" ';
        $resultA = $mysqli->query($sqlAmount);
        $resultE = $mysqli->query($sqlExpenses);

        //$data = array('Amount'=> $resultA, 'Expense'=> $resultE );
        $results_array = array();

        while ($row = $resultE->fetch_assoc()) {
            $results_array[] = $row;
        }
        while ($row = $resultA->fetch_assoc()) {
            $results_array[] = $row;
        }

        
        echo json_encode($results_array); 

    break;

}
