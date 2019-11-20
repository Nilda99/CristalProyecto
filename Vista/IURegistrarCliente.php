<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container pt-5">

        <div class="card border-info ">
            <div class="card-header">
                <p class="text-info text-center h1">Registrar Cliente</p>
            </div>
            <div class="card-body text-info">
                <form action="
                " method="post">
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputCi">Ingresar el ci</label>
                            <input type="text" class="form-control" id="inputCi" name="ci" placeholder="ci">
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputNit">Ingresar nit </label>
                            <input type="text" class="form-control" id="inputNit" name="nit" placeholder="nit">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputPrimerNombre">Ingresar primer nombre</label>
                            <input type="text" class="form-control" id="inputPrimerNombre" name="primerNombre"
                                placeholder="primer Nombre">
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputSegundoNombre">Ingresar segundo nombre </label>
                            <input type="text" class="form-control" id="inputSegundoNombre" name="segundoNombre"
                                placeholder="segundo Nombre">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputApellidoPterno">Ingresar apellido Paterno</label>
                            <input type="text" class="form-control" id="inputApellidoPaterno" name="apellidoPaterno"
                                placeholder="apellido Paterno">
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputApellidoMaterno">Ingresar apellido Materno </label>
                            <input type="text" class="form-control" id="inputApellidoMaterno" name="apellidoMaterno"
                                placeholder="apellido Materno">
                        </div>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary btn-lg btn-block">Emviar</button> -->
                    <button type="submit" class="btn btn-primary btn-lg">Emviar</button>
                    <!-- <button type="submit" class="btn btn-success">Emviar</button> -->
                </form>
            </div>
        </div>

        <?php


require_once("../Modelo/Conexion.php");
require_once("../Modelo/Cliente.php");

$objCliente = new Cliente();
$listaDeClientes = $objCliente->listaDeClientes();
//var_dump($listaDeClientes);
//print_r($listaDeClientes);
?>
<br>
         <div class="card border-info ">
            <div class="card-header">
                <p class="text-info text-center h1">Lista de cliente Dinamicos</p>
            </div>
        <!-- <h1>Lista de cliente Dinamicos</h1> -->
        <p>
            <label style="color:blue;">Sucursal 1 CBBA</label>
            <p>
                <table name="mostrarUsuariosDinamicos" id="mostrarUsuariosDinamicos" class="table table-hover">
                    <!--Esta parte queda estatico-->
                    <thead>
                        <tr>
                            <td>Id Cliente</td>
                            <td>Id Sucursal</td>
                            <td>Ci</td>
                            <td>Nit</td>
                            <td>Nombre Completo</td>
                            
                            <td>Editar</td>
                            <td>Actualizar</td>
                            <td>Eliminar</td>
                        </tr>
                    </thead>
                    <!--Esta parte es donde se va generando cada fila-->
                    <tbody>
                        <?php 
            foreach($listaDeClientes as $regitroCliente):
        ?>
                        <tr>
                            <td><?php echo $regitroCliente['idCliente']; ?></td>
                            <td><?php echo $regitroCliente['idSucursal']; ?></td>
                            <td><?php echo $regitroCliente['ci']; ?></td>
                            <td><?php echo $regitroCliente['nit']; ?></td>
                            <td><?php echo $regitroCliente['apellidoPaterno'] ." ".$regitroCliente['apellidoMaterno']." ".$regitroCliente['primerNombre']." ".$regitroCliente['segundoNombre']; ?></td>
                           

                            <td><a href="">Editar</a></td>
                            <td><a href="">Actualizar</a></td>
                            <td><a href="">Eliminar</a></td>
                        </tr>


                        <?php 
            endforeach
        ?>
                    </tbody>
                    <!--Y asi las filas pueden ir creciendo-->
                </table>
                </div>
    </div>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>

</body>

</html>