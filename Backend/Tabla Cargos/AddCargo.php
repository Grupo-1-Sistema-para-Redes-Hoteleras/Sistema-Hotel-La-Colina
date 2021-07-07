<?php

    include_once 'ApiCargo.php';

    $api = new apicargo();

    if(isset($_POST['Nombre_cargo']) && isset($_POST['Status']) &&
       isset($_POST['Fecha_ingreso']) &&
       isset($_POST['Administrador_id_administrador']) && 
       isset($_POST['Fecha_registro'])){
        
        $item = array(
            'Nombre_cargo' => $_POST['Nombre_cargo'],
            'Status' => $_POST['Status'],
            'Fecha_ingreso' => $_POST['Fecha_ingreso'],
            'Administrador_id_administrador' => $_POST['Administrador_id_administrador'],
            'Fecha_registro' => $_POST['Fecha_registro']
        );
        $api->AddCargo($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>