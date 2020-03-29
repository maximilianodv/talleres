<?php
class ConexionBD
{
    private $host;
    private $user;
    private $passwd;
    private $db;
    private $charset;    //las privadas no son visibles al heredarse
    protected $conexion; //para hacerse visible en la herencia

    public function __construct()
    {
      $this->host="localhost";
      $this->user="root";
      $this->passwd="";
      $this->db="TALLERES";
      $this->charset="utf8_spanish_ci";
      $this->conexion=new mysqli($this->host,$this->user,$this->passwd,$this->db);
      $this->conexion->query("SET NAMES 'utf8'");
    }

    public function getConexion()
    {
      return $this->conexion;
    }
    public function __destruct()
    {
      $this->conexion->close();
    }
}