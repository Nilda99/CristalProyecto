<?php

require_once("../Modelo/Conexion.php");
require_once("../Modelo/Usuario.php");

$objetoUsuario = new Usuario();

//print_r($existeDatosUsuario);
$existeDatosUsuario = $objetoUsuario->verificarUsuarioContrasenia($_REQUEST['usuario'], $_REQUEST['contrasenia']);
print_r($existeDatosUsuario);

if ($existeDatosUsuario == 0) {
    echo "Usuario no encontrado verifique nuevamente";
} else {
    if ($existeDatosUsuario['activo']) {
        if ($existeDatosUsuario['idRol'] == 1) {
            //echo usuario mesero
//            heade("Location: plantilaMesero.php");
            die();

        } elseif ($existeDatosUsuario['idRol'] == 2) {
            echo "usuario cajero";

        } elseif ($existeDatosUsuario['idRol'] == 3) {
            session_start();
            $_SESSION['idSucursal'] =$existeDatosUsuario[0] ;
            header("Location: ../Vista/dashboard-admin.php?datosUsuario=" . serialize($existeDatosUsuario));
            die();

        } elseif ($existeDatosUsuario['idRol'] == 4) {
            echo "Usuario Auditor";
        } else {
            echo "Usuario invalido";
        }
    }
}
// else{
//     echo "El usuario esta en tu lista";
// }
?>