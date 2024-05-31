<?php 

class Entregar extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MCONTROLE);
	}

    public function Entregar()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/login');
		}
		$data['page_tag'] = "Entregar";
		$data['page_title'] = "CONTROLE DE EQUIPAMENTOS";
		$data['page_name'] = "Entregar";
		$data['page_functions_js'] = "functions_controle.js";
		$this->views->getView($this,"entregar",$data);
	}

    public function getEntregues()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectEntregues();
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				//$btnReceived = '';
				$btnDelete = '';

				$ultimo = explode(" ", $arrData[$i]['apellidos']);
				$arrData[$i]['nombres'] = strtoupper(strtok($arrData[$i]['nombres'], " "). ' ' . array_reverse($ultimo)[0]);

				$arrData[$i]['equipamento'] = '<h6>'.$arrData[$i]['equipamento'].' <span class="badge badge-secondary">#'.$arrData[$i]['lacre'].'</span></h6>';

				$arrData[$i]['status'] = '<a href="#" class="text-dark" style="margin: 0;"><i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i></a>';

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-secondary btn-sm" onClick="fntViewInfo('.$arrData[$i]['idcontrole'].')" title="Ver Entrega"><i class="far fa-eye"></i></button>';
				}
				// if($_SESSION['permisosMod']['u']){
				// 	$btnReceived = '<button class="btn btn-warning btn-sm" onClick="fntReceivedEquipamento('.$arrData[$i]['idcontrole'].', '.$arrData[$i]['personaid'].', '.$arrData[$i]['equipamentoid'].')" title="Alterar Controle"><i class="fas fa-arrow-circle-down"></i></button>';
				// }
				if($_SESSION['permisosMod']['d'] AND $_SESSION['idUser'] == 1){
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idcontrole'].', '.$arrData[$i]['equipamentoid'].')" title="Remover Entrega"><i class="far fa-trash-alt"></i></button>';
				}

				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

    public function setControleEntrega()
	{ 
		if($_POST)
		{
			if(empty($_POST['listUsuario']) || empty($_POST['listEquipamento']))
			{
				$arrResponse = array("status" => false, "msg" => "Dados errados.");
			}else{
				$idControle = intval($_POST['idControleEntregue']);
				$listUsuario = strClean($_POST['listUsuario']);
				$listEquipamento =  ucwords(strClean($_POST['listEquipamento']));
				$strProtocolo = strClean($_POST['fileProtocolo']);
				$strObservacion =  strClean($_POST['txtObservacion']);
				$request_user = "";
				$intIdRuta = $_SESSION['idRuta'];

				if($idControle == 0)
				{
					$option = 1;
					if($_SESSION['permisosMod']['w']){
						$request_user = $this->model->insertControleEntrega($listUsuario,
																	$listEquipamento,
																	$strProtocolo,
                                                                    $strObservacion,
																	$intIdRuta);
					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_user = $this->model->updateControleEntrega($idControle,
																	$idControle,
																	$listUsuario,
																	$listEquipamento,
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

	// Trae los equipamentos con el estado 2(entregue)
    public function getEquipamentos()
	{
		if($_SESSION['permisosMod']['r']){
			$htmlOptions = '<option></option>';
			$arrData = $this->model->selectEquipamentos();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData); $i++) { 
					$htmlOptions .= '<option value="'.$arrData[$i]['idequipamento'].'">'.$arrData[$i]['nombre'].' - #'.$arrData[$i]['lacre'].'</option>';
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

	// Trae os usuários sem relação com o equipamento
	public function getUsuarios()
	{
		if($_SESSION['permisosMod']['r']){
			$htmlOptions = '<option></option>';
			$intIdRuta = $_SESSION['idRuta'];
			$arrData = $this->model->selectUsuarios($intIdRuta);
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['personaid'] == "" || $arrData[$i]['status'] != 1 ) {
						$ultimo = $arrData[$i]['apellidos'];
						$ultimo = explode(" ", $ultimo);
						$htmlOptions .= '<option value="'.$arrData[$i]['idpersona'].'">'.strtok($arrData[$i]['nombres'], " ").' '.array_reverse($ultimo)[0].' - '.$arrData[$i]['matricula'].'</option>';
					}
					
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

	public function getEntrega($identrega)
	{
		if($_SESSION['permisosMod']['r']){
			$idEntrega = intval($identrega);
			if($idEntrega > 0)
			{
				$arrData = $this->model->selectEntrega($idEntrega);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Dados não encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function delEntrega()
	{ 	
		if($_POST)
		{
			if($_SESSION['permisosMod']['d']){
				$intIdentrega = intval($_POST['idEntrega']);
				$intIdequipamento = intval($_POST['idEquipamento']);
				$requestDelete = $this->model->deleteEntrega($intIdentrega, $intIdequipamento);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'O Controle de Entrega foi removido.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Erro ao remover o controle de Entrega.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);	
			}
		}
		die();
	}

	
}