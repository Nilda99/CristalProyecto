<?php
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Rol.php");
require_once("../Modelo/Usuario.php");
require_once("../Modelo/Usuario.php");
require_once("../Modelo/PersonaReferencia.php");

    $objetoRol = new Rol();
    $listaRol= $objetoRol->listaRoles();
    $idSucursal=$_REQUEST['idSucursal'];

$objetoUsuario= new Usuario();

// a qui subimos la imgen
echo '<pre>';
//var_dump($_FILES);
//$destino='../img/';

$target_path = "../assets/img/";
$target_path = $target_path . basename( $_FILES['foto']['name']);
//echo $target_path.'<br>' ;
//move_uploaded_file($_FILES['imagenCiAmverso']['tmp_name'],$target_path);

if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
    echo "El archivo ".  basename( $_FILES['foto']['name']).
        " ha sido subido";
    echo "<img src='../assets/img/".basename( $_FILES['foto']['name'])."'/>";
print_r($_REQUEST);

    $idUsuario = $objetoUsuario->registrarUsuario($_REQUEST['idSucursal'],
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
        $_REQUEST['activo'],
        $_FILES['foto']['name']

    );

} else{
    echo "Ha ocurrido un error, trate de nuevo!";
}

//$var=$_FILES['foto']['name'];
//echo $var;


// a qui subimos la imgen
echo '<pre>';
//var_dump($_FILES);
//$destino='../img/';

$target_path = "../assets/img/";
$target_path1 = "../assets/img/";
$target_path = $target_path . basename( $_FILES['imagenCiAmverso']['name']);

$target_path1 = $target_path1 . basename( $_FILES['imagenCiReverso']['name']);
//echo $target_path.'<br>' ;
if(move_uploaded_file($_FILES['imagenCiAmverso']['tmp_name'], $target_path)&& move_uploaded_file ($_FILES['imagenCiReverso']['tmp_name'],$target_path1)){
//    echo "El archivo ".  basename( $_FILES['imagenCiAmverso']['name']&&$_FILES['imagenCiReverso']['name']).
//        " ha sido subido";
//    echo "<img src='../assets/img/".basename( $_FILES['imagenCiAmverso']['name']&&$_FILES['imagenCiReverso']['name'])."'/>";


    $objetoPersonaReferencia=new PersonaReferencia();

//    print_r($_REQUEST);
    $exitoRegistro=$objetoPersonaReferencia->registrarPersonaReferencia(
        $idUsuario,// aqui viene el ultimo id registrado del usuario
        $_REQUEST['ciPersonaReferencia'],
        $_REQUEST['primerNombreRef'],
        $_REQUEST['segundoNombreRef'],
        $_REQUEST['apellidoPaternoRef'],
        $_REQUEST['apellidoMaternoRef'],
        $_REQUEST['telefonoRef'],
        $_FILES['imagenCiAmverso']['name'],
        $_FILES['imagenCiReverso']['name']);


} else{
    echo "Ha ocurrido un error, trate de nuevo!";
}

     if($exitoRegistro){
         //echo "Se registro el Articulo";
       echo '<script language="javascript">alert("Se registro el Usuario");</script>';
     }else{
         //echo "Error al registrar el Articulo";
         echo '<script language="javascript">alert("Error al registrar el usuario");</script>';
     }
     // }

     $listaDeUsuario = $objetoUsuario->listaDeUsuario($idSucursal);

    echo "<script>location.href='../Vista/IUListaUsuario.php?idSucursal=".$idSucursal."';</script>";
//      require_once("../Vista/IURegistrarCliente.php");

?>


