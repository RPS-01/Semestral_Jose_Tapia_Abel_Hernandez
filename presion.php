<?php
include("plantilla/encabezado.php");
#include("./clase/Horoscopo.php");
session_start();
if(!empty($_SESSION['usuario'])){
  encabezado(); 
  presion();
  pie();
}
else{
  encabezado();
  echo'No estas logueado';
  echo'<a href="login.php">Iniciar sesion</a>';
  pie();
}
?>