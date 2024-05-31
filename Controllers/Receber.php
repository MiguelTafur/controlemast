<?php 

class Receber extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MCONTROLE);
	}

    public function Receber()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/login');
		}
		$data['page_tag'] = "Receber";
		$data['page_title'] = "CONTROLE DE EQUIPAMENTOS";
		$data['page_name'] = "Receber";
		$data['page_functions_js'] = "functions_receber.js";
		$this->views->getView($this,"receber",$data);
	}
}