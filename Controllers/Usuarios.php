<?php 

class Usuarios extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MUSUARIOS);
	}

	public function Usuarios()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/controle');
		}
		$data['page_tag'] = "Usuários";
		$data['page_title'] = "USUÁRIOS";
		$data['page_name'] = "usuários";
		$data['page_functions_js'] = "functions_usuarios.js";
		$this->views->getView($this,"usuarios",$data);
	}

	public function setUsuario()
	{
		if($_POST)
		{
			if(empty($_POST['txtMatricula']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['listRolid']) || empty($_POST['listStatus']) || empty($_POST['listRuta']))
			{
				$arrRespose = array("status" => false, "msg" => "Datos incorrectos.");
			}else{
				$idUsuario = intval($_POST['idUsuario']);
				$strMatricula = strClean($_POST['txtMatricula']);
				$strNombre =  ucwords(strClean($_POST['txtNombre']));
				$strApellido =  ucwords(strClean($_POST['txtApellido']));
				$intTelefono = intval(strClean($_POST['txtTelefono']));
				$strEmail = strtolower(strClean($_POST['txtEmail']));
				$intTipoId = intval($_POST['listRolid']);
				$intStatus = intval($_POST['listStatus']);
				$intRuta = intval($_POST['listRuta']);
				$request_user = "";

				if($idUsuario == 0)
				{
					$option = 1;
					
					if($_SESSION['permisosMod']['w']){
						$request_user = $this->model->insertUsuario($strMatricula,$strNombre,$strApellido,$intTelefono,$strEmail,$intTipoId,$intStatus,$intRuta);
					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_user = $this->model->updateUsuario($idUsuario,$strMatricula,$strNombre,$strApellido,$intTelefono,$strEmail,$intTipoId,$intStatus);
					}
				}

				if($request_user > 0)
				{
					if($option == 1){
						$arrResponse = array('status' => true, 'msg' => 'Dados salvos com sucesso.');
					}else{
						$arrResponse = array('status' => true, 'msg' => 'Dados atualizados con sucesso.');
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

	public function getUsuarios()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectUsuarios();

			//dep($arrData);exit;

			for ($i=0; $i < count($arrData); $i++) {

				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				$arrData[$i]['matricula'] = '<p class="font-weight-bold font-italic">'.$arrData[$i]['matricula'].'</p>';

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Ativo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inativo</span>';
				}

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onclick="fntViewUsuario('.$arrData[$i]['idpersona'].')" title="Ver Usuário"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					if($_SESSION['idUser'] == 1 && $_SESSION['userData']['idrol'] == 1 ||
					  ($_SESSION['userData']['idrol'] == 1 && $arrData[$i]['idrol'] != 1)){
						$btnEdit = '<button class="btn btn-primary btn-sm btnEditUsuario" onclick="fntEditUsuario(this,'.$arrData[$i]['idpersona'].')" title="Alterar Usuário"><i class="fas fa-pencil-alt"></i></button>';
					}else{
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if($_SESSION['permisosMod']['d']){
					if($_SESSION['idUser'] == 1 && $_SESSION['userData']['idrol'] == 1 ||
					  ($_SESSION['userData']['idrol'] == 1 && $arrData[$i]['idrol'] != 1) and
					  ($_SESSION['userData']['idpersona'] != $arrData[$i]['idpersona'])){

						$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onclick="fntDelUsuario('.$arrData[$i]['idpersona'].')" title="Remover Usuário"><i class="far fa-trash-alt"></i></button>';
					}else{
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled><i class="far fa-trash-alt"></i></button>';
					}
				}

				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getUsuario($idpersona)
	{
		if($_SESSION['permisosMod']['r']){
			$idusuario = intval($idpersona);
			if($idusuario > 0)
			{
				$arrData = $this->model->selectUsuario($idusuario);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function getRutas()
	{
		if($_SESSION['permisosMod']['r']){
			$htmlOptions = "";
			$arrData = $this->model->selectRutas();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData); $i++) { 
					$htmlOptions .= '<option value="'.$arrData[$i]['idruta'].'">'.$arrData[$i]['nombre'].'</option>';
				}
			}
			echo $htmlOptions;
			die();

			if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}	

		die();
	}

	public function delUsuario()
	{
		if($_POST)
		{
			if($_SESSION['permisosMod']['d']){
				$intIdpersona = intval($_POST['idUsuario']);
				$requestDelete = $this->model->deleteUsuario($intIdpersona);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Usuário removido.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Erro ao remover o usuário.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);	
			}
		}
		die();
	}

	public function perfil()
	{
		$data['page_tag'] = "Perfil";
		$data['page_title'] = "Perfil de usuario";
		$data['page_name'] = "perfil";
		$data['page_functions_js'] = "functions_usuarios.js";
		$this->views->getView($this,"perfil",$data);
	}

	public function putPerfil()
	{
		if($_POST){
			if(empty($_POST['txtMatricula']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono'])){
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			}else{
				$idUsuario = $_SESSION['idUser'];
				$strMatricula = strClean($_POST['txtMatricula']);
				$strNombre = strClean($_POST['txtNombre']);
				$strApellido = strClean($_POST['txtApellido']);
				$intTelefono = intval(strClean($_POST['txtTelefono']));
				$strPassword = "";

				$request_user = $this->model->updatePerfil($idUsuario,$strMatricula,$strNombre,$strApellido,$intTelefono);

				if($request_user){
					sessionUser($idUsuario);
					$arrResponse = array("status" => true, "msg" => 'Datos actualizados correctamente.');		
				}else if($request_user == '0'){
					$arrResponse = array('status' => false, 'msg' => 'Atencion! La identificación ya existe, por favor,  ingrese otra.');
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function putDFiscal()
	{
		if($_POST){
			if(empty($_POST['txtNit']) || empty($_POST['txtNombreFiscal']) || empty($_POST['txtDirFiscal'])){
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			}else{
				$idUsuario = $_SESSION['idUser'];
				$strNit = strClean($_POST['txtNit']);
				$strNomFiscal = strClean($_POST['txtNombreFiscal']);
				$strDirFiscal = strClean($_POST['txtDirFiscal']);
				$request_datafiscal = $this->model->updateDataFiscal($idUsuario,$strNit,$strNomFiscal,$strDirFiscal);

				if($request_datafiscal){
					sessionUser($_SESSION['idUser']);
					$arrResponse = array("status" => true, "msg" => 'Datos actualizados correctamente.');	
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
 ?>