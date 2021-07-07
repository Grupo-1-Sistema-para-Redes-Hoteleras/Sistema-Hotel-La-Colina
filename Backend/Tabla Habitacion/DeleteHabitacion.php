<?php

    include_once 'ApiHabitación.php';

    $api = new apihabitacion();

    if(isset($_POST['Status'])){
        $id = array('Id_habitacion' => $_POST['Id_habitacion']);
        $item = array('Status' => $_POST['Status']);
        $api->eliminar($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>