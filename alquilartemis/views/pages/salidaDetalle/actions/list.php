<?php

$url ="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salidaDetalle.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
 /* print_r($output); */


?>


<div class="card">
    <div class="card-header">
    
    <!-- Button trigger modal -->
<button type="button" class="btn bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Detalles de la Salida
</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead class="bg-danger"> 
        <tr>
        <th>idSalida</th>
        <th>idProducto</th>
        <th>idCliente</th>
        <th>idEmpleado</th>
        <th>cantidadSalida</th>
        <th>cantidadPropia</th>
        <th>cantidadSubalquilada</th>
        <th>valorUnidad</th>
        <th>fechaStandBye</th>
        <th>estado</th>
        <th>valorTotal</th>
        <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($output as $out)
                {
                $url = "http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salidaDetalle.php?op=GetIdCliente";
                $urlE ="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salidaDetalle.php?op=GetIdEmpleado";
                $urlS ="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salidaDetalle.php?op=GetIdSalida";
                $urlP ="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salidaDetalle.php?op=GetIdProducto";
                
                $dataS = array(
                  'idSalida' => $out -> idSalida
              );

        

              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $urlS);
              curl_setopt($ch, CURLOPT_POST,true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataS)); 
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          
             


              $salidas = json_decode( curl_exec ($ch));
              curl_close($ch);

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
            ?>
        <tr>
        <td><?php foreach($salidas as $salida){
        echo $salida -> idSalida; }?> </td>
        <td><?php foreach($productos as $producto){
        echo $producto -> nombreProducto; }?> </td>
        <td><?php foreach($clientes as $cliente){
        echo $cliente -> obraCliente; }?> </td>
        <td><?php foreach($empleados as $empleado){
        echo $empleado -> nombreEmpleado; }?> </td>
        <td><?php echo $out -> cantidadSalida ?> </td>
        <td><?php echo $out -> cantidadPropia ?> </td>
        <td><?php echo $out -> cantidadSubalquilada ?> </td>
        <td><?php echo $out -> valorUnidad ?> </td>
        <td><?php echo $out -> fechaStandBye ?> </td>
        <td><?php echo $out -> estado ?> </td>
        <td><?php echo $out -> valorTotal ?> </td>
        <td>
          <form action="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salidaDetalle.php?op=delete" method="post">
            <input type="hidden" name="idSalidaDetalle" value="<?php echo $out->idSalidaDetalle ?>">
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
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Información Detalles de Salidas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="http://localhost/SIMULACRO-GRUPO-PAREJAS/apirest/controllers/salidaDetalle.php?op=insert" method="post">
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
                <label for="exampleInputEmail1">idProducto</label><br>
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
              <option value="<?php echo $cliente->idCliente; ?>"><?php echo $cliente -> obraCliente ?></option>
            <?php } ?>
          </select>
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
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">cantidadSalida</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="cantidadSalida">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEdad">cantidadPropia</label>
                  <input type="number" class="form-control" id="exampleInputEdad"  name="cantidadPropia">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEspecialidad">cantidadSubalquilada</label>
                  <input type="number" class="form-control" id="exampleInputEspecialidad"  name="cantidadSubalquilada">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEspecialidad">valorUnidad</label>
                  <input type="number" class="form-control" id="exampleInputEspecialidad"  name="valorUnidad">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEspecialidad">fechaStandBye</label>
                <input type="date" class="form-control" id="exampleInputEspecialidad"  name="fechaStandBye">
              </div>
              <div class="form-group">
                <label for="exampleInputEspecialidad">estado</label>
                <input type="text" class="form-control" id="exampleInputEspecialidad"  name="estado">
              </div>
              <div class="form-group">
                <label for="exampleInputEspecialidad">valorTotal</label>
                <input type="number" class="form-control" id="exampleInputEspecialidad"  name="valorTotal">
              </div>
              <div class="form-check">
                <input type="submit" class="btn bg-danger" name="guardar" value="Registrar">
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