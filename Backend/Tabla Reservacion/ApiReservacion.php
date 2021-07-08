<?php

include_once 'Reservacion.php';

class apireservacion{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $reserva = new Reservacion();
        $reservas = array();
        $reservas ["items"] = array();

        $res = $reserva -> obtenerreservas();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_reservacion' => $row['Id_reservacion'],
                    'Fecha_reservacion' => $row['Fecha_reservacion'],
                    'Status' => $row['Status'],
                    'Cantidad_personas' => $row['Cantidad_personas'],
                    'Id_cliente' => $row['Id_cliente'],
                    'Id_habitacion' => $row['Id_habitacion'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador'],
                    'Fecha_registro' => $row['Fecha_registro']
                );
                array_push($reservas['items'], $item);
            }

            $this->printJSON($reservas);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $reserva = new Reservacion();
        $reservas = array();
        $reservas["items"] = array();

        $res = $reserva->obtenerreserva($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'Id_reservacion' => $row['Id_reservacion'],
                    'Fecha_reservacion' => $row['Fecha_reservacion'],
                    'Status' => $row['Status'],
                    'Cantidad_personas' => $row['Cantidad_personas'],
                    'Id_cliente' => $row['Id_cliente'],
                    'Id_habitacion' => $row['Id_habitacion'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador'],
                    'Fecha_registro' => $row['Fecha_registro']
            );
            array_push($reservas["items"], $item);

            $this->printJSON($reservas);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddReservacion($item){

        $reserva = new Reservacion();

        $res = $reserva->nuevaReservacion($item);

        $this->exito('Nueva Reservación Registrada');

    }

    function ModReservacion($id, $item){

        $reserva = new Reservacion();

        $res = $reserva->actualizarReservacion($id, $item);

        $this->exito('Actualización Exitosa...!');

    }

    function DropReservacion($id, $item){

        $reserva = new Reservacion();

        $res = $reserva->eliminarReservacion($id, $item);

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