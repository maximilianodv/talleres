<?php
class ModeloAvisos extends ConexionBD
{
	public function __contruct()
	{
		parent::__construct();
	}
  public function insertar($imagenruta,$descripcion,$activo,$creado,$usuario)
  {
    $insertar="INSERT INTO AVISOS(Imagenruta,Descripcion,Activo,Creado,idusuario) VALUES ('{$imagenruta}','{$descripcion}','{$activo}','{$creado}','{$usuario}')";
    echo  $this->conexion->query($insertar);
    return $insertar;
  }
	public function __destruct()
  {
  	$this->conexion->close();
  }
    public function mostrartabla($condicion=null)
  {
    $consulta=$this->conexion->query("SELECT AVISOS.Idaviso,AVISOS.Imagenruta,AVISOS.Descripcion,AVISOS.Activo,AVISOS.Creado, USUARIOS.Nombre FROM AVISOS, USUARIOS
WHERE AVISOS.idusuario=USUARIOS.idUsuario");
    $resultado= "<div class='table-responsive text-nowrap'>
      <table id='tablaAvisos' class='table table-striped'>
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Descripción</th>
          <th>activo</th>
          <th>Fecha</th>
          <th>Usuario</th>
          <th></th>
        </tr>
       </thead>
       <tbody>";
    while ($row=$consulta->fetch_array())
    {
      
      $idaviso=$row["Idaviso"];
      $imagenruta=$row["Imagenruta"];
      $descripcion=$row["Descripcion"];
      $activo=$row["Activo"];
      $creado=$row["Creado"];
      $nombre=$row["Nombre"];
      $resultado.="
        <tr id='{$idaviso}F'>
           <td><img src='$imagenruta' id='imgtabla'></td>
           <td>$descripcion</td>
           <td>$activo</td>
           <td>$creado</td>
           <td>$nombre</td>
            <td>
              <button type='button' data-clave='$idaviso' class='btnEditarAutor  btn btn-primary btn-sm'>
                <i class='fa fa-edit  fa-lg text-white'>Editar</i>
              </button>
              <button type='button' data-clave='$idaviso' class='btnEliminarAutor  btn btn-danger btn-sm'>
                <i class='fa fa-trash  fa-lg text-white'>Eliminar</i>
              </button>
            </td>

        </tr>";
      
    }
    $resultado.= "</tbody></table></div>";
    return $resultado;
  }
}
?>
