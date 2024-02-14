<?php

require("../Negocio/usuarioReglasNegocio.php");

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioBL = new UsuarioReglasNegocio();
    $perfil = $usuarioBL->verificar($_POST['usuario'], $_POST['clave']);

    if ($perfil === "premium" || $perfil === "jugador") {
        session_start(); //inicia o reinicia una sesión
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['perfil'] = $perfil;
        header("Location: inicio.php");
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>


    <div class="container-fluid vh-100 logMain">
        <div class="row h-100">
            <div class="welcomeTitle text-center">
                <div class="row h-100">
                    <h1 class="animTitle">Bienvenido</h1>
                </div>
            </div>
            <div class="box mx-auto my-auto">
                <div class="row h-100">
                    <div class="text-center my-auto">
                        <div class="login">
                            <div class="logTitle mb-4">
                                <h2>Login</h2>
                            </div>
                            <div class="logForm">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="row mb-3">
                                        <div class="col"></div>
                                        <div class="col-8">
                                            <div class="form-floating">
                                                <input id="usuario" name="usuario" type="text" class="form-control"
                                                    placeholder="Usuario">
                                                <label for="usuario"> Usuario: </label>
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col"></div>
                                        <div class="col-8">
                                            <div class="form-floating">
                                                <input id="clave" name="clave" type="password" class="form-control"
                                                    placeholder="Contraseña">
                                                <label for="usuario"> Contraseña: </label>
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <?php
                                    if (isset($error)) {
                                        print("<div> No tienes acceso </div>");
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" class="btn btn-success" value="Iniciar sesión">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>