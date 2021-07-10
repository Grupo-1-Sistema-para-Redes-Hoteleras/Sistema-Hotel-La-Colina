<?php

include_once 'Administrador.php';

class apiadministrador{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $admin = new Administrador();
        $admins = array();

        $res = $admin -> obteneradministradores();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_administrador'],
                    'name' => $row['Nombre_administrador'],
                    'user' => $row['Usuario_administrador'],
                    'password' => $row['Password_administrador'],
                    'status' => $row['Status_administrador'],
                    'fecha' => $row['Fecha'],
                    'level_Admin' => $row['Nivel_administrador']
                );
                array_push($admins, $item);
            }

            $this->printJSON($admins);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $admin = new Administrador();
        $admins = array();

        $res = $admin->obteneradministrador($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_administrador'],
                    'name' => $row['Nombre_administrador'],
                    'user' => $row['Usuario_administrador'],
                    'password' => $row['Password_administrador'],
                    'status' => $row['Status_administrador'],
                    'fecha' => $row['Fecha'],
                    'level_Admin' => $row['Nivel_administrador']
            );
            array_push($admins, $item);

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
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function exito($mensaje){
        echo json_encode(array('mensaje' => $mensaje));
    }

    function printJSON($array){
        echo json_encode($array);
    }
}  
?>
