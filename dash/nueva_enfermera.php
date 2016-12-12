<?php
    session_start();
    $email = $_SESSION['email'];
    include 'conexion.php';
    $conexion = Conectarse();
?>
<div class="row">
  <div class="col-xs-12">

    <form class="form-inline" action="crear_enfermera.php" method="post" role="form">
      <fieldset>
         
        <div class="form-group col-xs-12">
              <input class="form-control" size="16" type="text" value=""  name="nombre" placeholder="Nombre">
              <input class="form-control" size="16" type="text" value=""  name="email" placeholder="Email">
              <input class="form-control" size="16" type="text" value=""  name="pass" placeholder="Password">

        </div>

        <div class="form-group col-xs-12">
            <div class='col-xs-push-4 col-xs-4'><button type='submit' class='btn btn-success'>Crear</button></div>
        </div>

      </fieldset>

    </form>

  </div>
</div>  

