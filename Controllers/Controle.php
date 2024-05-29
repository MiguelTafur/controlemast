<?php 

class Controle extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MCONTROLE);
	}

    public function Controle()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/login');
		}
		$data['page_tag'] = "Controle";
		$data['page_title'] = "CONTROLE DE EQUIPAMENTOS";
		$data['page_name'] = "controle";
		$data['page_functions_js'] = "functions_controle.js";
		$this->views->getView($this,"controle",$data);
	}

    public function getControles()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectControles();
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idcontrole'].')" title="Ver Controle"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idcontrole'].')" title="Alterar Controle"><i class="fas fa-pencil-alt"></i></button>';
				}

				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

    public function setControle()
	{
		if($_POST)
		{
			if(empty($_POST['listUsuario']) || empty($_POST['listEquipamento']) || empty($_POST['listEstadoEquipamento']))
			{
				$arrResponse = array("status" => false, "msg" => "Dados errados.");
			}else{
				$idControle = intval($_POST['idControle']);
				$listUsuario = strClean($_POST['listUsuario']);
				$listEquipamento =  ucwords(strClean($_POST['listEquipamento']));
				$listEstado =  ucwords(strClean($_POST['listEstadoEquipamento']));
				$strProtocolo = strClean($_POST['txtProtocolo']);
				$strObservacion =  strClean($_POST['txtObservacion']);
				$request_user = "";
				$intIdRuta = $_SESSION['idRuta'];

				if($idEquipamento == 0)
				{
					$option = 1;
					if($_SESSION['permisosMod']['w']){
						$request_user = $this->model->insertControle($listUsuario,
																	$listEquipamento,
																	$listEstado,
																	$strProtocolo,
                                                                    $strObservacion,
																	$intIdRuta);
					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_user = $this->model->updateControle($idControle,
																	$idControle,
																	$listUsuario,
																	$listEquipamento,
																	$listEstado,
																	$strProtocolo,
                                                                    $strObservacion);
					}
				}

				if($request_user > 0)
				{
					if($option == 1){
						$arrResponse = array('status' => true, 'msg' => 'Dados salvos com sucesso.');
					}else{
						$arrResponse = array('status' => true, 'msg' => 'Dados atualizados com sucesso.');
					}
				}else if($request_user == '0'){
					$arrResponse = array('status' => false, 'msg' => 'Erro ao salvar o controle.');
				}else{
					$arrResponse = array("status" => false, "msg" => 'Não foi possível armazenar os dados.');
				}
			}	
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

    public function getEquipamentos()
	{
		if($_SESSION['permisosMod']['r']){
			$htmlOptions = '<option></option>';
			$arrData = $this->model->selectEquipamentos();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData); $i++) { 
					$htmlOptions .= '<option value="'.$arrData[$i]['idequipamento'].'">'.$arrData[$i]['nombre'].' - '.$arrData[$i]['lacre'].'</option>';
				}
			}
			echo $htmlOptions;
			die();

			if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Dados não encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}	

		die();
	}

	public function getUsuarios()
	{
		if($_SESSION['permisosMod']['r']){
			$htmlOptions = '<option></option>';
			$intIdRuta = $_SESSION['idRuta'];
			$arrData = $this->model->selectUsuarios($intIdRuta);
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData); $i++) { 
					$ultimo = $arrData[$i]['apellidos'];
					$ultimo = explode(" ", $ultimo);
					$htmlOptions .= '<option value="'.$arrData[$i]['idpersona'].'">'.strtok($arrData[$i]['nombres'], " ").' '.array_reverse($ultimo)[0].' - '.$arrData[$i]['matricula'].'</option>';
				}
			}
			echo $htmlOptions;
			die();

			if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Dados não encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}	

		die();
	}
}