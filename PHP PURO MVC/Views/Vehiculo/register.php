<div class="container">
  <h5>Registrar Vehiculo</h5>
  <form action="?controller=vehiculo&&action=save" method="POST">
    <div class="col-sm-10">
      <label for="text">Placa</label>
      <input type="text" class="form-control" id="placa" placeholder="Ingrese la Placa" name="placa">   
      <label for="text">Color</label>
      <input type="text" name="color" class="form-control" placeholder="Ingrese el Color">
       <label for="text">Marca</label>
      <input type="text" name="marca" class="form-control" placeholder="Ingrese la Marca">
       <label for="text">Tipo de Vehiculo</label>
      <input type="text" name="tipo_vehiculo" class="form-control" placeholder="Ingrese el tipo de vehiculo">
       <label for="text">Conductor</label>
      <div class="input-group mb-3">
        
        <select class="custom-select" name="conductor" id="inputGroupSelect01">
          <option selected>Selecciona...</option>
         
            <?php
          $mysql = new mysqli("localhost", "root", "", "acme");
          if ($mysql->connect_error)
          die("Problemas con la conexión a la base de datos");

          $registros = $mysql->query("select id,cedula from conductores") or
          die($mysql->error);
            while ($reg = $registros->fetch_array()) {  
          ?>
          <option value="<?php echo $reg['id']?>"><?php echo $reg['cedula']?></option>
          <?php
          }
          $mysql->close();
          ?>
        </select>
      </div>
     
       <label for="text">Propietario</label>
       <div class="input-group mb-3">
        
        <select class="custom-select" name="propietario" id="inputGroupSelect01">
          <option selected>Selecciona...</option>
         
            <?php
          $mysql = new mysqli("localhost", "root", "", "acme");
          if ($mysql->connect_error)
          die("Problemas con la conexión a la base de datos");

          $registros = $mysql->query("select id,cedula from propietarios") or
          die($mysql->error);
            while ($reg = $registros->fetch_array()) {  
          ?>
          <option value="<?php echo $reg['id']?>"><?php echo $reg['cedula']?></option>
          <?php
          }
          $mysql->close();
          ?>
        </select>
      </div>
      
    
    
    <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
      </form>
</div>