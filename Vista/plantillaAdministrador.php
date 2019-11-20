<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./Estilos/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php
echo "<p> administrador de  sucursal: </p>";
echo " <p>Administrador que se encarga de gestionar: <br>
    productos,categoria,usuario,rol,reportes. </p>";

$datosUsuario = unserialize($_GET["datosUsuario"]);
echo "Hola Usuario: " . $datosUsuario[3] . "idSucursal:" . $datosUsuario[2] . "idUsuario:" . $datosUsuario[0];
$idSucursal = $datosUsuario[2];
$idUsuario = $datosUsuario[0];
$idRol = $datosUsuario[1];
echo "<br>";
//print_r($datosUsuario);
echo $idSucursal;
?>

<a href="./IUListaUsuario.php?idSucursal=<?php echo $idSucursal?>">Lista Usuario</a>>
<a class="btn btn-info" href="./IURegistrarUsuario.php?idSucursal=<?php echo $idSucursal ?>">Registrar Usuario</a>

<script src="Estilos/js/jquery-3.4.1.min.js"></script>
<script src="Estilos/js/bootstrap.min.js"></script>
<script src="Estilos/js/popper.min.js"></script>
</body>
</html>


