<?php
class ModeloLogueo extends ConexionBD
{
	public function __construct()
	{
		parent::__construct();
	}
	public function loguear($usuario,$password)
	{
	$logueado="No";
	//echo $this->usuarioalumno($usuario);
	$resultSet=$this->conexion->query("SELECT * FROM USUARIOS WHERE id_usuario='$usuario' AND Password='$password'");
	$row=$resultSet->fetch_array();

	if($row["id_usuario"]===$usuario)
	{
		$logueado="Si";
	}

	return $logueado;
	}
	public function idusuario($usuario,$password)
	{
		$consulta="SELECT id_usuario FROM USUARIOS WHERE id_usuario='$usuario' AND Password='$password'";
    	$this->resultados=$this->conexion->query($consulta);
    	$row=$this->resultados->fetch_array();
    	$id=$row["id_usuario"];

    	return $id;
	}
	public function usuarioalumno($usuario)
	{
		$consulta="SELECT Usuario FROM REGISTRO WHERE Matricula='$usuario'";
    	$this->resultados=$this->conexion->query($consulta);
    	$row=$this->resultados->fetch_array();
    	
    	$id=$row["Usuario"];
		return $id;

		//return "2";
	}
	public function buscarcuenta($usuario)
	{
		$consulta="SELECT id_usuario FROM USUARIOS WHERE NombreUsuario='$usuario'";
    	$this->resultados=$this->conexion->query($consulta);
    	$row=$this->resultados->fetch_array();
    	
    	$id=$row["id_usuario"];
		return $id;

	}
	public function buscarnivel($idusuario)
	{
		$consulta="SELECT ClaveNivel FROM REGISTRO WHERE Usuario=$idusuario";
    	$this->resultados=$this->conexion->query($consulta);
    	$row=$this->resultados->fetch_array();
    	$clavenivel=$row["ClaveNivel"];

    	return $clavenivel;	
	}
	public function matricula($idusuario)
	{
		$consulta="SELECT Matricula FROM REGISTRO WHERE Usuario=$idusuario";
    	$this->resultados=$this->conexion->query($consulta);
    	$row=$this->resultados->fetch_array();
    	$matricula=$row["Matricula"];

    	return $matricula;
	}
	public function tipousuario($usuario,$password)
	{
		$consulta="SELECT TipoUsuario FROM USUARIOS WHERE id_usuario='$usuario' AND Password='$password'";
    	$this->resultados=$this->conexion->query($consulta);
    	$row=$this->resultados->fetch_array();
    	$usuario=$row["TipoUsuario"];

    	return $usuario;
	}

	public function __destruct()
	{
		$this->conexion->close();
	}
}