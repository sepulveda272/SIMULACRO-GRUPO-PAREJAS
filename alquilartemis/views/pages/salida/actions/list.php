<?php

$url ="http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salida.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
 /* print_r($output); */


?>


<div class="card">
    <div class="card-header">
    
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar
</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
        <th>idCliente</th>
        <th>idEmpleado</th>
        <th>fechaSalida</th>
        <th>horaSalida</th>
        <th>subtotalPeso</th>
        <th>placaTransporte</th>
        <th>observaciones</th>
        <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($output as $out)
                {
            ?>
        <tr>
        <td><?php echo $out -> idCliente ?> </td>
        <td><?php echo $out -> idEmpleado ?> </td>
        <td><?php echo $out -> fechaSalida ?> </td>
        <td><?php echo $out -> horaSalida ?> </td>
        <td><?php echo $out -> subtotalPeso ?> </td>
        <td><?php echo $out -> placaTransporte ?> </td>
        <td><?php echo $out -> observaciones ?> </td>
        <td>
          <form action="http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salida.php?op=delete" method="post">
            <input type="hidden" name="idSalida" value="<?php echo $out->idSalida ?>">
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
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir salida</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salida.php?op=insert" method="post">
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">idCliente</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="idCliente">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">idEmpleado</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="idEmpleado">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">fechaSalida</label>
                <input type="date" class="form-control" id="exampleInputEmail1" name="fechaSalida">
              </div>
              <div class="form-group">
                <label for="exampleInputEdad">horaSalida</label>
                <input type="text" class="form-control" id="exampleInputEdad"  name="horaSalida">
              </div>
              <div class="form-group">
                <label for="exampleInputEspecialidad">subtotalPeso</label>
                <input type="number" class="form-control" id="exampleInputEspecialidad"  name="subtotalPeso">
              </div>
              <div class="form-group">
                <label for="exampleInputEspecialidad">placaTransporte</label>
                <input type="text" class="form-control" id="exampleInputEspecialidad"  name="placaTransporte">
              </div>
              <div class="form-group">
                <label for="exampleInputEspecialidad">observaciones</label>
                <input type="text" class="form-control" id="exampleInputEspecialidad"  name="observaciones">
              </div>
              <div class="form-check">
                <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
              </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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