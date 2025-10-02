<?php
include('../helpers/conx.php');

switch ($_POST['option']) {
    case 'eps':
        # code...
        $sql = "SELECT name FROM tbl_eps WHERE id = ".$_POST['id'];
       
        $result = $mysqli->query($sql);
        if($result->num_rows > 0){
            $eps = $result->fetch_assoc();
            echo $eps['name'];
        }
        break;
    case 'arl':
        $sql = "SELECT name FROM tbl_arl WHERE id = ".$_POST['id'];
       
        $result = $mysqli->query($sql);
        if($result->num_rows > 0){
            $arl = $result->fetch_assoc();
            echo $arl['name'];
        }
        break;
    case 'afp':
        $sql = "SELECT name FROM tbl_afp WHERE id = ".$_POST['id'];
       
        $result = $mysqli->query($sql);
        if($result->num_rows > 0){
            $afp = $result->fetch_assoc();
            echo $afp['name'];
        }
        break;
    

}
