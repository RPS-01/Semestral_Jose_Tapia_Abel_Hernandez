<?php
function encabezado()
{  ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Consultorio ABC</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>

        <!-- Header-->
        <header class="header">
            <div class="maincontainer ">
                <!-- logo and title -->
                <div class="logotitle">
                    <div class="col-md-12 logotitle">
                        <img src="img/logo.png" alt="logo" class="logo">
                        <h1 class="title">Consultorio ABC</h1>
                        <?php 
                        if(!empty($_SESSION['usuario'])){
                            echo'<h2 class="user">Bienvenido '.$_SESSION['usuario'].'</br><a href="logout.php">Cerrar sesion</a></h2>';
                        }
                        ?>
                    </div>
                </div>
                <nav class="navbar navcontent navbar-expand-lg ">
                    <div class="collapse justify-content-center  navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="imc.php">IMC</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="glucosa.php">Glucosa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="presion.php">Presion</a>
                            </li>
                        </ul>
                </nav>
        </header>
    <?php } ?>

    <?php
    function homepage()
    {  ?>
        <div class="container-fluid mainheader">
            <div class="row">
                <div class="col-7">
                    <div class="header-text">
                        <h1 class="title">Servicios</h1>
                        <p> Para realizar sus pruebas de Indice de masa corporal, Glucosa en Sangre y presion Arterial primero debe iniciar sesion</p>
                        <p class="subtitle">Ingrese a su cuenta o registrese</p>
                        <?php 
                        if(!empty($_SESSION['usuario'])){?>
                            <a href="opciones.php" class="btn submitbutton btn-primary btn-sm">Nuestros servicios</a>
                        <?php } 
                        else{?>
                            <a href="login.php" class="btn submitbutton btn-primary btn-sm">Iniciar Sesion</a>
                        <br><br>
                            <a href="register.php" class="btn submitbutton btn-primary btn-sm">Registrarme</a>
                        <?php } ?>
                    </div>
                    <!-- Button -->

                </div>
                <div class="col-5">
                    <img class="mainimg" src="img/logo.png" alt="">
                </div>
            </div>
        </div>
    </body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Beau+Rivage&display=swap');
    </style>
<?php } ?>


<?php function formu()
{ ?>
    <section>

        <div class="container form-style-5">
            <div class="row  ">
                <div class="col-md-12 divform ">
                    <h1 class="title">Rellena los datos para descrubir mas de signo zodiacal</h1>
                    <form action="Signo.php" method="POST">
                        <div class="form-group">
                            <label for="nombre">Tu Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Tu Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                        </div>
                        <div class="form-group">
                            <label for="fecha">Tu Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>

                        <button type="submit button" class="btn sumbitbutton btn-primary btn-lg">Enviar</button>
                </div>

            </div>
        </div>
    </section>
<?php } ?>

<?php function login()
{ ?>

    <?php
    if (isset($_POST['enviar'])) {
        if (empty($_POST['usuario']) || empty($_POST['password'])) { ?>
            <p class="error">Contraseña o usuario incorrectos</p>
    <?php
        } elseif ($_POST['usuario'] == "usuario" && $_POST['password'] == "pass1234") {
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['password'] = $_POST['password'];
            header("location: opciones.php");
        }
    }
    ?>

    <div class="container form-style-5">
        <div class="row ">
            <div class="col-md-12 divform ">
                <h1 class="title">Ingrese sus datos</h1>
                <form action="login.php" method="post" name="login">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="enviar" value="Enviar" />
                    </div>    
                </form>
            </div>
        </div>
    </div>

<?php } ?>


<?php function register()
{ ?>

    <div class="container form-style-5">
        <div class="row ">
            <div class="col-md-12 divform ">
                <h1 class="title">Registre sus datos</h1>
                <form action="login.php" method="post" name="login">
                    <div class="form-group">
                        <label for="usuario">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de Usuario">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Cedula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="cedula">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="enviar" value="Enviar" />
                    </div>    
                </form>
            </div>
        </div>
    </div>

<?php } ?>



<?php function opciones()
{ ?>
    <div class="container form-style-5">
        <div class="row ">
            <div class="col-md-12 divform ">
                <h2 style="text-align: center;">Bienvenido Usuario</h2>
                <h1 class="title">Escoga una opcion</h1>
                <ul class="navbar-nav ">
                    <li class="opcion">
                        <a class="navlink" href="imc.php">IMC</a>
                    </li>
                    <li class="opcion">
                        <a class="navlink" href="glucosa.php">Glucosa</a>
                    </li>
                    <li class="opcion">
                        <a class="navlink" href="presion.php">Presion</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


<?php } ?>

<?php function glucosa()
    { ?>
        <div class="container form-style-5">
            <div class="row ">
                <div class="col-md-12 divform ">
                    <h1 class="title">Glucosa</h1>
                    <form action="glucosaResultados.php" method="POST">
                        <div class="form-group">
                            <label for="glucosa">Glucosa</label>
                            <input type="number" class="form-control" id="glucosa" name="glucosa" placeholder="Glucosa">
                            <p>Seleccione cuando se realizo la prueba:</p>
                              <label for="no">Dos horas despues de comer</label><br>
                              <input type="radio" id="no" name="ayuna" value="no">
                              <label for="si">Sin consumir alimento</label><br>
                              <input type="radio" id="si" name="ayuna" value="si">

                        </div>
                        <button type="submit button" class="btn sumbitbutton btn-primary btn-lg">Enviar</button>
                </div>
            </div>
        </div>
<?php } ?>

