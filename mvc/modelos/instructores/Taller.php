<?php
class Taller
{
  private $id_taller;
  private $nombre;
  private $no_horas;
  private $convocatoriaruta;
  private $activo;
  private $creado;
  private $id_usuario;
  private $descripciontaller;
  
  public function __construct($id_taller=null, $nombre=null, $no_horas=null, $convocatoriaruta=null,$activo=null,$creado=null,$id_usuario=null,$descripciontaller)
  {
    $this->id_taller = $id_taller;
    $this->nombre = $nombre;
    $this->no_horas = $no_horas;
    $this->convocatoriaruta = $convocatoriaruta;
    $this->activo= $activo;
    $this->creado= $creado;
    $this->id_usuario= $id_usuario;
    $this->descripciontaller=$descripciontaller;
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
function getConvocatoriaRuta()
{
  return $this->convocatoriaruta;
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
function setConvocatoriaRuta($convocatoriaruta)
{
  $this->convocatoriaruta=$convocatoriaruta;
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
}
