<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Datepickers -->
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
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
                session_start();
                $email = $_SESSION['email'];


                $_SESSION['enfermera_id'] = $_GET['id'] ;

                include 'conexion.php';
                $conexion = Conectarse();


                $enfermera_id = $_GET['id']; 



                $consulta_mysql = "SELECT email, nombre_enf FROM enfermera WHERE id = '".$enfermera_id."' ";
                $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion); 
                    while($fila=mysql_fetch_array($resultado_consulta_mysql)){ 
                        $nombre_enfermera =$fila['nombre_enf'];
                        $email_enfermera = $fila['email'];
                      
                } 
            ?>


            <form class="form-inline" action="actualizar_enfermera.php" method="post" role="form">
              <fieldset>


                <div class="form-group col-xs-12">
                  <label for="dtp_input2" class="col-md-2 control-label">Nombre</label>
                      <input class="form-control" size="16" type="text" value="<?php echo $nombre_enfermera;?>"  name="nombre_enfermera">
                </div>
                
                <div class="form-group col-xs-12">
                  <label for="dtp_input2" class="col-md-2 control-label">Email</label>
                      <input class="form-control" size="16" type="text" value="<?php echo $email_enfermera;?>"  name="email_enfermera">
                </div>

                <div class="form-group col-xs-12">
                    <div class='col-xs-push-4 col-xs-4'><button type='submit' class='btn btn-success'>Actualizar</button></div>
                </div>

              </fieldset>

            </form>
          
            </div>
        </div>
    </div>
</body>
</html> 