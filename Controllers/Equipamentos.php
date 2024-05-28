<?php 

class Equipamentos extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MEQUIPAMENTOS);
	}

    public function Equipamentos()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/controle');
		}
		$data['page_tag'] = "Equipamentos";
		$data['page_title'] = "EQUIPAMENTOS";
		$data['page_name'] = "equipamentos";
		$data['page_functions_js'] = "functions_equipamentos.js";
		$this->views->getView($this,"equipamentos",$data);
	}

	public function getEquipamentos()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectEquipamentos();
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idequipamento'].')" title="Ver Equipamento"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idequipamento'].')" title="Alterar Equipamento"><i class="fas fa-pencil-alt"></i></button>';
				}
				if($_SESSION['permisosMod']['d']){
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idequipamento'].')" title="Remover Equipamento"><i class="far fa-trash-alt"></i></button>';
				}

				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
