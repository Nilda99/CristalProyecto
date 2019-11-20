<?php

    require_once("Conexion.php");
    require_once("Cliente.php");
    
    $objCliente = new Cliente();
    $listaDeClientes = $objCliente->listaDeClientes();
    //var_dump($listaDeClientes);
    //print_r($listaDeClientes);
?>