<?php

include_once 'Trabajador.php';

class apitrabajador{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $trabajador = new Trabajador();
        $trabajadores = array();

        $res = $trabajador -> obtenertrabajadores();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_trabajador'],
                    'id_position' => $row['Id_cargo'],
                    'cedula' => $row['Cedula_trabajador'],
                    'name' => $row['Nombre_trabajador'],
                    'lastname' => $row['Apellido_trabajador'],
                    'status' => $row['Status_trabajador'],
                    'email' => $row['Email_trabajador'],
                    'telf' => $row['Telf_trabajador'],
                    'fecha_nacimiento' => $row['Fecha_nacimiento'],
                    'id_admin' => $row['Id_administrador'],
                    'id_Admin' => $row['Administrador_id_administrador'],
                    'fecha_registro' => $row['Fecha_registro']
                );
                array_push($trabajadores, $item);
            }

            $this->printJSON($trabajadores);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $trabajador = new Trabajador();
        $trabajadores = array();

        $res = $trabajador->obtenertrabajador($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_trabajador'],
                    'id_position' => $row['Id_cargo'],
                    'cedula' => $row['Cedula_trabajador'],
                    'name' => $row['Nombre_trabajador'],
                    'lastname' => $row['Apellido_trabajador'],
                    'status' => $row['Status_trabajador'],
                    'email' => $row['Email_trabajador'],
                    'telf' => $row['Telf_trabajador'],
                    'fecha_nacimiento' => $row['Fecha_nacimiento'],
                    'id_admin' => $row['Id_administrador'],
                    'id_Admin' => $row['Administrador_id_administrador'],
                    'fecha_registro' => $row['Fecha_registro']
            );
            array_push($trabajadores, $item);

            $this->printJSON($trabajadores);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddTrabajador($item){  //Funcion Insertar

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
