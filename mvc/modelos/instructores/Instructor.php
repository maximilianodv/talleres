<?php
class Instructor
{
  private $idinstructor;
  private $nombre;
  private $apellidop;
  private $apellidom;
  private $correo;
  private $telefono;
  private $id_usuario;
  
  
  
  public function __construct($idinstructor=null, $nombre=null, $apellidop=null, $apellidom=null,
                              $correo=null,$telefono=null,$id_usuario=null)
  {
    $this->idinstructor = $idinstructor;
    $this->nombre = $nombre;
    $this->apellidop = $apellidop;
    $this->apellidom = $apellidom;
    $this->correo= $correo;
    $this->telefono= $telefono;
    $this->id_usuario= $id_usuario;
    
  }

function getIdInstructor()
{
  return $this->idinstructor;
}
function getNombre()
{
  return $this->nombre;
}
function getApellidoP()
{
  return $this->apellidop;
}
function getApellidoM()
{
  return $this->apellidom;
}
function getCorreo()
{
  return $this->correo;
}
function getTelefono()
{
  return $this->telefono;
}
function getId_Usuario()
{
  return $this->id_usuario;
}


function setIdInstructor($idinstructor)
{
  $this->idinstructor = $idinstructor;
}
function setNombre($nombre)
{
  $this->nombre=$nombre;
}
function setApellidoP($apellidop)
{
  $this->apellidom=$apellidop;
}
function setApellidoM($apellidom)
{
  $this->apellidom=$apellidom;
}
function setCorreo($correo)
{
  $this->correo= $correo;
}
function setTelefono($telefono)
{
  $this->telefono=$telefono;
}
function setId_Usuario($id_usuario)
{
  $this->id_usuario=$id_usuario;
}


}
