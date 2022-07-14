<?php
include("plantilla/encabezado.php");
include("class/Presion.php");
encabezado();
$sistolica = $_POST['sistolica'];
$diastolica = $_POST['diastolica'];
$obj = new Presion();
$obj->Asignar($sistolica,$diastolica);
$obj->CalcularPresion();
$resultado = $obj->CalcularPresion();
ResultadosPresion($sistolica,$diastolica,$resultado);
pie_presion();
?>