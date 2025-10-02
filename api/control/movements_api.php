<?php
include('../helpers/conx.php');

$today = getdate();

if (strlen($today['mday']) === 1) {
    $date = $today['year'] . '-' . $today['mon'] . '-0' . $today['mday'];
} else {
    $date = $today['year'] . '-' . $today['mon'] . '-' . $today['mday'];
}

$amount = $_POST['amount'] ? $_POST['amount'] : 0;
$parcial = $_POST['parcial'] ? $_POST['parcial'] : 0;
$mora = $_POST['mora'] ? $_POST['mora'] : 0;

if($_POST['type'] == 'retiro'){
    $sqlRetiro = "UPDATE tbl_client SET state = 0 WHERE id = ".$_POST['client'];
    $mysqli->query($sqlRetiro);
}

$sql = "INSERT INTO tbl_movement (client, amount, date, state, consecutivo, type, month, riesgo, parcial, mora) VALUES 
        ('".$_POST['client']."', ".$amount.", '".$date."', '1', '".$_POST['consecutivo']."', '".$_POST['type']."', '".$_POST['month']."', '".$_POST['riesgo']."', '".$parcial."', '".$mora."')";

$mysqli->query($sql);
$idMovimiento = $mysqli->insert_id;
if($idMovimiento > 0){
    $newConsecutivo = $_POST['consecutivo'] + 1;
    $sql = "UPDATE tbl_settings SET value = ".$newConsecutivo." WHERE name = 'consecutivo'";
    $mysqli->query($sql);
    echo $idMovimiento; 
}

