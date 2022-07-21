<?php
include("plantilla/encabezado.php");
session_start();
if(!empty($_SESSION['usuario'])){
  encabezado();
  resultados_mensual();
  pie();  
}
else{
  encabezado();
  echo'No estas logueado';
  echo'<a href="login.php">Iniciar sesion</a>';
  pie();
}
