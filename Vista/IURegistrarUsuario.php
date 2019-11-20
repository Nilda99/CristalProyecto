<?php
require_once("../Modelo/Conexion.php");

require_once("../Modelo/Rol.php");
$connect = new Conexion();
    $objetoRol = new Rol();


    
    $listaRol= $objetoRol->listaRoles();
    $idSucursal=$_REQUEST['idSucursal'];
//     print_r($listaRol);
//
// foreach ($listaRol as $rol):
//echo $rol['idRol'];
// echo $rol['nombre'];
// endforeach;
?>
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
                <p class="text-info text-center h1">Registrar Usuario</p>
                <p class="text-info text-primary h5">* llenar los campos requeridos *</p>
            </div>
            <div class="card-body text-info">
                <form action="../Controlador/LNRegistrarUsuario.php" method="get">
                    <!-- colocar los campos requeridos -->
                    <input type="hidden" name='idSucursal' value='<?php echo $idSucursal;?>'>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Rol</label>
                            <select id="inputState" class="form-control" name="idRol" required>
                                <option selected>selecione</option>
                                <?php foreach ($listaRol as $rol): ?>
                                <option value="<?php echo $rol['idRol'];?>"><?php echo $rol['nombre'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="inputCi">Ingresar ci del Usuario </label>
                            <input type="text" class="form-control" id="inputCi" name="ci" placeholder="CI" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputPrimerNombre">Ingresar primer nombre</label>
                            <input type="text" class="form-control" id="inputPrimerNombre" name="primerNombre"
                                placeholder="primer Nombre"minlength="3" maxlength="40" required pattern="[A-Za-z]+">
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputSegundoNombre">Ingresar segundo nombre </label>
                            <input type="text" class="form-control" id="inputSegundoNombre" name="segundoNombre"
                                placeholder="segundo Nombre"minlength="3" maxlength="40" pattern="[A-Za-z]+">
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputApellidoPterno">Ingresar apellido Paterno</label>
                            <input type="text" class="form-control" id="inputApellidoPaterno" name="apellidoPaterno"
                                placeholder="apellido Paterno"minlength="3" maxlength="40" required pattern="[A-Za-z]+">
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputApellidoMaterno">Ingresar apellido Materno </label>
                            <input type="text" class="form-control" id="inputApellidoMaterno" name="apellidoMaterno"
                                placeholder="apellido Materno" minlength="3" maxlength="40"  pattern="[A-Za-z]+">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Genero:</label>
                        <div class="col-xs-2">
                            <label class="radio-inline">
                                <input type="radio" name="genero" value="M" checked> Masculino
                            </label>
                        </div>
                        <div class="col-xs-2">
                            <label class="radio-inline">
                                <input type="radio" name="genero" value="F"> Femenino
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Dirección:</label>
                            <div class="col-xs-9">
                                <textarea rows="3" class="form-control" placeholder="Dirección"
                                    name="direccion" required></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="inputFechaNacimiento">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="inputFechaNacimiento" name="fechaNacimiento"
                                    placeholder="Nº fecha Nacimiento" required>
                            </div>


                            <!-- <div class="form-row"> -->
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="inputTelefono">Ingresar nº Telefono</label>
                                <input type="number" class="form-control" id="inputTelefono" name="telefonoFijo"
                                    placeholder="Nº Telefono" required>
                            </div>

                            <div class="form-group col-md-4 col-sm-6">
                                <label for="inputcelular">Ingresar nº Celular </label>
                                <input type="number" class="form-control" id="inputcelular" name="celular"
                                    placeholder="Nº Celular" required>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="inputusuario">Ingresar Usuario </label>
                                <input type="text" class="form-control" id="inputusuario" name="usuario"
                                    placeholder="Usuario"minlength="5" maxlength="40" required pattern="[A-Za-z]+">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="inputcontrasenia">Ingresar Contrasenia </label>
                                <input type="contrasenia" class="form-control" id="inputcontrasenia" name="contrasenia"
                                    placeholder="Contraceña"minlength="5" maxlength="40" required pattern="[A-Za-z0-9]+">
                            </div>
                            <!-- <div class="form-group"> -->
                            <label class="control-label col-xs-3">Estado:</label>
                            <div class="col-xs-2">
                                <label class="radio-inline">
                                    <input type="radio" name="activo" value="1" checked> Activo
                                </label>
                            </div>

                            <div class="col-xs-2">
                                <br>
                                <label class="radio-inline">
                                    <input type="radio" name="activo" value="0"> Desactivado
                                </label>
                            </div>

                            <!-- <div class="form-row">
                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="inputFechaCreacion">Fecha Creacion</label>
                                    <input type="date" class="form-control" id="inputFechaCreacion" name="fechaCreacion"
                                        placeholder="fecha Creacion">
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="inputfechaActualizacion">Fecha Actualizacion</label>
                                    <input type="date" class="form-control" id="inputfechaActualizacion"
                                        name="fechaActualizacion" placeholder="fecha Actualizacion">
                                </div>
                            </div>
                        </div> -->

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Emviar</button>
                            <!-- <button type="submit" class="btn btn-success">Emviar</button> -->

                </form>
            </div>
        </div>
    </div>


<!--    --><?php
//
//
//require_once("../Modelo/Conexion.php");
//require_once("../Modelo/Usuario.php");
//
//$objUsuario = new Usuario();
//$listaDeUsuario = $objUsuario->listaDeUsuario();
////var_dump($listaDeClientes);
////print_r($listaDeClientes);
//?>
<!--    <br>-->
<!---->
<!--    <p class="text-info text-center h1">Lista de Usuario Dinamicos</p>-->
<!--    </div>-->
<!--    !-- <h1>Lista de cliente Dinamicos</h1> -->-->
<!--    <p>-->
<!--        <label style="color:blue;">Sucursal 1 CBBA</label>-->
<!--        <p>-->
<!--            <table name="mostrarUsuariosDinamicos" id="mostrarUsuariosDinamicos" class="table table-hover">-->
<!--                !--Esta parte queda estatico-->-->
<!--                <thead>-->
<!--                    <tr>-->
<!--                        <td>Id Usuario</td>-->
<!--                        <td>Id Sucursal</td>-->
<!--                        <td>Id Rol</td>-->
<!--                        <td>Ci</td>-->
<!--                        <td>Primer Nombre</td>-->
<!--                        <td>Segundo Nombre</td>-->
<!--                        <td>Apellido Paterno</td>-->
<!--                        <td>Apellido Materno</td>-->
<!--                        <td>Genero</td>-->
<!--                        <td>Dirección</td>-->
<!--                        <td>Fecha Nacimiento</td>-->
<!--                        <td>Telefono Fijo</td>-->
<!--                        <td>Celular</td>-->
<!--                        <td>Usuario</td>-->
<!--                        <td>Contrasenia</td>-->
<!--                        <td>Estado</td>-->
<!--                        <td>Fecha Creacion</td>-->
<!--                        <td>Fecha Actualizacion</td>-->
<!--                        <td>Editar</td>-->
<!--                        <td>Actualizar</td>-->
<!--                        <td>Eliminar</td>-->
<!--                    </tr>-->
<!--                </thead>-->
<!--               !--Esta parte es donde se va generando cada fila-->-->
<!--                <tbody>-->
<!--                    --><?php //
//            foreach($listaDeUsuario as $regitroUsuario):
//        ?>
<!--                    <tr>-->
<!--                        <td>--><?php //echo $regitroUsuario['idUsuario']; ?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['idSucursal']; ?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['idRol'];?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['ci']; ?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['primerNombre']; ?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['segundoNombre']; ?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['apellidoPaterno']; ?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['apellidoMaterno']; ?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['genero'];?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['direccion'];?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['FechaNacimiento'];?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['telefonoFijo'];?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['celular'];?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['usuario'];?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['contrasenia'];?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['activo'];?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['fechaCreacion'];?><!--</td>-->
<!--                        <td>--><?php //echo $regitroUsuario['fechaActualizacion'];?><!--</td>-->
<!---->
<!--                        <td><a href="">Editar</a></td>-->
<!--                        <td><a href="">Actualizar</a></td>-->
<!--                        <td><a href="">Eliminar</a></td>-->
<!--                    </tr>-->
<!---->
<!--                    --><?php //
//            endforeach
        ?>
<!--                </tbody>-->
<!--                !--Y asi las filas pueden ir creciendo-->-->
<!--            </table>-->
<!--            </div>-->
<!--            </div>-->
<!---->
<!--            <script src="../js/jquery-3.4.1.min.js"></script>-->
<!--            <script src="../js/popper.min.js"></script>-->
<!--            <script src="../js/bootstrap.js"></script>-->
<!---->
<!--</body>-->
<!---->
<!--</html>-->