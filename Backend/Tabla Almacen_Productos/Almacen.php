<?php

include_once 'Conexión.php';

    class Almacen extends DB{

        public function obteneralmacenes(){

            $query = $this->connect()->query('SELECT * FROM almacen_productos');
            return $query; 
        }

        public function obteneralmacen($id){
            $query = $this->connect()->prepare('SELECT * FROM almacen_productos WHERE Id_almacen = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevoAlmacen($almacen){
            $query = $this->connect()->prepare('INSERT INTO almacen_productos (Id_producto,
                                                                        Cantidad_producto,
                                                                        Status,
                                                                        Fecha_registro,
                                                                        Administrador_id_administrador)
                                                                        VALUES (:Id_producto,
                                                                                :Cantidad_producto,
                                                                                :Status,
                                                                                :Fecha_registro,
                                                                                :Administrador_id_administrador)');

            $query->execute(['Id_producto' => $almacen['Id_producto'],
                            'Cantidad_producto' => $almacen['Cantidad_producto'],
                            'Status' => $almacen['Status'],
                            'Fecha_registro' => $almacen['Fecha_registro'],
                            'Administrador_id_administrador' => $almacen['Administrador_id_administrador']]);
            return $query;
        }

        public function actualizarAlmacen($id, $new){
            $query = $this->connect()->prepare('UPDATE almacen_productos SET Cantidad_producto = :Cantidad_producto,
                                                                             Status = :Status
                                                                         WHERE Id_almacen = :Id_almacen');
            $query->execute(['Id_almacen' => $id['Id_almacen'],
                             'Cantidad_producto' => $new['Cantidad_producto'],
                             'Status' => $new['Status']]);
            return $query;
        }

        public function eliminarAlmacen($id, $drop){
            $query = $this->connect()->prepare('UPDATE almacen_productos SET Status = :Status
                                                                         WHERE Id_almacen = :Id_almacen');
            $query->execute(['Id_almacen' => $id['Id_almacen'],
                             'Status' => $drop['Status']]);
            return $query;
        }
    }
?>