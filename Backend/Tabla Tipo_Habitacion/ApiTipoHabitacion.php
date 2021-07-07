<?php

include_once 'Tipo_Habitacion.php';

class apitipohabitacion{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $tipo = new TipoHabitacion();
        $tipos = array();
        $tipos ["items"] = array();

        $res = $tipo -> obtenertipohabitaciones();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id_tipo_habitacion' => $row['id_tipo_habitacion'],
                    'nombre_tipo' => $row['nombre_tipo'],
                    'status' => $row['status'],
                    'fecha_registro' => $row['fecha_registro']
                );
                array_push($tipos['items'], $item);
            }

            $this->printJSON($tipos);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $tipo = new TipoHabitacion();
        $tipos = array();
        $tipos["items"] = array();

        $res = $tipo->obtenertipohabitacion($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                'id_tipo_habitacion' => $row['id_tipo_habitacion'],
                'nombre_tipo' => $row['nombre_tipo'],
                'status' => $row['status'],
                'fecha_registro' => $row['fecha_registro']
            );
            array_push($tipos["items"], $item);

            $this->printJSON($tipos);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddTipoHabitacion($item){

        $tipo = new TipoHabitacion();

        $res = $tipo->nuevoTipoHabitacion($item);

        $this->exito('Nuevo Tipo de Habitación Registrado');

    }

    function ModTipoHabitacion($id,$item){

        $tipo = new TipoHabitacion();

        $res = $tipo->actualizarTipoHabitacion($id,$item);

        $this->exito('Actualización Exitosa...!');

    }

    function DropTipoHabitacion($id,$item){

        $tipo = new TipoHabitacion();

        $res = $tipo->eliminarTipoHabitacion($id,$item);

        $this->exito('Eliminación Exitosa');

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