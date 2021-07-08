<?php

    include_once 'ApiPromocion.php';

    $api = new apipromocion();

    if(isset($_POST['Status'])){
        $id = array('Id_promocion' => $_POST['Id_promocion']);
        $item = array('Status' => $_POST['Status']);
        $api->DropPromocion($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>