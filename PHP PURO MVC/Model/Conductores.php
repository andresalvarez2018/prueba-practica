<?php 
/**
* 
*/
class Conductores
{
	private $id;
	private $cedula;
	private $primer_nombre;
	private $segundo_nombre;
	private $apellidos;
	private $direccion;
	private $telefono;
	private $ciudad;


	
	function __construct($id, $cedula,$primer_nombre, $segundo_nombre, $apellidos, $direccion, $telefono,$ciudad)
	{
		$this->setId($id);
		$this->setCedula($cedula);
		$this->setPrimer_nombre($primer_nombre);
		$this->setSegundo_nombre($segundo_nombre);	
		$this->setApellidos($apellidos);	
		$this->setDireccion($direccion);	
		$this->setTelefono($telefono);
		$this->setCiudad($ciudad);		
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getCedula(){
		return $this->cedula;
	}

	public function setCedula($cedula){
		$this->cedula = $cedula;
	}

	public function getPrimer_nombre(){
		return $this->primer_nombre;
	}

	public function setPrimer_nombre($primer_nombre){
		$this->primer_nombre = $primer_nombre;
	}
	public function getSegundo_nombre(){
		return $this->segundo_nombre;
	}

	public function setSegundo_nombre($segundo_nombre){
		$this->segundo_nombre = $segundo_nombre;
	}
	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}
	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}
	public function getCiudad(){
		return $this->ciudad;
	}

	public function setCiudad($ciudad){
		$this->ciudad = $ciudad;
	}

	

	public static function save($conductores){
		$db=Db::getConnect();
				

		$insert=$db->prepare('INSERT INTO conductores VALUES (NULL, :cedula,:primer_nombre,:segundo_nombre,:apellidos,:direccion,:telefono,:ciudad)');
		$insert->bindValue('cedula',$conductores->getCedula());
		$insert->bindValue('primer_nombre',$conductores->getPrimer_nombre());
		$insert->bindValue('segundo_nombre',$conductores->getSegundo_nombre());
		$insert->bindValue('apellidos',$conductores->getApellidos());
		$insert->bindValue('direccion',$conductores->getDireccion());	
		$insert->bindValue('telefono',$conductores->getTelefono());	
		$insert->bindValue('ciudad',$conductores->getCiudad());		
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaConductores=[];

		$select=$db->query('SELECT * FROM conductores order by id');

		foreach($select->fetchAll() as $conductores){
			$listaConductores[]=new Conductores($conductores['id'],$conductores['cedula'],$conductores['primer_nombre']
				,$conductores['segundo_nombre'],$conductores['apellidos'],$conductores['direccion'],$conductores['telefono'],$conductores['ciudad']);
		}
		return $listaConductores;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM conductores WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$conductoresDb=$select->fetch();


		$conductores = new conductores ($conductoresDb['id'],$conductoresDb['cedula'], $conductoresDb['primer_nombre'], $conductoresDb['segundo_nombre'], $conductoresDb['apellidos'], $conductoresDb['direccion'], $conductoresDb['telefono'], $conductoresDb['ciudad']);
		
		return $conductores;

	}

	public static function update($conductores){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE conductores SET cedula=:cedula, primer_nombre=:primer_nombre, segundo_nombre=:segundo_nombre, apellidos=:apellidos, direccion=:direccion, telefono=:telefono, ciudad=:ciudad WHERE id=:id');
		$update->bindValue('cedula', $conductores->getCedula());
		$update->bindValue('primer_nombre',$conductores->getPrimer_nombre());
		$update->bindValue('segundo_nombre',$conductores->getSegundo_nombre());
		$update->bindValue('apellidos',$conductores->getApellidos());
		$update->bindValue('direccion',$conductores->getDireccion());
		$update->bindValue('telefono',$conductores->getTelefono());
		$update->bindValue('ciudad',$conductores->getCiudad());
		$update->bindValue('id',$conductores->getId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM conductores WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>