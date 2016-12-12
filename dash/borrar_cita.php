<?php

    session_start();
    $email = $_SESSION['email'];
    $cita = $_GET['cita']; 

    $conexion=mysql_connect("localhost", "enfermeritas_adm", "holamundo");
    mysql_select_db("enfermeritas_cb", $conexion);
    $query ="DELETE FROM citas_programadas WHERE id = '".$cita."' "; 
    mysql_query($query);

?> 
   
