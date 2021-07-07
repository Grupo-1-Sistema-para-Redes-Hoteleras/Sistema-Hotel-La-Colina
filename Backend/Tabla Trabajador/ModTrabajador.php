<?php

    include_once 'ApiTrabajador.php';

    $api = new apitrabajador();

    if(isset($_POST['Id_cargo']) && isset($_POST['Status_trabajador']) &&
       isset($_POST['Email_trabajador']) && isset($_POST['Telf_trabajador'])){
        $id = array('Id_trabajador' => $_POST['Id_trabajador']);
        $item = array('Id_cargo' => $_POST['Id_cargo'],
                      'Status_trabajador' => $_POST['Status_trabajador'],
                      'Email_trabajador' => $_POST['Email_trabajador'],
                      'Telf_trabajador' => $_POST['Telf_trabajador']);
        $api->ModTrabajador($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>