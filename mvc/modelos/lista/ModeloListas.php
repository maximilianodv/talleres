<?php

class ModeloListas extends ConexionBD
{	
	function __construct()
	{
		parent::__construct();
	}
	
	public function tabla($periodo=null,$taller=null,$instructor=null,$orden=null)
	{
		
		$cond1="";

		if($periodo!=null)
		{
			$cond1.=" AND CONVOCATORIAS.ClaveConvocatoria=$periodo";
		}
		if($taller!=null)
		{
			$cond1.=" AND TALLERES.id_taller=$taller";	
		}
		if ($orden!=null)
		{
			$cond1.=" ORDER BY REGISTRO.Matricula DESC";	
		}

		$consulta="
				SELECT 
					REGISTRO.Matricula,
					CONCAT(REGISTRO.Nombre,' ',REGISTRO.ApellidoP,' ',REGISTRO.ApellidoM)AS Nombre,
					TALLERES.Nombre AS Taller,
					INSTALLERS.INSCRIPCION_ClaveConvocatoria

				FROM INSTALLERS,REGISTRO,TALLERES,CONVOCATORIAS

				WHERE 
					REGISTRO.Matricula=INSCRIPCION_Matricula
				AND
					TALLERES.id_taller=INSTALLERS.TALLERES_id_taller 
				AND 
					CONVOCATORIAS.ClaveConvocatoria=INSTALLERS.INSCRIPCION_ClaveConvocatoria ".$cond1;

		$salida="<div class='table-responsive text-nowrap'>
      <table id='tablaListas' class='table table-striped'>
      <thead>
        <tr>
          <th>matricula</th>
          <th>Nombre</th>
          <th>Taller</th>
          <th>Opciones</th>
        </tr>
       </thead>
       <tbody>";

		$consulta=$this->conexion->query($consulta);

		while ($fila=$consulta->fetch_array())
		{
			$matricula=$fila["Matricula"];
			$nombre=$fila["Nombre"];
			$taller=$fila["Taller"];
			
			$salida.= "<tr id='{$matricula}F'>
           <td>$matricula</td>
           <td>$nombre</td>
           <td>$taller</td>
           
          <td>
              <button type='button' id='$matricula' data-matricula='$matricula' class='btnEditar  btn btn-primary btn-sm'>
                <i class='fa fa-edit  fa-lg text-white'  data-toggle='modal' data-target='#newarticulo' >Editar</i>
              </button>
              <button type='button' data-matricula='$matricula' class='btnEliminar btn btn-danger btn-sm'>
                <i class='fa fa-trash  fa-lg text-white'  data-toggle='modal' data-target='#modalconfirmar'>Eliminar</i>
              </button>
           </td>
        </tr>";
    
		}

		return $salida;
	}
}

?>