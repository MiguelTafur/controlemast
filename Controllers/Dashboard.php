<?php 

class Dashboard extends Controllers{
	public function __construct()
	{
		session_start();
		parent::__construct();
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(MDASHBOARD);
	}

	/******** USUARIOS  ********/
	public function dashboard()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location: ".base_url().'/controle');
		}
		$data['page_tag'] = "Dashboard - Usurarios";
		$data['page_title'] = "Dashboard - Usurarios";
		$data['page_name'] = "Usurarios";

		//cantidad total de usuarios activos dependiento del "Rol"
		$data['operadores'] = $this->model->cantPersonas(ROPERACAO);
		$data['aprendizes'] = $this->model->cantPersonas(RAPRENDIZ);
		$data['lideres'] = $this->model->cantPersonas(RLIDER);
		$data['gestores'] = $this->model->cantPersonas(RGESTOR);
		$data['coordinadores'] = $this->model->cantPersonas(RCOORDINADOR);
		$data['supervisores'] = $this->model->cantPersonas(RSUPERVISOR);
		$data['gerentes'] = $this->model->cantPersonas(RGERENTE);

		//Usuarios inactivos
		$data['inactivos'] = $this->model->estadoUsuarios(0);
		//Usuarios activos
		$data['activos'] = $this->model->estadoUsuarios(1);

		//GRÁFICAS
		$anio = date("Y");
		$mes = date("m");

		$data['usuariosActivosMDia'] = $this->model->selectUsuariosMes($anio,$mes,1);
		$data['usuariosInactivosMDia'] = $this->model->selectUsuariosMes($anio,$mes,0);
		//dep($data['usuariosInactivosMDia']);exit;

		$data['page_functions_js'] = "functions_dashboard.js";

		$this->views->getView($this,"dashboard",$data);
	}

	public function usuariosActivosMes()
	{
		if($_POST)
		{
			$grafica = "usuariosActivosMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$usuarios = $this->model->selectUsuariosMes($anio,$mes,1);
			$script = getFile("Template/Modals/graficaUsuariosActivos", $usuarios);
			echo $script;
			die();
		}
	}

	public function usuariosInactivosMes()
	{
		if($_POST)
		{
			$grafica = "usuariosInactivosMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$usuarios = $this->model->selectUsuariosMes($anio,$mes,0);
			$script = getFile("Template/Modals/graficaUsuariosInactivos", $usuarios);
			echo $script;
			die();
		}
	}

	public function getUsuariosD()
	{
		if($_POST)
		{
			$arrayFechas = explode("-", $_POST['fecha']);
			$fechaI = date("Y-m-d", strtotime(str_replace("/", "-", $arrayFechas[0])));
			$fechaF = date("Y-m-d", strtotime(str_replace("/", "-", $arrayFechas[1])));
			$ruta = $_SESSION['idRuta'];
			$detalles = '';
			//$dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");

			$usuariosD = $this->model->selectUsuariosD($fechaI, $fechaF, $ruta, 1);

			for ($i=0; $i < COUNT($usuariosD); $i++)
			{ 
				$ultimo = explode(" ", $usuariosD[$i]['apellidos']);
				$usuariosD[$i]['nombres'] = strtoupper(strtok($usuariosD[$i]['nombres'], " "). ' ' . array_reverse($ultimo)[0]);

				if($usuariosD[$i]['modelo'] === 1)
				{
					$usuariosD[$i]['modelo'] = 'Presencial';
				}else{
					$usuariosD[$i]['modelo'] = 'Home Office';
				}
				$fechaFormateada = date('d-m-Y', strtotime($usuariosD[$i]['datecreated']));

				$detalles .= '<tr class="text-center">';
				$detalles .= '<td>'.$fechaFormateada.'</td>';
				$detalles .= '<td>'.$usuariosD[$i]['matricula'].'</td>';
				$detalles .= '<td>'.$usuariosD[$i]['nombres'].'</td>';
				$detalles .= '<td>'.$usuariosD[$i]['nombrerol'].'</td>';
				$detalles .= '<td>'.$usuariosD[$i]['modelo'].'</td>';
				$detalles .= '</tr>';
			}
			
			$arrResponse = array('usuariosD' => $detalles);

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
	}

	public function getUsuariosID()
	{
		if($_POST)
		{
			$arrayFechas = explode("-", $_POST['fechaI']);
			$fechaI = date("Y-m-d", strtotime(str_replace("/", "-", $arrayFechas[0])));
			$fechaF = date("Y-m-d", strtotime(str_replace("/", "-", $arrayFechas[1])));
			$ruta = $_SESSION['idRuta'];
			$detalles = '';
			//$dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");

			$usuariosID = $this->model->selectUsuariosD($fechaI, $fechaF, $ruta, 0);

			for ($i=0; $i < COUNT($usuariosID); $i++)
			{ 
				$ultimo = explode(" ", $usuariosID[$i]['apellidos']);
				$usuariosID[$i]['nombres'] = strtoupper(strtok($usuariosID[$i]['nombres'], " "). ' ' . array_reverse($ultimo)[0]);

				if($usuariosID[$i]['modelo'] === 1)
				{
					$usuariosID[$i]['modelo'] = 'Presencial';
				}else{
					$usuariosID[$i]['modelo'] = 'Home Office';
				}
				$fechaFormateada = date('d-m-Y', strtotime($usuariosID[$i]['datecreated']));
				$fechaFormateadaSalida = date('d-m-Y', strtotime($usuariosID[$i]['fechaControle']));
				$fechaFormateada = fechaInline($fechaFormateada);
				$fechaFormateadaSalida = fechaInline($fechaFormateadaSalida);

				if($usuariosID[$i]['status'] === 3) {
					$usuariosID[$i]['status'] = '<span class="font-weight-bold font-italic text-danger">DESLIGADO(A)</span>';
				} else if($usuariosID[$i]['status'] === 4) {
					$usuariosID[$i]['status'] = '<span class="font-weight-bold font-italic text-danger">PEDIU CONTA</span>';
				} else if($usuariosID[$i]['status'] === 5) {
					$usuariosID[$i]['status'] = '<span class="font-weight-bold font-italic text-danger">SEM RENOVAÇÃO</span>';
				} else if($usuariosID[$i]['status'] === 6) {
					$usuariosID[$i]['status'] = '<span class="font-weight-bold font-italic text-danger">JUSTA CAUSA</span>';
				} else if($usuariosID[$i]['status'] === 7) {
					$usuariosID[$i]['status'] = '<span class="font-weight-bold font-italic text-danger">RESCISÃO</span>';
				}

				$detalles .= '<tr class="text-center">';
				$detalles .= '<td>'.$fechaFormateada.'</td>';
				$detalles .= '<td>'.$fechaFormateadaSalida.'</td>';
				$detalles .= '<td>'.$usuariosID[$i]['matricula'].'</td>';
				$detalles .= '<td>'.$usuariosID[$i]['nombres'].'</td>';
				$detalles .= '<td>'.$usuariosID[$i]['nombrerol'].'</td>';
				$detalles .= '<td>'.$usuariosID[$i]['status'].'</td>';
				$detalles .= '</tr>';
			}
			
			$arrResponse = array('usuariosID' => $detalles);

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
	}

	/******** EQUIPAMENTOS  ********/
	public function equipamentos()
	{
		//cantidad total de equipamentos dependiento del "Tipo"
		$data['fones'] = $this->model->cantEquipamentos(MFONE);
		$data['mouses'] = $this->model->cantEquipamentos(MMOUSE);
		$data['teclados'] = $this->model->cantEquipamentos(MTECLADO);
		$data['telas'] = $this->model->cantEquipamentos(MTELA);
		$data['computadores'] = $this->model->cantEquipamentos(MCOMPUTADOR);

		//Últimos fones cadastrados
		$data['ultimosFonesDisponibles'] = $this->model->ultimosEquipamentos(MFONE, 1);
		$data['ultimosFonesUso'] = $this->model->ultimosEquipamentos(MFONE, 2);
		$data['ultimosFonesEstragados'] = $this->model->ultimosEquipamentos(MFONE, 3);
		$data['ultimosFonesConcerto'] = $this->model->ultimosEquipamentos(MFONE, 4);

		//Últimas máquinas cadastradas
		$data['ultimasMaquinasDisponibles'] = $this->model->ultimosEquipamentos(MCOMPUTADOR, 1);
		$data['ultimasMaquinasUso'] = $this->model->ultimosEquipamentos(MCOMPUTADOR, 2);
		$data['ultimasMaquinasEstragadas'] = $this->model->ultimosEquipamentos(MCOMPUTADOR, 3);
		$data['ultimasMaquinasConcerto'] = $this->model->ultimosEquipamentos(MCOMPUTADOR, 4);

		//Últimos Monitores cadastrados
		$data['ultimosMonitoresDisponibles'] = $this->model->ultimosEquipamentos(MTELA, 1);
		$data['ultimosMonitoresUso'] = $this->model->ultimosEquipamentos(MTELA, 2);
		$data['ultimosMonitoresEstragados'] = $this->model->ultimosEquipamentos(MTELA, 3);
		$data['ultimosMonitoresConcerto'] = $this->model->ultimosEquipamentos(MTELA, 4);

		//Últimos Teclados cadastrados
		$data['ultimosTecladosDisponibles'] = $this->model->ultimosEquipamentos(MTECLADO, 1);
		$data['ultimosTecladosUso'] = $this->model->ultimosEquipamentos(MTECLADO, 2);
		$data['ultimosTecladosEstragados'] = $this->model->ultimosEquipamentos(MTECLADO, 3);
		$data['ultimosTecladosConcerto'] = $this->model->ultimosEquipamentos(MTECLADO, 4);

		//Últimos Mouses cadastrados
		$data['ultimosMousesDisponibles'] = $this->model->ultimosEquipamentos(MMOUSE, 1);
		$data['ultimosMousesUso'] = $this->model->ultimosEquipamentos(MMOUSE, 2);
		$data['ultimosMousesEstragados'] = $this->model->ultimosEquipamentos(MMOUSE, 3);
		$data['ultimosMousesConcerto'] = $this->model->ultimosEquipamentos(MMOUSE, 4);

		/**********  GRÁFICAS  ***********/
		$anio = date("Y");
		$mes = date("m");

		$data['fonesMDia'] = $this->model->selectEquipamentosMes($anio,$mes,MFONE);
		$data['mousesMDia'] = $this->model->selectEquipamentosMes($anio,$mes,MMOUSE);
		$data['tecladosMDia'] = $this->model->selectEquipamentosMes($anio,$mes,MTECLADO);
		$data['monitoresMDia'] = $this->model->selectEquipamentosMes($anio,$mes,MTELA);
		$data['computadoresMDia'] = $this->model->selectEquipamentosMes($anio,$mes,MCOMPUTADOR);

		$data['page_tag'] = "Dashboard - Equipamentos";
		$data['page_title'] = "Dashboard - Equipamentos";
		$data['page_name'] = "Equipamentos";
		$data['page_functions_js'] = "functions_dashboard.js";
		$this->views->getView($this,"equipamentos",$data);
	}

	public function getAnotacionesFone(string $dados)
	{
		if($_SESSION['permisosMod']['r']){
			$datos = json_decode($dados, true);
			
			$IDequipamento = $datos['idequipamento'];
			$tipo = $datos['tipo'];

			if($IDequipamento > 0)
			{
				$arrData = getAnotacionesEquipamento($IDequipamento, $tipo);
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
							$arrData[$i]['datecreated'] = fechaInline($arrData[$i]['datecreated']);
							$ultimo = explode(" ", $arrData[$i]['apellidos']);
							$trAnotaciones .= '<tr class="text-center">
								<td>'.$arrData[$i]['nombres'] = strtoupper(strtok($arrData[$i]['nombres'], " "). ' ' . array_reverse($ultimo)[0]).'</td>
								<td><i>'.$arrData[$i]['datecreated'].'</i></td>';
								
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

	public function getFonesD()
	{
		if($_POST)
		{
			$arrayFechas = explode("-", $_POST['fecha']);
			$fechaI = date("Y-m-d", strtotime(str_replace("/", "-", $arrayFechas[0])));
			$fechaF = date("Y-m-d", strtotime(str_replace("/", "-", $arrayFechas[1])));
			$ruta = $_SESSION['idRuta'];
			$detalles = '';
			//$dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");

			$fonesD = $this->model->selectFonesD($fechaI, $fechaF, $ruta, 1);

			for ($i=0; $i < COUNT($fonesD); $i++)
			{ 
				if(empty($fonesD[$i]['codigo'])) {
					$fonesD[$i]['codigo'] = '<span class="text-secondary font-italic">nenhum</span>';
				}

				$fonesD[$i]['lacre'] = '#' . $fonesD[$i]['lacre'];

				switch ($fonesD[$i]['status']) {
					case '1':
						$fonesD[$i]['status'] = '<h5><span class="badge badge-success">Disponível</span></h5>';
						break;
					case '2':
						$fonesD[$i]['status'] = '<h5><span class="badge badge-info">Em Uso</span></h5>';
						break;
					case '3':
						$fonesD[$i]['status'] = '<h5><span class="badge badge-danger">Estragado</span></h5>';
						break;
					default:
						$fonesD[$i]['status'] = '<h5><span class="badge badge-warning">Concerto</span></h5>';
						break;
				}
				
				$fechaFormateada = date('d-m-Y', strtotime($fonesD[$i]['datecreated']));

				$btnAnnotation = '
								<button 
									class="btn btn-secondary" 
									onClick="fntViewAnnotation('.$fonesD[$i]['idequipamento'].', '.MFONE.')" 
									title="Ver Anotações">
									<i class="fa fa-file-text" style="margin-right: 0"></i>
								</button>';

				$detalles .= '<tr class="text-center">';
				$detalles .= '<td>'.$fechaFormateada.'</td>';
				$detalles .= '<td>'.$fonesD[$i]['marca'].'</td>';
				$detalles .= '<td>'.$fonesD[$i]['codigo'].'</td>';
				$detalles .= '<td>'.$fonesD[$i]['lacre'].'</td>';
				$detalles .= '<td>'.$fonesD[$i]['status'].'</td>';
				$detalles .= '<td>'.$btnAnnotation.'</td>';
				$detalles .= '</tr>';
			}
			
			$arrResponse = array('fonesD' => $detalles);

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
	}

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

	public function MousesMes()
	{
		if($_POST)
		{
			$grafica = "MousesMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$mouses = $this->model->selectEquipamentosMes($anio,$mes,MMOUSE);
			$script = getFile("Template/Modals/graficaMousesMes", $mouses);
			echo $script;
			die();
		}
	}

	public function TecladosMes()
	{
		if($_POST)
		{
			$grafica = "TecladosMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$teclados = $this->model->selectEquipamentosMes($anio,$mes,MTECLADO);
			$script = getFile("Template/Modals/graficaTecladosMes", $teclados);
			echo $script;
			die();
		}
	}

	public function MonitoresMes()
	{
		if($_POST)
		{
			$grafica = "MonitoresMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$monitores = $this->model->selectEquipamentosMes($anio,$mes,MTELA);
			$script = getFile("Template/Modals/graficaMonitoresMes", $monitores);
			echo $script;
			die();
		}
	}

	public function ComputadoresMes()
	{
		if($_POST)
		{
			$grafica = "ComputadoresMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$computadores = $this->model->selectEquipamentosMes($anio,$mes,MCOMPUTADOR);
			$script = getFile("Template/Modals/graficaComputadoresMes", $computadores);
			echo $script;
			die();
		}
	}


	/******** CONTROLE ********/
	public function controle()
	{
		//cantidad total de Entregas
		$data['entregas'] = $this->model->cantControle(1, MFONE);
		$data['trocas'] = $this->model->cantControle(2, MFONE);
		$data['desligados'] = $this->model->cantControle(3, MFONE);
		$data['pediuConta'] = $this->model->cantControle(4, MFONE);
		$data['semRenovacao'] = $this->model->cantControle(5, MFONE);
		$data['justaCausa'] = $this->model->cantControle(6, MFONE);
		$data['rescisão'] = $this->model->cantControle(7, MFONE);
		$data['INSS'] = $this->model->cantControle(8, MFONE);
		$data['maternidade'] = $this->model->cantControle(9, MFONE);

		//Últimas entregas
		$data['ultimasEntregas'] = $this->model->ultimosControles(1, MFONE);
		$data['ultimasTrocas'] = $this->model->ultimosControles(2, MFONE);
		$data['ultimosDesligamentos'] = $this->model->ultimosControles(3, MFONE);
		$data['ultimosPediuConta'] = $this->model->ultimosControles(4, MFONE);
		$data['ultimosSemRenovacao'] = $this->model->ultimosControles(5, MFONE);
		$data['ultimosJustaCausa'] = $this->model->ultimosControles(6, MFONE);
		$data['ultimosRescisão'] = $this->model->ultimosControles(7, MFONE);
		$data['ultimosINSS'] = $this->model->ultimosControles(8, MFONE);
		$data['ultimosMaternidade'] = $this->model->ultimosControles(9, MFONE);

		/**********  GRÁFICAS  ***********/
		$anio = date("Y");
		$mes = date("m");

		$data['entregasMDia'] = $this->model->selectControleMes($anio,$mes,1);
		$data['trocasMDia'] = $this->model->selectControleMes($anio,$mes,2);
		$data['desligamentosMDia'] = $this->model->selectControleMes($anio,$mes,3);
		$data['pediuContaMDia'] = $this->model->selectControleMes($anio,$mes,4);
		$data['semRenovacaoMDia'] = $this->model->selectControleMes($anio,$mes,5);
		$data['justaCausaMDia'] = $this->model->selectControleMes($anio,$mes,6);
		$data['rescisaoMDia'] = $this->model->selectControleMes($anio,$mes,7);
		$data['INSSMDia'] = $this->model->selectControleMes($anio,$mes,8);
		$data['maternidadeMDia'] = $this->model->selectControleMes($anio,$mes,9);
		

		$data['page_tag'] = "Dashboard - Controle";
		$data['page_title'] = "Dashboard - Controle";
		$data['page_name'] = "Controle";
		$data['page_functions_js'] = "functions_dashboard.js";
		$this->views->getView($this,"controle",$data);
	}

	//Informacion recente
	public function getControleD()
	{
		if($_POST)
		{
			$arrayFechas = explode("-", $_POST['fecha']);
			$fechaI = date("Y-m-d", strtotime(str_replace("/", "-", $arrayFechas[0])));
			$fechaF = date("Y-m-d", strtotime(str_replace("/", "-", $arrayFechas[1])));
			$ruta = $_SESSION['idRuta'];
			$estado = $_POST['estado'];
			$detalles = '';

			$entregasD = $this->model->selectControleD($fechaI, $fechaF, $ruta, $estado);
			//dep($entregasD);exit;

			for ($i=0; $i < COUNT($entregasD); $i++)
			{ 	
				$fechaFormateada = date('d-m-Y', strtotime($entregasD[$i]['datecreated']));

				if($entregasD[$i]['status'] === 1) {
					$imgprotocolo = $entregasD[$i]['protocolo'];
				} else {
					$imgprotocolo = getProtocolo($entregasD[$i]['equipamentoid'], 0);
				}
				$protocolo = '<a 
					href="'.base_url().'/Assets/images/imagenes/'.$imgprotocolo.'" 
					target="_blank" 
					class="text-dark" 
					style="margin: 0;">
					<i class="fa fa-file-text-o fa-lg" aria-hidden="true">
					</i>
				</a>';

				$entregasD[$i]['lacre'] = '<h6>Fone: <span class="badge badge-secondary p-1">#'.$entregasD[$i]['lacre'].'</span></h5>';

				$nombreFormateado = formatName($entregasD[$i]['nombres'], $entregasD[$i]['apellidos']);

				$detalles .= '<tr class="text-center">';
				$detalles .= '<td>'.$fechaFormateada.'</td>';
				$detalles .= '<td>'.$protocolo.'</td>';
				$detalles .= '<td>'.$entregasD[$i]['lacre'].'</td>';
				$detalles .= '<td>'.$entregasD[$i]['matricula'].'</td>';
				$detalles .= '<td>'.$nombreFormateado.'</td>';
				//$detalles .= '<td>'.$btnAnnotation.'</td>';
				$detalles .= '</tr>';
			}
			
			$arrResponse = array('fonesD' => $detalles);

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
	}
	
	public function getRecebido($idrecebido)
	{
		if($_SESSION['permisosMod']['r']){
			$idRecebido = intval($idrecebido);
			if($idRecebido > 0)
			{
				$arrData = $this->model->selectRecebido($idRecebido);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Dados não encontrados.');
				}else{

					if($arrData['protocolo']) {
						$arrData['protocolo'] = '<a href="'.base_url().'/Assets/images/imagenes/'.$arrData['protocolo'].'" target="_blank" class="text-dark" style="margin: 0;"><i class="fa fa-file-image-o fa-2x" aria-hidden="true"></i></a>';
					} else {
						$arrData['protocolo'] = '<span class="font-italic text-secondary">Sem Evidência</span>';
					}

					if($arrData['status'] === 2) {
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">TROCA</span>';
					} else if($arrData['status'] === 3) {
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">DESLIGAMENTO</span>';
					} else if($arrData['status'] === 4){
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">PEDIU CONTA</span>';
					} else if($arrData['status'] === 5){
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">SEM RENOVAÇÃO DO CONTRATO</span>';
					} else if($arrData['status'] === 6){
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">JUSTA CAUSA</span>';
					} else if($arrData['status'] === 7){
						$arrData['status'] = '<span class="font-weight-bold font-italic text-danger">RESCISÃO</span>';
					}

					$arrData['observacion'] = '<span class="font-italic">'.$arrData['observacion'].'</span>';
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function entregasMes()
	{
		if($_POST)
		{
			$grafica = "entregasMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$entregas = $this->model->selectControleMes($anio,$mes,1);
			$script = getFile("Template/Modals/graficaEntregasMes", $entregas);
			echo $script;
			die();
		}
	}

	public function trocasMes()
	{
		if($_POST)
		{
			$grafica = "trocasMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$trocas = $this->model->selectControleMes($anio,$mes,2);
			$script = getFile("Template/Modals/graficaTrocasMes", $trocas);
			echo $script;
			die();
		}
	}

	public function pediuContaMes()
	{
		if($_POST)
		{
			$grafica = "pediuContaMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$pediuConta = $this->model->selectControleMes($anio,$mes,3);
			$script = getFile("Template/Modals/graficaPediuContaMes", $pediuConta);
			echo $script;
			die();
		}
	}

	public function desligamentosMes()
	{
		if($_POST)
		{
			$grafica = "desligamentosMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$desligamentos = $this->model->selectControleMes($anio,$mes,4);
			$script = getFile("Template/Modals/graficaDesligamentosMes", $desligamentos);
			echo $script;
			die();
		}
	}

	public function semRenovacaoMes()
	{
		if($_POST)
		{
			$grafica = "semRenovacaoMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$semRenovacao = $this->model->selectControleMes($anio,$mes,5);
			$script = getFile("Template/Modals/graficaSemRenovacaoMes", $semRenovacao);
			echo $script;
			die();
		}
	}

	public function justaCausaMes()
	{
		if($_POST)
		{
			$grafica = "justaCausaMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$justaCausa = $this->model->selectControleMes($anio,$mes,6);
			$script = getFile("Template/Modals/graficaJustaCausaMes", $justaCausa);
			echo $script;
			die();
		}
	}

	public function rescisaoMes()
	{
		if($_POST)
		{
			$grafica = "rescisaoMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$rescisao = $this->model->selectControleMes($anio,$mes,7);
			$script = getFile("Template/Modals/graficaRescisaoMes", $rescisao);
			echo $script;
			die();
		}
	}

	public function INSSMes()
	{
		if($_POST)
		{
			$grafica = "INSSMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$INSS = $this->model->selectControleMes($anio,$mes,8);
			$script = getFile("Template/Modals/graficaINSSMes", $INSS);
			echo $script;
			die();
		}
	}

	public function maternidadeMes()
	{
		if($_POST)
		{
			$grafica = "maternidadeMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$maternidade = $this->model->selectControleMes($anio,$mes,9);
			$script = getFile("Template/Modals/graficaMaternidadeMes", $maternidade);
			echo $script;
			die();
		}
	}
}
?>