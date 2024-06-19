<?php 

class Aprendizes extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MAPRENDIZ);
	}

	public function Aprendizes()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/controle');
		}
		$data['page_tag'] = "Aprendiz";
		$data['page_title'] = "APRENDIZ";
		$data['page_name'] = "aprendiz";
		$data['page_functions_js'] = "functions_aprendiz.js";
		$this->views->getView($this,"aprendizes",$data);
	}
}