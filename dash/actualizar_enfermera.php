<?php 
   
    session_start();
    $email = $_SESSION['email'];
    $enfermera_id =  $_SESSION['enfermera_id'];

	include 'conexion.php';
	$conexion = Conectarse();

	$nombre_enfermera = $_POST['nombre_enfermera'];
	$email_enfermera = $_POST['email_enfermera'];


	echo $nombre_enfermera;

    mysql_query ("UPDATE enfermera SET nombre_enf = '".$nombre_enfermera."', email = '".$email_enfermera."' WHERE id = '".$enfermera_id."' ");

    mysql_query ("UPDATE acceso SET email = '".$email_enfermera."' WHERE id = '".$enfermera_id."' ");


?>  