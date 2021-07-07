<?php

    include_once 'ApiCargo.php';

    $api = new apicargo();

    if(isset($_POST['Nombre_cargo'] && isset($_POST['Status'))){
        $id = array('Id_cargo' => $_POST['Id_cargo']);
        $item = array('Nombre_cargo' => $_POST['Nombre_cargo'],
                      'Status' => $_POST['Status']);
        $api->ModCargo($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>