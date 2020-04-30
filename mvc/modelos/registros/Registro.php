<?php
class Registro
{
	private $matricula;
	private $nombre;
	private $paterno;
	private $materno;
	private $telefono;
	private $rfc;
	private $curp;
	private $edo_civil;
	private $fecha_nac;
	private $calle;
	private $numero;
	private $colonia;
	private $municipio;
	private $correo;
  private $id_usuario;
  private $nivel;
	private $grado;

  public function __construct($matricula=null, $nombre=null, $paterno=null, $materno=null,$telefono=null,$rfc=null,$curp=null,$edo_civil=null,$fecha_nac=null,$calle=null,$numero=null,$colonia=null,$municipio=null,$correo=null,$id_usuario=null,$nivel=null,$grado=null)
  {
    $this->matricula = $matricula;
    $this->nombre = $nombre;
    $this->paterno = $paterno;
    $this->materno = $materno;
    $this->telefono= $telefono;
    $this->rfc= $rfc;
    $this->curp= $curp;
    $this->edo_civil=$edo_civil;
    $this->fecha_nac=$fecha_nac;
    $this->calle=$calle;
    $this->numero=$numero;
    $this->colonia=$colonia;
    $this->municipio=$municipio;
    $this->correo=$correo;
    $this->id_usuario=$id_usuario;
    $this->nivel=$nivel;
		$this->grado=$grado;
  }
 function getMatricula()
  {
  	return $this->matricula;
  }
  function getNombre()
  {
  	return $this->nombre;
  }
  function getPaterno()
  {
  	return $this->paterno;
  }
  function getMaterno()
  {
  	return $this->materno;
  }
  function getTelefono()
  {
  	return $this->telefono;
  }
  function getRFC()
  {
  	return $this->rfc;
  }
  function getCURP()
  {
  	return $this->curp;
  }
  function getEdo_Civil()
  {
  	return $this->edo_civil;
  }
  function getFecha_Nac()
  {
  	return $this->fecha_nac;
  }
  function getCalle()
  {
  	return $this->calle;
  }
  function getNumero()
  {
  	return $this->numero;
  }
  function getColonia()
  {
  	return $this->colonia;
  }
  function getMunicipio()
  {
  	return $this->municipio;
  }
  function getCorreo()
  {
  	return $this->correo;
  }
  function getId_Usuario()
  {
    return $this->id_usuario;
  }
  function getNivel()
  {
    return $this->nivel;
  }
	function getGrado()
	{
		return $this->grado;
	}
  function setMatricula($matricula)
  {
  	$this->matricula=$matricula;
  }
  function setNombre($nombre)
  {
  	$this->nombre=$nombre;
  }
  function setPaterno($paterno)
  {
  	$this->paterno=$paterno;
  }
  function setMaterno($paterno)
  {
  	$this->materno=$paterno;
  }
  function setTelefono($telefono)
  {
  	$this->telefono=$telefono;
  }
  function setRFC($rfc)
  {
  	$this->rfc=$rfc;
  }
  function setCURP($curp)
  {
  	$this->curp=$curp;
  }
  function setEdoCivil($edo_civil)
  {
  	$this->edo_civil=$edo_civil;
  }
  function setFecha_Nac($fecha_nac)
  {
  	$this->fecha_nac=$fecha_nac;
  }
  function setCalle($calle)
  {
  	$this->calle=$calle;
  }
  function setNumero($numero)
  {
  	$this->numero=$numero;
  }
  function setColonia($colonia)
  {
  	$this->colonia=$colonia;
  }
  function setMunicipio($municipio)
  {
  	$this->municipio=$municipio;
  }
  function setCorreo($correo)
  {
  	$this->correo=$correo;
  }
  function setId_Usuario($id_usuario)
  {
    $this->id_usuario=$id_usuario;
  }
  function setNivel($nivel)
  {
    $this->nivel=$nivel;
  }
	function setGrado($grado)
	{
		$this->grado=$grado;
	}




}
?>
