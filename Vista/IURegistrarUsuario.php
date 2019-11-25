<?php
include('header-admin.php');
include('container.php');
require_once("../Modelo/Conexion.php");
require_once("../Modelo/Rol.php");
$connect = new Conexion();
$objetoRol = new Rol();
$listaRol = $objetoRol->listaRoles();
$idSucursal = $_REQUEST['idSucursal'];
//     print_r($listaRol);
//
// foreach ($listaRol as $rol):
//echo $rol['idRol'];
// echo $rol['nombre'];
// endforeach;
?>
    <div class="container pt-5">

        <div class="card border-info ">
            <div class="card-header">
                <p class="text-info text-center h1">Registrar Usuario</p>
                <p class="text-info text-primary h5">* llenar los campos requeridos *</p>
            </div>
            <div class="card-body text-info">
                <form action="../Controlador/LNRegistrarUsuario.php" method="post" enctype="multipart/form-data">
                    <!-- colocar los campos requeridos -->
                    <input type="hidden" name='idSucursal' value='<?php echo $idSucursal; ?>'>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Rol</label>
                            <select id="inputState" class="form-control" name="idRol" required>
                                <option selected>selecione</option>
                                <?php foreach ($listaRol as $rol): ?>
                                    <option value="<?php echo $rol['idRol']; ?>"><?php echo $rol['nombre']; ?></option>
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
                                   placeholder="primer Nombre" minlength="3" maxlength="40" required
                                   pattern="[A-Za-z]+">
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputSegundoNombre">Ingresar segundo nombre </label>
                            <input type="text" class="form-control" id="inputSegundoNombre" name="segundoNombre"
                                   placeholder="segundo Nombre" minlength="3" maxlength="40" pattern="[A-Za-z]+">
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputApellidoPterno">Ingresar apellido Paterno</label>
                            <input type="text" class="form-control" id="inputApellidoPaterno" name="apellidoPaterno"
                                   placeholder="apellido Paterno" minlength="3" maxlength="40" required
                                   pattern="[A-Za-z]+">
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label for="inputApellidoMaterno">Ingresar apellido Materno </label>
                            <input type="text" class="form-control" id="inputApellidoMaterno" name="apellidoMaterno"
                                   placeholder="apellido Materno" minlength="3" maxlength="40" pattern="[A-Za-z]+">
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

                        <input type="file" name="foto" max="60"/>

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
                                       placeholder="Usuario" minlength="5" maxlength="40" required pattern="[A-Za-z]+">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="inputcontrasenia">Ingresar Contrasenia </label>
                                <input type="contrasenia" class="form-control" id="inputcontrasenia" name="contrasenia"
                                       placeholder="Contraceña" minlength="5" maxlength="40" required
                                       pattern="[A-Za-z0-9]+">
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
                            <!-- Button trigger modal -->
<div class="col-xs-2">
                            <button type="button" class="btn btn-secondary" data-toggle="modal"
                                    data-target="#exampleModal">
                                Persona referencia
                            </button>
</div>


                            <!-- Modal -->
                            <div class="modal" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Datos de Persona
                                                referencia</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <input type="hidden" name="idUsuario"
                                                   value='<?php echo $_REQUEST['idUsuario'] ?>'>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 col-sm-6">
                                                    <label for="inputCi">Carnet de Identidad </label>
                                                    <input type="text" class="form-control" id="inputCi"
                                                           name="ciPersonaReferencia" placeholder="CI" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <label for="inputPrimerNombre">Ingresar primer nombre</label>
                                                    <input type="text" class="form-control" id="inputPrimerNombre"
                                                           name="primerNombreRef"
                                                           placeholder="primer Nombre" minlength="3" maxlength="40"
                                                           required pattern="[A-Za-z]+">
                                                </div>
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <label for="inputSegundoNombre">Ingresar segundo nombre </label>
                                                    <input type="text" class="form-control" id="inputSegundoNombre"
                                                           name="segundoNombreRef"
                                                           placeholder="segundo Nombre" minlength="3" maxlength="40"
                                                           pattern="[A-Za-z]+">
                                                </div>
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <label for="inputApellidoPterno">Ingresar apellido Paterno</label>
                                                    <input type="text" class="form-control" id="inputApellidoPaterno"
                                                           name="apellidoPaternoRef"
                                                           placeholder="apellido Paterno" minlength="3" maxlength="40"
                                                           required
                                                           pattern="[A-Za-z]+">
                                                </div>
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <label for="inputApellidoMaterno">Ingresar apellido Materno </label>
                                                    <input type="text" class="form-control" id="inputApellidoMaterno"
                                                           name="apellidoMaternoRef"
                                                           placeholder="apellido Materno" minlength="3" maxlength="40"
                                                           pattern="[A-Za-z]+">
                                                </div>
                                            </div>
                                            <!-- <div class="form-row"> -->
                                            <div class="form-group col-md-12 col-sm-6">
                                                <label for="inputTelefono">Ingresar nº Telefono</label>
                                                <input type="number" class="form-control" id="inputTelefono"
                                                       name="telefonoRef"
                                                       placeholder="Nº Telefono" required>
                                            </div>
                                            <input type="file" name="imagenCiAmverso" max="60"/>
                                            <input type="file" name="imagenCiReverso" max="60"/>

                                        </div>
                                    </div>

                                </div>
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

                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" value="enviar">Emviar
                            </button>
                            <!-- <button type="submit" class="btn btn-success">Emviar</button> -->

                </form>
            </div>
        </div>
    </div>

<?php
include('footer.php');