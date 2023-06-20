<?php

$url ="http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/inventario.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
 /* print_r($output); */


?>


<div class="card">
    <div class="card-header">
    
    <!-- Button trigger modal -->
<button type="button" class="btn bg-orange" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Inventario
</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="bg-orange">
        <tr>
        
        <th>idProducto</th>
        <th>CantidadInicial</th>
        <th>CantidadIngresos</th>
        <th>CantidadSalidas</th>
        <th>CantidadFinal</th>
        <th>FechaInventario</th>
        <th>TipoOperacion</th>
        <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($output as $out)
                {
                $urlP ="http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/inventario.php?op=GetIdProducto";

              $dataP = array(
                  'idProducto' => $out -> idProducto
              );
  
  
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $urlP);
              curl_setopt($ch, CURLOPT_POST,true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataP)); 
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          
             
  
  
              $productos = json_decode( curl_exec ($ch));
              curl_close($ch);

            ?>
        <tr>
        <td><?php foreach($productos as $producto){
        echo $producto -> nombreProducto; }?> </td>
        <td><?php echo $out -> CantidadInicial ?> </td>
        <td><?php echo $out -> CantidadIngresos ?> </td>
        <td><?php echo $out -> CantidadSalidas ?> </td>
        <td><?php echo $out -> CantidadFinal ?> </td>
        <td><?php echo $out -> FechaInventario ?> </td>
        <td><?php echo $out -> TipoOperacion ?> </td>
        <td>
          <form action="http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/inventario.php?op=delete" method="post">
            <input type="hidden" name="idInventario" value="<?php echo $out->idInventario ?>">
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
      <div class="modal-header bg-orange">
        <h5 class="modal-title" id="exampleModalLabel">Información del Inventario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/inventario.php?op=insert" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">idProducto</label>
                <?php
          $url = "http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/productos.php?op=GetAll";
          $AllProducto = curl_init();
          curl_setopt($AllProducto, CURLOPT_URL, $url);
          curl_setopt($AllProducto, CURLOPT_RETURNTRANSFER,1);
          $ArrayPro = json_decode(curl_exec($AllProducto));
          
          ?>
          <select name="idProducto" id="" class="form-control">
            <?php foreach ($ArrayPro as $producto) {?>
              <option value="<?php echo $producto->idProducto; ?>"><?php echo $producto -> nombreProducto ?></option>
            <?php } ?>
          </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">CantidadInicial</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="CantidadInicial">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">CantidadIngresos</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="CantidadIngresos">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">CantidadSalidas</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="CantidadSalidas">
              </div>
              <div class="form-group">
                <label for="exampleInputEdad">CantidadFinal</label>
                <input type="number" class="form-control" id="exampleInputEdad"  name="CantidadFinal">
              </div>
              <div class="form-group">
                <label for="exampleInputEdad">FechaInventario</label>
                <input type="date" class="form-control" id="exampleInputEdad"  name="FechaInventario">
              </div>
              <div class="form-group">
                <label for="exampleInputEdad">TipoOperacion</label>
                <input type="text" class="form-control" id="exampleInputEdad"  name="TipoOperacion">
              </div>
              <div class="form-check">
                <input type="submit" class="btn bg-orange" name="guardar" value="Registrar">
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