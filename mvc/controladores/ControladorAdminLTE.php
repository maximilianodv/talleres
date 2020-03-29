<?php
class ControladorAdminLTE extends Controlador
{
	public function __construct()
	{
		Session::start();
		$sesion=Session::get_SESSION();
		if(isset($sesion["matricula"]))
		{
			header('Location:index.php');
		}
		else if(isset($sesion["usuario"]))
		{
				parent::__construct();	
				$datos=$sesion["usuario"];

				//echo $sesion["tipo"];
		}
		else
		{
			new Vista("mvc/vistas/sistema/errores/error.php");
		}
	}
	public function index()
	{
		$sesion=Session::get_SESSION();
		//$hola=$this->hola();
		$datos=array('usuario' =>$sesion["usuario"],'tipo'=>$sesion["tipo"],'menu'=>$this->privilegios($sesion["tipo"]));
		
		
		$vista=new Vista("mvc/vistas/sistema/adminlte/starter.html",$datos);
	}
	public function privilegios($tipo)
	{
		$menu="";
		switch ($tipo)
	   	{
			    case "ADMIN":
			        	
					$menu="        <li class='header'>Principal</li>
							        	<li class='active'>
							          	<a class='pagina' data-menu='Menu Principal' data-titulo='Convocatorias' data-control='ControladorConvocatorias'>
								            <i class='fa fa-circle fa-lg text-green'></i>
								            <span>Convocatoria</span>
							          	</a>
							        </li>

        							<li class='active'>
          								<a class='pagina' data-menu='Menu Principal' data-titulo='Instructores' data-control='ControladorInstructores'>
              								<i class='fa fa-users fa-lg text-fuchsia'></i>
              								<span>Instructores</span>
          								</a>
        							</li>
        
								    <li class='active'>
          								<a class='pagina' data-menu='Menu Principal' data-titulo='Talleres' data-control='ControladorTalleres'>
	              							<i class='fa fa-circle fa-lg text-red'></i>
	              							<span>Talleres</span>
          								</a>
        							</li>
        							 <li class='active'>
          								<a class='pagina' data-menu='Menu Principal' data-titulo='Niveles' data-control='ControladorNiveles'>
	              							<i class='fa fa-circle fa-lg text-blue'></i>
	              							<span>Niveles</span>
          								</a>
        							</li>
        							 <li class='active'>
          								<a class='pagina' data-menu='Menu Principal' data-titulo='Listas' data-control='ControladorListas'>
	              							<i class='fa fa-circle fa-lg text-blue'></i>
	              							<span>Listas</span>
          								</a>
        							</li>
        						";

			        break;
			    case "INSTRUCTOR":
			    		
					$menu=" 
        						<li class='header'>Principal</li>
        							<li class='active'>
          							<a class='pagina' data-menu='Menu Principal' data-titulo='Lista' data-control='ControladorLista'>
	              						<i class='fa fa-users fa-lg text-fuchsia'></i>
	              						<span>Lista</span>
          							</a>
        						</li>";
			        break;
			    
			    case "ALUMNO";
			    	break;

		}

		return $menu;
	   	
	}

}