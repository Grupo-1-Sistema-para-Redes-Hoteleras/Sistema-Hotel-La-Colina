<?php

    include_once 'ApiPromocion.php';

    $api = new apipromocion();

    if(isset($_POST['Fecha_inicio']) && isset($_POST['Fecha_final']) && 
       isset($_POST['Descuento']) && isset($_POST['Id_tipo_habitacion'])){
        $id = array('Id_promocion' => $_POST['Id_promocion']);
        $item = array('Fecha_inicio' => $_POST['Fecha_inicio'],
                      'Fecha_final' => $_POST['Fecha_final'],
                      'Descuento' => $_POST['Descuento'],
                      'Id_tipo_habitacion' => $_POST['Id_tipo_habitacion']);
        $api->ModPromocion($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>