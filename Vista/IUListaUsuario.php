<?php

include('header-admin.php');
include('container.php');
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Usuario.php");
$objUsuario = new Usuario();
$listaDeUsuario = $objUsuario->listaDeUsuario($_GET['idSucursal']);
//var_dump($_GET);
//print_r($listaDeClientes);
?>
    <div class="container-fluid pt-5">
        <div class="card border-info ">
            <div class="card-header">
                <p class="text-info text-center h1">Lista de Usuario Dinamicos</p>
            </div>
            <!-- <h1>Lista de cliente Dinamicos</h1> -->
            <p>
                <label style="color:blue;">Sucursal 1 CBBA</label>
            <p>

            <table name="mostrarUsuariosDinamicos" id="mostrarUsuariosDinamicos" class="table table-hover">
                <!--Esta parte queda estatico-->
                <thead>
                <tr>
                    <!--        <td>Id Usuario</td>-->
                    <!--        <td>Id Sucursal</td>-->
                    <!--        <td>Id Rol</td>-->
                    <!--        <td>Ci</td>-->
                    <!--        <td>Primer Nombre</td>-->
                    <!--        <td>Segundo Nombre</td>-->
                    <!--        <td>Apellido Paterno</td>-->
                    <td>Nombre Completo</td>
                    <td>Ci</td>
                    <td>Genero</td>
                    <td>Rol</td>
                    <!--        <td>Dirección</td>-->
                    <!--        <td>Fecha Nacimiento</td>-->
                    <!--        <td>Telefono Fijo</td>-->
                    <!--        <td>Celular</td>-->
                    <td>Usuario</td>
                    <!--        <td>Contrasenia</td>-->
                    <td>Estado</td>
                    <!--        <td>Fecha Creacion</td>-->
                    <!--        <td>Fecha Actualizacion</td>-->
                    <td>Mas info</td>
                    <td>Actualizar</td>
                    <td>Eliminar</td>
                </tr>
                </thead>
                <!--Esta parte es donde se va generando cada fila-->
                <tbody>
                <?php
//                if (!empty($listaDeUsuario)){
                foreach ($listaDeUsuario as $regitroUsuario) {
                    ?>
                    <tr>

                        <td><?php echo $regitroUsuario['NombreCompleto']; ?></td>
                        <td><?php echo $regitroUsuario['ci']; ?></td>
                        <td><?php echo $regitroUsuario['genero']; ?></td>
                        <td><?php echo $regitroUsuario['usuario']; ?></td>
                        <td><?php echo $regitroUsuario['usuario']; ?></td>
                        <td><?php if ($regitroUsuario['activo']) { ?>
                                si
                            <?php } else { ?>
                                No <?php
                            } ?>
                        </td>
                        <td><a href="" class="btn btn-outline-warning">Mas inf</a></td>
                        <td><a class="btn btn-outline-primary" href="">Actualizar</a></td>
                        <td><a href="" class="btn btn-outline-danger">Eliminar</a></td>

                    </tr>

                    <?php
                }
//                 }
//                else {
//                    echo `<h1>No tiene usuararios registrados</h1>`;
//                }
                ?>
                </tbody>
            
            </table>
        </div>
    </div>
<?php
include('footer.php');