<?php

    include_once 'ApiHabitación.php';

    $api = new apihabitacion();

    if(isset($_POST['Precio_habitacion']) && isset($_POST['Status']) &&
    isset($_POST['Descripcion'])){
        $id = array('Id_habitacion' => $_POST['Id_habitacion']);
        $item = array('Precio_habitacion' => $_POST['Precio_habitacion'],
                      'Status' => $_POST['Status'],
                      'Descripcion' => $_POST['Descripcion']);
        $api->modificar($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>