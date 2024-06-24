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

	public function equipamentos()
	{
		//cantidad total de equipamentos dependiento del "Tipo"
		$data['fones'] = $this->model->cantEquipamentos(MFONE);
		$data['mouses'] = $this->model->cantEquipamentos(MMOUSE);
		$data['teclados'] = $this->model->cantEquipamentos(MTECLADO);
		$data['telas'] = $this->model->cantEquipamentos(MTELA);
		$data['computadores'] = $this->model->cantEquipamentos(MCOMPUTADOR);

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