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
		$data['page_title2'] = "RECEBIDOS";
		$data['page_name'] = "Receber";
		$data['page_functions_js'] = "functions_receber.js";
		$this->views->getView($this,"receber",$data);
	}

	public function getRecebidos()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectRecebidos();
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
				if($_SESSION['permisosMod']['d'] AND $_SESSION['idUser'] == 1){
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idcontrole'].', '.$arrData[$i]['equipamentoid'].')" title="Remover Entrega"><i class="far fa-trash-alt"></i></button>';
				}

				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	// Trae los usuários con el estado 1(entregado)
	public function getUsuarios()
	{
		if($_SESSION['permisosMod']['r']){
			$intIdRuta = $_SESSION['idRuta'];
			$arrData = $this->model->selectUsuarios($intIdRuta);
			$htmlOptions = '<option></option>';
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['personaid'] != "" && $arrData[$i]['status'] == 1 ) {
						$ultimo = $arrData[$i]['apellidos'];
						$ultimo = explode(" ", $ultimo);
						$htmlOptions .= '<option value="'.$arrData[$i]['idpersona'].'">'.strtok($arrData[$i]['nombres'], " ").' '.array_reverse($ultimo)[0].' - '.$arrData[$i]['matricula'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();
		}	
	}

	public function getEquipamento() {
		if($_POST) {
			if($_SESSION['permisosMod']['r']) {
				$idUsuario = intval($_POST['idUsuario']);
				$equipamento = "";
				$arrData = $this->model->selectEquipamento($idUsuario);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Dados não encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				// $equipamento = $arrData['nombre']. ' - #'.$arrData['lacre'];
				// echo $equipamento;
			}
		}
	}

	public function setControleReceber()
	{
		if($_POST)
		{
			if(empty($_POST['listUsuario']) || empty($_POST['listAcao']) || empty($_POST['txtObservacion']))
			{
				$arrResponse = array("status" => false, "msg" => "Dados errados.");
			}else{
				$idEquipamento = intval($_POST['idequipamentoReceber']);
				$listUsuario = intval($_POST['listUsuario']);
				$listAcao = intval($_POST['listAcao']);
				$strObservacion =  strClean($_POST['txtObservacion']);
				//$request_user = "";
				$intIdRuta = $_SESSION['idRuta'];

				if($_SESSION['permisosMod']['w']){
					$request_user = $this->model->insertControleReceber($idEquipamento,
																		$listUsuario,
																		$listAcao,
																		$strObservacion);
				}

				if($request_user > 0){
					$arrResponse = array('status' => true, 'msg' => 'Dados salvos com sucesso.');
				}else{
				 	$arrResponse = array('status' => true, 'msg' => 'Dados atualizados com sucesso.');
				}

				// if($idControle == 0)
				// {
				// 	$option = 1;
				// 	if($_SESSION['permisosMod']['w']){
				// 		$request_user = $this->model->insertControleReceber($listUsuario,
				// 													$listEquipamento,
				// 													$strProtocolo,
                //                                                     $strObservacion,
				// 													$intIdRuta);
				// 	}
				// }else{
				// 	$option = 2;
				// 	if($_SESSION['permisosMod']['u']){
				// 		$request_user = $this->model->updateControleEntrega($idControle,
				// 													$idControle,
				// 													$listUsuario,
				// 													$listEquipamento,
				// 													$strProtocolo,
                //                                                     $strObservacion);
				// 	}
				// }

				// if($request_user > 0)
				// {
					// if($option == 1){
					// 	$arrResponse = array('status' => true, 'msg' => 'Dados salvos com sucesso.');
					// }else{
					// 	$arrResponse = array('status' => true, 'msg' => 'Dados atualizados com sucesso.');
					// }
					// }else if($request_user == '0'){
					// 	$arrResponse = array('status' => false, 'msg' => 'Erro ao salvar o controle.');
					// }else{
					// 	$arrResponse = array("status" => false, "msg" => 'Não foi possível armazenar os dados.');
					// }
				//}	
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}