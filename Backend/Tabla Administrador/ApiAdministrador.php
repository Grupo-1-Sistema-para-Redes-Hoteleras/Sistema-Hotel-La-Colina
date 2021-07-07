<?php

include_once 'Administrador.php';

class apiadministrador{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $admin = new Administrador();
        $admins = array();
        $admins ["items"] = array();

        $res = $admin -> obteneradministradores();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_administrador' => $row['Id_administrador'],
                    'Nombre_administrador' => $row['Nombre_administrador'],
                    'Usuario_administrador' => $row['Usuario_administrador'],
                    'Password_administrador' => $row['Password_administrador'],
                    'Status_administrador' => $row['Status_administrador'],
                    'Fecha' => $row['Fecha'],
                    'Nivel_administrador' => $row['Nivel_administrador']
                );
                array_push($admins['items'], $item);
            }

            $this->printJSON($admins);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $admin = new Administrador();
        $admins = array();
        $admins["items"] = array();

        $res = $admin->obteneradministrador($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'Id_administrador' => $row['Id_administrador'],
                    'Nombre_administrador' => $row['Nombre_administrador'],
                    'Usuario_administrador' => $row['Usuario_administrador'],
                    'Password_administrador' => $row['Password_administrador'],
                    'Status_administrador' => $row['Status_administrador'],
                    'Fecha' => $row['Fecha'],
                    'Nivel_administrador' => $row['Nivel_administrador']
            );
            array_push($admins["items"], $item);

            $this->printJSON($admins);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddAdministrador($item){

        $admin = new Administrador();

        $res = $admin->nuevoAdministrador($item);

        $this->exito('Nuevo Administrador Registrado');

    }

    function ModAdministrador($id, $item){

        $admin = new Administrador();

        $res = $admin->actualizarAdministrador($id, $item);

        $this->exito('Actualización Exitosa...!');

    }
    function DropAdministrador($id, $item){

        $admin = new Administrador();

        $res = $admin->eliminarAdministrador($id, $item);

        $this->exito('Eliminación Exitosa...!');

    }

    function error($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; 
    }

    function exito($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
    }

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }
}  
?>