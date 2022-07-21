<?php
include("plantilla/encabezado.php");
    require('db.php');
include("class/Glucosa.php");
session_start();
encabezado();
$glucosa = $_POST['glucosa'];
$ayuna = $_POST['ayuna'];
$cedula=$_SESSION['cedula'];
$obj = new GlucosaCalc();
$obj->Asignar($glucosa,$ayuna);
$resultado = $obj->CalcularGlucosa();
$sql = "INSERT INTO glucosa (glucosa,ayuna,cedula) VALUES ('$glucosa','$ayuna','$cedula')";
$result = mysqli_query($con,$sql);
ResultadosGlucosa($glucosa,$resultado);
pie_glucosa();
