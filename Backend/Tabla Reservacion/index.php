<?php

include_once 'ApiReservacion.php';

header('Access-Control-Allow-Origin: *');

$api = new apireservacion();

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if(is_numeric($id)){
            $api->getById($id);
        }else{
            $api->error('El id es incorrecto');
        }
    }else{
        $api->getAll();
    }

?>
