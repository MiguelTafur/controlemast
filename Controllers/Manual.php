<?php 

class Manual extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MMANUAL);
	}

	/******** USUARIOS  ********/
	public function manual()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/controle');
		}
		$data['page_tag'] = "Manual - Usuários";
		$data['page_title'] = "Manual de Usuários";
		$data['page_name'] = "Manual Usuários";

		$data['page_functions_js'] = "functions_manual.js";

		$this->views->getView($this,"manual",$data);
	}

	/******** USUARIOS  ********/
	public function manualEquipamentos()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/controle');
		}
		$data['page_tag'] = "Manual - Equipamentos";
		$data['page_title'] = "Manual de Equipamentos";
		$data['page_name'] = "Manual Equipamentos";

		$data['page_functions_js'] = "functions_manual.js";

		$this->views->getView($this,"manualEquipamentos",$data);
	}

	/******** USUARIOS  ********/
	public function manualControle()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/controle');
		}
		$data['page_tag'] = "Manual - Controle";
		$data['page_title'] = "Manual de Controle";
		$data['page_name'] = "Manual Controle";

		$data['page_functions_js'] = "functions_manual.js";

		$this->views->getView($this,"manualControle",$data);
	}
}
?>