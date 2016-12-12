<?php
    session_start();
    $email = $_SESSION['email'];
    include 'conexion.php';
    $conexion = Conectarse();
?>
<div class="row">
  <div class="col-xs-12">

    <form class="form-inline" action="crear_cita.php" method="post" role="form">
      <fieldset>

        <div class='form-group col-xs-12 col-md-6'>
          <select id='lista-empresas' name='cliente' class='form-control'>
            <option>Seleccionar Cliente</option>
            <?php 
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
            <option>Seleccionar Enfermera</option>
            <?php
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
              <input class="form-control" size="16" type="text" value=""  name="fecha" readonly required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <input type="hidden" id="dtp_input2" value="" /><br/>
        </div>
        
        <div class="form-group col-xs-12">
          <label for="dtp_input3" class="col-md-2 control-label">Hora Inicio</label>
          <div class="input-group date form_time col-md-10" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
            <input class="form-control" size="16" type="text" value="" name="hora"  readonly required>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
          </div>
          <input type="hidden" id="dtp_input3" value="" /><br/>
        </div>


        <div class="form-group col-xs-12">
          <label for="dtp_input3" class="col-md-2 control-label">Hora Final </label>
          <div class="input-group date form_time col-md-10" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
            <input class="form-control" size="16" type="text" value="" name="hora_final"  readonly required>
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
            <div class='col-xs-push-4 col-xs-4'><button type='submit' class='btn btn-success'>Crear</button></div>
        </div>

      </fieldset>

    </form>

  </div>
</div>  

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

