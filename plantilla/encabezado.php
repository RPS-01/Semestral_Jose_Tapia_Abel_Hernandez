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
                        if (!empty($_SESSION['usuario'])) {
                            echo '<h2 class="user">Bienvenido ' . $_SESSION['usuario'] .  ' ' . $_SESSION['apellido'] . '</br><a href="logout.php">Cerrar sesion</a></h2>';
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
                            <li class="nav-item">
                                <a class="nav-link" href="resultados.php">Resultados</a>
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
                        if (!empty($_SESSION['usuario'])) { ?>
                            <a href="opciones.php" class="btn submitbutton btn-primary btn-sm">Nuestros servicios</a>
                        <?php } else { ?>
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
    require('db.php');
    if (isset($_POST['enviar'])) {
        $cedula = $_POST['cedula'];
        $password = $_POST['password'];
        // Check user is exist in the database
        $query    = "SELECT * FROM `user` WHERE cedula='$cedula'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die("error de mysql");
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            while ($row = mysqli_fetch_array($result)) {
                $_SESSION['usuario'] = $row['nombre'];
                $_SESSION['cedula'] = $row['cedula'];
                $_SESSION['apellido'] = $row['apellido'];

                header("Location: opciones.php");
            }
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    }
    ?>

    <div class="container form-style-5">
        <div class="row ">
            <div class="col-md-12 divform ">
                <h1 class="title">Ingrese sus datos</h1>
                <form action="login.php" method="post" name="login">
                    <div class="form-group">
                        <label for="cedula">Cedula</label>
                        <input type="text" class="form-control" id="usuario" name="cedula" placeholder="Cedula">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Contrase??a</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contrase??a">
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

    <?php
    require('db.php');
    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $cedula = $_POST['cedula'];
        $password = $_POST['password'];
        $query = "INSERT INTO user(nombre, apellido, telefono, password, cedula) VALUES ('$nombre','$apellido','$telefono','$password','$cedula')";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        echo ('error:' . mysqli_error($con));

        if ($result) {
            $_SESSION['usuario'] = $nombre;
            $_SESSION['cedula'] = $cedula;
            $_SESSION['apellido'] = $apellido;

            header("Location: opciones.php");

            echo "<div class='form'>
                  <h3>Usuario registrado correctamente.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a>.</p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Error.</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>Register</a> again.</p>
                  </div>";
            header("Location: register.php");
        }
    }
    ?>
    <div class="container form-style-5">
        <div class="row ">
            <div class="col-md-12 divform ">
                <h1 class="title">Registre sus datos</h1>
                <form action="" method="post" name="login">
                    <div class="form-group">
                        <label for="nombre">Nombre </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">
                    </div>
                    <div class="form-group">
                        <label for="cedula">Cedula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="cedula">
                    </div>
                    <div class="form-group">
                        <label for="password">Contrase??a</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contrase??a">
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


<?php function resultados()
{ ?>
    <div class="container form-style-5">
        <div class="row ">
            <div class="col-md-12 divform ">
                <h1 class="title">Escoga el tipo de reporte que desea</h1>
                <ul class="navbar-nav ">
                    <li class="opcion">
                        <a class="navlink" href="resultados_semanal.php">Semanal</a>
                    </li>
                    <li class="opcion">
                        <a class="navlink" href="resultados_mensual.php">Mensual</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


<?php } ?>

<?php function resultados_semanal()
{ ?>
    <?php
    require('db.php');
    $cedula = $_SESSION['cedula'];
    $user_query = "SELECT * FROM `user` WHERE cedula='$cedula'";
    $result = mysqli_query($con, $user_query) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $telefono = $row['telefono'];
    $cedula = $row['cedula'];

    $imc_query = "SELECT * FROM `imc` WHERE cedula='$cedula'";
    $result_imc = mysqli_query($con, $imc_query) or die(mysqli_error($con));
    if ($row_imc = mysqli_fetch_array($result_imc)) {
        $imc = $row_imc['imc'];
        $peso = $row_imc['peso'];
        $altura = $row_imc['altura'];
    }
    $glucosa_query = "SELECT * FROM `glucosa` WHERE cedula='$cedula'";
    $result_glucosa = mysqli_query($con, $glucosa_query) or die(mysqli_error($con));
    if ($row_glucosa = mysqli_fetch_array($result_glucosa)) {
        $glucosa = $row_glucosa['glucosa'];
        $ayuno = $row_glucosa['ayuna'];
    }
    $presion_query = "SELECT * FROM `presion` WHERE cedula='$cedula'";
    $result_presion = mysqli_query($con, $presion_query) or die(mysqli_error($con));
    if ($row_presion = mysqli_fetch_array($result_presion)) {
        $presion = $row_presion['presion'];
        $sistolica = $row_presion['sistolica'];
        $diastolica = $row_presion['diastolica'];
    }

    ?>
    <div class="container form-style-4">
        <div class="row resultado">
            <div class="col-md-12 ">
                <h1 class="title">Resultados IMC</h1>
                <table>
                    <tr>
                        <td colspan="3">Nombre: <?php echo $nombre . " " . $apellido ?> </td>
                    </tr>
                    <tr>
                        <td class="info">Cedula: <br><?php echo $cedula ?></td>
                        <td class="info">Telefono: <?php echo $telefono ?> </td>

                        <td class="info">Fecha: <?php $date = date("Y-m-d");
                                                echo $date;
                                                ?>
                        </td>
                    </tr>
                    <?php
                    if ($row_imc = mysqli_fetch_array($result_imc)) {
                    ?>
                        <tr>
                            <td class="resul" colspan="3">Peso:<?php echo $peso ?>kg </td>
                        </tr>
                        <tr>
                            <td class="resul" colspan="3">Altura:<?php echo $altura ?>m </td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td class="resul" colspan="3">No hay resultados</td>
                        </tr>
                    <?php } ?>
                    <?php

                    $last_week = strtotime("-1 week");
                    $imc_query = "SELECT imc,fecha FROM `imc` WHERE cedula='$cedula' and DATE(fecha) >= CURDATE() - INTERVAL 7 DAY";
                    $result_imc = mysqli_query($con, $imc_query) or die(mysqli_error($con));
                    while ($fila = $result_imc->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td class="resul" colspan="3">Resultados del <?php echo $fila['fecha']  ?> :<?php echo $fila['imc'] ?> </td>
                        </tr>

                    <?php } ?>

                    <tr>
                        <td colspan="3">Firma</td>
                    </tr>
                </table>
            </div>
        </div>
        <br><br>
        <div class="row resultado">
            <div class="col-md-12 ">
                <h1 class="title">Resultados Presion</h1>
                <table>
                    <tr>
                        <td colspan="3">Nombre: <?php echo $nombre . " " . $apellido ?> </td>
                    </tr>
                    <tr>
                        <td class="info">Cedula: <?php echo $cedula ?></td>
                        <td class="info">Telefono: <?php echo $telefono ?> </td>

                        <td class="info">Fecha: <?php $date = date("Y-m-d");
                                                echo $date;
                                                ?>
                        </td>
                    </tr>
                    <?php
                    if ($row_imc = mysqli_fetch_array($result_presion)) {
                    ?>
                        <tr>
                            <td class="resul" colspan="1">Presi??n sist??lica: <?php echo $sistolica ?> </td>
                        </tr>
                        <tr>
                            <td class="resul" colspan="2">Presi??n diast??lica : <?php echo $diastolica ?> </td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td class="resul" colspan="3">No hay resultados</td>
                        </tr>
                    <?php } ?>
                    <?php
                    $presion_query = "SELECT presion,fecha FROM `presion` WHERE cedula='$cedula' and DATE(fecha) >= CURDATE() - INTERVAL 7 DAY";
                    $result_presion = mysqli_query($con, $presion_query) or die(mysqli_error($con));
                    while ($fila = $result_presion->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td class="resul" colspan="3">Resultados del <?php echo $fila['fecha']  ?> :<?php echo $fila['presion'] ?> </td>
                        </tr>

                    <?php } ?>
                    <tr>
                        <td colspan="3">Firma</td>
                    </tr>
                </table>
            </div>
        </div>
        <br><br>
        <div class="row resultado">
            <div class="col-md-12 ">
                <h1 class="title">Resultados Glucosa</h1>
                <table>
                    <tr>
                        <td colspan="3">Nombre: <?php echo $nombre . " " . $apellido ?> </td>
                    </tr>
                    <tr>
                        <td class="info">Cedula: <?php echo $cedula ?></td>
                        <td class="info">Telefono: <?php echo $telefono ?> </td>

                        <td class="info">Fecha: <?php $date = date("Y-m-d");
                                                echo $date;
                                                ?>
                        </td>
                    </tr>
                    <?php
                    if ($row_imc = mysqli_fetch_array($result_glucosa)) {
                    ?>
                        <tr>
                            <td class="resul" colspan="3">Ayuno: <?php echo $ayuno ?></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td class="resul" colspan="3">No hay resultados</td>
                        </tr>
                    <?php } ?>
                    <?php
                    $glucosa_query = "SELECT glucosa,fecha FROM `glucosa` WHERE cedula='$cedula' and DATE(fecha) >= CURDATE() - INTERVAL 7 DAY";
                    $result_glucosa = mysqli_query($con, $glucosa_query) or die(mysqli_error($con));
                    while ($fila = $result_glucosa->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td class="resul" colspan="3">Resultados del <?php echo $fila['fecha']  ?> :<?php echo $fila['glucosa'] ?> </td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <td colspan="3">Firma</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php } ?>


<?php function resultados_mensual()
{ ?>
    <?php
    require('db.php');
    $cedula = $_SESSION['cedula'];
    $user_query = "SELECT * FROM `user` WHERE cedula='$cedula'";
    $result = mysqli_query($con, $user_query) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $telefono = $row['telefono'];
    $cedula = $row['cedula'];

    $imc_query = "SELECT * FROM `imc` WHERE cedula='$cedula'";
    $result_imc = mysqli_query($con, $imc_query) or die(mysqli_error($con));
    if ($row_imc = mysqli_fetch_array($result_imc)) {
        $imc = $row_imc['imc'];
        $peso = $row_imc['peso'];
        $altura = $row_imc['altura'];
    }
    $glucosa_query = "SELECT * FROM `glucosa` WHERE cedula='$cedula'";
    $result_glucosa = mysqli_query($con, $glucosa_query) or die(mysqli_error($con));
    if ($row_glucosa = mysqli_fetch_array($result_glucosa)) {
        $glucosa = $row_glucosa['glucosa'];
        $ayuno = $row_glucosa['ayuna'];
    }
    $presion_query = "SELECT * FROM `presion` WHERE cedula='$cedula'";
    $result_presion = mysqli_query($con, $presion_query) or die(mysqli_error($con));
    if ($row_presion = mysqli_fetch_array($result_presion)) {
        $presion = $row_presion['presion'];
        $sistolica = $row_presion['sistolica'];
        $diastolica = $row_presion['diastolica'];
    }

    ?>
    <div class="container form-style-4">
        <div class="row resultado">
            <div class="col-md-12 ">
                <h1 class="title">Resultados IMC</h1>
                <table>
                    <tr>
                        <td colspan="3">Nombre: <?php echo $nombre . " " . $apellido ?> </td>
                    </tr>
                    <tr>
                        <td class="info">Cedula: <br><?php echo $cedula ?></td>
                        <td class="info">Telefono: <?php echo $telefono ?> </td>

                        <td class="info">Fecha: <?php $date = date("Y-m-d");
                                                echo $date;
                                                ?>
                        </td>
                    </tr>

                    <?php
                    if ($row_imc = mysqli_fetch_array($result_imc)) {
                    ?>
                        <tr>
                            <td class="resul" colspan="3">Peso:<?php echo $peso ?>kg </td>
                        </tr>
                        <tr>
                            <td class="resul" colspan="3">Altura:<?php echo $altura ?>m </td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td class="resul" colspan="3">No hay resultados</td>
                        </tr>
                    <?php } ?>
                    <?php
                    $imc_query = "SELECT imc,fecha FROM `imc` WHERE cedula='$cedula' and DATE(fecha) >= CURDATE() - INTERVAL 30 DAY";
                    $result_imc = mysqli_query($con, $imc_query) or die(mysqli_error($con));
                    while ($fila = $result_imc->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td class="resul" colspan="3">Resultados del <?php echo $fila['fecha']  ?> :<?php echo $fila['imc'] ?> </td>
                        </tr>

                    <?php } ?>
                    <tr>
                        <td colspan="3">Firma</td>
                    </tr>
                </table>
            </div>
        </div>
        <br><br>
        <div class="row resultado">
            <div class="col-md-12 ">
                <h1 class="title">Resultados Presion</h1>
                <table>
                    <tr>
                        <td colspan="3">Nombre: <?php echo $nombre . " " . $apellido ?> </td>
                    </tr>
                    <tr>
                        <td class="info">Cedula: <?php echo $cedula ?></td>
                        <td class="info">Telefono: <?php echo $telefono ?> </td>

                        <td class="info">Fecha: <?php $date = date("Y-m-d");
                                                echo $date;
                                                ?>
                        </td>
                    </tr>
                    <?php
                    if ($row_imc = mysqli_fetch_array($result_presion)) {
                    ?>
                        <tr>
                            <td class="resul" colspan="1">Presi??n sist??lica: <?php echo $sistolica ?> </td>
                        </tr>
                        <tr>
                            <td class="resul" colspan="2">Presi??n diast??lica : <?php echo $diastolica ?> </td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td class="resul" colspan="3">No hay resultados</td>
                        </tr>
                    <?php } ?>
                    <?php
                    $presion_query = "SELECT presion,fecha FROM `presion` WHERE cedula='$cedula' and DATE(fecha) >= CURDATE() - INTERVAL 30 DAY";
                    $result_presion = mysqli_query($con, $presion_query) or die(mysqli_error($con));
                    while ($fila = $result_presion->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td class="resul" colspan="3">Resultados del <?php echo $fila['fecha']  ?> :<?php echo $fila['presion'] ?> </td>
                        </tr>

                    <?php } ?>
                    <tr>
                        <td colspan="3">Firma</td>
                    </tr>
                </table>
            </div>
        </div>
        <br><br>
        <div class="row resultado">
            <div class="col-md-12 ">
                <h1 class="title">Resultados Glucosa</h1>
                <table>
                    <tr>
                        <td colspan="3">Nombre: <?php echo $nombre . " " . $apellido ?> </td>
                    </tr>
                    <tr>
                        <td class="info">Cedula: <?php echo $cedula ?></td>
                        <td class="info">Telefono: <?php echo $telefono ?> </td>

                        <td class="info">Fecha: <?php $date = date("Y-m-d");
                                                echo $date;
                                                ?>
                        </td>
                    </tr>
                    <?php
                    if ($row_imc = mysqli_fetch_array($result_glucosa)) {
                    ?>
                        <tr>
                            <td class="resul" colspan="3">Ayuno: <?php echo $ayuno ?></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td class="resul" colspan="3">No hay resultados</td>
                        </tr>
                    <?php } ?>
                    <?php
                    $glucosa_query = "SELECT glucosa,fecha FROM `glucosa` WHERE cedula='$cedula' and DATE(fecha) >= CURDATE() - INTERVAL 30 DAY";
                    $result_glucosa = mysqli_query($con, $glucosa_query) or die(mysqli_error($con));
                    while ($fila = $result_glucosa->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td class="resul" colspan="3">Resultados del <?php echo $fila['fecha']  ?> :<?php echo $fila['glucosa'] ?> </td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <td colspan="3">Firma</td>
                    </tr>
                </table>
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
                <h1 class="title">Presion</h1>
                <form action="presionResultados.php" method="POST">
                    <div class="form-group">
                        <label for="presion">Ingrese su presi??n sist??lica</label>
                        <input type="number" class="form-control" id="presion" name="sistolica" placeholder="Presion">
                    </div>
                    <div class="form-group">
                        <label for="presion">Ingrese su presi??n diast??lica</label>
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
                <p>Seg??n su indice de masa corporal de: <?php echo $imc ?> ,su resultado es: <?php echo $resultado ?></p>
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
                    <p> 2022 - Elaborado por Jose Tapia, Abel Hernandez, Eynar Sanchez, Fernando Salazar y Erwin Rodriguez</a></p>
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
                    <p> 2022 - Elaborado por Jose Tapia, Abel Hernandez, Eynar Sanchez, Fernando Salazar y Erwin Rodriguez</a></p>
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
                    <p> 2022 - Elaborado por Jose Tapia, Abel Hernandez, Eynar Sanchez, Fernando Salazar y Erwin Rodriguez</a></p>
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
        $mensaje = 'Numero de visitas sobre presi??n: ' . $_COOKIE['contador_presion'];
    } else {
        setcookie('contador_presion', 1);
        $mensaje = 'Bienvenido a sus pruebas de presi??n';
    }
    ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p> 2022 - Elaborado por Jose Tapia, Abel Hernandez, Eynar Sanchez, Fernando Salazar y Erwin Rodriguez</a></p>

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