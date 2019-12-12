<div class="container">
  <h5>Registrar Vehiculo</h5>
  <form action="?controller=conductores&&action=save" method="POST">
    <div class="col-sm-10">
      <label for="text">Cedula</label>
      <input type="text" class="form-control" id="cedula" placeholder="Ingrese la Cedula" name="cedula">   
      <label for="text">Primer Nombre</label>
      <input type="text" name="primer_nombre" class="form-control" placeholder="Ingrese el Primer Nombre">
       <label for="text">Segundo nombre</label>
      <input type="text" name="segundo_nombre" class="form-control" placeholder="Ingrese el Segundo Nombre">
       <label for="text">Apellidos</label>
      <input type="text" name="apellidos" class="form-control" placeholder="Ingrese el Apellidos">
       <label for="text">Direccion</label>
      <input type="text" name="direccion" class="form-control" placeholder="selecione la Direccion">
       <label for="text">Telefono</label>
      <input type="text" name="telefono" class="form-control" placeholder="selecione el Telefono">
       <label for="text">Ciudad</label>
      <input type="text" name="ciudad" class="form-control" placeholder="selecione la Ciudad">
    
    
    <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
      </form>
</div>