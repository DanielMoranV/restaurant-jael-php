<!DOCTYPE html>
<html lang="es">
<?php
$ruta_actual = $_SERVER['DOCUMENT_ROOT'];
echo "La ruta actual es: $ruta_actual";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./css/login.css">
    <script src="./js/login.js" defer></script>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>

<body>
    <?php
    // login.php

    session_start();

    // Verificar si hay un mensaje de sesión
    if (isset($_SESSION['mensaje'])) {
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Nombre de usuario o contraseña incorrectos"
                });
              </script>';
        unset($_SESSION['mensaje']); // Limpiar el mensaje de sesión
    }
    ?>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Iniciar Sesión</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><img src="/img/logochef.png" id="icon" alt="User Icon" class=" img-thumbnail" style="width: 100px; height: 100px;" /></span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="../controllers/AuthController.php" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control" placeholder="Username">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Password">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox" id="showPassword"> Mostrar Contraseña
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Aun no tiene una cuenta?<a href="#">Registrarse</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Olvido su contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>