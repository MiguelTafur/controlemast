<?php 

class Lideres extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MLIDERES);
	}

	public function Lideres()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/fones');
		}
		$data['page_tag'] = "Lideres";
		$data['page_title'] = "LIDERES";
		$data['page_name'] = "lideres";
		$data['page_functions_js'] = "functions_lideres.js";
		$this->views->getView($this,"lideres",$data);
	}
	
	public function setCliente()
	{ 
		if($_POST)
		{
			if(empty($_POST['txtMatricula']) || empty($_POST['txtNombre']) || empty($_POST['txtSobrenome']))
			{
				$arrResponse = array("status" => false, "msg" => "Dados errados.");
			}else{
				$idUsuario = intval($_POST['idUsuario']);
				$strMatricula = strClean($_POST['txtMatricula']);
				$strNombre =  ucwords(strClean($_POST['txtNombre']));
				$strApellido =  ucwords(strClean($_POST['txtSobrenome']));
				$intTelefono = intval(strClean($_POST['txtTelefono']));
				$strEmail =  strClean($_POST['txtEmail']);
				$intTipoId = RLIDER;
				$request_user = "";
				$intIdRuta = $_SESSION['idRuta'];

				if($idUsuario == 0)
				{
					$option = 1;
					if($_SESSION['permisosMod']['w']){
						$request_user = $this->model->insertCliente($strMatricula,
																	$strNombre,
																	$strApellido,
																	$intTelefono,
																	$strEmail,
																	$intTipoId,
																	$intIdRuta);
					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_user = $this->model->updateCliente($idUsuario,
																	$strMatricula,
																	$strNombre,
																	$strApellido,
																	$intTelefono,
																	$strEmail,
																	$intTipoId);
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
					$arrResponse = array('status' => false, 'msg' => 'Atenção! A Matrícula já existe, insire outra.');
				}else{
					$arrResponse = array("status" => false, "msg" => 'Não foi possível armazenar os dados.');
				}
			}	
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getClientes()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectClientes();
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				$arrData[$i]['matricula'] = '<p class="font-weight-bold font-italic">'.$arrData[$i]['matricula'].'</p>';

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idpersona'].')" title="Ver Líder"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idpersona'].')" title="Alterar Líder"><i class="fas fa-pencil-alt"></i></button>';
				}
				if($_SESSION['permisosMod']['d']){
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idpersona'].')" title="Remover Líder"><i class="far fa-trash-alt"></i></button>';
				}

				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getSelectClientes()
	{
		$htmlOptions = "";
		$arrData = $this->model->selectClientes();

		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				if($arrData[$i]['status'] == 1){
					$htmlOptions .= '<option></option>';
					$htmlOptions .= '<option value="'.$arrData[$i]['idpersona'].'">'.strtoupper($arrData[$i]['nombres']).' - '.$arrData[$i]['apellidos'].'</option>';
				}
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getCliente($idpersona)
	{
		if($_SESSION['permisosMod']['r']){
			$idusuario = intval($idpersona);
			if($idusuario > 0)
			{
				$arrData = $this->model->selectCliente($idusuario);
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

	public function delCliente()
	{
		if($_POST)
		{
			if($_SESSION['permisosMod']['d']){
				$intIdpersona = intval($_POST['idUsuario']);
				$requestDelete = $this->model->deleteCliente($intIdpersona);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'El cliente tiene préstamos vinculados.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);	
			}
		}
		die();
	}
}

?>