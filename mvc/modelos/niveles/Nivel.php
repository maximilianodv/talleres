<?php
class Nivel
{
	private $clavenivel;
	private $nombrenivel;
	
  
  public function __construct($clavenivel=null, $nombrenivel=null)
  {
    $this->clavenivel = $clavenivel;
    $this->nombrenivel = $nombrenivel;

  }
 function getClaveNivel()
  {
  	return $this->clavenivel;
  }
  function getNombreNivel()
  {
  	return $this->nombrenivel;
  }
  
  function setClaveNivel($clavenivel)
  {
  	$this->clavenivel=$clavenivel;
  }
  function setNombreNivel($nombrenivel)
  {
  	$this->nombrenivel=$nombrenivel;
  }
  

  

}
?>