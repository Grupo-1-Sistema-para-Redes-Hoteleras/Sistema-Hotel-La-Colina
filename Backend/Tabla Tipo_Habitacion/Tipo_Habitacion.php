<?php

include_once 'Conexión.php';

    class TipoHabitacion extends DB{

        public function obtenertipohabitaciones(){

            $query = $this->connect()->query('SELECT * FROM tipo_habitacion');
            return $query; 
        }

        public function obtenertipohabitacion($id){
            $query = $this->connect()->prepare('SELECT * FROM tipo_habitacion WHERE id_tipo_habitacion = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevoTipoHabitacion($tipo){
            $query = $this->connect()->prepare('INSERT INTO tipo_habitacion (nombre_tipo,
                                                                        status,
                                                                        Fecha_registro)
                                                                        VALUES (:nombre_tipo,
                                                                                :status,
                                                                                :fecha_registro)');

            $query->execute(['nombre_tipo' => $tipo['nombre_tipo'],
                            'status' => $tipo['status'],
                            'fecha_registro' => $tipo['fecha_registro']]);
            return $query;
        }

        public function actualizarTipoHabitacion($id,$new){
            $query = $this->connect()->prepare('UPDATE tipo_habitacion SET nombre_tipo = :nombre_tipo WHERE id_tipo_habitacion = :id_tipo_habitacion');
            $query->execute(['id_tipo_habitacion' => $id['id_tipo_habitacion'],
                             'nombre_tipo' => $new['nombre_tipo']]);
            return $query;
        }

        public function eliminarTipoHabitacion($id,$drop){
            $query = $this->connect()->prepare('UPDATE tipo_habitacion SET status = :status WHERE id_tipo_habitacion = :id_tipo_habitacion');
            $query->execute(['id_tipo_habitacion' => $id['id_tipo_habitacion'],
                             'status' => $drop['status']]);
            return $query;
        }
    }
?>