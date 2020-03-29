<?php
class Modelogrados extends ConexionBD
{

  private $grado;
  public function __construct() 
  {
    parent::__construct();
    require_once 'mvc/modelos/grados/Grado.php';
  }
 
  
  
}

