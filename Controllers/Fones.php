<?php 

class Fones extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MFONE);
	}

    public function Fones()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/fones');
		}
		$data['page_tag'] = "Fones";
		$data['page_title'] = "FONES";
		$data['page_name'] = "fones";
		// Cantidades
		$data['cantidadFonesD'] = $this->model->cantFones(1);
		$data['cantidadFonesU'] = $this->model->cantFones(2);
		$data['cantidadFonesE'] = $this->model->cantFones(3);
		$data['cantidadFonesC'] = $this->model->cantFones(4);

		/*** Gráficas ***/ 
		$anio = date("Y");
		$mes = date("m");

		//Mensal
		$data['fonesMDia'] = $this->model->selectEquipamentosMes($anio,$mes,MFONE);

		//Anual
		$data['fonesAnio'] = $this->model->selectFonesAnio($anio);
		$data['page_functions_js'] = "functions_fones.js";
		$this->views->getView($this,"fones",$data);
	}

	public function getFones()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = getEquipamentos(MFONE, 0);
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

	public function getFone($idequipamento)
	{
		if($_SESSION['permisosMod']['r']){
			$IDequipamento = intval($idequipamento);
			if($IDequipamento > 0)
			{
				//$arrData = $this->model->selectFone($IDequipamento);
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

	public function getAnotacionesFone($idequipamento)
	{
		if($_SESSION['permisosMod']['r']){
			$IDequipamento = intval($idequipamento);
			if($IDequipamento > 0)
			{
				$arrData = getAnotacionesEquipamento($IDequipamento, MFONE);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Dados não encontrados.');
				}else{
					$trAnotaciones = "";
					$dias = array("Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado");
					for ($i=0; $i < count($arrData); $i++) { 
						if($arrData[$i]['idanotacion'] > 0) {
							$arrData[$i]['datecreated'] = date("d-m-Y", strtotime($arrData[$i]['datecreated']));
							$arrData[$i]['datecreated'] = fechaInline($arrData[$i]['datecreated']);
							$dia = $dias[date('w', strtotime($arrData[$i]['datecreated']))];
							$ultimo = explode(" ", $arrData[$i]['apellidos']);
							$trAnotaciones .= '<tr class="text-center">
								<td>'.$arrData[$i]['nombres'] = strtoupper(strtok($arrData[$i]['nombres'], " "). ' ' . array_reverse($ultimo)[0]).'</td>
								<td>'.$arrData[$i]['datecreated'].'</td>';
								
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
									$trAnotaciones .= '<td><button class="btn btn-secondary" type="button" disabled><i class="fa fa-lg fa-file-image-o" aria-hidden="true" style="margin-right: 0"></i></button></td>';
								}
							$trAnotaciones .= '</tr>';
						} else {
							$trAnotaciones .= '
								<tr class="text-center font-italic">
									<td colspan="5"><h5 class="mt-4 text-info">NENHUMA ANOTAÇÃO</h5></td>
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

	public function setFone()
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
			}else{
				$idEquipamento = intval($_POST['idEquipamento']);
				$strMarca =  ucwords(strClean($_POST['txtMarca']));
				$strCodigo = strClean($_POST['txtCodigo']);
				$strLacre =  strClean($_POST['txtLacre']);
				$estado = isset($_POST['equipamentoEstragado']) ?  3 : 1;
				$tipo = MFONE;
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
					if($option == 1){
						$arrResponse = array('status' => true, 
											 'msg' => 'Dados salvos com sucesso.',
											 'cantFoneD' => $this->model->cantFones(1),
											 'cantFoneU' => $this->model->cantFones(2),
											 'cantFoneE' => $this->model->cantFones(3),
											 'cantFoneC' => $this->model->cantFones(4),
											);
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

	public function setEstadoFone() 
	{
		if($_POST) { 
			$imagenAnotacion = $_FILES['fileEstado'];
			$medida = 1000 * 1000;
			if(empty($_POST['listEstado']) || empty($_POST['txtAnotacaoEstado'])) {
				$arrResponse = array("status" => false, "msg" => "Os campos com asterisco (*) são obrigatórios.");
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
					$request_estado = setEstadoEquipamento($idEquipamento, $estadoEquipamento, $txtAnotacion, $nombreImagen, MFONE);
					if($request_estado > 0) {
						$arrResponse = array('status' => true, 
											 'msg' => 'Dados salvos com sucesso.', 
											 'estado' => $request_estado, 
											 'cantFoneD' => $this->model->cantFones(1),
											 'cantFoneU' => $this->model->cantFones(2),
											 'cantFoneE' => $this->model->cantFones(3),
											 'cantFoneC' => $this->model->cantFones(4),
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
				$tipo = MFONE;

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
	public function FonesMes()
	{
		if($_POST)
		{
			$grafica = "FonesMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$fones = $this->model->selectEquipamentosMes($anio,$mes,MFONE);
			$script = getFile("Template/Modals/graficaFonesMes", $fones);
			echo $script;
			die();
		}
	}

	//Mostrar gráfica anual
	public function fonesAnio(){
		if($_POST){
			$grafica = "fonesAnio";
			$anio = intval($_POST['anio']);
			$fones = $this->model->selectFonesAnio($anio);
			$script = getFile("Template/Modals/graficaAnoFones",$fones);
			echo $script;
			die();
		}
	}
}
