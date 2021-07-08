<?php

    include_once 'ApiServicio.php';

    $api = new apiservicio();

    if(isset($_POST['Nombre_servicio']) && isset($_POST['Precio_servicio']) && 
       isset($_POST['Descripcion'])){
        $id = array('Id_servicio' => $_POST['Id_servicio']);
        $item = array('Nombre_servicio' => $_POST['Nombre_servicio'],
                      'Precio_servicio' => $_POST['Precio_servicio'],
                      'Descripcion' => $_POST['Descripcion']);
        $api->ModServicio($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>