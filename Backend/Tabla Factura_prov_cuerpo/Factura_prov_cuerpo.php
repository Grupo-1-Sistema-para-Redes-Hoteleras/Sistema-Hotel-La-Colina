<?php

include_once 'Conexión.php';

    class Factura_prov_cuerpo extends DB{

        public function obtenerfacturas_prov_cuerpo(){

            $query = $this->connect()->query('SELECT * FROM factura_proveedor_cuerpo');
            return $query; 
        }

        public function obtenerfactura_prov_cuerpo($id){
            $query = $this->connect()->prepare('SELECT * FROM factura_proveedor_cuerpo WHERE Id_factura_proveedor_cuerpo = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevaFactura_prov_cuerpo($factura){
            $query = $this->connect()->prepare('INSERT INTO factura_proveedor_cuerpo (Id_factura_proveedor_cabe,
                                                                        Id_producto,
                                                                        Cantidad_producto,
                                                                        Monto,
                                                                        Fecha_registro)
                                                                        VALUES (:Id_factura_proveedor_cabe,
                                                                                :Id_producto,
                                                                                :Cantidad_producto,
                                                                                :Monto,
                                                                                :Fecha_registro)');
            $query->execute(['Id_factura_proveedor_cabe' => $factura['Id_factura_proveedor_cabe'],
                            'Id_producto' => $factura['Id_producto'],
                            'Cantidad_producto' => $factura['Cantidad_producto'],
                            'Monto' => $factura['Monto'],
                            'Fecha_registro' => $factura['Fecha_registro']]);
            return $query;
        }
    }
?>