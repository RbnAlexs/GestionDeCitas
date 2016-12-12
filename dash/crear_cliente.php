<?php 
  session_start();
  $email = $_SESSION['email'];

  include 'conexion.php';
  $conexion = Conectarse();

  $cliente_nombre = $_POST['nombre']; 
  $cliente_email = $_POST['email'];
  $cliente_telefono = $_POST['telefono'];

  echo "$cliente_nombre ";
  echo "$cliente_email";
  echo "$cliente_telefono";

  $query_i =  "INSERT INTO acceso (prefijo, email)  VALUES  ('CLI', '".$cliente_email."') ";
  $result_i = mysql_query($query_i, $conexion);

  $query_readid = "SELECT id FROM acceso WHERE email = '$cliente_email' AND prefijo = 'CLI' ";
  $res = mysql_query($query_readid,$conexion);
  while($fila=mysql_fetch_array($res)){ 
    $id_cliente = $fila['id'];
  }

  $query_e =  "INSERT INTO cliente (id, nombre_cli, email, telefono)  VALUES  ('".$id_cliente."', '".$cliente_nombre."', '".$cliente_email."', '".$cliente_telefono."') ";
  $result_e = mysql_query($query_e, $conexion);


?>   