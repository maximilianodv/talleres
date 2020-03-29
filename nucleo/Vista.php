<?php
class Vista
{
	public function __construct($vista, $datos=null)
	{
		if(file_exists($vista))
			require_once($vista);
		else
			die("La vista: $vista, no ha sido encontrada");
	}
}
?>