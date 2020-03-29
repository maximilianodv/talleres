<?php 
	class Session
	{
		static function start()
		{
			session_start();
		}
		static function get_SESSION()
		{
			return $_SESSION;
		}
		static function getSession($nombre)
		{
			return $_SESSION[$nombre];
		}
		static function setSession($nombre,$dato)
		{
			$_SESSION[$nombre]=$dato;
		}
		static function destroy()
		{
			session_start();
			session_destroy();
		}
	}