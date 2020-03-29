<?php
class Taller
{
  private $id_taller;
  private $nombre;
  private $no_horas;
  private $activo;
  private $creado;
  private $id_usuario;
  private $descripciontaller;
  private $convocatoriaruta;
  private $dias;
  private $horario;
  private $carrera;
  private $espacio;
  
  public function __construct($id_taller=null,$nombre=null,$no_horas=null,$activo=null,$creado=null,$id_usuario=null,$descripciontaller,$convocatoriaruta=null,$dias=null,$horario=null,$carrera=null,$espacio=null)
  {
    $this->id_taller = $id_taller;
    $this->nombre = $nombre;
    $this->no_horas = $no_horas;
    $this->activo= $activo;
    $this->creado= $creado;
    $this->id_usuario= $id_usuario;
    $this->descripciontaller=$descripciontaller;
    $this->convocatoriaruta = $convocatoriaruta;
    $this->dias=$dias;
    $this->horario=$horario;
    $this->carrera=$carrera;
    $this->espacio=$espacio;
  }

function getId_Taller()
{
  return $this->id_taller;
}
function getNombre()
{
  return $this->nombre;
}
function getNo_Horas()
{
  return $this->no_horas;
}
function getActivo()
{
  return $this->activo;
}
function getCreado()
{
  return $this->creado;
}
function getId_Usuario()
{
  return $this->id_usuario;
}
function getDescTaller()
{
  return $this->descripciontaller;
}
function getConvocatoriaRuta()
{
  return $this->convocatoriaruta;
}
function getDias()
{
  return $this->dias;
}
function getHorario()
{
  return $this->horario;
}
function getCarrera()
{
  return $this->carrera;
}
function getEspacio()
{
  return $this->espacio;
}




function setId_Taller($id_taller)
{
  $this->id_taller = $id_taller;
}
function setNombre($nombre)
{
  $this->nombre=$nombre;
}
function setNo_Horas($no_horas)
{
  $this->convocatoriaruta=$no_horas;
}
function setActivo($activo)
{
  $this->activo= $activo;
}
function setCreado($creado)
{
  $this->creado=$creado;
}

function setId_Usuario($id_usuario)
{
  $this->id_usuario=$id_usuario;
}
function setDescTaller($descripciontaller)
{
  $this->descripciontaller=$descripciontaller;
}

function setConvocatoriaRuta($convocatoriaruta)
{
  $this->convocatoriaruta=$convocatoriaruta;
}
function setDias($dias)
{
  $this->dias=$dias;
}
function setHorario($horario)
{
  $this->horario=$horario;
}
function setCarrera($carrera)
{
  $this->carrera=$carrera;
}
function setEspacio($espacio)
{
  $this->espacio=$espacio;
}


}
