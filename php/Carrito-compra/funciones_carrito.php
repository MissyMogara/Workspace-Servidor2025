<?php

namespace funciones_calcular;
// Función para calcular el subtotal de una línea de pedido
function subtotal($linea_pedido){
                    
    if($linea_pedido["iva"] == 1){
        return $linea_pedido["precio"] * $linea_pedido["cantidad"] * 1.21;
    } else if($linea_pedido["iva"] == 0){
        return $linea_pedido["precio"] * $linea_pedido["cantidad"] * 1.1;
    } else {
        return $linea_pedido["precio"] * $linea_pedido["cantidad"];
    }

};

?>