
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- Datepickers -->
        <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
        <!-- Bootstrap 4.0 alpha -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Font Awesome-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>
 
<?php
session_start();
if (isset ($_SESSION['email'])){
    $email = $_SESSION['email'];
?>

    <body>

        <!-- Modal bootstrap para nuevo cita -->
        <div class="modal fade" id="nuevo_tema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Nueva Cita</h4>
                    </div>
                    <div class="modal-body">
                        <?php  include "nueva_cita.php"; ?>
                    </div>
                    <div class="modal-footer"> 
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">
                
                <div class="col-xs-12 ">

                    <div class="table-responsive">

                        <table class="table table-striped"> 
                            <tread>   
                                <tr style = "background: #515763; color: #fff; font-weight: 100;">
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Asignado</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tread>

                            <tbody>
                            <?php
                                //PARA SELECCIONAR UN USUARIO ADM, LO BUSCAREMOS EN LA TABLE ACCESO, DONDE TENEMOS DEFINIDO EL PREFIJO 'ADM'
                                $query = "SELECT * FROM acceso WHERE email = '$email' AND prefijo = 'ADM' ";
                                $res = mysql_query($query,$conexion);
                                //CONDICIONAL (IF) ADMINISTRADOR EN BASE A SU PREFIJO, DASHBOARD (AÑADIR, VISUALIZAR, EDITAR Y ELIMINAR CITAS)            
                                    if ($row = mysql_fetch_row($res)) {

                            ?>

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
                                            <button data-toggle='modal' data-target='#nuevo_tema' class='btn btn-sm btn-success' style='margin: 0px 0px 10px;'>
                                                Añadir nueva cita
                                            </button></a>
                                        </li>
                                        <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menú <span class="caret"></span></a>
                                          <ul class="dropdown-menu">
                                            <li> <a href="#">Citas</a> </li>
                                            <li><a href="enfermeras.php">Enfermeras</a></li>
                                            <li><a href="clientes.php">Pacientes</a></li>
                                            <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
                                          </ul>
                                        </li>
                                      </ul>
                                    </div><!-- /.navbar-collapse -->
                                  </div><!-- /.container-fluid -->
                                </nav>

                            <?php

                                            //SELECCIONAMOS LOS CAMPOS NECESARIOS PARA CONSULTAR NUESTRAS CITAS CREADAS, EMPEZANDO POR EL ID DE LA CITA
                                            // ID DEL CLIENTE (PARA VISUALIZARLO INDIVIDUALMENTE), NOMBRE DEL CLIENTE, ID DE LA ENFERMERA (PARA VISUALIZARLA INDIVIDUALMENTE)
                                            // FECHA, HORA Y SUS OPCIONES DE EDITAR O ELIMINAR (CON EL ID UNICO DE LA CITA).    
                                            
                                            $consulta_mysql = "SELECT cliente.nombre_cli, enfermera.nombre_enf, citas_programadas.id, citas_programadas.id_cliente, citas_programadas.id_enfermera, citas_programadas.fecha, citas_programadas.hora, citas_programadas.hora_final FROM citas_programadas, cliente, enfermera WHERE citas_programadas.id_enfermera = enfermera.id AND citas_programadas.id_cliente = cliente.id AND enfermera.id = citas_programadas.id_enfermera ORDER BY citas_programadas.id DESC ";
                                            $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion); 
                          
                                                        while($fila=mysql_fetch_array($resultado_consulta_mysql)){ 

                                                            echo"<tr>
                                                                    <th>".$fila['id']."</th>
                                                                    <th><a href='ver_cliente.php?cliente=".$fila['id_cliente']."' >".$fila['nombre_cli']."</a></th>
                                                                    <th><a href='ver_enfermera.php?enfermera=".$fila['id_enfermera']."' >".$fila['nombre_enf']."</a></th>
                                                                    <th>".$fila['fecha']."</th>  
                                                                    <th>".$fila['hora']." a ".$fila['hora_final']."</th> 
                                                                    <th>
                                                                        <a href='editar_cita.php?cita=".$fila['id']."' title='".$fila['id']."'>
                                                                            <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                                                        </a>
                                                                    </th>
                                                                    <th>
                                                                        <a href='borrar_cita.php?cita=".$fila['id']."' >
                                                                            <i class='fa fa-times' aria-hidden='true'></i>
                                                                        </a>
                                                                    </th>
                                                                </tr>";
                                                        } 

                                    }
                                //CONDICIONAL (ELSE) PARA ENFERMERAS
                                    else { ?>
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
                                                    <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
                                                  </ul>
                                                </li>
                                              </ul>
                                            </div><!-- /.navbar-collapse -->
                                          </div><!-- /.container-fluid -->
                                        </nav>
                                    <?php
                                            $query_id = "SELECT id FROM acceso WHERE email = '$email' AND prefijo = 'ENF' ";
                                            $res_id = mysql_query($query_id,$conexion);
                                            while($fila=mysql_fetch_array($res_id)){ 
                                                $id_enfermera = $fila['id'];
                                            }


                                            $querycol = "SELECT * FROM acceso WHERE email = '$email' AND prefijo = 'ENF' ";
                                            $rescol = mysql_query($querycol,$conexion);
                                            if ($row = mysql_fetch_row($rescol)) { 

                                                $consulta_mysql = "SELECT cliente.nombre_cli, citas_programadas.id, citas_programadas.id_cliente, citas_programadas.id_enfermera, citas_programadas.fecha, citas_programadas.hora FROM citas_programadas, cliente WHERE cliente.id = citas_programadas.id_cliente AND citas_programadas.id_enfermera = '".$id_enfermera."' ";
                                                $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);  
                          
                                                        while($fila=mysql_fetch_array($resultado_consulta_mysql)){ 

                                                            echo"<tr>
                                                                    <th><a href='ver_cliente.php?cliente=".$fila['id_cliente']."' >".$fila['nombre_cli']."</a></th>
                                                                    <th><a href='ver_enfermera.php?enfermera=".$fila['id_enfermera']."' >".$fila['nombre_enf']."</a></th>
                                                                    <th>".$fila['fecha']."</th>  
                                                                    <th>".$fila['hora']."</th> 
                                                                    <th>
                                                                        <a href='editar_cita.php?cita=".$fila['id']."' title='".$fila['id']."' >
                                                                            <i class='fa fa-pencil-square-o' aria-hidden='true'></i>                                                                            Añadir nota
                                                                        </a>
                                                                    </th>
                                                                </tr>";
                                                        } 

                                            }
                                                    
                                        }

                                mysql_close($conexion);
                            ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </body> 

<?php
}

else
    {
        echo '
            <div class="alert alert-danger">
                Ha ocurrido un error, por favor inica sesión.
            </div>

            <center><a href="/">
                <button type="button" class="btn btn-default">Regresar</button>
            </a></center';
        
        
    } 
?>

</html>

 
