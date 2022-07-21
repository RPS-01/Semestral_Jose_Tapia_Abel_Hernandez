  <?php
  $db = "semestral";
  $host = "localhost";
  $pw = "";
  $user = "root";

  //establecemos la conexión con la base de datos y seleccionamos la base de datos con la que vamos a trabajar
  $con = mysqli_connect($host,$user,$pw,$db) or die("No se pudo autentificar con la BD");
  mysqli_select_db($con,$db) or die ("No se pudo conectar a la BD");
  ?>