<?php

include_once 'Cliente.php';

class apicliente{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $cliente = new Cliente();
        $clientes = array();

        $res = $cliente -> obtenerclientes();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_cliente'],
                    'cedula' => $row['Cedula_cliente'],
                    'name' => $row['Nombre_cliente'],
                    'lastname' => $row['Apellido_cliente'],
                    'status' => $row['Status'],
                    'email' => $row['Email_cliente'],
                    'telf' => $row['Telf_cliente'],
                    'id_Admin' => $row['Administrador_id_administrador'],
                    'fecha_registro' => $row['Fecha_registro']
                );
                array_push($clientes, $item);
            }

            $this->printJSON($clientes);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $cliente = new Cliente();
        $clientes = array();

        $res = $cliente->obtenercliente($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_cliente'],
                    'cedula' => $row['Cedula_cliente'],
                    'name' => $row['Nombre_cliente'],
                    'lastname' => $row['Apellido_cliente'],
                    'status' => $row['Status'],
                    'email' => $row['Email_cliente'],
                    'telf' => $row['Telf_cliente'],
                    'id_Admin' => $row['Administrador_id_administrador'],
                    'fecha_registro' => $row['Fecha_registro']
            );
            array_push($clientes, $item);

            $this->printJSON($clientes);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddCliente($item){

        $cliente = new Cliente();

        $res = $cliente->nuevoCliente($item);

        $this->exito('Nuevo Cliente Registrado');

    }

    function ModCliente($id, $item){

        $cliente = new Cliente();

        $res = $cliente->actualizarCliente($id, $item);

        $this->exito('Actualización Exitosa...!');

    }

    function DropCliente($id, $item){

        $cliente = new Cliente();

        $res = $cliente->eliminarCliente($id, $item);

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
