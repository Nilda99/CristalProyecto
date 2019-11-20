<?php
    require_once("Conexion.php");
    require_once("usuario.php");
    
    $objCliente = new Usuario();
    $listaDeUsuario = $objUsuario->listaDeUsuario();
    //var_dump($listaDeClientes);
    // print_r($listaDeUsuario);
?>