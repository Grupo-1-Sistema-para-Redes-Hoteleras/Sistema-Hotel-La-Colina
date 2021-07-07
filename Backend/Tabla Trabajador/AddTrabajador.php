<?php

    include_once 'ApiTrabajador.php';

    $api = new apitrabajador();

    if(isset($_POST['Id_cargo']) && isset($_POST['Cedula_trabajador']) &&
       isset($_POST['Nombre_trabajador']) && isset($_POST['Apellido_trabajador']) &&
       isset($_POST['Status_trabajador']) && isset($_POST['Email_trabajador']) &&
       isset($_POST['Telf_trabajador']) && isset($_POST['Fecha_nacimiento']) &&
       isset($_POST['Id_administrador'])&& isset($_POST['Administrador_id_administrador']) && 
       isset($_POST['Fecha_registro'])){
        
        $item = array(
            'Id_cargo' => $_POST['Id_cargo'],
            'Cedula_trabajador' => $_POST['Cedula_trabajador'],
            'Nombre_trabajador' => $_POST['Nombre_trabajador'],
            'Apellido_trabajador' => $_POST['Apellido_trabajador'],
            'Status_trabajador' => $_POST['Status_trabajador'],
            'Email_trabajador' => $_POST['Email_trabajador'],
            'Telf_trabajador' => $_POST['Telf_trabajador'],
            'Fecha_nacimiento' => $_POST['Fecha_nacimiento'],
            'Id_administrador' => $_POST['Id_administrador'],
            'Administrador_id_administrador' => $_POST['Administrador_id_administrador'],
            'Fecha_registro' => $_POST['Fecha_registro']
        );
        $api->AddTrabajador($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>