<?php

include_once 'Conexión.php';

    class Factura_cabe extends DB{

        public function obtenerfacturas_cabe(){

            $query = $this->connect()->query('SELECT * FROM factura_cabe');
            return $query; 
        }

        public function obtenerfactura_cabe($id){
            $query = $this->connect()->prepare('SELECT * FROM factura_cabe WHERE Id_factura = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevaFactura_cabe($factura){
            $query = $this->connect()->prepare('INSERT INTO factura_cabe (Fecha,
                                                                        Id_cliente,
                                                                        Monto,
                                                                        Cantidad_producto,
                                                                        Id_trabajador,
                                                                        Id_reservacion,
                                                                        Id_servicio,
                                                                        Id_promocion,
                                                                        Administrador_id_administrador,
                                                                        Fecha_registro)
                                                                        VALUES (:Fecha,
                                                                                :Id_cliente,
                                                                                :Monto,
                                                                                :Cantidad_producto,
                                                                                :Id_trabajador,
                                                                                :Id_reservacion,
                                                                                :Id_servicio,
                                                                                :Id_promocion,
                                                                                :Administrador_id_administrador,
                                                                                :Fecha_registro)');
            $query->execute(['Fecha' => $factura['Fecha'],
                            'Id_cliente' => $factura['Id_cliente'],
                            'Monto' => $factura['Monto'],
                            'Cantidad_producto' => $factura['Cantidad_producto'],
                            'Id_trabajador' => $factura['Id_trabajador'],
                            'Id_reservacion' => $factura['Id_reservacion'],
                            'Id_servicio' => $factura['Id_servicio'],
                            'Id_promocion' => $factura['Id_promocion'],
                            'Administrador_id_administrador' => $factura['Administrador_id_administrador'],
                            'Fecha_registro' => $factura['Fecha_registro']]);
            return $query;
        }
    }
?>