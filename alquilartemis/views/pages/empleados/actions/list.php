<?php

$url ="http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/empleados.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
 /* print_r($output); */


?>


<div class="card">
    <div class="card-header">
    
    <!-- Button trigger modal -->
<button type="button" class="btn bg-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Nuevo Empleado
</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="bg-warning">
        <tr>
        <th>Nombre</th>
        <th>Celular</th>
        <th>Direccion</th>
        <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($output as $out)
                {
            ?>
        <tr>
        <td><?php echo $out -> nombreEmpleado ?> </td>
        <td><?php echo $out -> celularEmpleado ?> </td>
        <td><?php echo $out -> direccionEmpleado ?> </td>
        <td>
          <form action="http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/empleados.php?op=delete" method="post">
            <input type="hidden" name="idEmpleado" value="<?php echo $out->idEmpleado ?>">
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
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Añadir empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/empleados.php?op=insert" method="post">
            <p>Por favor llenar todos los espacios con la infromación correspondiente</p>
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre Completo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nombreEmpleado">
              </div>
              <div class="form-group">
                <label for="exampleInputEdad">Celular</label>
                <input type="number" class="form-control" id="exampleInputEdad"  name="celularEmpleado">
              </div>
              <div class="form-group">
                <label for="exampleInputEspecialidad">Direccion</label>
                <input type="text" class="form-control" id="exampleInputEspecialidad"  name="direccionEmpleado">
              </div>
              <div class="form-check">
                <input type="submit" class="btn bg-warning" name="guardar" value="Registrar">
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