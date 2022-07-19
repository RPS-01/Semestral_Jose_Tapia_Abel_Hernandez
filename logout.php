<?php
session_start();
if(!empty($_SESSION['usuario'])){
    session_unset();
    session_destroy();
    header("location: index.php");
}
?>