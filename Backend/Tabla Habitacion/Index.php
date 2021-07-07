<?php

include_once 'ApiHabitación.php';

$api = new apihabitacion();

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