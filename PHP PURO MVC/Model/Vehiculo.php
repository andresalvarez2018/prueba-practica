<?php 
/**
* 
*/
class Vehiculo
{
	private $id;
	private $placa;
	private $color;
	private $marca;
	private $tipo_vehiculo;
	private $conductor;
	private $propietario;

	
	function __construct($id, $placa,$color, $marca, $tipo_vehiculo, $conductor, $propietario)
	{
		$this->setId($id);
		$this->setPlaca($placa);
		$this->setColor($color);
		$this->setMarca($marca);	
		$this->setTipo_vehiculo($tipo_vehiculo);	
		$this->setConductor($conductor);	
		$this->setPropietario($propietario);		
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getplaca(){
		return $this->placa;
	}

	public function setPlaca($placa){
		$this->placa = $placa;
	}

	public function getcolor(){
		return $this->color;
	}

	public function setColor($color){
		$this->color = $color;
	}
	public function getmarca(){
		return $this->marca;
	}

	public function setMarca($marca){
		$this->marca = $marca;
	}
	public function getTipo_vehiculo(){
		return $this->tipo_vehiculo;
	}

	public function setTipo_vehiculo($tipo_vehiculo){
		$this->tipo_vehiculo = $tipo_vehiculo;
	}
	public function getconductor(){
		return $this->conductor;
	}

	public function setConductor($conductor){
		$this->conductor = $conductor;
	}
	public function getpropietario(){
		return $this->propietario;
	}

	public function setPropietario($propietario){
		$this->propietario = $propietario;
	}

	

	public static function save($vehiculo){
		$db=Db::getConnect();
				

		$insert=$db->prepare('INSERT INTO vehiculo VALUES (NULL, :placa,:color,:marca,:tipo_vehiculo,:conductor,:propietario)');
		$insert->bindValue('placa',$vehiculo->getplaca());
		$insert->bindValue('color',$vehiculo->getcolor());
		$insert->bindValue('marca',$vehiculo->getmarca());
		$insert->bindValue('tipo_vehiculo',$vehiculo->gettipo_vehiculo());
		$insert->bindValue('conductor',$vehiculo->getconductor());	
		$insert->bindValue('propietario',$vehiculo->getpropietario());		
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaVehiculos=[];

		$select=$db->query('SELECT vehiculo.id as id,placa,color,marca,tipo_vehiculo,conductores.cedula as cedula ,propietarios.cedula as propietario FROM vehiculo inner join conductores on vehiculo.conductor=conductores.id inner join propietarios on vehiculo.propietario=propietarios.id order by vehiculo.id');

		foreach($select->fetchAll() as $vehiculo){
			$listaVehiculos[]=new Vehiculo($vehiculo['id'],$vehiculo['placa'],$vehiculo['color']
				,$vehiculo['marca'],$vehiculo['tipo_vehiculo'],$vehiculo['cedula'],$vehiculo['propietario']);
		}
		return $listaVehiculos;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM vehiculo WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$vehiculoDb=$select->fetch();


		$vehiculo = new vehiculo ($vehiculoDb['id'],$vehiculoDb['placa'], $vehiculoDb['color'], $vehiculoDb['marca'], $vehiculoDb['tipo_vehiculo'], $vehiculoDb['conductor'], $vehiculoDb['propietario']);
		
		return $vehiculo;

	}

	public static function update($vehiculo){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE vehiculo SET placa=:placa, color=:color, marca=:marca, tipo_vehiculo=:tipo_vehiculo, conductor=:conductor, propietario=:propietario WHERE id=:id');
		$update->bindValue('placa', $vehiculo->getPlaca());
		$update->bindValue('color',$vehiculo->getColor());
		$update->bindValue('marca',$vehiculo->getMarca());
		$update->bindValue('tipo_vehiculo',$vehiculo->getTipo_vehiculo());
		$update->bindValue('conductor',$vehiculo->getConductor());
		$update->bindValue('propietario',$vehiculo->getPropietario());
		$update->bindValue('id',$vehiculo->getId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM vehiculo WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>