<?php function presion()
    { ?>
        <div class="container form-style-5">
            <div class="row ">
                <div class="col-md-12 divform ">
                    <h1 class="title">IMC</h1>
                    <form action="presionResultados.php" method="POST">
                        <div class="form-group">
                            <label for="presion">Ingrese su presión sistólica</label>
                            <input type="number" class="form-control" id="presion" name="sistolica" placeholder="Presion">
                        </div>
                        <div class="form-group">
                            <label for="presion">Ingrese su presión diastólica</label>
                            <input type="number" class="form-control" id="presion" name="diastolica" placeholder="Presion">
                        </div>
                        <button type="submit button" class="btn sumbitbutton btn-primary btn-lg">Enviar</button>
                </div>
            </div>
        </div>
<?php } ?>

<?php function imc()
        { ?>
            <div class="container form-style-5">
                <div class="row ">
                    <div class="col-md-12 divform ">
                        <h1 class="title">IMC</h1>
                        <form action="imcResultados.php" method="POST">
                            <div class="form-group">
                                <label for="peso">Ingrese su Peso en KG</label>
                                <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso">
                            </div>
                            <div class="form-group">
                                <label for="altura">Ingrese su Altura en Metros</label>
                                <input type="text" class="form-control" id="altura" name="altura" placeholder="Altura">
                            </div>
                            <button type="submit button" class="btn sumbitbutton btn-primary btn-lg">Enviar</button>
                    </div>
                </div>
            </div>
<?php } ?>

<?php function ResultadosGlucosa($glucosa, $resultado)
            { ?>
                <div class="container form-style-5">
                    <div class="row ">
                        <div class="col-md-12 divform ">
                            <h1 class="title">Resultados</h1>
                            <p>La glucosa es: <?php echo $glucosa ?></p>
                            <p>El resultado es: <?php echo $resultado ?></p>
                        </div>
                    </div>
                </div>
<?php } ?>

<?php function ResultadosIMC($peso, $altura, $resultado, $imc)
            { ?>
                <div class="container form-style-5">
                    <div class="row ">
                        <div class="col-md-12 divform ">
                            <h1 class="title">Resultados</h1>
                            <p>El peso es: <?php echo $peso ?></p>
                            <p>La altura es: <?php echo $altura ?></p>
                            <p>Según su indice de masa corporal de: <?php echo $imc ?> ,su resultado es: <?php echo $resultado ?></p>
                        </div>
                    </div>
                </div>
<?php } ?>

<?php function ResultadosPresion($sistolica, $diastolica, $resultado)
            { ?>
                <div class="container form-style-5">
                    <div class="row ">
                        <div class="col-md-12 divform ">
                            <h1 class="title">Resultados</h1>
                            <p>La presion sistolica es: <?php echo $sistolica ?></p>
                            <p>La presion diastolica es: <?php echo $diastolica ?></p>
                            <p>El resultado es: <?php echo $resultado ?></p>
                        </div>
                    </div>
                </div>
<?php } ?>

<?php function pie()
            { ?>
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p> 2022 - Elaborado por Jose Tapia y Abel Hernandez</a></p>
                            </div>
                        </div>
                    </div>
                </footer>
                </body>

    </html>
<?php } ?>

<?php function pie_glucosa()
{ ?>
    <?php
    if (isset($_COOKIE['contador_glucosa'])) {
        setcookie('contador_glucosa', $_COOKIE['contador_glucosa'] + 1);
        $mensaje = 'Numero de visitas sobre glucosa: ' . $_COOKIE['contador_glucosa'];
    } else {
        setcookie('contador_glucosa', 1);
        $mensaje = 'Bienvenido a sus pruebas de glucosa';
    }
    ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p> 2022 - Elaborado por Jose Tapia y Abel Hernandez</a></p>
                    <p> <?php echo $mensaje ?> </p>
                </div>
            </div>
        </div>
    </footer>
    </body>

    </html>
<?php } ?>

<?php function pie_imc()
{ ?>
    <?php
    if (isset($_COOKIE['contador_imc'])) {
        setcookie('contador_imc', $_COOKIE['contador_imc'] + 1);
        $mensaje = 'Numero de visitas sobre Peso Corporal: ' . $_COOKIE['contador_imc'];
    } else {
        setcookie('contador_imc', 1);
        $mensaje = 'Bienvenido a sus pruebas de Peso Corporal';
    }
    ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p> 2022 - Elaborado por Jose Tapia y Abel Hernandez</a></p>
                    <?php echo $mensaje ?>
                </div>
            </div>
        </div>
    </footer>
    </body>

    </html>
<?php } ?>

<?php function pie_presion()
{ ?>
    <?php
    if (isset($_COOKIE['contador_presion'])) {
        setcookie('contador_presion', $_COOKIE['contador_presion'] + 1);
        $mensaje = 'Numero de visitas sobre presión: ' . $_COOKIE['contador_presion'];
    } else {
        setcookie('contador_presion', 1);
        $mensaje = 'Bienvenido a sus pruebas de presión';
    }
    ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p> 2022 - Elaborado por Jose Tapia y Abel Hernandez</a></p>
                    
                    <?php 
                    echo $mensaje;

                    ?>
                </div>
            </div>
        </div>
    </footer>
    </body>

    </html>
<?php } ?>

