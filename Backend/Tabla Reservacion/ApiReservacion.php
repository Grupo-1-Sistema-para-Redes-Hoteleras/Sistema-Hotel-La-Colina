<?php

include_once 'Reservacion.php';

class apireservacion{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $reserva = new Reservacion();
        $reservas = array();
        
        $res = $reserva -> obtenerreservas();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_reservacion'],
                    'fecha' => $row['Fecha_reservacion'],
                    'status' => $row['Status'],
                    'quantity' => $row['Cantidad_personas'],
                    'id_client' => $row['Id_cliente'],
                    'id_room' => $row['Id_habitacion'],
                    'id_Admin' => $row['Administrador_id_administrador'],
                    'fecha_registro' => $row['Fecha_registro']
                );
                array_push($reservas, $item);
            }

            $this->printJSON($reservas);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $reserva = new Reservacion();
        $reservas = array();

        $res = $reserva->obtenerreserva($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_reservacion'],
                    'fecha' => $row['Fecha_reservacion'],
                    'status' => $row['Status'],
                    'quantity' => $row['Cantidad_personas'],
                    'id_client' => $row['Id_cliente'],
                    'id_room' => $row['Id_habitacion'],
                    'id_Admin' => $row['Administrador_id_administrador'],
                    'fecha_registro' => $row['Fecha_registro']
            );
            array_push($reservas, $item);

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
        echo json_encode(array('mensaje' => $mensaje)) ; 
    }

    function exito($mensaje){
        echo json_encode(array('mensaje' => $mensaje)) ;
    }

    function printJSON($array){
        echo json_encode($array);
    }
}
    
?>
