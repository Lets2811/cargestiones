<?php

//$mysqli = new mysqli('localhost', 'root', '', 'estemnoe_cargestiones');
$mysqli = new mysqli('127.0.0.1', 'estemnoe_admin', 'FG3wLxE?~7}L', 'estemnoe_cargestiones');

if($mysqli->connect_errno){
    echo 'Ha ocurrido un error' . $mysqli->connect_errno . ': '.$mysqli->connect_error;
}