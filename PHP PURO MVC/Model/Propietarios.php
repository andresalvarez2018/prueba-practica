<?php 
/**
* 
*/
class Propietarios
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

	

	public static function save($Propietarios){
		$db=Db::getConnect();
				

		$insert=$db->prepare('INSERT INTO propietarios VALUES (NULL, :cedula,:primer_nombre,:segundo_nombre,:apellidos,:direccion,:telefono,:ciudad)');
		$insert->bindValue('cedula',$Propietarios->getCedula());
		$insert->bindValue('primer_nombre',$Propietarios->getPrimer_nombre());
		$insert->bindValue('segundo_nombre',$Propietarios->getSegundo_nombre());
		$insert->bindValue('apellidos',$Propietarios->getApellidos());
		$insert->bindValue('direccion',$Propietarios->getDireccion());	
		$insert->bindValue('telefono',$Propietarios->getTelefono());	
		$insert->bindValue('ciudad',$Propietarios->getCiudad());		
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaPropietarios=[];

		$select=$db->query('SELECT * FROM propietarios order by id');

		foreach($select->fetchAll() as $Propietarios){
			$listaPropietarios[]=new Propietarios($Propietarios['id'],$Propietarios['cedula'],$Propietarios['primer_nombre']
				,$Propietarios['segundo_nombre'],$Propietarios['apellidos'],$Propietarios['direccion'],$Propietarios['telefono'],$Propietarios['ciudad']);
		}
		return $listaPropietarios;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM propietarios WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$PropietariosDb=$select->fetch();


		$Propietarios = new Propietarios ($PropietariosDb['id'],$PropietariosDb['cedula'], $PropietariosDb['primer_nombre'], $PropietariosDb['segundo_nombre'], $PropietariosDb['apellidos'], $PropietariosDb['direccion'], $PropietariosDb['telefono'], $PropietariosDb['ciudad']);
		
		return $Propietarios;

	}

	public static function update($Propietarios){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE propietarios SET cedula=:cedula, primer_nombre=:primer_nombre, segundo_nombre=:segundo_nombre, apellidos=:apellidos, direccion=:direccion, telefono=:telefono, ciudad=:ciudad WHERE id=:id');
		$update->bindValue('cedula', $Propietarios->getCedula());
		$update->bindValue('primer_nombre',$Propietarios->getPrimer_nombre());
		$update->bindValue('segundo_nombre',$Propietarios->getSegundo_nombre());
		$update->bindValue('apellidos',$Propietarios->getApellidos());
		$update->bindValue('direccion',$Propietarios->getDireccion());
		$update->bindValue('telefono',$Propietarios->getTelefono());
		$update->bindValue('ciudad',$Propietarios->getCiudad());
		$update->bindValue('id',$Propietarios->getId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM Propietarios WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>