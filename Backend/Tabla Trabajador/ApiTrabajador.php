<?php

include_once 'Trabajador.php';

class apitrabajador{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $trabajador = new Trabajador();
        $trabajadores = array();
        $trabajadores ["items"] = array();

        $res = $trabajador -> obtenertrabajadores();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_trabajador' => $row['Id_trabajador'],
                    'Id_cargo' => $row['Id_cargo'],
                    'Cedula_trabajador' => $row['Cedula_trabajador'],
                    'Nombre_trabajador' => $row['Nombre_trabajador'],
                    'Apellido_trabajador' => $row['Apellido_trabajador'],
                    'Status_trabajador' => $row['Status_trabajador'],
                    'Email_trabajador' => $row['Email_trabajador'],
                    'Telf_trabajador' => $row['Telf_trabajador'],
                    'Fecha_nacimiento' => $row['Fecha_nacimiento'],
                    'Id_administrador' => $row['Id_administrador'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador'],
                    'Fecha_registro' => $row['Fecha_registro']
                );
                array_push($trabajadores['items'], $item);
            }

            $this->printJSON($trabajadores);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $trabajador = new Trabajador();
        $trabajadores = array();
        $trabajadores["items"] = array();

        $res = $trabajador->obtenertrabajador($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'Id_trabajador' => $row['Id_trabajador'],
                    'Id_cargo' => $row['Id_cargo'],
                    'Cedula_trabajador' => $row['Cedula_trabajador'],
                    'Nombre_trabajador' => $row['Nombre_trabajador'],
                    'Apellido_trabajador' => $row['Apellido_trabajador'],
                    'Status_trabajador' => $row['Status_trabajador'],
                    'Email_trabajador' => $row['Email_trabajador'],
                    'Telf_trabajador' => $row['Telf_trabajador'],
                    'Fecha_nacimiento' => $row['Fecha_nacimiento'],
                    'Id_administrador' => $row['Id_administrador'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador'],
                    'Fecha_registro' => $row['Fecha_registro']
            );
            array_push($trabajadores["items"], $item);

            $this->printJSON($trabajadores);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddTrabajador($item){

        $trabajador = new Trabajador();

        $res = $trabajador->nuevoTrabajador($item);

        $this->exito('Nuevo Trabajador Registrado');

    }

    function ModTrabajador($id,$item){

        $trabajador = new Trabajador();

        $res = $trabajador->actualizarTrabajador($id,$item);

        $this->exito('Actualización Exitosa...!');

    }

    function DropTrabajador($id,$item){

        $trabajador = new Trabajador();

        $res = $trabajador->eliminarTrabajador($id,$item);

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