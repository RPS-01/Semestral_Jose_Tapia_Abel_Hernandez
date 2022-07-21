<?php
include("plantilla/encabezado.php");
include("class/Imc.php");
require('db.php');
session_start();
encabezado();
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$cedula=$_SESSION['cedula'];
$obj = new Peso();
$obj->Asignar($peso,$altura);
$imc = $obj->CalcularIMC();
$resultado = $obj->CalcularPeso();
$sql = "INSERT INTO imc (peso,altura,cedula,imc) VALUES ('$peso','$altura','$cedula','$imc')";
$result = mysqli_query($con,$sql);
ResultadosIMC($peso,$altura,$resultado,$imc);
pie_imc();
?>