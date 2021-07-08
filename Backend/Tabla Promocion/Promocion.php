<?php

include_once 'Conexión.php';

    class Promocion extends DB{

        public function obtenerpromociones(){

            $query = $this->connect()->query('SELECT * FROM promocion');
            return $query; 
        }

        public function obtenerpromocion($id){
            $query = $this->connect()->prepare('SELECT * FROM promocion WHERE Id_promocion = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevaPromocion($promocion){
            $query = $this->connect()->prepare('INSERT INTO promocion (Nombre_promocion,
                                                                        Fecha_inicio,
                                                                        Fecha_final,
                                                                        Descuento,
                                                                        Status,
                                                                        Id_tipo_habitacion,                                                                     
                                                                        Fecha_registro)
                                                                        VALUES (:Nombre_promocion,
                                                                                :Fecha_inicio,
                                                                                :Fecha_final,
                                                                                :Descuento,
                                                                                :Status,
                                                                                :Id_tipo_habitacion,
                                                                                :Fecha_registro)');

            $query->execute(['Nombre_promocion' => $promocion['Nombre_promocion'],
                            'Fecha_inicio' => $promocion['Fecha_inicio'],
                            'Fecha_final' => $promocion['Fecha_final'],
                            'Descuento' => $promocion['Descuento'],
                            'Status' => $promocion['Status'],
                            'Id_tipo_habitacion' => $promocion['Id_tipo_habitacion'],
                            'Fecha_registro' => $promocion['Fecha_registro']]);
            return $query;
        }

        public function actualizarPromocion($id,$new){
            $query = $this->connect()->prepare('UPDATE promocion SET Fecha_inicio = :Fecha_inicio,
                                                                    Fecha_final = :Fecha_final,
                                                                    Descuento = :Descuento,
                                                                    Id_tipo_habitacion = :Id_tipo_habitacion
                                                                 WHERE Id_promocion = :Id_promocion');
            $query->execute(['Id_promocion' => $id['Id_promocion'],
                             'Fecha_inicio' => $new['Fecha_inicio'],
                             'Fecha_final' => $new['Fecha_final'],
                             'Descuento' => $new['Descuento'],
                             'Id_tipo_habitacion' => $new['Id_tipo_habitacion']]);
            return $query;
        }

        public function eliminarPromocion($id,$drop){
            $query = $this->connect()->prepare('UPDATE promocion SET Status = :Status WHERE Id_promocion = :Id_promocion');
            $query->execute(['Id_promocion' => $id['Id_promocion'],
                             'Status' => $drop['Status']]);
            return $query;
        }
    }
?>