<?php
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Rol.php");
require_once ("../Modelo/Usuario.php");

    $objetoRol = new Rol();
    $listaRol= $objetoRol->listaRoles();
    $idSucursal=$_REQUEST['idSucursal'];

$objetoUsuario= new Usuario();
     //request enpaquetar  y recibir

//      print_r($_REQUEST);
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
//         $idSucursal = 1; // cambiar valor de la sucrsal por el que quiera
         //$idRol =
         $exitoRegistroDeUsuario = $objetoUsuario->registrarUsuario($_REQUEST['idSucursal'],
                                                             $_REQUEST['idRol'],
                                                           ucwords($_REQUEST['ci']),
                                                           ucwords($_REQUEST['primerNombre']),
                                                           ucwords($_REQUEST['segundoNombre']),
                                                           ucwords($_REQUEST['apellidoPaterno']),
                                                           ucwords($_REQUEST['apellidoMaterno']),
                                                             $_REQUEST['genero'],
                                                             $_REQUEST['direccion'],
                                                             $_REQUEST['fechaNacimiento'],
                                                             $_REQUEST['telefonoFijo'],
                                                             $_REQUEST['celular'],
                                                             $_REQUEST['usuario'],
                                                             $_REQUEST['contrasenia'],
                                                             $_REQUEST['activo']
                                                             );
         // $exitoRegistroDeUsuario = $objetoUsuario->registrarUsuario(1,
         // 2,
         // $_REQUEST['ci'],
         // $_REQUEST['primerNombre'],
         // $_REQUEST['segundoNombre'],
         // $_REQUEST['apellidoPaterno'],
         // $_REQUEST['apellidoMaterno'],
         // $_REQUEST['genero'],
         // $_REQUEST['direccion'],
         // $_REQUEST['fechaNacimiento'],
         // $_REQUEST['telefonoFijo'],
         // $_REQUEST['celular'],
         // $_REQUEST['usuario'],
         // $_REQUEST['contrasenia'],
         // 1,
         // $_REQUEST['fechaCreacion'],
         // $_REQUEST['fechaActualizacion']);

     // $exitoRegistroDeCliente = $objetoBDManejadorCliente->registrarCliente($objetoCliente);

     if($exitoRegistroDeUsuario){
         //echo "Se registro el Articulo";
       echo '<script language="javascript">alert("Se registro el Usuario");</script>';
     }else{
         //echo "Error al registrar el Articulo";
         echo '<script language="javascript">alert("Error al registrar el usuario");</script>';
     }
     // }

     $listaDeUsuario = $objetoUsuario->listaDeUsuario($idSucursal);
 //  print_r($listaDeClientes);
     /*
     if(COUNT($listaDeAticulos)>0){
         echo "Hay datos";
     }else{
         echo "No hay datos";
     }
     */
    echo "<script>location.href='../Vista/IUListaUsuario.php?idSucursal=".$idSucursal."';</script>";
//      require_once("../Vista/IURegistrarCliente.php");

// ?>


