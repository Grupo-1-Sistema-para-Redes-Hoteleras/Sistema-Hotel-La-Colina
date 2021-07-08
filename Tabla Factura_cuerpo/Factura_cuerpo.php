<?php

include_once 'Conexión.php';

    class Factura_cuerpo extends DB{

        public function obtenerfacturas_cuerpo(){

            $query = $this->connect()->query('SELECT * FROM factura_cuerpo');
            return $query; 
        }

        public function obtenerfactura_cuerpo($id){
            $query = $this->connect()->prepare('SELECT * FROM factura_cuerpo WHERE Id_factura_cuerpo = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevaFactura_cuerpo($factura){
            $query = $this->connect()->prepare('INSERT INTO factura_cuerpo (Id_factura_cabe,
                                                                        Cantidad,
                                                                        Status_reservacion,
                                                                        Status_servicio,
                                                                        Status_promocion,
                                                                        Fecha_registro)
                                                                        VALUES (:Id_factura_cabe,
                                                                                :Cantidad,
                                                                                :Status_reservacion,
                                                                                :Status_servicio,
                                                                                :Status_promocion,
                                                                                :Fecha_registro)');
            $query->execute(['Id_factura_cabe' => $factura['Id_factura_cabe'],
                            'Cantidad' => $factura['Cantidad'],
                            'Status_reservacion' => $factura['Status_reservacion'],
                            'Status_servicio' => $factura['Status_servicio'],
                            'Status_promocion' => $factura['Status_promocion'],
                            'Fecha_registro' => $factura['Fecha_registro']]);
            return $query;
        }
    }
?>