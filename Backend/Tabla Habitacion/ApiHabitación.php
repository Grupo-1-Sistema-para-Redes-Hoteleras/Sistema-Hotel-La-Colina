<?php

include_once 'Habitaciones.php';

class apihabitacion{

    function getAll(){
        $habitacion = new Habitacion();
        $habitacions = array();
        $habitacions ["items"] = array();

        $res = $habitacion -> obtenerHabitaciones();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_habitacion' => $row['Id_habitacion'],
                    'Id_tipo_habitacion' => $row['Id_tipo_habitacion'],
                    'Precio_habitacion' => $row['Precio_habitacion'],
                    'Status' => $row['Status'],
                    'Numero_habitacion' => $row['Numero_habitacion'],
                    'Descripcion' => $row['Descripcion'],
                    'Fecha_registro' => $row['Fecha_registro'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador']
                );
                array_push($habitacions['items'], $item);
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
        $habitacions["items"] = array();

        $res = $habitacion->obtenerHabitacion($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                'Id_habitacion' => $row['Id_habitacion'],
                'Id_tipo_habitacion' => $row['Id_tipo_habitacion'],    
                'Precio_habitacion' => $row['Precio_habitacion'],
                'Status' => $row['Status'],
                'Numero_habitacion' => $row['Numero_habitacion'],
                'Descripcion' => $row['Descripcion'],
                'Fecha_registro' => $row['Fecha_registro'],
                'Administrador_id_administrador' => $row['Administrador_id_administrador']
            );
            array_push($habitacions["items"], $item);

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