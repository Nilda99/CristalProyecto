<?php

    require_once("Conexion.php");
    require_once("Cliente.php");
    
    $objCliente = new Cliente();
    $listaDeClientes = $objCliente->listaDeClientes();
    //var_dump($listaDeClientes);
    //print_r($listaDeClientes);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Usuarios Dinamicos</title>
    
</head>
<body>

    <h1>Lista de Usuarios Dinamicos</h1><p>
        <label style="color:blue;">Sucursal 1 CBBA</label><p>
    <table border= 1 name="mostrarUsuariosDinamicos" id="mostrarUsuariosDinamicos">
        <!--Esta parte queda estatico-->
        <tr>
            <td>Id Cliente</td>
            <td>Id Sucursal</td>
            <td>Ci</td>
            <td>Nit</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
            <td>Primer Nombre</td>
            <td>Segundo Nombre</td>
            <td>Editar</td>
            <td>Actualizar</td>
            <td>Eliminar</td>
        </tr>
        <!--Esta parte es donde se va generando cada fila-->

        <?php 
            foreach($listaDeClientes as $regitroCliente){
        ?>
        <tr>
            <td><?php echo $regitroCliente['idCliente'];?></td>
            <td><?php echo $regitroCliente['idSucursal'];?></td>
            <td><?php echo $regitroCliente['ci'];?></td>
            <td><?php echo $regitroCliente['nit']; ?></td>
            <td><?php echo $regitroCliente['apellidoPaterno']; ?></td>
            <td><?php echo $regitroCliente['apellidoMaterno']; ?></td>
            <td><?php echo $regitroCliente['primerNombre']; ?></td>
            <td><?php echo $regitroCliente['segundoNombre']; ?></td>

            <td><a href="">Editar</a></td>
            <td><a href="">Actualizar</a></td>
            <td><a href="">Eliminar</a></td>
        </tr>
        
        <?php 
            }
        ?>
        <!--Y asi las filas pueden ir creciendo-->
    </table>

</body>
</html>
