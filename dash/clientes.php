
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
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     <title>Content Business BETA</title>
    </head>
<?php
session_start();
if (isset ($_SESSION['email'])){
    $email = $_SESSION['email'];
?>
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


        <!-- Modal para nuevo cita -->
        <div class="modal fade" id="nuevo_cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo Cliente</h4>
                    </div>
                    <div class="modal-body">
                        <?php  include "nuevo_cliente.php"; ?>
                    </div>
                    <div class="modal-footer"> 
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">

                <div class="col-xs-12">

                    <div class="table-responsive">

                        <table class="table table-striped"> 
                            <tread>   
                                <tr style = "background: #515763; color: #fff; font-weight: 100;">
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th> </th>
                                    <th> </th>
                                </tr>
                            </tread>

                            <tbody>
                            
                            <?php
                                //CONDICIONAL (IF) ADMINISTRADOR EN BASE A SU PREFIJO, DASHBOARD              
                                $query = "SELECT * FROM acceso WHERE email = '$email' AND prefijo = 'ADM' ";
                                $res = mysql_query($query,$conexion);
                                    if ($row = mysql_fetch_row($res)) {
                                            //MOSTRAR TODAS LAS CITAS Y LAS OPCIONES PARA CREAR, ACTUALIZAR Y BORRAR (SÓLO PARA ADM).                                
                                            $consulta_mysql = "SELECT id, nombre_cli, email FROM cliente ORDER BY nombre_cli DESC ";
                                            $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion); 
                          
                                                        while($fila=mysql_fetch_array($resultado_consulta_mysql)){ 

                                                            echo"<tr>
                                                                    <th>".$fila['nombre_cli']."</th>
                                                                    <th>".$fila['email']."</th>  
                                                                    <th>
                                                                        <a href='editar_cliente.php?id=".$fila['id']."' title='".$fila['id']."'>
                                                                            <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                                                        </a>
                                                                    </th>
                                                                    <th>
                                                                        <a href='borrar_cliente.php?id=".$fila['id']."' >
                                                                            <i class='fa fa-times' aria-hidden='true'></i>
                                                                        </a>
                                                                    </th>
                                                                </tr>";
                                                        } 

                                    }
                                //CONDICIONAL (ELSE) PARA ENFERMERAS
                                    else {
          
                                                    
                                        }

                                mysql_close($conexion);
                            ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

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

