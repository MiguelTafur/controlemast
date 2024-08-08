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
		$data['page_title'] = "EQUIPAMENTOS RECEBIDOS";
		$data['page_title2'] = "RECEBIDOS";
		$data['page_name'] = "Receber";
		$data['cantidadRecebidos'] = $this->model->cantRecebidos();
		$data['cantidadRecebidosHoy'] = $this->model->cantRecebidos(NOWDATE);
		$data['page_functions_js'] = "functions_receber.js";
		$this->views->getView($this,"receber",$data);
	}

	public function getRecebidos()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectRecebidos();
			//dep($arrData);exit;
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				//$btnReceived = '';
				//$btnDelete = '';
				
				if($arrData[$i]['equipamento'] === 8) {
					$tipo = 'Fone';
				} else if ($arrData[$i]['equipamento'] === 9) {
					$tipo = 'Mouse';
				} else if ($arrData[$i]['equipamento'] === 10) {
					$tipo = 'Teclado';
				} else if ($arrData[$i]['equipamento'] === 11) {
					$tipo = 'Tela';
				} else if ($arrData[$i]['equipamento'] === 16) {
					$tipo = 'PC';
				}

				$ultimo = explode(" ", $arrData[$i]['apellidos']);
				$arrData[$i]['nombres'] = strtoupper(strtok($arrData[$i]['nombres'], " "). ' ' . array_reverse($ultimo)[0]);

				$arrData[$i]['equipamento'] = '<h6>'.$tipo.' <span class="badge badge-secondary">#'.$arrData[$i]['lacre'].'</span></h6>';

				$protocolo = getProtocolo($arrData[$i]['equipamentoid'], 0);
				$arrData[$i]['fechaRegistro'] = fechaInline($arrData[$i]['fechaRegistro']);

				if($arrData[$i]['status'] === 2) {
					$arrData[$i]['status'] = '<a href="'.media().'/images/imagenes/'.$protocolo.'" target="_blank"><span class="font-weight-bold font-italic text-danger" title="Abrir protocolo">TROCA</span></a>';
				} else if($arrData[$i]['status'] === 3){
					$arrData[$i]['status'] = '<a href="'.media().'/images/imagenes/'.$protocolo.'" target="_blank"><span class="font-weight-bold font-italic text-danger" title="Abrir protocolo">DESLIGAMENTO</span></a>';
				} else if($arrData[$i]['status'] === 4){
					$arrData[$i]['status'] = '<a href="'.media().'/images/imagenes/'.$protocolo.'" target="_blank"><span class="font-weight-bold font-italic text-danger" title="Abrir protocolo">PEDIU CONTA</span></a>';
				} else if($arrData[$i]['status'] === 5){
					$arrData[$i]['status'] = '<a href="'.media().'/images/imagenes/'.$protocolo.'" target="_blank"><span class="font-weight-bold font-italic text-danger" title="Abrir protocolo">SEM RENOVAÇAO</span></a>';
				} else if($arrData[$i]['status'] === 6){
					$arrData[$i]['status'] = '<a href="'.media().'/images/imagenes/'.$protocolo.'" target="_blank"><span class="font-weight-bold font-italic text-danger" title="Abrir protocolo">JUSTA CAUSA</span></a>';
				} else if($arrData[$i]['status'] === 7){
					$arrData[$i]['status'] = '<a href="'.media().'/images/imagenes/'.$protocolo.'" target="_blank"><span class="font-weight-bold font-italic text-danger" title="Abrir protocolo">RESCISÇAO</span></a>';
				} else if($arrData[$i]['status'] === 8){
					$arrData[$i]['status'] = '<a href="'.media().'/images/imagenes/'.$protocolo.'" target="_blank"><span class="font-weight-bold font-italic text-danger" title="Abrir protocolo">INSS</span></a>';
				} else if($arrData[$i]['status'] === 9){
					$arrData[$i]['status'] = '<a href="'.media().'/images/imagenes/'.$protocolo.'" target="_blank"><span class="font-weight-bold font-italic text-danger" title="Abrir protocolo">LICENÇA MATERNINDADE</span></a>';
				}

				//$arrData[$i]['status'] = '<a href="#" class="text-dark" style="margin: 0;"><i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i></a>';

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-secondary btn-sm" onClick="fntViewInfo('.$arrData[$i]['idcontrole'].')" title="Ver Entrega"><i class="far fa-eye"></i></button>';
				}
				// if($_SESSION['permisosMod']['d'] AND $_SESSION['idUser'] == 1){
				// 	$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idcontrole'].', '.$arrData[$i]['equipamentoid'].')" title="Remover Entrega"><i class="far fa-trash-alt"></i></button>';
				// }

				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.'</div>';
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
					$ultimo = $arrData[$i]['apellidos'];
					$ultimo = explode(" ", $ultimo);
					$htmlOptions .= '<option value="'.$arrData[$i]['idpersona'].', '.$arrData[$i]['equipamentoid'].'">'.strtoupper(strtok($arrData[$i]['nombres'], " ").' '.array_reverse($ultimo)[0]).' - '.$arrData[$i]['matricula'].'</option>';
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
				$idEquipamento = intval($_POST['idEquipamento']);
				$equipamento = "";
				$arrData = $this->model->selectEquipamento($idUsuario, $idEquipamento);

				if($arrData['tipo'] === 8) {
					$arrData['tipo'] = 'Fone';
				} else if ($arrData['tipo'] === 9) {
					$arrData['tipo'] = 'Mouse';
				} else if ($arrData['tipo'] === 10) {
					$arrData['tipo'] = 'Teclado';
				} else if ($arrData['tipo'] === 11) {
					$arrData['tipo'] = 'Tela';
				} else if ($arrData['tipo'] === 16) {
					$arrData['tipo'] = 'PC';
				}

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

	public function getRecebido($idrecebido)
	{
		if($_SESSION['permisosMod']['r']){
			$idRecebido = intval($idrecebido);
			if($idRecebido > 0)
			{
				$arrData = $this->model->selectRecebido($idRecebido);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Dados não encontrados.');
				}else{

					if($arrData['protocolo']) {
						$arrData['protocolo'] = '<a href="'.base_url().'/Assets/images/imagenes/'.$arrData['protocolo'].'" target="_blank" class="text-dark" style="margin: 0;"><i class="fa fa-file-image-o fa-2x" aria-hidden="true"></i></a>';
					} else {
						$arrData['protocolo'] = '<span class="font-italic text-secondary">Sem Evidência</span>';
					}

					if($arrData['status'] === 2) {
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">TROCA</span>';
					} else if($arrData['status'] === 3) {
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">DESLIGAMENTO</span>';
					} else if($arrData['status'] === 4){
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">PEDIU CONTA</span>';
					} else if($arrData['status'] === 5){
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">SEM RENOVAÇÃO DO CONTRATO</span>';
					} else if($arrData['status'] === 6){
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">JUSTA CAUSA</span>';
					} else if($arrData['status'] === 7){
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">RESCISÃO</span>';
					} else if($arrData['status'] === 8){
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">INSS</span>';
					} else if($arrData['status'] === 9){
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">LICENÇA MATERNIDADE</span>';
					}

					$arrData['observacion'] = '<span class="font-italic">'.$arrData['observacion'].'</span>';
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function setControleReceber()
	{
		if($_POST)
		{
			$imagenAnotacion = $_FILES['fileReceber'];
			$medida = 1000 * 1000;
			if(empty($_POST['listUsuario']) || empty($_POST['listAcao']) || empty($_POST['txtObservacion']))
			{
				$arrResponse = array("status" => false, "msg" => "Dados errados.");
			} else if($imagenAnotacion['size'] > $medida) {
				$arrResponse = array("status" => false, "msg" => "Tamanho da imagem inválido.");
			}else{
				$idEquipamento = intval($_POST['idequipamentoReceber']);
				$listUsuario = intval($_POST['listUsuario']);
				$listAcao = intval($_POST['listAcao']);
				$strObservacion =  strClean($_POST['txtObservacion']);
				$cheked = isset($_POST['equipamentoEstragado']) ?  1 : 0;

				if($imagenAnotacion['error'] > 0) {
					$nombreImagen = "";
				} else {
					$carpetaImagenes = 'Assets/images/imagenes/';

					if(!is_dir($carpetaImagenes)) {
						mkdir($carpetaImagenes);
					}

					if($imagenAnotacion['type'] === 'application/pdf') {
						$nombreImagen = md5(uniqid(rand(), true)) . ".pdf";
					} else {
						$nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
					}

					move_uploaded_file($imagenAnotacion['tmp_name'], $carpetaImagenes . $nombreImagen);
				}

				if($_SESSION['permisosMod']['w']){
					$request_user = $this->model->insertControleReceber($idEquipamento,
																		$listUsuario,
																		$listAcao,
																		$strObservacion, 
																		$cheked,
																		$nombreImagen);
				}

				if($request_user > 0){
					$arrResponse = array('status' => true, 'msg' => 'Dados salvos com sucesso.');
				}else{
				 	$arrResponse = array('status' => false, 'msg' => 'Erro ao salvar os dados.');
				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
	}
}