<?php

    session_start();
    $email = $_SESSION['email'];
    $id_cliente = $_GET['id']; 

    $conexion=mysql_connect("localhost", "enfermeritas_adm", "holamundo");
    mysql_select_db("enfermeritas_cb", $conexion);
    
    $query_e ="DELETE FROM cliente WHERE id = '".$id_cliente."' "; 
    mysql_query($query_e);

    $query_a ="DELETE FROM acceso WHERE id = '".$id_cliente."' "; 
    mysql_query($query_a);

    $query_c ="DELETE FROM citas_programadas WHERE id_cliente = '".$id_cliente."' "; 
    mysql_query($query_c);


?> 
   
