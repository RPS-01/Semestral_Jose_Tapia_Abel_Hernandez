<?php
include("plantilla/encabezado.php");
include("class/Imc.php");
session_start();
encabezado();
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$obj = new Peso();
$obj->Asignar($peso,$altura);
$imc = $obj->CalcularIMC();
$resultado = $obj->CalcularPeso();
ResultadosIMC($peso,$altura,$resultado,$imc);
pie_imc();
?>