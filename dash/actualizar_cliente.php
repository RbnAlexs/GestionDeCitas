<?php 
   
    session_start();
    $email = $_SESSION['email'];
    $cliente_id =  $_SESSION['cliente_id'];

	include 'conexion.php';
	$conexion = Conectarse();

	$nombre_cliente = $_POST['nombre_cliente'];
	$email_cliente = $_POST['email_cliente'];


	echo $nombre_cliente;

    mysql_query ("UPDATE cliente SET nombre_cli = '".$nombre_cliente."', email = '".$email_cliente."' WHERE id = '".$cliente_id."' ");

    mysql_query ("UPDATE acceso SET email = '".$email_cliente."' WHERE id = '".$cliente_id."' ");


?>  