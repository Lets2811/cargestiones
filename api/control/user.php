<?php
include('../helpers/conx.php');

switch ($_POST['option']) {
    case '1':
        # insert en la tabla de clientes

        $sql = 'INSERT INTO tbl_client (document, name, surname, birth_date, address, phone, position, eps, arl, afp, company, internal, date, vehicle_type, riesgo, tipo, state, caja) VALUES 
        ("'.$_POST['identification'].'", 
        "'.$_POST['name'] .'", 
        "'.$_POST['surname'].'", 
        "'.$_POST['birthdate'].'",
        "'.$_POST['address'].'",
        "'.$_POST['phone'].'",
        "'.$_POST['occupation'].'",
         '.$_POST['eps'].',
         '.$_POST['arl'].',
         '.$_POST['afp'].',
        "'.$_POST['company'].'",
        "'.$_POST['noInterno'].'",
        "'.$_POST['register'].'",
        "'.$_POST['vehicle'].'",
        "'.$_POST['riesgo'].'",
        "'.$_POST['tipo'].'",
        1,
        "'.$_POST['caja'].'")';

        
        $mysqli->query($sql);

        echo $mysqli->insert_id;   
    break;
    case '2': // para actualizar usuarios 
        
        $sql = 'UPDATE tbl_client SET 
        name = "'.$_POST['name'].'" ,  
        surname = "'.$_POST['surname'].'" ,  
        address = "'.$_POST['address'].'" ,  
        company = "'.$_POST['company'].'" , 
        position = "'.$_POST['position'].'" , 
        phone = "'.$_POST['phone'].'" , 
        eps = "'.$_POST['eps'].'" , 
        arl = "'.$_POST['arl'].'" , 
        afp = "'.$_POST['afp'].'" ,
        caja = "'.$_POST['caja'].'" ,
        riesgo = "'.$_POST['risk'].'" 
        WHERE document = "'.$_POST['iden'].'" ';
        
        echo $mysqli->query($sql);
    break;
       
}
