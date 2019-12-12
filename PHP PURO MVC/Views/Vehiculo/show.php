

<div class="container">
	<h2>Lista vehiculos</h2>
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
					<th>Placas</th>
					<th>Color</th>
					<th>Marca</th>
					<th>Tipo de Vehiculo</th>
					<th>Conductor</th>
					<th>Propietario</th>
				</tr>
				<tbody>
					<?php foreach ($listaVehiculo as$vehiculo) {?>

					
					<tr>
						<td> <a href="?controller=vehiculo&&action=updateshow&&idvehiculo=<?php  echo $vehiculo->getId()?>"> <?php echo $vehiculo->getId(); ?></a> </td>
						<td><?php echo $vehiculo->getPlaca(); ?></td>
						<td><?php echo $vehiculo->getColor(); ?></td>
						<td><?php echo $vehiculo->getMarca(); ?></td>
						<td><?php echo $vehiculo->getTipo_vehiculo(); ?></td>
						<td><?php echo $vehiculo->getConductor(); ?></td>
						<td><?php echo $vehiculo->getPropietario(); ?></td>

						
						<td><a href="?controller=vehiculo&&action=delete&&id=<?php echo $vehiculo->getId() ?>">Eliminar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>