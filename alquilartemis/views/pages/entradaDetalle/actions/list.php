<?php

$url ="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/entradaDetalle.php?op=GetAll";
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
  Registrar Detalles de las Entradas
</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="bg-lime">
        <tr>
        <th>idEntrada</th>
        <th>idProducto</th>
        <th>idCliente</th>
        <th>entradaCantidad</th>
        <th>entradaCantidadPropia</th>
        <th>entradaCantidadSubalquilada</th>
        <th>estado</th>
        <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($output as $out)
                {
                  $url = "http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/entradaDetalle.php?op=GetIdCliente";
                  $urlP ="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salidaDetalle.php?op=GetIdProducto";

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
        <td><?php echo $out -> idEntrada ?> </td>
        <td><?php foreach($productos as $producto){
        echo $producto -> nombreProducto; }?> </td>
        <td><?php foreach($clientes as $cliente){
        echo $cliente -> nombreCliente; }?> </td>
        <td><?php echo $out -> entradaCantidad ?> </td>
        <td><?php echo $out -> entradaCantidadPropia ?> </td>
        <td><?php echo $out -> entradaCantidadSubalquilada ?> </td>
        <td><?php echo $out -> estado ?> </td>
        <td>
          <form action="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/entradaDetalle.php?op=delete" method="post">
            <input type="hidden" name="idEntradaDetalle" value="<?php echo $out->idEntradaDetalle ?>">
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
        <h5 class="modal-title" id="exampleModalLabel">Detalles de las Entradas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/entradaDetalle.php?op=insert" method="post">
          <p>Por favor llenar todos los espacios con la infromación correspondiente</p>
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">idEntrada</label><br>
                <?php
          $url = "http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/entreda.php?op=GetAll";
          $Allentrada = curl_init();
          curl_setopt($Allentrada, CURLOPT_URL, $url);
          curl_setopt($Allentrada, CURLOPT_RETURNTRANSFER,1);
          $ArrayEn = json_decode(curl_exec($Allentrada));
          ?>
          <select name="idEntrada" id="" class="form-control ">
            <?php foreach ($ArrayEn as $entrada) {?>
              <option value="<?php echo $entrada->idEntrada; ?>"><?php echo $entrada -> idEntrada ?></option>
            <?php } ?>
          </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">idProducto</label>
                <?php
          $url = "http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/productos.php?op=GetAll";
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
              <div class="form-row">
              
                  <label for="exampleInputEmail1">entradaCantidad</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="entradaCantidad">
                </div>
                <div class="form-row">
              
                  <label for="exampleInputEmail1">entradaCantidadPropia</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="entradaCantidadPropia">
                </div>
                <div class="form-row">
              
                  <label for="exampleInputEmail1">entradaCantidadSubalquilada</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="entradaCantidadSubalquilada">
                </div>
                <div class="form-row">
              
                  <label for="exampleInputEmail1">estado</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="estado">
                </div><br>
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