<?php
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Cliente.php");

    $objetoCliente = new Cliente();
      
    // print_r($_REQUEST);
    // // echo "Nombre: ".$_REQUEST['ci'];
    // $objetoCliente->setCi($_REQUEST['ci']);
    // $objetoCliente->setNit($_REQUEST['nit']);  
    // $objetoCliente->setPrimerNombre($_REQUEST['primerNombre']);
    // $objetoCliente->setSegundoNombre($_REQUEST['segundoNombre']);
    // $objetoCliente->setApellidoPaterno($_REQUEST['apellidoPaterno']);
    // $objetoCliente->setApellidoMaterno($_REQUEST['apellidoMaterno']);
       // es lo que esvalidado si es un si o un no
    // if( $objetoBDManejadorCliente->validarCiCliente($_REQUEST['ci'])){
    //    echo '<script language="javascript">alert("ya existe registro el Cliente");</script>'; 
    // }
    // else{
        $idSucursal = 1; // cambiar valor de la sucrsal por el que quiera
        //$idRol =  
        $exitoRegistroDeCliente = $objetoCliente->registrarCliente($idSucursal,$_REQUEST['ci'],
                                                            $_REQUEST['nit'],
                                                            $_REQUEST['primerNombre'],
                                                            $_REQUEST['segundoNombre'],
                                                            $_REQUEST['apellidoPaterno'],
                                                            $_REQUEST['apellidoMaterno']);
    // $exitoRegistroDeCliente = $objetoBDManejadorCliente->registrarCliente($objetoCliente);

    if($exitoRegistroDeCliente){
        //echo "Se registro el Articulo";
        echo '<script language="javascript">alert("Se registro el Cliente");</script>'; 
    }else{
        //echo "Error al registrar el Articulo";
        echo '<script language="javascript">alert("Error al registrar la Cliente");</script>';
    }
    // }
  
    $listaDeClientes = $objetoCliente->listaDeClientes();
//  print_r($listaDeClientes);
    /*
    if(COUNT($listaDeAticulos)>0){
        echo "Hay datos";
    }else{
        echo "No hay datos";
    }
    */
    echo "<script>location.href='../Vista/IURegistrarCliente.php';</script>";
    // require_once("../Vista/IURegistrarCliente.php");

?>


