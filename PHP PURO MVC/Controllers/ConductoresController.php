<?php 
/**
* 
*/
class ConductoresController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('Views/Conductores/bienvenido.php');
	}

	function register(){
		require_once('Views/Conductores/register.php');
	}

	function save(){
		
		$conductores= new Conductores(null, $_POST['cedula'],$_POST['primer_nombre'],$_POST['segundo_nombre'],$_POST['apellidos'],$_POST['direccion'],$_POST['telefono'],$_POST['ciudad']);

		Conductores::save($conductores);
		$this->show();
	}

	function show(){
		$listaConductores=Conductores::all();

		require_once('Views/Conductores/show.php');
	}

	function updateshow(){
		$id=$_REQUEST['idconductores'];
		$conductores=Conductores::searchById($id);
		require_once('Views/Conductores/updateshow.php');
	}

	function update(){
		$conductores = new Conductores($_POST['id'],$_POST['cedula'],$_POST['primer_nombre'],$_POST['segundo_nombre'],$_POST['apellidos'],$_POST['direccion'],$_POST['telefono'],$_POST['ciudad']);
		Conductores::update($conductores);
		$this->show();
	}
	function delete(){
		$id=$_GET['id'];
		Conductores::delete($id);
		$this->show();
	}

	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$conductores=Conductores::searchById($id);
			$listaConductores[]=$conductores;
			//var_dump($id);
			//die();
			require_once('Views/Conductores/show.php');
		} else {
			$listaConductores=Conductores::all();

			require_once('Views/Conductores/show.php');
		}
		
		
	}

	function error(){
		require_once('Views/Conductores/error.php');
	}

}

?>