<?php

    include_once 'ApiCargo.php';

    $api = new apicargo();

    if(isset($_POST['Status'])){
        $id = array('Id_cargo' => $_POST['Id_cargo']);
        $item = array('Status' => $_POST['Status']);
        $api->DropCargo($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>