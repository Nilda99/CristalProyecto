<?php
include 'header-admin.php';
include 'container.php';
?>
    <div class="container-fluid">
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
        <h1>Bienvenido Admin</h1>
    </div>
<?php
include 'footer.php';


