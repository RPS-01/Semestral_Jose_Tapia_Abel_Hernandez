<?php
include("plantilla/encabezado.php");

include("class/Glucosa.php");

encabezado();
$glucosa = $_POST['glucosa'];
$ayuna = $_POST['ayuna'];
$obj = new GlucosaCalc();
$obj->Asignar($glucosa,$ayuna);
$resultado = $obj->CalcularGlucosa();
ResultadosGlucosa($glucosa,$resultado);
pie_glucosa();
