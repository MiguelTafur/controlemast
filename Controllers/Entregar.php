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

		//Cantidades
		$data['cantidadEntregas'] = $this->model->cantEntregues();
		$data['cantidadEntregasHoy'] = $this->model->cantEntregues(NOWDATE);

		/*** Gráficas ***/ 
		$anio = date("Y");
		$mes = date("m");

		/* MENSAL */
		//fone
		$data['entregarFonesMDia'] = $this->model->selectControleEquipamentosMes($anio,$mes, MFONE);

		//pc
		$data['entregarComputadoresMDia'] = $this->model->selectControleEquipamentosMes($anio,$mes, MCOMPUTADOR);

		//tela
		$data['entregarTelasMDia'] = $this->model->selectControleEquipamentosMes($anio,$mes, MTELA);

		/* ANUAL */
		//fone
		$data['entregarFonesAnio'] = $this->model->selectControleEquipamentosAnio($anio, MFONE);

		//pc
		$data['entregarComputadoresAnio'] = $this->model->selectControleEquipamentosAnio($anio, MCOMPUTADOR);

		//tela
		$data['entregarTelasAnio'] = $this->model->selectControleEquipamentosAnio($anio, MTELA);


		$data['page_functions_js'] = "functions_controle.js";
		$this->views->getView($this,"entregar",$data);
	}

	//Datos de los fones
    public function getEntregues()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectEntregues(MFONE);
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				//$btnDelete = '';
				$tipo = '';

				$ultimo = explode(" ", $arrData[$i]['apellidos']);
				$arrData[$i]['nombres'] = strtoupper(strtok($arrData[$i]['nombres'], " "). ' ' . array_reverse($ultimo)[0]);

				$tipo = 'Fone';

				$arrData[$i]['fechaRegistro'] = date("d-m-Y", strtotime($arrData[$i]['fechaRegistro']));

				$arrData[$i]['fechaRegistro'] = fechaInline($arrData[$i]['fechaRegistro']);

				$arrData[$i]['equipamento'] = '<h5 class="m-0">'.$tipo.': <span style="cursor: pointer;" class="badge badge-secondary" onClick="fntViewFone('.$arrData[$i]['equipamentoid'].')">#'.$arrData[$i]['lacre'].'</span></h5>';

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

	//Datos de los computadores
    public function getEntreguesComputadores()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectEntregues(MCOMPUTADOR);
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				//$btnDelete = '';
				$tipo = '';

				$ultimo = explode(" ", $arrData[$i]['apellidos']);
				$arrData[$i]['nombres'] = strtoupper(strtok($arrData[$i]['nombres'], " "). ' ' . array_reverse($ultimo)[0]);

				$tipo = 'PC';

				$arrData[$i]['fechaRegistro'] = date("d-m-Y", strtotime($arrData[$i]['fechaRegistro']));

				$arrData[$i]['fechaRegistro'] = fechaInline($arrData[$i]['fechaRegistro']);

				$arrData[$i]['equipamento'] = '<h6 class="m-0">'.$tipo.': <span class="badge badge-secondary">#'.$arrData[$i]['lacre'].'</span></h6>';

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

	//Datos de los computadores
    public function getEntreguesTelas()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectEntregues(MTELA);
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				//$btnDelete = '';
				$tipo = '';

				$ultimo = explode(" ", $arrData[$i]['apellidos']);
				$arrData[$i]['nombres'] = strtoupper(strtok($arrData[$i]['nombres'], " "). ' ' . array_reverse($ultimo)[0]);

				$tipo = 'TELA';

				$arrData[$i]['fechaRegistro'] = date("d-m-Y", strtotime($arrData[$i]['fechaRegistro']));

				$arrData[$i]['fechaRegistro'] = fechaInline($arrData[$i]['fechaRegistro']);

				$arrData[$i]['equipamento'] = '<h6 class="m-0">'.$tipo.': <span class="badge badge-secondary">#'.$arrData[$i]['lacre'].'</span></h6>';

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
			$imagenAnotacion = $_FILES['fileProtocolo'];
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

				if($imagenAnotacion['type'] === 'application/pdf') {
						$nombreImagen = md5(uniqid(rand(), true)) . ".pdf";
					} else {
						$nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
					}

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
					$anio = date("Y");
					$mes = date("m");

					$arrResponse = array('status' => true, 'msg' => 'Dados salvos com sucesso.', 
										 'data' => $request_user,
										 'cantEntregas' => $this->model->cantEntregues(),
										 'cantEntregasHoy' => $this->model->cantEntregues(NOWDATE),
										 'infoGraficaFone' => $this->model->selectControleEquipamentosMes($anio,$mes, MFONE),
										 'infoGraficaPc' => $this->model->selectControleEquipamentosMes($anio,$mes, MCOMPUTADOR),
										 'infoGraficaMonitor' => $this->model->selectControleEquipamentosMes($anio,$mes, MTELA)
										);
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
			$imagenAnotacion = $_FILES['fileEditProtocolo'];
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

				if($imagenAnotacion['type'] === 'application/pdf') {
						$nombreImagen = md5(uniqid(rand(), true)) . ".pdf";
					} else {
						$nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
					}

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
					} else if ($arrData[$i]['tipo'] === 16) {
						$tipo = 'PC';
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

	/*** GRÁFICAS ***/
	
	/** FONES **/
	//Mostrar gráfica mensual
	public function entregarFonesMes()
	{
		if($_POST)
		{
			$grafica = "entregarFonesMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$fones = $this->model->selectControleEquipamentosMes($anio,$mes, MFONE);
			$script = getFile("Template/Modals/graficaEntregarFonesMes", $fones);
			echo $script;
			die();
		}
	}

	//Mostrar gráfica anual
	public function entregarFonesAnio()
	{
		if($_POST){
			$grafica = "entregarFonesAnio";
			$anio = intval($_POST['anio']);
			$fones = $this->model->selectControleEquipamentosAnio($anio, MFONE);
			$script = getFile("Template/Modals/graficaEntregarFonesAnio",$fones);
			echo $script;
			die();
		}
	}

	/** PCS **/
	//Mostrar gráfica mensual
	public function entregarComputadoresMes()
	{
		if($_POST)
		{
			$grafica = "entregarComputadoresMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$pcs = $this->model->selectControleEquipamentosMes($anio,$mes, MCOMPUTADOR);
			$script = getFile("Template/Modals/graficaEntregarComputadoresMes", $pcs);
			echo $script;
			die();
		}
	}

	//Mostrar gráfica anual
	public function entregarComputadoresAnio()
	{
		if($_POST)
		{
			$grafica = "entregarComputadoresAnio";
			$anio = intval($_POST['anio']);
			$pcs = $this->model->selectControleEquipamentosAnio($anio, MCOMPUTADOR);
			$script = getFile("Template/Modals/graficaEntregarComputadoresAnio",$pcs);
			echo $script;
			die();
		}
	}

	/** TELAS **/
	//Mostrar gráfica mensual
	public function entregarTelasMes()
	{
		if($_POST)
		{
			$grafica = "entregarTelasMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$telas = $this->model->selectControleEquipamentosMes($anio,$mes, MTELA);
			$script = getFile("Template/Modals/graficaEntregarTelasMes", $telas);
			echo $script;
			die();
		}
	}

	//Mostrar gráfica anual
	public function entregarTelasAnio()
	{
		if($_POST)
		{
			$grafica = "entregarTelasAnio";
			$anio = intval($_POST['anio']);
			$telas = $this->model->selectControleEquipamentosAnio($anio, MTELA);
			$script = getFile("Template/Modals/graficaEntregarTelasAnio",$telas);
			echo $script;
			die();
		}
	}

	//Información de la gráfica
	public function getDatosGraficaEquipamento()
	{
		if($_POST)
		{
			$fechaGrafica = $_POST['fecha'];
			$equipamento = $_POST['equipamento'];
			$arrData = $this->model->datosGraficaEquipamento($fechaGrafica, $equipamento);
			$informacion_td = "";
			$tipo = '';

			foreach($arrData as $equipamentos)
			{
				if($equipamentos['equipamento'] === 8) {
					$tipo = 'Fone';
				} else if ($equipamentos['equipamento'] === 11) {
					$tipo = 'Tela';
				} else if ($equipamentos['equipamento'] === 16) {
					$tipo = 'PC';
				}

				$equipamentos['status'] = $equipamentos['status'] === 1 ? '<i class="fa fa-check-square fa-lg text-success" aria-hidden="true"></i>' 
																		: '<i class="fa fa-window-close fa-lg text-danger" aria-hidden="true"></i>';

				$informacion_td .= "<tr>";
				$informacion_td .= '<td>'.$equipamentos['status'].'</td>';
				$informacion_td .= '<td>'.$equipamentos['matricula'].'</td>';
				$informacion_td .= '<td>'.formatName($equipamentos['nombres'], $equipamentos['apellidos']).'</td>';
				$informacion_td .= '<td>'.$tipo.': #'.$equipamentos['lacre'].'</td>';
				$informacion_td .= '<td>
										<a href="'.base_url().'/Assets/images/imagenes/'.$equipamentos['protocolo'].'" target="_blank" class="text-dark" style="margin: 0;">
											<i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>
										</a>
									</td>';
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