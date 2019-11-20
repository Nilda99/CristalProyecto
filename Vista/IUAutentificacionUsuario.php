<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <!-- <img src="descarga.jpg" alt="60" width="100%" height="200px"> -->

    <div class="container">
        <div class="card card-login mx-auto text-center bg-dark">
            <div class="card-header mx-auto bg-dark">
                <img src="descarga.jpg" alt="100%">
                <!-- <img src="images.jpg" alt="50%"> -->
                <p class="text-info text-center h1">Autentificacion de usuario</p>
            </div>
            <div class="card-body">
                <form action="../Controlador/LNAutentificacionUsuario.php" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="usuario" class="form-control" placeholder="🔑Usuario">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="contrasenia" class="form-control" placeholder="🔐Contraceña">
                    </div>

                    <div class="form-group">
                    <!-- <button type="button" class="btn btn-primary">Primary</button> -->
                        <input type="submit" name="btn" value="Login" 
                         class="btn btn-outline-danger float-right login_btn"/>
                    <!-- </div> -->
                    
                    </div>

                </form>
            </div>

            <script src="../js/jquery-3.4.1.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.js"></script>
</body>

</html>