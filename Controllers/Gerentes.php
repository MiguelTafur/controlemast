<?php 

class Gerentes extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MGERENTE);
	}

	public function Gerentes()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/controles');
		}
		$data['page_tag'] = "Gerentes";
		$data['page_title'] = "GERENTES";
		$data['page_name'] = "gerentes";
		$data['page_functions_js'] = "functions_gerentes.js";
		$this->views->getView($this,"gerentes",$data);
	}
}