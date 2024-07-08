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
		$data['page_title'] = "EQUIPAMENTOS ENTREGUES";
		$data['page_title2'] = "ENTREGUES";
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
				$btnEdit = '';
				//$btnDelete = '';
				$tipo = '';

				$ultimo = explode(" ", $arrData[$i]['apellidos']);
				$arrData[$i]['nombres'] = strtoupper(strtok($arrData[$i]['nombres'], " "). ' ' . array_reverse($ultimo)[0]);

				if($arrData[$i]['equipamento'] === 8) {
					$tipo = 'Fone';
				} else if ($arrData[$i]['equipamento'] === 9) {
					$tipo = 'Mouse';
				} else if ($arrData[$i]['equipamento'] === 10) {
					$tipo = 'Teclado';
				} else if ($arrData[$i]['equipamento'] === 11) {
					$tipo = 'Tela';
				}

				$arrData[$i]['fechaRegistro'] = date("d-m-Y", strtotime($arrData[$i]['fechaRegistro']));

				$arrData[$i]['fechaRegistro'] = fechaInline($arrData[$i]['fechaRegistro']);

				$arrData[$i]['equipamento'] = '<h6>'.$tipo.': <span class="badge badge-secondary">#'.$arrData[$i]['lacre'].'</span></h6>';

				$arrData[$i]['status'] = '<a href="'.base_url().'/Assets/images/imagenes/'.$arrData[$i]['protocolo'].'" target="_blank" class="text-dark" style="margin: 0;"><i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i></a>';

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-secondary btn-sm mr-1" onClick="fntViewInfo('.$arrData[$i]['idcontrole'].')" title="Ver Entrega"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary btn-sm" onClick="fntEditProtocolo('.$arrData[$i]['idcontrole'].')" title="Alterar Protocolo"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button>';
				}
				/*if($_SESSION['permisosMod']['d'] AND $_SESSION['idUser'] == 1){
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idcontrole'].', '.$arrData[$i]['equipamentoid'].')" title="Remover Entrega"><i class="far fa-trash-alt"></i></button>';
				}*/

				$arrData[$i]['options'] = '<div class="text-center d-flex justify-content-center">'.$btnView.' '.$btnEdit.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

    public function setControleEntrega()
	{ 
		if($_POST)
		{ 
			$medida = 1000 * 1000;
			if(empty($_POST['listUsuario']) || empty($_POST['listEquipamento']) || empty($_FILES['fileProtocolo']['name']))
			{
				$arrResponse = array("status" => false, "msg" => "Os campos com asterisco (*) são obrigatórios.");
			} else if($_FILES['fileProtocolo']['size'] > $medida) {
				$arrResponse = array("status" => false, "msg" => "Tamanho da imagem inválido.");
			} else{

				$listUsuario = strClean($_POST['listUsuario']);
				$listEquipamento =  ucwords(strClean($_POST['listEquipamento']));
				$strObservacion =  strClean($_POST['txtObservacion']);
				
				$carpetaImagenes = 'Assets/images/imagenes/';

				if(!is_dir($carpetaImagenes)) {
					mkdir($carpetaImagenes);
				}

				$nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

				move_uploaded_file($_FILES['fileProtocolo']['tmp_name'], $carpetaImagenes . $nombreImagen);

				if($_SESSION['permisosMod']['w']){
					$request_user = $this->model->insertControleEntrega(
																$listUsuario,
																$listEquipamento,
																$nombreImagen,
																$strObservacion);
				}

				if($request_user > 0)
				{
					$arrResponse = array('status' => true, 'msg' => 'Dados salvos com sucesso.', 'data' => $request_user);
				}else if($request_user == '0'){
					$arrResponse = array('status' => false, 'msg' => 'O Usuário já possui um equipamento.');
				}else{
					$arrResponse = array("status" => false, "msg" => 'Não foi possível armazenar os dados.');
				}
			}	
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setUpdateProtocolo() 
	{
		if($_POST) {
			$medida = 1000 * 1000;
			if(empty($_FILES['fileEditProtocolo']['name']))
			{
				$arrResponse = array("status" => false, "msg" => "Os campos com asterisco (*) são obrigatórios.");
			} else if($_FILES['fileEditProtocolo']['size'] > $medida) {
				$arrResponse = array("status" => false, "msg" => "Tamanho da imagem inválido.");
			} else {
				$idControle = intval($_POST['idControle']);
				$datosEntrega = $this->model->selectEntrega($idControle);
				$protocolo = $datosEntrega['protocolo'];
				$tipo = $datosEntrega['equipamento'];
				$idequipamento = $datosEntrega['idequipamento'];

				$carpetaImagenes = 'Assets/images/imagenes/';

				/*if($_FILES['fileEditProtocolo']['name']) {
					unlink($carpetaImagenes . $protocolo);
				}*/

				$nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

				move_uploaded_file($_FILES['fileEditProtocolo']['tmp_name'], $carpetaImagenes . $nombreImagen);

				if($_SESSION['permisosMod']['u']){
					$request_user = $this->model->updateProtocolo($idControle, $nombreImagen, $idequipamento, $tipo);
				}

				if($request_user > 0)
				{
					$arrResponse = array('status' => true, 'msg' => 'Dados salvos com sucesso.', 'data' => $request_user);
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
			$tipo = '';
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['tipo'] === 8) {
						$tipo = 'Fone';
					} else if ($arrData[$i]['tipo'] === 9) {
						$tipo = 'Mouse';
					} else if ($arrData[$i]['tipo'] === 10) {
						$tipo = 'Teclado';
					} else if ($arrData[$i]['tipo'] === 11) {
						$tipo = 'Tela';
					}
					$htmlOptions .= '<option value="'.$arrData[$i]['idequipamento'].'">'.$tipo.' - #'.$arrData[$i]['lacre'].'</option>';
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

	// Traz os usuários sem relação com o equipamento
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
					$htmlOptions .= '<option value="'.$arrData[$i]['idpersona'].'">'.strtoupper(strtok($arrData[$i]['nombres'], " ").' '.array_reverse($ultimo)[0]).' - '.$arrData[$i]['matricula'].'</option>';
				}
			}
			echo $htmlOptions;
		}	
	}

	public function getEntrega($identrega)
	{
		if($_SESSION['permisosMod']['r']){
			$idEntrega = intval($identrega);
			if($idEntrega > 0)
			{
				$arrData = $this->model->selectEntrega($idEntrega);

				if($arrData['equipamento'] === 8) {
					$arrData['equipamento'] = 'Fone';
				} else if ($arrData['equipamento'] === 9) {
					$arrData['equipamento'] = 'Mouse';
				} else if ($arrData['equipamento'] === 10) {
					$arrData['equipamento'] = 'Teclado';
				} else if ($arrData['equipamento'] === 11) {
					$arrData['equipamento'] = 'Tela';
				}

				if($arrData['modelo'] === 1)
				{
					$arrData['modelo'] = 'Presencial';
				}else{
					$arrData['modelo'] = 'Home Office';
				}

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