<?php

include_once 'Habitaciones.php';

class apihabitacion{

    function getAll(){
        $habitacion = new Habitacion();
        $habitacions = array();

        $res = $habitacion -> obtenerHabitaciones();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_habitacion'],
                    'id_room_type' => $row['Id_tipo_habitacion'],
                    'price' => $row['Precio_habitacion'],
                    'status' => $row['Status'],
                    'number' => $row['Numero_habitacion'],
                    'description' => $row['Descripcion'],
                    'fecha_registro' => $row['Fecha_registro'],
                    'id_Admin' => $row['Administrador_id_administrador']
                );
                array_push($habitacions, $item);
            }

            $this->printJSON($habitacions);

        }else{
            //echo json_encode(array('mensaje' => 'No hay elementos Registrados'));
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){
        $habitacion = new Habitacion();
        $habitacions = array();

        $res = $habitacion->obtenerHabitacion($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_habitacion'],
                    'id_room_type' => $row['Id_tipo_habitacion'],
                    'price' => $row['Precio_habitacion'],
                    'status' => $row['Status'],
                    'number' => $row['Numero_habitacion'],
                    'description' => $row['Descripcion'],
                    'fecha_registro' => $row['Fecha_registro'],
                    'id_Admin' => $row['Administrador_id_administrador']
            );
            array_push($habitacions, $item);

            $this->printJSON($habitacions);
        }else{
            //echo json_encode(array('mensaje' => 'No hay elementos'));
            $this->error('No hay elementos');
        }
    }

    function add($item){

        $habitacion = new Habitacion();

        $res = $habitacion->nuevaHabitacion($item);

        $this->exito('Nueva Habitacion Registrada');

    }

    function modificar($id, $item){
        $habitacion = new Habitacion();
        $res = $habitacion->actualizarHabitacion($id, $item);
        $this->exito('Actualizacion Exitosa...!');
    }

    function eliminar($id, $item){
        $habitacion = new Habitacion();
        $res = $habitacion->eliminarhabitacion($id, $item);
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
