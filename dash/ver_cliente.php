
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
    include 'conexion.php';
    $conexion = Conectarse();

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

        $id_cliente = $_GET['cliente'];
        $query_c = "SELECT nombre_cli, email, telefono FROM cliente WHERE id = '".$id_cliente."' ";
        $result_c = mysql_query($query_c,$conexion);      
               
        while($fila=mysql_fetch_array($result_c)){ 
            echo"<tr>
                    <th>".$fila['nombre_cli']."</th>
                    <th>".$fila['email']."</th>
                    <th>".$fila['telefono']."</th>
                </tr>";
        } 

     ?>




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

 
