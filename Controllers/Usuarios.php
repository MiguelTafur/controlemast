<?php 

class Usuarios extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MUSUARIO);
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
			if(empty($_POST['txtMatricula']) ||
			   empty($_POST['txtNombre']) || 
			   empty($_POST['txtApellido']) || 
			   empty($_POST['listRolid']) || 
			   empty($_POST['listStatus']) || 
			   empty($_POST['listRuta']) || 
			   empty($_POST['listModelo']))
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
				$intRuta = intval($_POST['listRuta']);
				$intModelo = intval($_POST['listModelo']);
				$intStatus = intval($_POST['listStatus']);
				$request_user = "";

				if($idUsuario == 0)
				{
					$option = 1;
					
					if($_SESSION['permisosMod']['w']){
						$request_user = setPersona(0,$strMatricula,$strNombre,$strApellido,$intTelefono,$strEmail,$intTipoId,$intStatus,$intRuta,$intModelo, $option);

					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_user = setPersona($idUsuario,$strMatricula,$strNombre,$strApellido,$intTelefono,$strEmail,$intTipoId,$intStatus,$intRuta,$intModelo, $option);
					}
				}

				if($request_user > 0)
				{
					if($option == 1){
						$arrResponse = array('status' => true, 'msg' => 'Dados salvos com sucesso.');
					}else{
						$arrResponse = array('status' => true, 'msg' => 'Dados salvos con sucesso.');
					}
				}else if($request_user == '0'){
					$arrResponse = array('status' => false, 'msg' => 'Atenção! A Matrícula já existe.');
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
			$arrData = $this->model->selectPersonas(RADMINISTRADOR);

			for ($i=0; $i < count($arrData); $i++) {

				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				$arrData[$i]['matricula'] = '<span class="font-weight-bold font-italic">'.$arrData[$i]['matricula'].'</span>';

				if($arrData[$i]['modelo'] === 1)
				{
					$arrData[$i]['modelo'] = 'Presencial';
				}else{
					$arrData[$i]['modelo'] = 'Home Office';
				}

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Ativo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inativo</span>';
				}

				if(empty($arrData[$i]['telefono'])) {
					$arrData[$i]['telefono'] = '<span class="font-italic text-secondary">nenhum</span>';
				}

				if(empty($arrData[$i]['email_user'])) {
					$arrData[$i]['email_user'] = '<span class="font-italic text-secondary">nenhum</span>';
				}

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm btnViewUsuario mr-1" onclick="fntViewUsuario('.$arrData[$i]['idpersona'].')" title="Ver Usuário"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					if($_SESSION['idUser'] == 1 && $_SESSION['userData']['idrol'] == 1 ||
					  ($_SESSION['userData']['idrol'] == 1 && $arrData[$i]['idrol'] != 1)){
						$btnEdit = '<button class="btn btn-primary btn-sm btnEditUsuario mr-1" onclick="fntEditUsuario(this,'.$arrData[$i]['idpersona'].')" title="Alterar Usuário"><i class="fas fa-pencil-alt"></i></button>';
					}else{
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled mr-1><i class="fas fa-pencil-alt"></i></button>';
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

				$arrData[$i]['options'] = '<div class="text-center d-flex justify-content-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
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
				$arrData = getPersona($idusuario, 1);
				
				if($arrData['modelo'] === 1)
				{
					$arrData['modelo'] = 'Presencial';
				}else{
					$arrData['modelo'] = 'Home Office';
				}

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
				$requestDelete = getPersona($intIdpersona, 2);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Dados salvos com sucesso.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Erro ao remover o usuário.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);	
			}
		}
		die();
	}
}
 ?>