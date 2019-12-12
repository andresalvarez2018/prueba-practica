<div class="container">
	<h2>Actualizar propietarios</h2>
	<form action="?controller=propietarios&&action=update" method="POST">
		<input type="hidden" name="id" value="<?php echo $propietarios->getId() ?>" >
		  <div class="col-sm-10">
			<label for="text">Cedula</label>
			<input type="text" name="cedula" id="cedula" class="form-control" value="<?php echo $propietarios->getCedula() ?>">		
			<label for="text">Primer Nombre</label>
		      <input type="text" name="primer_nombre" class="form-control" value="<?php echo $propietarios->getPrimer_nombre() ?>">
		       <label for="text">Segundo Nombre</label>
		      <input type="text" name="segundo_nombre" class="form-control" value="<?php echo $propietarios->getSegundo_nombre() ?>">
		       <label for="text">Apellidos</label>
		      <input type="text" name="apellidos" class="form-control" value="<?php echo $propietarios->getApellidos() ?>">
		       <label for="text">Direccion</label>
		      <input type="text" name="direccion" class="form-control" value="<?php echo $propietarios->getDireccion() ?>">
		       <label for="text">Telefono</label>
		      <input type="text" name="telefono" class="form-control" value="<?php echo $propietarios->getTelefono() ?>">
		      <label for="text">Ciudad</label>
		      <input type="text" name="ciudad" class="form-control" value="<?php echo $propietarios->getCiudad() ?>">
		<button type="submit" class="btn btn-primary">Actualizar</button>
		</div>
	</form>
</div>