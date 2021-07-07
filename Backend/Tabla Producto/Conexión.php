<?php

include_once 'Conexión.php';

    class Producto extends DB{

        public function obtenerproductos(){

            $query = $this->connect()->query('SELECT * FROM producto');
            return $query; 
        }

        public function obtenerproducto($id){
            $query = $this->connect()->prepare('SELECT * FROM producto WHERE Id_producto = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevoProducto($producto){
            $query = $this->connect()->prepare('INSERT INTO producto (Nombre_producto,
                                                                        Status,
                                                                        Descripcion_producto,
                                                                        Precio_producto,
                                                                        Fecha_registro)
                                                                        VALUES (:Nombre_producto,
                                                                                :Status,
                                                                                :Descripcion_producto,
                                                                                :Precio_producto,
                                                                                :Fecha_registro)');

            $query->execute(['Nombre_producto' => $producto['Nombre_producto'],
                            'Status' => $producto['Status'],
                            'Descripcion_producto' => $producto['Descripcion_producto'],
                            'Precio_producto' => $producto['Precio_producto'],
                            'Fecha_registro' => $producto['Fecha_registro']]);
            return $query;
        }

        public function actualizarProducto($id, $new){
            $query = $this->connect()->prepare('UPDATE producto SET Status = :Status,
                                                                    Descripcion_producto = :Descripcion_producto,
                                                                    Precio_producto = :Precio_producto 
                                                                WHERE Id_producto = :Id_producto');
            $query->execute(['Id_producto' => $id['Id_producto'],
                             'Status' => $new['Status'],
                             'Descripcion_producto' => $new['Descripcion_producto'],
                             'Precio_producto' => $new['Precio_producto']]);
            return $query;
        }

        public function eliminarProducto($id, $drop){
            $query = $this->connect()->prepare('UPDATE producto SET Status = :Status 
                                                                WHERE Id_producto = :Id_producto');
            $query->execute(['Id_producto' => $id['Id_producto'],
                             'Status' => $drop['Status']]);
            return $query;
        }
    }
?>
