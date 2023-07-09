<?php

$url ="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/productos.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
 /* print_r($output); */


?>


<div class="card">
    <div class="card-header">
    
    <!-- Button trigger modal -->
<button type="button" class="btn bg-maroon" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Nuevo Producto
</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="bg-maroon">
        <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($output as $out)
                {
            ?>
        <tr>
        <td><?php echo $out -> nombreProducto ?> </td>
        <td><?php echo $out -> precioProducto ?> </td>
        <td>
          <form action="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/productos.php?op=delete" method="post">
            <input type="hidden" name="idProducto" value="<?php echo $out->idProducto ?>">
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
      <div class="modal-header bg-maroon">
        <h5 class="modal-title" id="exampleModalLabel">Infromación Nuevo Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/productos.php?op=insert" method="post">
          <p>Por favor llenar todos los espacios con la infromación correspondiente</p>
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre del producto</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nombreProducto">
              </div>
              <div class="form-group">
                <label for="exampleInputEdad">Precio (COP)</label>
                <input type="number" class="form-control" id="exampleInputEdad"  name="precioProducto">
              </div>
              <div class="form-check">
                <input type="submit" class="btn bg-maroon" name="guardar" value="Registrar">
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