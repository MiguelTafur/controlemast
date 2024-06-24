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

	public function equipamentos()
	{
		//cantidad total de equipamentos dependiento del "Tipo"
		$data['fones'] = $this->model->cantEquipamentos(MFONE);
		$data['mouses'] = $this->model->cantEquipamentos(MMOUSE);
		$data['teclados'] = $this->model->cantEquipamentos(MTECLADO);
		$data['telas'] = $this->model->cantEquipamentos(MTELA);
		$data['computadores'] = $this->model->cantEquipamentos(MCOMPUTADOR);

		//Últimos fones cadastrados
		$data['ultimosFones'] = $this->model->ultimosEquipamentos(MFONE);

		$data['page_tag'] = "Dashboard - Equipamentos";
		$data['page_title'] = "Dashboard - Equipamentos";
		$data['page_name'] = "Equipamentos";
		$data['page_functions_js'] = "functions_dashboard.js";
		$this->views->getView($this,"equipamentos",$data);
	}

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