<?php 

class Telas extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MTELA);
	}

    public function Telas()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/entregar');
		}
		$data['page_tag'] = "monitores";
		$data['page_title'] = "MONITORES";
		$data['page_name'] = "Monitores";
		$data['cantidadTelasD'] = $this->model->cantTelas(1);
		$data['cantidadTelasU'] = $this->model->cantTelas(2);
		$data['cantidadTelasE'] = $this->model->cantTelas(3);
		$data['cantidadTelasC'] = $this->model->cantTelas(4);

		/*** Gráficas ***/ 
		$anio = date("Y");
		$mes = date("m");

		//Mensal
		$data['telasMDia'] = $this->model->selectEquipamentosMes($anio,$mes,MTELA);

		//Anual
		$data['telasAnio'] = $this->model->selectEquipamentosAnio($anio, MTELA);

		$data['page_functions_js'] = "functions_telas.js";
		$this->views->getView($this,"telas",$data);
	}

	public function getTelas()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = getEquipamentos(MTELA, 0);
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnAnnotation = '';
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
					$btnView = '<button class="btn btn-secondary btn-sm mr-1" onClick="fntViewInfo('.$arrData[$i]['idequipamento'].')" title="Ver Equipamento"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-info btn-sm mr-1" onClick="fntEditInfo(this,'.$arrData[$i]['idequipamento'].')" title="Alterar Equipamento"><i class="fas fa-pencil-alt"></i></button>';
					$btnAnnotation = '<button class="btn btn-success btn-sm" onClick="fntViewAddAnnotation('.$arrData[$i]['idequipamento'].')" title="Adicionar Anotação"><i class="fa fa-file-text-o" style="margin-right: 0"></i></button>';
				}
				if($_SESSION['permisosMod']['d']){
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idequipamento'].')" title="Remover Equipamento"><i class="far fa-trash-alt"></i></button>';
				}

				$arrData[$i]['options'] = '<div class="text-center d-flex justify-content-center">'.$btnView.' '.$btnEdit.' '.$btnAnnotation.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getTela($idequipamento)
	{
		if($_SESSION['permisosMod']['r']){
			$IDequipamento = intval($idequipamento);
			if($IDequipamento > 0)
			{
				$arrData = getEquipamentos("", $IDequipamento);
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

	public function getAnotacionesTela($idequipamento)
	{
		if($_SESSION['permisosMod']['r']){
			$IDequipamento = intval($idequipamento);
			if($IDequipamento > 0)
			{
				$arrData = getAnotacionesEquipamento($IDequipamento, MTELA);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Dados não encontrados.');
				}else{
					$trAnotaciones = "";
					$dias = array("Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado");
					for ($i=0; $i < count($arrData); $i++) { 
						if($arrData[$i]['idanotacion'] > 0) {
							$arrData[$i]['datecreated'] = date("d-m-Y", strtotime($arrData[$i]['datecreated']));
							$dia = $dias[date('w', strtotime($arrData[$i]['datecreated']))];
							$ultimo = explode(" ", $arrData[$i]['apellidos']);
							$trAnotaciones .= '<tr class="text-center">
								<td>'.$arrData[$i]['nombres'] = strtoupper(strtok($arrData[$i]['nombres'], " "). ' ' . array_reverse($ultimo)[0]).'</td>
								<td>'.$dia.' (<i>'.$arrData[$i]['datecreated'].'</i>)'.'</td>';
								
								switch ($arrData[$i]['status']) {
									case '1':
										$trAnotaciones .= '<td><h5><span class="badge badge-success">Disponível</span></h5></td>';
										break;
									case '2':
										$trAnotaciones .= '<td><h5><span class="badge badge-info">Em Uso</span></h5></td>';
										break;
									case '3':
										$trAnotaciones .= '<td><h5><span class="badge badge-danger">Estragado</span></h5></td>';
										break;
									default:
										$trAnotaciones .= '<td><h5><span class="badge badge-warning">Concerto</span></h5></td>';
										break;
								}
								$trAnotaciones .= '<td>'.$arrData[$i]['anotacion'].'</td>';
								if(!empty($arrData[$i]['imagen'])) {
									$trAnotaciones .= '<td><a href="'.media().'/images/imagenes/'.$arrData[$i]['imagen'].'" class="btn btn-info" type="button" target="_blank"><i style="margin-right: 0" class="fa fa-lg fa-file-image-o" aria-hidden="true"></i></a></td>';
								} else {
									$trAnotaciones .= '<td><button class="btn btn-secondary" type="button" disabled><i style="margin-right: 0" class="fa fa-lg fa-file-image-o" aria-hidden="true"></i></button></td>';
								}
							$trAnotaciones .= '</tr>';
						} else {
							$trAnotaciones .= '
								<tr class="text-center font-italic">
									<td colspan="4"><h5 class="mt-4 text-info">NENHUMA ANOTAÇÃO</h5></td>
								</tr>';
						}
					}

					$arrResponse = array('status' => true, 'data' => $trAnotaciones);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function setTela()
	{ 
		if($_POST)
		{
			$imagenAnotacion = $_FILES['fileAnotacao'];
			$medida = 1000 * 1000;
			if(empty($_POST['txtLacre']) || empty($_POST['txtMarca']))
			{
				$arrResponse = array("status" => false, "msg" => "Dados errados.");
			} else if($imagenAnotacion['size'] > $medida) {
				$arrResponse = array("status" => false, "msg" => "Tamanho da imagem inválido.");
			} else {
				$idEquipamento = intval($_POST['idEquipamento']);
				$strMarca =  ucwords(strClean($_POST['txtMarca']));
				$strCodigo = strClean($_POST['txtCodigo']);
				$strLacre =  strClean($_POST['txtLacre']);
				$estado = $_POST['estado'];
				$tipo = MTELA;
				$intIdRuta = $_SESSION['idRuta'];
				$strObservacion =  strClean($_POST['txtObservacion']);
				$request_user = "";

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

				if($idEquipamento == 0)
				{
					$option = 1;
					if($_SESSION['permisosMod']['w']){
						$request_user = setEquipamentos($idEquipamento,
														$strMarca,
														$strCodigo,
														$strLacre,
														$estado,
														$tipo,
														$intIdRuta,
														$strObservacion,
														$nombreImagen);
					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_user = setEquipamentos($idEquipamento,
														$strMarca,
														$strCodigo,
														$strLacre,
														$estado,
														$tipo,
														$intIdRuta,
														$strObservacion,
														$nombreImagen);
					}
				}

				if($request_user > 0)
				{
					$anio = date("Y");
					$mes = date("m");

					if($option == 1){
						$arrResponse = array('status' => true, 
											 'msg' => 'Dados salvos com sucesso.',
											 'cantTelaD' => $this->model->cantTelas(1),
											 'cantTelaU' => $this->model->cantTelas(2),
											 'cantTelaE' => $this->model->cantTelas(3),
											 'cantTelaC' => $this->model->cantTelas(4),
											 'infoGrafica' => $this->model->selectEquipamentosMes($anio,$mes,MTELA)
											);
					}else{
						$arrResponse = array('status' => true, 
											 'msg' => 'Dados atualizados com sucesso.',
											 'cantTelaD' => $this->model->cantTelas(1),
											 'cantTelaU' => $this->model->cantTelas(2),
											 'cantTelaE' => $this->model->cantTelas(3),
											 'cantTelaC' => $this->model->cantTelas(4),
											 'infoGrafica' => $this->model->selectEquipamentosMes($anio,$mes,MTELA)
											);
					}
				}else if($request_user == '0'){
					$arrResponse = array('status' => false, 'msg' => 'Atenção! O equipamento já existe, verifique novamente.');
				}else{
					$arrResponse = array("status" => false, "msg" => 'Não foi possível armazenar os dados.');
				}
			}	
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setEstadoTela() 
	{
		if($_POST) 
		{ 
			$imagenAnotacion = $_FILES['fileEstado'];
			$medida = 1000 * 1000;
			if(empty($_POST['listEstado'])) 
			{
				$arrResponse = array("status" => false, "msg" => "Esolha o Tipo de Estado.");
			} else if($imagenAnotacion['size'] > $medida) {
				$arrResponse = array("status" => false, "msg" => "Tamanho da imagem inválido.");
			} else {
				$idEquipamento = intval($_POST['idEquipamentoEstado']);
				$estadoEquipamento = intval($_POST['listEstado']);
				$txtAnotacion = strClean($_POST['txtAnotacaoEstado']);

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

				if($_SESSION['permisosMod']['u']){
					$request_estado = setEstadoEquipamento($idEquipamento, $estadoEquipamento, $txtAnotacion, $nombreImagen, MTELA);
					if($request_estado > 0) {
						$arrResponse = array('status' => true, 
											 'msg' => 'Dados salvos com sucesso.', 
											 'estado' => $request_estado, 
											 'cantTelaD' => $this->model->cantTelas(1),
											 'cantTelaU' => $this->model->cantTelas(2),
											 'cantTelaE' => $this->model->cantTelas(3),
											 'cantTelaC' => $this->model->cantTelas(4),
											);
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

	public function setAdicionarAnotacao() 
	{
		if($_POST) { 
			$imagenAnotacion = $_FILES['fileAnotacao'];
			$medida = 1000 * 1000;
			if(empty($_POST['txtAnotacao'])) {
				$arrResponse = array("status" => false, "msg" => "Digite uma anotação.");
			} else if($imagenAnotacion['size'] > $medida) {
				$arrResponse = array("status" => false, "msg" => "Tamanho da imagem inválido.");
			}else {
				$idEquipamento = intval($_POST['idEquipamentoAnotacao']);
				$usuario = $_SESSION['idUser'];
				$AnotacaoEquipamento = strClean($_POST['txtAnotacao']);

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

				$estadoAnotacaoEquipamento = strClean($_POST['estadoEquipamentoAnotacao']);
				$tipo = MTELA;

				if($_SESSION['permisosMod']['u']){
					$request_anotacion = setAnotaciones($idEquipamento, 
														$usuario, 
														$AnotacaoEquipamento, 
														$nombreImagen, 
														$estadoAnotacaoEquipamento,
														$tipo);
					if($request_anotacion > 0) {
						$arrResponse = array('status' => true, 'msg' => 'Dados salvos com sucesso.');
					}else {
						$arrResponse = array('status' => false, 'msg' => 'Erro ao salvar Anotação.');
					}
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	/*** GRÁFICAS ***/
	
	//Mostrar gráfica mensual
	public function telasMes()
	{
		if($_POST)
		{
			$grafica = "TelasMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$telas = $this->model->selectEquipamentosMes($anio,$mes,MTELA);
			$script = getFile("Template/Modals/graficaMonitoresMes", $telas);
			echo $script;
			die();
		}
	}

	//Mostrar gráfica anual
	public function telasAnio(){
		if($_POST){
			$grafica = "telasAnio";
			$anio = intval($_POST['anio']);
			$telas = $this->model->selectEquipamentosAnio($anio, MTELA);
			$script = getFile("Template/Modals/graficaAnoTelas",$telas);
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
			$arrData = $this->model->datosGraficaEquipamento($fechaGrafica, MTELA);
			$informacion_td = "";

			foreach($arrData as $telas)
			{
				$informacion_td .= "<tr>";
				$informacion_td .= '<td>#'.$telas['lacre'].'</td>';
				$informacion_td .= '<td>'.$telas['marca'].'</td>';

				switch ($telas['status']) {
					case '1':
						$informacion_td .= '<td><h5><span class="badge badge-success">Disponível</span></h5></td>';
						break;
					case '2':
						$informacion_td .= '<td><h5><span class="badge badge-info">Em Uso</span></h5></td>';
						break;
					case '3':
						$informacion_td .= '<td><h5><span class="badge badge-danger">Estragado</span></h5></td>';
						break;
					default:
						$informacion_td .= '<td><h5><span class="badge badge-warning">Concerto</span></h5></td>';
						break;
				}
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