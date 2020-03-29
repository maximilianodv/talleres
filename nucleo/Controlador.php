<?php

class Controlador
{  
  public function __construct()
  {
    //isset:si esta definido
    if(isset($_GET["accion"]))//para invocar algun metodo diferente a index.
    {
      $accion=$_GET["accion"];
      if(method_exists($this, $accion))
        $this->$accion();
      else
        die("Método: $accion, no implementado.<br>");
    }
    else
      if(method_exists($this, "index"))
        $this->index();
      else
        die("Método: \"index\" no implementado.<br>");
  }
  
}
