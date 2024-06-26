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
		$data['gerentes'] = $this->model->cantPersonas(RGERENTE);

		//Usuarios inactivos
		$data['inactivos'] = $this->model->estadoUsuarios(0);

		//Usuarios ctivos
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

				$detalles .= '<tr class="text-center">';
				$detalles .= '<td>'.$fechaFormateada.'</td>';
				$detalles .= '<td>'.$usuariosID[$i]['matricula'].'</td>';
				$detalles .= '<td>'.$usuariosID[$i]['nombres'].'</td>';
				$detalles .= '<td>'.$usuariosID[$i]['nombrerol'].'</td>';
				$detalles .= '<td>'.$usuariosID[$i]['modelo'].'</td>';
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

		$data['fonesMDia'] = $this->model->selectFonesMes($anio,$mes,MFONE);

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

	public function FonesMes()
	{
		if($_POST)
		{
			$grafica = "FonesMes";
			$nFecha = str_replace(" ", "", $_POST['fecha']);
			$arrFecha = explode('-', $nFecha);
			$mes = $arrFecha[0];
			$anio = $arrFecha[1];
			$fones = $this->model->selectFonesMes($anio,$mes,MFONE);
			$script = getFile("Template/Modals/graficaFonesMes", $fones);
			echo $script;
			die();
		}
	}

	/******** CONTROLE ********/
	public function controle()
	{
		$data['page_tag'] = "Dashboard - Controle";
		$data['page_title'] = "Dashboard - Controle";
		$data['page_name'] = "Controle";
		$data['page_functions_js'] = "functions_dashboard.js";
		$this->views->getView($this,"controle",$data);
	}
	
}
?>