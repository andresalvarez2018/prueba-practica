<?php 


$controllers=array(
	'vehiculo'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'conductores'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'propietarios'=>['index','register','save','show','updateshow','update','delete','search','error']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('vehiculo','error');
	}		
}else{
	call('vehiculo','error');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		case 'vehiculo':
		require_once('Model/Vehiculo.php');
		$controller= new VehiculoController();
		break;			
		case 'conductores':
		require_once('Model/Conductores.php');
		$controller= new ConductoresController();
		break;			
		case 'propietarios':
		require_once('Model/Propietarios.php');
		$controller= new PropietariosController();
		break;			
		default:
				# code...
		break;
	}
	$controller->{$action}();
}

?>