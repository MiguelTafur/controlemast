<?php 

class Mouses extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MMOUSE);
	}

    public function Mouses()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/entregar');
		}
		$data['page_tag'] = "Mouses";
		$data['page_title'] = "MOUSES";
		$data['page_name'] = "mouses";
		$data['page_functions_js'] = "functions_mouses.js";
		$this->views->getView($this,"mouses",$data);
	}

	public function getMouses()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectMouses();
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				$arrData[$i]['marca'] = ucwords($arrData[$i]['marca']);
				$arrData[$i]['lacre'] = '<span class="font-weight-bold">#'.$arrData[$i]['lacre'].'</span>';

				switch ($arrData[$i]['status']) {
					case '1':
						$arrData[$i]['status'] = '<h5><span class="badge badge-success">Disponível</span></h5>';
						break;
					case '2':
						$arrData[$i]['status'] = '<h5><span class="badge badge-info">Em Uso</span></h5>';
						break;
					case '3':
						$arrData[$i]['status'] = '<h5><span class="badge badge-danger">Estragado</span></h5>';
						break;
					default:
						$arrData[$i]['status'] = '<h5><span class="badge badge-warning">Concerto</span></h5>';
						break;
				}

				if(empty($arrData[$i]['codigo'])) {
					$arrData[$i]['codigo'] = '<span class="font-italic">nenhum</span>';
				}

				if(empty($arrData[$i]['lacre'])) {
					$arrData[$i]['lacre'] = '<span class="font-italic">nenhum</span>';
				}

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-secondary btn-sm" onClick="fntViewInfo('.$arrData[$i]['idequipamento'].')" title="Ver Equipamento"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-info btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idequipamento'].')" title="Alterar Equipamento"><i class="fas fa-pencil-alt"></i></button>';
				}
				if($_SESSION['permisosMod']['d']){
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idequipamento'].')" title="Remover Equipamento"><i class="far fa-trash-alt"></i></button>';
				}

				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getMouse($idequipamento)
	{
		if($_SESSION['permisosMod']['r']){
			$IDequipamento = intval($idequipamento);
			if($IDequipamento > 0)
			{
				$arrData = $this->model->selectMouse($IDequipamento);
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

	public function setMouse()
	{ 
		if($_POST)
		{
			if(empty($_POST['txtLacre']) || empty($_POST['txtMarca']))
			{
				$arrResponse = array("status" => false, "msg" => "Dados errados.");
			}else{
				$idEquipamento = intval($_POST['idEquipamento']);
				$strMarca =  ucwords(strClean($_POST['txtMarca']));
				$strCodigo = strClean($_POST['txtCodigo']);
				$strLacre =  strClean($_POST['txtLacre']);
				$request_user = "";
				$intIdRuta = $_SESSION['idRuta'];

				if($idEquipamento == 0)
				{
					$option = 1;
					if($_SESSION['permisosMod']['w']){
						$request_user = $this->model->insertMouse(
																$strMarca,
																$strCodigo,
																$strLacre,
																$intIdRuta);
					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_user = $this->model->updateMouse($idEquipamento,
																	$strMarca,
																	$strCodigo,
																	$strLacre);
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
					$arrResponse = array('status' => false, 'msg' => 'Atenção! O Lacre do equipamento já existe, verifique novamente.');
				}else{
					$arrResponse = array("status" => false, "msg" => 'Não foi possível armazenar os dados.');
				}
			}	
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setEstadoMouse() {
		if($_POST) { 
			if(empty($_POST['listEstado'])) {
				$arrResponse = array("status" => false, "msg" => "Esolha o Tipo de Estado.");
			} else {
				$idEquipamento = intval($_POST['idEquipamentoEstado']);
				$estadoEquipamento = intval($_POST['listEstado']);

				if($_SESSION['permisosMod']['u']){
					$request_estado = $this->model->updateEstadoMouse($idEquipamento, $estadoEquipamento);
					if($request_estado > 0) {
						$arrResponse = array('status' => true, 'msg' => 'Estado atualizado com sucesso.', 'estado' => $request_estado);
					} else if ($request_estado === '0') {
						$arrResponse = array('status' => false, 'msg' => 'Não pode-se alterar um Equipamento em uso.');
					}else {
						$arrResponse = array('status' => false, 'msg' => 'Erro ao atualizar o Estado.');
					}
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}