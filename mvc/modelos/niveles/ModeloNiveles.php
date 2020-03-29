<?php

class ModeloNiveles extends ConexionBD
{
	
  	private $nivel;

 
	 public function __construct() 
	{
	    parent::__construct();
	    require_once 'mvc/modelos/niveles/Nivel.php';
	    
	}
	public function mostrar()
	{
		$salida="<div class='table-responsive text-nowrap'>
      <table id='tablaNiveles' class='table table-striped'>
      <thead>
        <tr>
          <th>Clave</th>
          <th>Nombre</th>
          <th></th>
        </tr>
       </thead>
       <tbody>";

		$consulta=$this->conexion->query("SELECT *FROM NIVELES");

		while ($fila=$consulta->fetch_array())
		{
			$clave=$fila["ClaveNivel"];
			$nombre=$fila["Nombre"];
			$salida.= "<tr id='{$clave}F'>
           <td>$clave</td>
           <td>$nombre</td>
           
          <td>
              <button type='button' id='$clave' data-clave='$clave' class='btnEditar  btn btn-primary btn-sm'>
                <i class='fa fa-edit  fa-lg text-white'  data-toggle='modal' data-target='#newarticulo' >Editar</i>
              </button>
              <button type='button' data-clave='$clave' class='btnEliminar btn btn-danger btn-sm'>
                <i class='fa fa-trash  fa-lg text-white'  data-toggle='modal' data-target='#modalconfirmar'>Eliminar</i>
              </button>
           </td>
        </tr>";
    
		}

		return $salida;
	}
  public function insertar($nivel)
  {
    $this->nivel=$nivel;
    $clave=$this->nivel->getClaveNivel();
    $nombre=$this->nivel->getNombreNivel();

    $insertar="INSERT INTO NIVELES VALUES ('{$clave}','{$nombre}')";
    $this->conexion->query($insertar);
    return $insertar;
  }
   public function niveles()
  {
    $salida="<label for='cbNiveles'>Niveles</label>
              <select class='form-control' id='cbCarereas'>
                  <option value=''>Todas</option> ";

     $consulta=$this->conexion->query("SELECT * FROM NIVELES");
      while ($row=$consulta->fetch_array())
        {
          
          $clave=$row["ClaveNivel"];
          $nombre=$row["Nombre"];
          $salida.="<option value='$clave'>$nombre</option>";       
                
        }
      return $salida."</select>";
  }

}
?>