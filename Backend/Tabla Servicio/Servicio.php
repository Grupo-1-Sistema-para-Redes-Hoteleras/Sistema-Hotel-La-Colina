<?php

include_once 'Conexión.php';

    class Servicio extends DB{

        public function obtenerservicios(){

            $query = $this->connect()->query('SELECT * FROM servicio');
            return $query; 
        }

        public function obtenerservicio($id){
            $query = $this->connect()->prepare('SELECT * FROM servicio WHERE Id_servicio = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevoServicio($servicio){
            $query = $this->connect()->prepare('INSERT INTO servicio (Nombre_servicio,
                                                                        Precio_servicio,
                                                                        Status,
                                                                        Descripcion,
                                                                        Administrador_id_administrador,
                                                                        Fecha_registro)
                                                                        VALUES (:Nombre_servicio,
                                                                                :Precio_servicio,
                                                                                :Status,
                                                                                :Descripcion,
                                                                                :Administrador_id_administrador,
                                                                                :Fecha_registro)');

            $query->execute(['Nombre_servicio' => $servicio['Nombre_servicio'],
                            'Precio_servicio' => $servicio['Precio_servicio'],
                            'Status' => $servicio['Status'],
                            'Descripcion' => $servicio['Descripcion'],
                            'Administrador_id_administrador' => $servicio['Administrador_id_administrador'],
                            'Fecha_registro' => $servicio['Fecha_registro']]);
            return $query;
        }

        public function actualizarServicio($id,$new){
            $query = $this->connect()->prepare('UPDATE servicio SET Nombre_servicio = :Nombre_servicio,
                                                                    Precio_servicio = :Precio_servicio,
                                                                    Descripcion = :Descripcion 
                                                                    WHERE Id_servicio = :Id_servicio');
            $query->execute(['Id_servicio' => $id['Id_servicio'],
                             'Nombre_servicio' => $new['Nombre_servicio'],
                             'Precio_servicio' => $new['Precio_servicio'],
                             'Descripcion' => $new['Descripcion']]);
            return $query;
        }

        public function eliminarServicio($id,$drop){
            $query = $this->connect()->prepare('UPDATE servicio SET Status = :Status WHERE Id_servicio = :Id_servicio');
            $query->execute(['Id_servicio' => $id['Id_servicio'],
                             'Status' => $drop['Status']]);
            return $query;
        }
    }
?>