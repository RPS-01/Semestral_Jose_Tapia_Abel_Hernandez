<?php
include("plantilla/encabezado.php");
include("class/Presion.php");
require('db.php');
session_start();
encabezado();
$sistolica = $_POST['sistolica'];
$diastolica = $_POST['diastolica'];
$cedula=$_SESSION['cedula'];
$obj = new Presion();
$obj->Asignar($sistolica,$diastolica);
$obj->CalcularPresion();
$resultado = $obj->CalcularPresion();
$sql = "INSERT INTO presion (sistolica,diastolica,cedula,presion) VALUES ('$sistolica','$diastolica','$cedula','$resultado')";
$result = mysqli_query($con,$sql);
ResultadosPresion($sistolica,$diastolica,$resultado);
pie_presion();
?>