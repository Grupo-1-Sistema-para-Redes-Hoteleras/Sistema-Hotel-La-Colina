<?php

include_once 'Cliente.php';

class apicliente{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $cliente = new Cliente();
        $clientes = array();
        $clientes ["items"] = array();

        $res = $cliente -> obtenerclientes();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_cliente' => $row['Id_cliente'],
                    'Cedula_cliente' => $row['Cedula_cliente'],
                    'Nombre_cliente' => $row['Nombre_cliente'],
                    'Apellido_cliente' => $row['Apellido_cliente'],
                    'Status' => $row['Status'],
                    'Email_cliente' => $row['Email_cliente'],
                    'Telf_cliente' => $row['Telf_cliente'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador'],
                    'Fecha_registro' => $row['Fecha_registro']
                );
                array_push($clientes['items'], $item);
            }

            $this->printJSON($clientes);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $cliente = new Cliente();
        $clientes = array();
        $clientes["items"] = array();

        $res = $cliente->obtenercliente($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'Id_cliente' => $row['Id_cliente'],
                    'Cedula_cliente' => $row['Cedula_cliente'],
                    'Nombre_cliente' => $row['Nombre_cliente'],
                    'Apellido_cliente' => $row['Apellido_cliente'],
                    'Status' => $row['Status'],
                    'Email_cliente' => $row['Email_cliente'],
                    'Telf_cliente' => $row['Telf_cliente'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador'],
                    'Fecha_registro' => $row['Fecha_registro']
            );
            array_push($clientes["items"], $item);

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