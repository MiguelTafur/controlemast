<?php 

class Coordinadores extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MCOORDINADOR);
	}

	public function Coordinadores()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/controles');
		}
		$data['page_tag'] = "Coordinadores";
		$data['page_title'] = "COORDINADORES";
		$data['page_name'] = "coordinadores";
		$data['page_functions_js'] = "functions_coordinadores.js";
		$this->views->getView($this,"coordinadores",$data);
	}
}