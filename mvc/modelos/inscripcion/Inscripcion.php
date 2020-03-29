<?php

class Inscripcion 
{
	private $matricula;
	private $nombre;
	private $carrera;
	private $grado;
	private $grupo;
	private $usuario;
	private $claveconvocatoria;
	function __construct($matricula=null,$nombre=null,$carrera=null,$grado=null,$grupo=null,$usuario=null,$claveconvocatoria=null)
	{
		$this->matricula=$matricula;
		$this->nombre=$nombre;
		$this->carrera=$carrera;
		$this->grado=$grado;
		$this->grupo=$grupo;
		$this->usuario=$usuario;
		$this->claveconvocatoria=$claveconvocatoria;
	}

		function getMatricula()
		{
			return $this->matricula;
		}
		function getNombre()
		{
			return $this->nombre;
		}
		function getCarrera()
		{
			return $this->carrera;
		}
		function getGrado()
		{
			return $this->grado;
		}
		function getGrupo()
		{
			return $this->grupo;
		}
		function getUsuario()
		{
			return $this->usuario;
		}
		function getClaveConvocatoria()
		{
			return $this->claveconvocatoria;
		}

		function setMatricula($matricula)
		{
				$this->matricula=$matricula;	
		}
		function setNombre($nombre)
			{
				$this->nombre=$nombre;		
			}
		function setCarrera($carrera)
			{
				$this->carrera=$carrera;		
			}
		function setGrado($grado)
			{
				$this->grado=$grado;		
			}
		function setGrupo($grupo)
			{
				$this->grupo=$grupo;		
			}
		function setUsuario($usuario)
			{
				$this->usuario=$usuario;		
			}
		function setClaveConvocatoria($claveconvocatoria)
			{
				$this->claveconvocatoria=$claveconvocatoria;		
			}

}
?>