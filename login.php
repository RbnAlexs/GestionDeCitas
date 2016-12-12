<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     <title>Content Business BETA</title>
</head>

 <body>

        <div class="container">
            <div class="row">
                 <div class="col-xs-12">
                    <?php
                        //Datos para la conección a la BD. 
                        @include 'conexion.php';

                        //inicio de sesión. 
                        

                            //Variables post para verificar el usuario administrador
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                             
                            $conexion = Conectarse();
                            //TABLA ACCESO
                            $query = "SELECT * FROM acceso WHERE email ='".$email."' AND pass = '".$pass."'";
                            $query_w = mysql_query($query,$conexion);
                            try {
                                if(mysql_result($query_w,0)) {
                                    $result = mysql_result($query_w, 0);
                                    session_start();
                                    $_SESSION['email'] = $_POST['email'];
                                    $sesion_login = true;
                                    echo "<script language='javascript'>window.location='dash/index.php'</script>"; 
                                } 
                                else
                                    echo '<h2 class="text-center"> Email o contraseña incorrectos </h2>
                                          <center><a href="/">
                                            <button type="button" class="btn btn-default">Regresar</button>
                                          </a></center>';
                            }
                                catch(Exception $error){}
                                mysql_close($conexion);
                        
                    ?>
                </div>
            </div>
        </div>

   </body>


</html>