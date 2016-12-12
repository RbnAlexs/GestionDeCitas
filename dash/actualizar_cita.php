<?php 
   
    session_start();
    $email = $_SESSION['email'];
    $cita_id =  $_SESSION['cita'];

    echo $cita_id;
	include 'conexion.php';
	$conexion = Conectarse();

	$cliente = $_POST['cliente'];
	$enfermera = $_POST['enfermera']; 
	$fecha = $_POST['fecha'];
	$hora= $_POST['hora'];
	$hora_final = $_POST['hora_final'];

	echo $cliente;
	echo $enfermera;
	echo $fecha;
	echo $hora;

    mysql_query ("UPDATE citas_programadas SET id_cliente = '".$cliente."' , id_enfermera = '".$enfermera."' , fecha = '".$fecha."', hora = '".$hora."', hora_final = '".$hora_final."' WHERE id = '".$cita_id."' ");

?>  