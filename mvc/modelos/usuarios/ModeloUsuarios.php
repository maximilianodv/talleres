<?php
class ModeloUsuarios extends ConexionBD
{
  private $usuario;
  public function __construct()
  {
    parent::__construct();
    require_once 'mvc/modelos/usuarios/Usuario.php';
  }


}

?>
