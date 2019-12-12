

<div class="container">
	<h2>Lista propietarios</h2>
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
					<?php foreach ($listaPropietarios as$propietarios) {?>

					
					<tr>
						<td> <a href="?controller=propietarios&&action=updateshow&&idpropietarios=<?php  echo $propietarios->getId()?>"> <?php echo $propietarios->getId(); ?></a> </td>
						<td><?php echo $propietarios->getCedula(); ?></td>
						<td><?php echo $propietarios->getPrimer_nombre(); ?></td>
						<td><?php echo $propietarios->getSegundo_nombre(); ?></td>
						<td><?php echo $propietarios->getApellidos(); ?></td>
						<td><?php echo $propietarios->getDireccion(); ?></td>
						<td><?php echo $propietarios->getTelefono(); ?></td>
						<td><?php echo $propietarios->getCiudad(); ?></td>

						
						<td><a href="?controller=propietarios&&action=delete&&id=<?php echo $propietarios->getId() ?>">Eliminar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>