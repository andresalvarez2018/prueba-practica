<div class="container">
	<h2>Actualizar vehiculo</h2>
	<form action="?controller=vehiculo&&action=update" method="POST">
		<input type="hidden" name="id" value="<?php echo $vehiculo->getId() ?>" >
		  <div class="col-sm-10">
			<label for="text">Placa</label>
			<input type="text" name="placa" id="placa" class="form-control" value="<?php echo $vehiculo->getPlaca() ?>">		
			<label for="text">Color</label>
		      <input type="text" name="color" class="form-control" value="<?php echo $vehiculo->getColor() ?>">
		       <label for="text">Marca</label>
		      <input type="text" name="marca" class="form-control" value="<?php echo $vehiculo->getMarca() ?>">
		       <label for="text">Tipo de Vehiculo</label>
		      <input type="text" name="tipo_vehiculo" class="form-control" value="<?php echo $vehiculo->getTipo_vehiculo() ?>">
		       <label for="text">Conductor</label>
		      <input type="text" name="conductor" class="form-control" value="<?php echo $vehiculo->getConductor() ?>">
		       <label for="text">Propietario</label>
		      <input type="text" name="propietario" class="form-control" value="<?php echo $vehiculo->getPropietario() ?>">
		<button type="submit" class="btn btn-primary">Actualizar</button>
		</div>
	</form>
</div>