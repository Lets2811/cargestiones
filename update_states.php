<?php 
include('api/helpers/conx.php');

$sql = "select * FROM tbl_movement WHERE type = 'retiro'";
$ids = [];
    $result = $mysqli->query($sql); 
    $results_array = array();
    while ($row = $result->fetch_assoc()) {
        echo '<hr>';
        $sqlMovements = "SELECT * FROM tbl_movement where client = ".$row['client'];
        array_push($ids, $row['client']);
        $resultM = $mysqli->query($sqlMovements);
        while ($rowM = $resultM->fetch_assoc()) {
            echo 'Cliente: '.$rowM['client'].' - '.$rowM['date'].' - '.$rowM['type'].'<br>';

            switch($rowM['type']){
                case 'retiro':
                    $sqlU = 'UPDATE tbl_client SET state = 0 WHERE id = '.$row['client'];
                    echo 'retiro actualizado <br>';
                    break;
                case 'reingreso':
                    $sqlU = 'UPDATE tbl_client SET state = 1 WHERE id = '.$row['client'];
                    echo 'reingreso actualizado <br>';

                    break;
                case 'aporte':
                    $sqlU = 'UPDATE tbl_client SET state = 1 WHERE id = '.$row['client'];
                    echo 'aporte actualizado <br>';

                    break;
            }
            $mysqli->query($sqlU);
        }
    }

    echo '<h1> NUEVOS ESTADOS </h1>';
    foreach ($ids as $id ) {

       $sqlClients = "SELECT * FROM tbl_client WHERE id = ".$id;
       $resultC = $mysqli->query($sqlClients); 
       while ($rowC = $resultC->fetch_assoc()) {
           echo '<hr>';
           echo 'Cliente: '.$rowC['id'].'-'.$rowC['name'].' - '.$rowC['document'].' - '.$rowC['state'];
       }

    }
?>