<?php 

class Supervisores extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MSUPERVISOR);
	}

	public function Supervisores()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/controles');
		}
		$data['page_tag'] = "Supervisores";
		$data['page_title'] = "SUPERVISORES";
		$data['page_name'] = "supervisores";

		//Cantidades
		$data['cantidadSupervisores'] = $this->model->cantSupervisores();

		/*** Gráficas ***/ 
		$anio = date("Y");
		$mes = date("m");

		//Mensal
		$data['supervisoresMDia'] = $this->model->selectUsuariosMes($anio,$mes,RSUPERVISOR);

		//Anual
		$data['supervisoresAnio'] = $this->model->selectUsuariosAnio($anio, RSUPERVISOR);

		$data['page_functions_js'] = "functions_supervisores.js";
		$this->views->getView($this,"supervisores",$data);
	}
	
	public function setSupervisor()
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
				$intTipoId = RSUPERVISOR;
				$intRuta = $_SESSION['idRuta'];
				$intModelo = intval($_POST['listModelo']);
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
					$anio = date("Y");
					$mes = date("m");

					if($option == 1){


						$arrResponse = array('status' => true, 
											 'msg' => 'Dados salvos com sucesso.',
											 'cantSupervisores' => $this->model->cantSupervisores(),
											 'infoGrafica' => $this->model->selectUsuariosMes($anio,$mes,RSUPERVISOR)	
											);
					}else{
						$arrResponse = array('status' => true, 
											 'msg' => 'Dados atualizados com sucesso.',
											 'cantSupervisores' => $this->model->cantSupervisores(),
											 'infoGrafica' => $this->model->selectUsuariosMes($anio,$mes,RSUPERVISOR)	
											);
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

	public function getSupervisores()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = getPersonas(RSUPERVISOR);

			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				$arrData[$i]['matricula'] = '<span class="font-weight-bold font-italic">'.$arrData[$i]['matricula'].'</span>';

				$arrData[$i]['nombres'] = strtoupper($arrData[$i]['nombres']);
				$arrData[$i]['apellidos'] = strtoupper($arrData[$i]['apellidos']);

				if($arrData[$i]['modelo'] === 1)
				{
					$arrData[$i]['modelo'] = 'Presencial';
				}else{
					$arrData[$i]['modelo'] = 'Home Office';
				}

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm mr-1" onClick="fntViewInfo('.$arrData[$i]['idpersona'].')" title="Ver Supervisor"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary btn-sm mr-1" onClick="fntEditInfo(this,'.$arrData[$i]['idpersona'].')" title="Alterar Supervisor"><i class="fas fa-pencil-alt"></i></button>';
				}
				if($_SESSION['permisosMod']['d']){
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idpersona'].')" title="Remover Supervisor"><i class="far fa-trash-alt"></i></button>';
				}

				$arrData[$i]['options'] = '<div class="text-center d-flex justify-content-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getSupervisor($idpersona)
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
					$arrResponse = array('status' => false, 'msg' => 'Dados não encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function delSupervisor()
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
										 'cantSupervisores' => $this->model->cantSupervisores()	
										);
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Erro ao remover o Líder.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);	
			}
		}
		die();
	}

	/*** GRÁFICAS ***/
	
	//Mostrar gráfica mensual
	public function supervisoresMes()
	{
		if($_POST)
		{
			$grafica = "supervisoresMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$supervisores = $this->model->selectUsuariosMes($anio,$mes,RSUPERVISOR);
			$script = getFile("Template/Modals/graficaSupervisoresMes", $supervisores);
			echo $script;
			die();
		}
	}

	//Mostrar gráfica anual
	public function supervisoresAnio()
	{
		if($_POST){
			$grafica = "supervisoresAnio";
			$anio = intval($_POST['anio']);
			$supervisores = $this->model->selectUsuariosAnio($anio, RSUPERVISOR);
			$script = getFile("Template/Modals/graficaAnoSupervisores",$supervisores);
			echo $script;
			die();
		}
	}

	//Información de la gráfica
	public function getDatosGraficaPersona()
	{
		if($_POST)
		{
			$fechaGrafica = $_POST['fecha'];
			$arrData = $this->model->datosGraficaPersona($fechaGrafica, RSUPERVISOR);
			$informacion_td = "";

			foreach($arrData as $supervisor)
			{
				$modelo = $supervisor['modelo'] === 1 ? 'Presencial' : 'Home Office';
				$informacion_td .= "<tr>";
				$informacion_td .= '<td class="font-weight-bold font-italic">#'.$supervisor['matricula'].'</td>';
				$informacion_td .= '<td>'.formatName($supervisor['nombres'], $supervisor['apellidos']).'</td>';
				$informacion_td .= '<td>'.$modelo.'</td>';
			}

			$informacion_td .= "</tr>";
			
			if($arrData)
			{
				$fecha = $arrData[0]['fecha'];
				$arrResponse = array('status' => true, 'data' => $informacion_td, 'fecha' => $fecha);	
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Nenhum dado encontrado.');
			}

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}

?>