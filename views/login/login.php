<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lib/font-awesome/css/all.min.css?v=9.4.4" media="all">
    <link rel="stylesheet" href="css/menu.css">
    <title>Acceder</title>
</head>
<body>
    <div class="container">
        <div class="headerLogin">
            <div class="imgLogo">
                <img src="img/logo.png" alt="" srcset="" style="width: 80px; height: 70px;">
            </div>
            <div class="backButton">
                <button class="buttonLogin">Volver</button>
            </div>
        </div>
        <div class="contanerLogin">
            <div class="infoLogin">
                 
            </div>
            <div class="formLogin">
                <div class="containerForm">
                    <form action="?redirec=validate" method="POST">
                        <h1>Iniciar sesión</h1>
                        <?php if(isset($error)): ?>
                            <div class="alert_error">
                                <i class="fa fa-exclamation-triangle"></i> <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <div class="containerInputs">
                            <p><i class="fa fa-user"></i> Usuario</p>
                            <input type="text" name="user" id="" placeholder="Nombre Usuario" class="inputForm" required>
                            <p><i class="fa fa-lock"></i> Contraseña</p>
                            <input type="password" name="pass" id="" placeholder="Contraseña" class="inputForm" required>
                            <div class="containerButton">
                                <button type="submit" class="buttonLogin">Iniciar Sesión</button>         
                            </div>
                            <div class="forgotPassword">
                                <strong><a href="">¿Ha olvidado su contraseña?</a></strong>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>