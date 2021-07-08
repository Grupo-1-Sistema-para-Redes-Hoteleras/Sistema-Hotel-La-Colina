<?php

    include_once 'ApiPromocion.php';

    $api = new apipromocion();

    if(isset($_POST['Nombre_promocion']) && isset($_POST['Fecha_inicio']) &&
       isset($_POST['Fecha_final']) && isset($_POST['Descuento']) &&
       isset($_POST['Status']) && isset($_POST['Id_tipo_habitacion']) &&
       isset($_POST['Fecha_registro'])){
        
        $item = array(
            'Nombre_promocion' => $_POST['Nombre_promocion'],
            'Fecha_inicio' => $_POST['Fecha_inicio'],
            'Fecha_final' => $_POST['Fecha_final'],
            'Descuento' => $_POST['Descuento'],
            'Status' => $_POST['Status'],
            'Id_tipo_habitacion' => $_POST['Id_tipo_habitacion'],
            'Fecha_registro' => $_POST['Fecha_registro']
        );
        $api->AddPromocion($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>