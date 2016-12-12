<?php 
  session_start();
  $email = $_SESSION['email'];

  include 'conexion.php';
  $conexion = Conectarse();

  $enfermera_nombre = $_POST['nombre']; 
  $enfermera_email = $_POST['email'];
  $enfermera_pass = $_POST['pass'];

  echo "$enfermera_nombre ";
  echo "$enfermera_email";

  $query_i =  "INSERT INTO acceso (prefijo, email,pass)  VALUES  ('ENF', '".$enfermera_email."', '".$enfermera_pass."') ";
  $result_i = mysql_query($query_i, $conexion);

  $query_readid = "SELECT id FROM acceso WHERE email = '$enfermera_email' AND prefijo = 'ENF' ";
  $res = mysql_query($query_readid,$conexion);
  while($fila=mysql_fetch_array($res)){ 
    $id_enfermera = $fila['id'];
  }

  $query_e =  "INSERT INTO enfermera (id, nombre_enf, email)  VALUES  ('".$id_enfermera."', '".$enfermera_nombre."', '".$enfermera_email."') ";
  $result_e = mysql_query($query_e, $conexion);


?>   