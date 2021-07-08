<?php

include_once 'Proveedor.php';

class apiproveedor{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $proveedor = new Proveedor();
        $proveedores = array();
        $proveedores ["items"] = array();

        $res = $proveedor -> obtenerproveedores();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_proveedor' => $row['Id_proveedor'],
                    'Nombre_proveedor' => $row['Nombre_proveedor'],
                    'Apellido_proveedor' => $row['Apellido_proveedor'],
                    'Status' => $row['Status'],
                    'Email_proveedor' => $row['Email_proveedor'],
                    'Telf_proveedor' => $row['Telf_proveedor'],
                    'Direccion_proveedor' => $row['Direccion_proveedor'],
                    'Fecha_registro' => $row['Fecha_registro'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador']
                );
                array_push($proveedores['items'], $item);
            }

            $this->printJSON($proveedores);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $proveedor = new Proveedor();
        $proveedores = array();
        $proveedores["items"] = array();

        $res = $proveedor->obtenerproveedor($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'Id_proveedor' => $row['Id_proveedor'],
                    'Nombre_proveedor' => $row['Nombre_proveedor'],
                    'Apellido_proveedor' => $row['Apellido_proveedor'],
                    'Status' => $row['Status'],
                    'Email_proveedor' => $row['Email_proveedor'],
                    'Telf_proveedor' => $row['Telf_proveedor'],
                    'Direccion_proveedor' => $row['Direccion_proveedor'],
                    'Fecha_registro' => $row['Fecha_registro'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador']
            );
            array_push($proveedores["items"], $item);

            $this->printJSON($proveedores);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddProveedor($item){

        $proveedor = new Proveedor();

        $res = $proveedor->nuevoProveedor($item);

        $this->exito('Nuevo Proveedor Registrado');

    }

    function ModProveedor($id,$item){

        $proveedor = new Proveedor();

        $res = $proveedor->actualizarProveedor($id,$item);

        $this->exito('Actualización Exitosa...!');

    }

    function DropProveedor($id,$item){

        $proveedor = new Proveedor();

        $res = $proveedor->eliminarProveedor($id,$item);

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