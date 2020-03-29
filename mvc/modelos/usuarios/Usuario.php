<?php
class Usuario
{
  private $id_usuario;
  private $nombre;
  private $apellidos;
  private $correo;
  private $password;
  private $activo;
  private $creado;
  private $tipousuario;
  private $usuario;
  
  public function __construct($id_usuario=null, $nombre=null, $apellidos=null, $correo=null,
                              $password=null,$activo=null,$creado=null,$tipousuario=null,$usuario=null)
  {
    $this->id_usuario = $id_usuario;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->correo = $correo;
    $this->password= $password;
    $this->activo= $activo;
    $this->creado= $creado;
    $this->tipousuario=$tipousuario;
    $this->usuario=$usuario;
  }

function getId_Usuario()
{
  return $this->id_usuario;
}
function getNombre()
{
  return $this->nombre;
}
function getApellidos()
{
  return $this->apellidos;
}
function getCorreo()
{
  return $this->correo;
}
function getPassword()
{
  return $this->password;
}
function getActivo()
{
  return $this->activo;
}
function getCreado()
{
  return $this->creado;
}
function getTipoUsuario()
{
  return $this->tipousuario;
}
function getUsuario()
{
  return $this->usuario;
}
function setId_Usuario($id_usuario)
{
  $this->id_usuario = $id_usuario;
}
function setNombre($nombre)
{
  $this->nombre=$nombre;
}
function setApellidos($apellidos)
{
  $this->correo=$apellidos;
}
function setCorreo($correo)
{
  $this->correo=$correo;
}
function setPassword($password)
{
  $this->password= $password;
}
function setActivo($activo)
{
  $this->activo=$activo;
}
function setIdUsuario($idusuario)
{
  $this->creado=$creado;
}
function setTipoUsuario($tipousuario)
{
  $this->tipousuario=$tipousuario;
}
function setUsuario($usuario)
{
  $this->usuario=$usuario;
}

}
