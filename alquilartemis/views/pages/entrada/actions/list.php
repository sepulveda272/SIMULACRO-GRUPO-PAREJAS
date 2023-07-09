<?php

$url ="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/entreda.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
 /* print_r($output); */


?>


<div class="card">
    <div class="card-header">
    
    <!-- Button trigger modal -->
<button type="button" class="btn bg-lime" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Nueva Entrada
</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="bg-lime">
        <tr>
        <th>idSalida</th>
        <th>idCliente</th>
        <th>idEmpleado</th>
        <th>fechaEntrada</th>
        <th>horaEntrada</th>
        <th>observaciones</th>
        <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($output as $out)
                {
                $urlS ="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/entreda.php?op=GetIdSalida";
                $url = "http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/entreda.php?op=GetIdCliente";
                $urlE ="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/entreda.php?op=GetIdEmpleado";
                

                $dataS = array(
                  'idSalida' => $out -> idSalida
              );

              
              ($dataS);
        

              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $urlS);
              curl_setopt($ch, CURLOPT_POST,true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataS)); 
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          
             


              $salidas = json_decode( curl_exec ($ch));
              curl_close($ch);

              ($salidas);

              $dataC = array(
                'idCliente' => $out -> idCliente
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST,true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataC)); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
            $clientes = json_decode( curl_exec ($ch));
            curl_close($ch);

            ($clientes);
            
            $dataE = array(
              'idEmpleado' => $out -> idEmpleado
            );

            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $urlE);
            curl_setopt($ch, CURLOPT_POST,true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataE)); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
            $empleados = json_decode( curl_exec ($ch));
            curl_close($ch);

            ($empleados);
            ?>
        <tr>
        <td><?php foreach($salidas as $salida){
        echo $salida -> idSalida; }?> </td>
        <td><?php foreach($clientes as $cliente){
        echo $cliente -> nombreCliente; }?> </td>
        <td><?php foreach($empleados as $empleado){
        echo $empleado -> nombreEmpleado; }?> </td>
        <td><?php echo $out -> fechaEntrada ?> </td>
        <td><?php echo $out -> horaEntrada ?> </td>
        <td><?php echo $out -> observaciones ?> </td>
        <td>
          <form action="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/entreda.php?op=delete" method="post">
            <input type="hidden" name="idEntrada" value="<?php echo $out->idEntrada ?>">
            <input type="submit" name="borrar" class="btn btn-danger" value="DELETE">
          </form>
        </td>
        
        </tr>
        <?php } ?>

        </tbody>
        
    </table>
    </div>
    <!-- /.card-body -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-lime">
        <h5 class="modal-title" id="exampleModalLabel">Información de la Nueva Entrada</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/entreda.php?op=insert" method="post">
          <p>Por favor llenar todos los espacios con la infromación correspondiente</p>
            <div class="card-body">
            <div class="form-row">  
          <div class="form-group col-md-6">
                <label for="exampleInputEmail1">idSalida</label><br>
                <?php 
          $url = "http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salida.php?op=GetAll";
          $Allsalida = curl_init();
          curl_setopt($Allsalida, CURLOPT_URL, $url);
          curl_setopt($Allsalida, CURLOPT_RETURNTRANSFER,1);
          $ArraySali = json_decode(curl_exec($Allsalida));
          ?>
          <select name="idSalida" id="" class="form-control">
            <?php foreach ($ArraySali as $salida) {?>
              <option value="<?php echo $salida->idSalida; ?>"><?php echo $salida -> idSalida ?></option>
            <?php } ?>
          </select>
              </div>

              <div class="form-group col-md-6">
              <label for="exampleInputEmail1">idCliente</label><br>
                <?php
          $url = "http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/clientes.php?op=GetAll";
          $Allcliente = curl_init();
          curl_setopt($Allcliente, CURLOPT_URL, $url);
          curl_setopt($Allcliente, CURLOPT_RETURNTRANSFER,1);
          $ArrayClien = json_decode(curl_exec($Allcliente));
          ?>
          <select name="idCliente" id="" class="form-control ">
            <?php foreach ($ArrayClien as $cliente) {?>
              <option value="<?php echo $cliente->idCliente; ?>"><?php echo $cliente -> nombreCliente ?></option>
            <?php } ?>
          </select>
              </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">idEmpleado</label><br>
                <?php
          $url = "http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/empleados.php?op=GetAll";
          $Allempleado = curl_init();
          curl_setopt($Allempleado, CURLOPT_URL, $url);
          curl_setopt($Allempleado, CURLOPT_RETURNTRANSFER,1);
          $ArrayEmple = json_decode(curl_exec($Allempleado));
          ?>
          <select name="idEmpleado" id="" class="form-control">
            <?php foreach ($ArrayEmple as $empleado) {?>
              <option value="<?php echo $empleado->idEmpleado; ?>"><?php echo $empleado -> nombreEmpleado ?></option>
            <?php } ?>
          </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEspecialidad">fechaEntrada</label>
                <input type="date" class="form-control" id="exampleInputEspecialidad"  name="fechaEntrada">
              </div>
              <div class="form-group">
                <label for="exampleInputEspecialidad">horaEntrada</label>
                <input type="time" class="form-control" id="exampleInputEspecialidad"  name="horaEntrada">
              </div>
              <div class="form-group">
                <label for="exampleInputEspecialidad">observaciones</label>
                <input type="text" class="form-control" id="exampleInputEspecialidad"  name="observaciones">
              </div>
              <div class="form-check">
                <input type="submit" class="btn bg-lime" name="guardar" value="Registrar">
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>