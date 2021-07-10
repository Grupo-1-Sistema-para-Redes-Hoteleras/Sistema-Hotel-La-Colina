<?php

include_once 'Proveedor.php';

class apiproveedor{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $proveedor = new Proveedor();
        $proveedores = array();
        
        $res = $proveedor -> obtenerproveedores();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_proveedor'],
                    'name' => $row['Nombre_proveedor'],
                    'lastname' => $row['Apellido_proveedor'],
                    'status' => $row['Status'],
                    'email' => $row['Email_proveedor'],
                    'telf' => $row['Telf_proveedor'],
                    'direction' => $row['Direccion_proveedor'],
                    'product' => $row['nombre_Producto'],
                    'quantity' => $row['cantidad_Producto'],
                    'description' => $row['descripcion_Producto'],
                    'fecha_registro' => $row['Fecha_registro'],
                    'id_Admin' => $row['Administrador_id_administrador']
                );
                array_push($proveedores, $item);
            }

            $this->printJSON($proveedores);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $proveedor = new Proveedor();
        $proveedores = array();
        
        $res = $proveedor->obtenerproveedor($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_proveedor'],
                    'name' => $row['Nombre_proveedor'],
                    'lastname' => $row['Apellido_proveedor'],
                    'status' => $row['Status'],
                    'email' => $row['Email_proveedor'],
                    'telf' => $row['Telf_proveedor'],
                    'direction' => $row['Direccion_proveedor'],
                    'product' => $row['nombre_Producto'],
                    'quantity' => $row['cantidad_Producto'],
                    'description' => $row['descripcion_Producto'],
                    'fecha_registro' => $row['Fecha_registro'],
                    'id_Admin' => $row['Administrador_id_administrador']
            );
            array_push($proveedores, $item);

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
