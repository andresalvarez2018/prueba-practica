

<div class="container">
	<h2>Lista Conductores</h2>
	<form class="form-inline" action="?controller=vehiculo&action=index" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-search"> </span>Inicio</button>
			</div>
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					
					<th>Id</th>
					<th>Cedula</th>
					<th>Primer Nombre</th>
					<th>Segundo Nombre</th>
					<th>Apellidos</th>
					<th>Dirección</th>
					<th>Telefono</th>
					<th>Ciudad</th>
				</tr>
				<tbody>
					<?php foreach ($listaConductores as$conductores) {?>

					
					<tr>
						<td> <a href="?controller=conductores&&action=updateshow&&idconductores=<?php  echo $conductores->getId()?>"> <?php echo $conductores->getId(); ?></a> </td>
						<td><?php echo $conductores->getCedula(); ?></td>
						<td><?php echo $conductores->getPrimer_nombre(); ?></td>
						<td><?php echo $conductores->getSegundo_nombre(); ?></td>
						<td><?php echo $conductores->getApellidos(); ?></td>
						<td><?php echo $conductores->getDireccion(); ?></td>
						<td><?php echo $conductores->getTelefono(); ?></td>
						<td><?php echo $conductores->getCiudad(); ?></td>

						
						<td><a href="?controller=conductores&&action=delete&&id=<?php echo $conductores->getId() ?>">Eliminar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>