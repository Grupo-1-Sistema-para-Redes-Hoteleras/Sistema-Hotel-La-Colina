<?php

include_once 'Conexión.php';

    class Reservacion extends DB{

        public function obtenerreservas(){

            $query = $this->connect()->query('SELECT * FROM reservacion');
            return $query; 
        }

        public function obtenerreserva($id){
            $query = $this->connect()->prepare('SELECT * FROM reservacion WHERE Id_reservacion = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevaReservacion($reserva){
            $query = $this->connect()->prepare('INSERT INTO reservacion (Fecha_reservacion,
                                                                        Status,
                                                                        Cantidad_personas,
                                                                        Id_cliente,
                                                                        Id_habitacion,
                                                                        Administrador_id_administrador,
                                                                        Fecha_registro)
                                                                        VALUES (:Fecha_reservacion,
                                                                                :Status,
                                                                                :Cantidad_personas,
                                                                                :Id_cliente,
                                                                                :Id_habitacion,
                                                                                :Administrador_id_administrador,
                                                                                :Fecha_registro)');

            $query->execute(['Fecha_reservacion' => $reserva['Fecha_reservacion'],
                            'Status' => $reserva['Status'],
                            'Cantidad_personas' => $reserva['Cantidad_personas'],
                            'Id_cliente' => $reserva['Id_cliente'],
                            'Id_habitacion' => $reserva['Id_habitacion'],
                            'Administrador_id_administrador' => $reserva['Administrador_id_administrador'],
                            'Fecha_registro' => $reserva['Fecha_registro']]);
            return $query;
        }

        public function actualizarReservacion($id, $new){
            $query = $this->connect()->prepare('UPDATE reservacion SET Status = :Status,
                                                                       Cantidad_personas = :Cantidad_personas
                                                                   WHERE Id_reservacion = :Id_reservacion');
            $query->execute(['Id_reservacion' => $id['Id_reservacion'],
                             'Status' => $new['Status'],
                             'Cantidad_personas' => $new['Cantidad_personas']]);
            return $query;
        }

        public function eliminarReservacion($id, $drop){
            $query = $this->connect()->prepare('UPDATE reservacion SET Status = :Status
                                                                   WHERE Id_reservacion = :Id_reservacion');
            $query->execute(['Id_reservacion' => $id['Id_reservacion'],
                             'Status' => $drop['Status']]);
            return $query;
        }
    }
?>