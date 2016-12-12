<?php 
  session_start();
  $email = $_SESSION['email'];

  include 'conexion.php';
  $conexion = Conectarse();

  $cliente = $_POST['cliente'];
  $enfermera = $_POST['enfermera']; 
  $fecha = $_POST['fecha'];
  $hora= $_POST['hora'];
  $hora_final = $_POST['hora_final'];

  echo "Cliente:".$cliente;
  echo "Enfermera:".$enfermera;
  echo "Fecha: ".$fecha;
  echo "Hora: ".$hora;
  echo "Hora Final: ".$hora_final;


  //
  $query_enf = "SELECT email FROM acceso WHERE prefijo = 'ENF' AND id = '".$enfermera."' ";
  $result_enf = mysql_query($query_enf, $conexion);
  while($fila = mysql_fetch_array($result_enf)){
    $email_enf = $fila['email'];
  }



  $query_w =  "INSERT INTO citas_programadas(id_cliente, id_enfermera, fecha, hora, hora_final, notas)  VALUES  ('$cliente', '$enfermera', '$fecha', '$hora', '$hora_final', '') ";
  $result_w = mysql_query($query_w, $conexion);

  $email_adm = $email;

        require("include/class.phpmailer.php");
        include("include/class.smtp.php");

        $mail = new PHPMailer();
        $mail->SMTPDebug = 1;
        $mail->PluginDir = "include/"; 

        $mail->Host = "a2plcpnl0748.prod.iad2.secureserver.net";
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Username = "assist@enfermeritas.com";
        $mail->Password = "assist2016"; 
        $mail->Port = 465; 
        $mail->SMTPSecure = "ssl"; 
        $mail->From = "no-reply@enfermeritas.com";
        $mail->FromName = "Se ha creado una nueva cita en Assist Medic";
        $mail->Subject = "12:12";
        $mail->AddAddress($email_enf);
        $mail->AddCC($email_adm);



        
        $body  = " Hola, se acaba de crear una nueva cita para el día $fecha, con un horario de $hora a $hora_final ";

        $mail->Body = $body;
        $mail->AltBody = "Haz click en el siguiente botón";

        $mail->CharSet = 'UTF-8';
        $mail->Send();


mysql_close($conexion);

?>

  