<?php 

class CoordinadoresModel extends Mysql
{

	PRIVATE $intStatus;

	public function __construct()
	{
		parent::__construct();
	}	

	public function cantCoordenadores()
	{
		$sql = "SELECT COUNT(*) as total FROM persona WHERE status != 0 AND rolid = " . RCOORDINADOR;
		$request = $this->select($sql);
		return $request['total'];
	}

	/*** GRÁFICAS ***/

	//Gráfica mensual de cantidades cadastrados
	public function selectUsuariosMes(string $anio, string $mes, int $tipo)
	{
		$totalUsuariosMes = 0;
		$arrUsuariosDias = array();
		$rutaId = $_SESSION['idRuta'];
		$this->intStatus = $tipo;
		$dias = cal_days_in_month(CAL_GREGORIAN,$mes,$anio);
		$n_dia = 1;
		for ($i=0; $i < $dias; $i++)
		{
			$date = date_create($anio.'-'.$mes.'-'.$n_dia);
			$fechaUsuario = date_format($date, "Y-m-d");
		
			$sql = "SELECT DAY(datecreated) as dia FROM persona WHERE DATE(datecreated) = '$fechaUsuario' AND codigoruta = $rutaId AND rolid = $this->intStatus";
			$usuarioDia = $this->select($sql);

			$sqlTotal = "SELECT COUNT(*) as total FROM persona WHERE DATE(datecreated) = '$fechaUsuario' AND codigoruta = $rutaId AND status != 0 AND rolid = $this->intStatus";
			$usuarioDiaTotal = $this->select($sqlTotal);
			$usuarioDiaTotal = $usuarioDiaTotal['total'];

			$usuarioDia['dia'] = $n_dia;
			$usuarioDia['usuario'] = $usuarioDiaTotal;
			$usuarioDia['usuario'] = $usuarioDia['usuario'] == "" ? 0 : $usuarioDia['usuario'];
			$totalUsuariosMes += $usuarioDiaTotal;
			array_push($arrUsuariosDias, $usuarioDia);
			$n_dia++;

		}
		$meses = Meses();
		$arrData = array('anio' => $anio, 'mes' => $meses[intval($mes - 1)], 'numeroMes' => $mes, 'total' => $totalUsuariosMes, 'usuarios' => $arrUsuariosDias);
		return $arrData;
	}

	//Gráfica anual de cantidades cadastrados
	public function selectUsuariosAnio(string $anio, int $tipo) 
	{
		$this->intStatus = $tipo;
		$arrMUsuarios = array();
		$arrMeses = Meses();
		$totalUsuarios = 0;
		$ruta = $_SESSION['idRuta'];

		for ($i=1; $i <= 12; $i++) {
			$arrData = array('anio' => '', 'no_mes' => '', 'mes' => '');
			$sql = "SELECT $anio AS anio, $i AS mes, COUNT(idpersona) AS total
					FROM persona 
					WHERE month(datecreated) = $i 
					AND year(datecreated) = $anio 
					AND status != 0 
					AND rolid = $this->intStatus 
					AND codigoruta = $ruta
					GROUP BY month(datecreated)";
			$usuarioMes = $this->select($sql);
			$arrData['mes'] = $arrMeses[$i-1];

			if(empty($usuarioMes)){
				$arrData['anio'] = $anio;
				$arrData['no_mes'] = $i;
				$arrData['total'] = 0;
			}else{
				$arrData['anio'] = $usuarioMes['anio'];
				$arrData['no_mes'] = $usuarioMes['mes'];
				$arrData['total'] = $usuarioMes['total'];
				$totalUsuarios += $usuarioMes['total'];
			}
			array_push($arrMUsuarios, $arrData);
		}

		$arrUsuarios = array('totalUsuarios' => $totalUsuarios, 'anio' => $anio, 'meses' => $arrMUsuarios);
		return $arrUsuarios;

	}

	//Información de la gráfica
	public function datosGraficaPersona(string $fecha, int $tipo) 
	{
		$this->strFecha = $fecha;
		$this->intTipo = $tipo;
		$rutaId = $_SESSION['idRuta'];

		$sql = "SELECT pe.matricula, pe.nombres, pe.apellidos, pe.modelo, DATE_FORMAT(pe.datecreated, '%d-%m-%Y') as fecha 
				FROM persona pe
				LEFT OUTER JOIN rol ro ON(ro.idrol = pe.rolid)
				WHERE ro.idrol = $this->intTipo AND pe.datecreated = '{$this->strFecha}' AND pe.codigoruta = $rutaId";
		$request = $this->select_all($sql);

		return $request;
	}
}