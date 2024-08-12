<?php 

class Aprendizes extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MAPRENDIZ);
	}

	public function Aprendizes()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/controle');
		}
		$data['page_tag'] = "Aprendiz";
		$data['page_title'] = "APRENDIZ";
		$data['page_name'] = "aprendiz";

		//Cantidad 
		$data['cantidadAprendizes'] = $this->model->cantAprendizes();

		/*** Gráficas ***/ 
		$anio = date("Y");
		$mes = date("m");

		//Mensal
		$data['aprendizesMDia'] = $this->model->selectUsuariosMes($anio,$mes,RAPRENDIZ);

		//Anual
		$data['aprendizesAnio'] = $this->model->selectUsuariosAnio($anio, RAPRENDIZ);

		$data['page_functions_js'] = "functions_aprendiz.js";
		$this->views->getView($this,"aprendizes",$data);
	}

	public function setAprendiz()
	{ 
		if($_POST)
		{
			if(empty($_POST['txtMatricula']) || empty($_POST['txtNombre']) || empty($_POST['txtSobrenome']))
			{
				$arrResponse = array("status" => false, "msg" => "Dados errados.");
			}else{
				$idUsuario = intval($_POST['idAprendiz']);
				$strMatricula = strClean($_POST['txtMatricula']);
				$strNombre =  ucwords(strClean($_POST['txtNombre']));
				$strApellido =  ucwords(strClean($_POST['txtSobrenome']));
				$intTelefono = intval(strClean($_POST['txtTelefono']));
				$strEmail =  strClean($_POST['txtEmail']);
				$intTipoId = RAPRENDIZ;
				$intRuta = $_SESSION['idRuta'];
				$intModelo = 1;
				$intStatus = 1;
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
						$arrResponse = array('status' => true, 
											 'msg' => 'Dados salvos com sucesso.',
											'cantAprendizes' => $this->model->cantAprendizes()
											);
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

    public function getAprendizes()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = getPersonas(RAPRENDIZ);

			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				$arrData[$i]['matricula'] = '<span class="font-weight-bold font-italic">'.$arrData[$i]['matricula'].'</span>';

				$arrData[$i]['nombres'] = strtoupper($arrData[$i]['nombres']);
				$arrData[$i]['apellidos'] = strtoupper($arrData[$i]['apellidos']);

				$arrData[$i]['modelo'] = 'Presencial';

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm mr-1" onClick="fntViewInfo('.$arrData[$i]['idpersona'].')" title="Ver Aprendiz"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary btn-sm mr-1" onClick="fntEditInfo(this,'.$arrData[$i]['idpersona'].')" title="Alterar Aprendiz"><i class="fas fa-pencil-alt"></i></button>';
				}
				if($_SESSION['permisosMod']['d'] AND $_SESSION['idRol'] === 1){
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idpersona'].')" title="Remover Aprendiz"><i class="far fa-trash-alt"></i></button>';
				}

				$arrData[$i]['options'] = '<div class="text-center d-flex justify-content-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

    public function getAprendiz($idpersona)
	{
		if($_SESSION['permisosMod']['r']){
			$idusuario = intval($idpersona);
			if($idusuario > 0)
			{
				$arrData = getPersona($idusuario, 1);

				$arrData['modelo'] = 'Presencial';

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

	public function delAprendiz()
	{
		if($_POST)
		{
			if($_SESSION['permisosMod']['d']){
				$intIdpersona = intval($_POST['idUsuario']);
				$requestDelete = getPersona($intIdpersona, 2);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 
											 'msg' => 'Dados salvos com sucesso.',
											'cantAprendizes' => $this->model->cantAprendizes()
											);
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Erro ao remover o Operador.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);	
			}
		}
		die();
	}

	/*** GRÁFICAS ***/
	
	//Mostrar gráfica mensual
	public function aprendizesMes()
	{
		if($_POST)
		{
			$grafica = "aprendizesMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$aprendizes = $this->model->selectUsuariosMes($anio,$mes,RAPRENDIZ);
			$script = getFile("Template/Modals/graficaAprendizesMes", $aprendizes);
			echo $script;
			die();
		}
	}

	//Mostrar gráfica anual
	public function aprendizesAnio(){
		if($_POST){
			$grafica = "aprendizesAnio";
			$anio = intval($_POST['anio']);
			$aprendizes = $this->model->selectUsuariosAnio($anio, RAPRENDIZ);
			$script = getFile("Template/Modals/graficaAnoAprendizes",$aprendizes);
			echo $script;
			die();
		}
	}
}