<?php 
/**
* 
*/
class VehiculoController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('Views/Vehiculo/bienvenido.php');
	}

	function register(){
		require_once('Views/Vehiculo/register.php');
	}

	function save(){
		
		$vehiculo= new Vehiculo(null, $_POST['placa'],$_POST['color'],$_POST['marca'],$_POST['tipo_vehiculo'],$_POST['conductor'],$_POST['propietario']);

		Vehiculo::save($vehiculo);
		$this->show();
	}

	function show(){
		$listaVehiculo=Vehiculo::all();

		require_once('Views/Vehiculo/show.php');
	}

	function updateshow(){
		$id=$_REQUEST['idvehiculo'];
		$vehiculo=Vehiculo::searchById($id);
		require_once('Views/Vehiculo/updateshow.php');
	}

	function update(){
		$vehiculo = new Vehiculo($_POST['id'],$_POST['placa'],$_POST['color'],$_POST['marca'],$_POST['tipo_vehiculo'],$_POST['conductor'],$_POST['propietario']);
		Vehiculo::update($vehiculo);
		$this->show();
	}
	function delete(){
		$id=$_GET['id'];
		Vehiculo::delete($id);
		$this->show();
	}

	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$vehiculo=Vehiculo::searchById($id);
			$listaVehiculo[]=$vehiculo;
			//var_dump($id);
			//die();
			require_once('Views/Vehiculo/show.php');
		} else {
			$listaVehiculo=Vehiculo::all();

			require_once('Views/Vehiculo/show.php');
		}
		
		
	}

	function error(){
		require_once('Views/Vehiculo/error.php');
	}

}

?>