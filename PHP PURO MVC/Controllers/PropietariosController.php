<?php 
/**
* 
*/
class PropietariosController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('Views/Propietarios/bienvenido.php');
	}

	function register(){
		require_once('Views/Propietarios/register.php');
	}

	function save(){
		
		$propietarios= new Propietarios(null, $_POST['cedula'],$_POST['primer_nombre'],$_POST['segundo_nombre'],$_POST['apellidos'],$_POST['direccion'],$_POST['telefono'],$_POST['ciudad']);

		Propietarios::save($propietarios);
		$this->show();
	}

	function show(){
		$listaPropietarios=Propietarios::all();

		require_once('Views/Propietarios/show.php');
	}

	function updateshow(){
		$id=$_REQUEST['idpropietarios'];
		$propietarios=Propietarios::searchById($id);
		require_once('Views/Propietarios/updateshow.php');
	}

	function update(){
		$propietarios = new Propietarios($_POST['id'],$_POST['cedula'],$_POST['primer_nombre'],$_POST['segundo_nombre'],$_POST['apellidos'],$_POST['direccion'],$_POST['telefono'],$_POST['ciudad']);
		Propietarios::update($propietarios);
		$this->show();
	}
	function delete(){
		$id=$_GET['id'];
		Propietarios::delete($id);
		$this->show();
	}

	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$propietarios=Propietarios::searchById($id);
			$listaPropietarios[]=$propietarios;
			//var_dump($id);
			//die();
			require_once('Views/Propietarios/show.php');
		} else {
			$listaPropietarios=Propietarios::all();

			require_once('Views/Propietarios/show.php');
		}
		
		
	}

	function error(){
		require_once('Views/Propietarios/error.php');
	}

}

?>