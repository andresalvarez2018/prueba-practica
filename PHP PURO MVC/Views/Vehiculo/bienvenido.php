<div class="alert alert-success">
  <strong>Bienvenido!</strong>.
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Placa</th>
      <th scope="col">Marca</th>
      <th scope="col">Nombre Conductor</th>
      <th scope="col">Nombre Propietario</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $mysql = new mysqli("localhost", "root", "", "acme");
  	if ($mysql->connect_error)
  		die("Problemas con la conexión a la base de datos");

  $registros = $mysql->query("SELECT vehiculo.id as id,placa,marca,concat(conductores.primer_nombre, ' ',conductores.segundo_nombre,' ',conductores.apellidos ) as conductor , concat(propietarios.primer_nombre,' ',propietarios.segundo_nombre,' ', propietarios.apellidos) as propietario FROM vehiculo inner join conductores on vehiculo.conductor=conductores.id inner join propietarios on vehiculo.propietario=propietarios.id order by vehiculo.id") or
  die($mysql->error);
    while ($reg = $registros->fetch_array()) {  
  ?>  
  
    <tr>
      <th scope="row"><?php echo $reg['id']?></th>
      <td><?php echo $reg['placa']?></td>
      <td><?php echo $reg['marca']?></td>
      <td><?php echo $reg['conductor']?></td>
      <td><?php echo $reg['propietario']?></td>
    </tr>
    <?php
  }
  $mysql->close();
  ?>
    </tbody>
</table>
