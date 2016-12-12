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


    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Assist</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">
                <button data-toggle='modal' data-target='#nuevo_cliente' class='btn btn-sm btn-success' style='margin: 0px 0px 10px;'>
                    Añadir nuevo paciente
                </button></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menú <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li> <a href="index.php">Citas</a> </li>
                <li><a href="enfermeras.php">Enfermeras</a></li>
                <li><a href="#">Pacientes</a></li>
                <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            <?php
                session_start();
                $email = $_SESSION['email'];


                $_SESSION['cita'] = $_GET['cita'] ;

                include 'conexion.php';
                $conexion = Conectarse();


                $cita_id = $_GET['cita']; 



                $consulta_mysql = "SELECT cliente.nombre_cli, enfermera.nombre_enf, citas_programadas.id, citas_programadas.id_cliente, citas_programadas.id_enfermera, citas_programadas.fecha, citas_programadas.hora, citas_programadas.hora_final FROM citas_programadas, cliente, enfermera WHERE citas_programadas.id_enfermera = enfermera.id AND citas_programadas.id_cliente = cliente.id AND citas_programadas.id = '".$cita_id."'  ";
                $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion); 
                    while($fila=mysql_fetch_array($resultado_consulta_mysql)){ 
                        $id_cliente = $fila['id_cliente'];
                        $nombre_cliente =$fila['nombre_cli'];
                        $id_enfermera = $fila['id_enfermera'];
                        $nombre_enfermera =$fila['nombre_enf'];
                        $fecha = $fila['fecha'];  
                        $hora = $fila['hora']; 
                        $hora_final = $fila['hora_final'];
                } 
            ?>


            <form class="form-inline" action="actualizar_cita.php" method="post" role="form">
              <fieldset>

                <div class='form-group col-xs-12 col-md-6'>
                  <select id='lista-empresas' name='cliente' class='form-control'>
                    <?php 
                      echo "<option value='".$id_cliente."'>".$nombre_cliente."</option>";
                      $consulta_mysql_emp = "SELECT id,nombre_cli FROM cliente ";
                      $resultado_consulta_mysql_emp=mysql_query($consulta_mysql_emp,$conexion); 
                      while($fila=mysql_fetch_array($resultado_consulta_mysql_emp)){ 
                        echo "<option  value='".$fila['id']."'>".$fila['nombre_cli']."</option>";
                      }
                    ?>
                  </select>
                </div>  

                <div class='form-group col-xs-12 col-md-6'>
                  <select id='lista-usuarios' name='enfermera' class='form-control'>
                    <?php
                      echo "<option value='".$id_enfermera."'>".$nombre_enfermera."</option>";
                      $consulta_mysql = "SELECT id,nombre_enf FROM enfermera";
                      $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion); 
                      while($fila=mysql_fetch_array($resultado_consulta_mysql)){
                        echo "<option  value='".$fila['id']."'>".$fila['nombre_enf']."</option>";
                      }
                    ?>
                  </select>
                </div>

                <div class="form-group col-xs-12">
                  <label for="dtp_input2" class="col-md-2 control-label">Fecha</label>
                    <div class="input-group date form_date col-md-10" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                      <input class="form-control" size="16" type="text" value="<?php echo $fecha;?>"  name="fecha" readonly>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" /><br/>
                </div>
                
                <div class="form-group col-xs-12">
                  <label for="dtp_input3" class="col-md-2 control-label">Hora</label>
                  <div class="input-group date form_time col-md-10" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    <input class="form-control" size="16" type="text" value="<?php echo $hora;?>" name="hora"  readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                  </div>
                  <input type="hidden" id="dtp_input3" value="" /><br/>
                </div>


                <div class="form-group col-xs-12">
                  <label for="dtp_input3" class="col-md-2 control-label">Hora Final</label>
                  <div class="input-group date form_time col-md-10" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    <input class="form-control" size="16" type="text" value="<?php echo $hora_final;?>" name="hora_final"  readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                  </div>
                  <input type="hidden" id="dtp_input3" value="" /><br/>
                </div>

                <div class="form-group col-xs-12">
                  <span>Notas: </span>
                  <textarea style="width: 100%;"></textarea>
                </div>           

                <div class="form-group col-xs-12">
                    <div class='col-xs-push-4 col-xs-4'><button type='submit' class='btn btn-success'>Actualizar</button></div>
                </div>

              </fieldset>

            </form>
            <script type="text/javascript">
             
              $('.form_date').datetimepicker({
                language:  'es',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
                });
              $('.form_time').datetimepicker({
                language:  'es',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 1,
                minView: 0,
                maxView: 1,
                forceParse: 0
                });

            </script>            
            </div>
        </div>
    </div>
</body>
</html> 