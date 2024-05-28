<?php 

	class Roles extends Controllers{
		public function __construct()
		{
			//sessionStart();
			session_start();
			parent::__construct();
			//session_regenerate_id(true);
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
			}
			getPermisos(MUSUARIOS);
		}

		public function Roles()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location: ".base_url().'/fones');
			}
			$data['page_id'] = 3;
			$data['page_tag'] = "Cargo Usuário";
			$data['page_name'] = "cargo_usuario";
			$data['page_title'] = "Cargos Usuário";
			$data['page_functions_js'] = "functions_roles.js";
			$this->views->getView($this,"roles",$data);
		}

		public function getRoles()
		{
			if($_SESSION['permisosMod']['r']){
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				$arrData = $this->model->selectRoles();

				for ($i=0; $i < count($arrData); $i++) {

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-success">Ativo</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Iactivo</span>';
					}

					if($_SESSION['permisosMod']['u']){
						$btnView = '<button class="btn btn-secondary btn-sm btnPermisosRol" onclick="fntPermisos('.$arrData[$i]['idrol'].')" title="Autorizações"><i class="fas fa-key"></i></button>';
						$btnEdit = '<button class="btn btn-primary btn-sm btnEditRol" onclick="fntEditRol('.$arrData[$i]['idrol'].')" title="Alterar"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelRol" onclick="fntDelRol('.$arrData[$i]['idrol'].')" title="Remover"><i class="far fa-trash-alt"></i></button>';
					}

					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getSelectRoles()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectRoles();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1){
						$htmlOptions .= '<option value="'.$arrData[$i]['idrol'].'">'.$arrData[$i]['nombrerol'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();
		}

		public function getRol(int $idrol)
		{
			if($_SESSION['permisosMod']['r']){
			$intIdrol = intval(strClean($idrol));
			if($intIdrol > 0)
			{
					$arrData = $this->model->selectRol($intIdrol);
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

		public function setRol(){
			if($_SESSION['permisosMod']['w']){
				$intIdrol = intval($_POST['idRol']);
				$strRol =  strClean($_POST['txtNombre']);
				$strDescipcion = strClean($_POST['txtDescripcion']);
				$intStatus = intval($_POST['listStatus']);

				if($intIdrol == 0)
				{
					//Crear
					$request_rol = $this->model->insertRol($strRol, $strDescipcion,$intStatus);
					$option = 1;
				}else{
					//Actualizar
					$request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescipcion, $intStatus);
					$option = 2;
				}

				if($request_rol > 0 )
				{
					if($option == 1)
					{
						$arrResponse = array('status' => true, 'msg' => 'Dados salvos con sucesso.');
					}else{
						$arrResponse = array('status' => true, 'msg' => 'Dados Acualizados correctamente.');
					}
				}else if($request_rol == '0'){
					
					$arrResponse = array('status' => false, 'msg' => 'Atenção! O Cargo já existe.');
				}else{
					$arrResponse = array("status" => false, "msg" => 'Não foi possível armazenar os dados.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function delRol()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdrol = intval($_POST['idrol']);
					$requestDelete = $this->model->deleteRol($intIdrol);
					if($requestDelete > 0)
					{
						$arrResponse = array('status' => true, 'msg' => 'Cargo Removido con sucesso');
					}else if($requestDelete == '0'){
						$arrResponse = array('status' => false, 'msg' => 'Não é possível excluir um Cargo associada a usuários.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Erro ao excluir o Cargo.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

	}
 ?>