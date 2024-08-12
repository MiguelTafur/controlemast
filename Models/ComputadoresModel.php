<?php 

class ComputadoresModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}

	PRIVATE $intStatus;

	//Cantidades
	public function cantComputadores($estado) {
		$this->intStatus = $estado;
		$ruta = $_SESSION['idRuta'];

		$sql = "SELECT COUNT(*) AS total FROM equipamento WHERE status = $this->intStatus 
																AND tipo = " . MCOMPUTADOR ." AND codigoruta = $ruta";
		$request = $this->select($sql);
		return $request['total'];
	}

	/*** GRÁFICAS ***/

	//Gráfica mensual de cantidades cadastrados
	public function selectEquipamentosMes(string $anio, string $mes, int $tipo)
	{
		$totalComputadoresMes = 0;
		$arrEquipamentosDias = array();
		$rutaId = $_SESSION['idRuta'];
		$this->intTipoEquipamento = $tipo;
		$dias = cal_days_in_month(CAL_GREGORIAN,$mes,$anio);
		$n_dia = 1;
		for ($i=0; $i < $dias; $i++)
		{
			$date = date_create($anio.'-'.$mes.'-'.$n_dia);
			$fechaEquipamento = date_format($date, "Y-m-d");
		
			$sql = "SELECT DAY(datecreated) as dia FROM equipamento WHERE DATE(datecreated) = '$fechaEquipamento' AND codigoruta = $rutaId AND tipo = $this->intTipoEquipamento";
			$equipamentoDia = $this->select($sql);

			$sqlTotal = "SELECT COUNT(*) as total FROM equipamento WHERE DATE(datecreated) = '$fechaEquipamento' AND codigoruta = $rutaId AND status != 0 AND tipo = $this->intTipoEquipamento";
			$equipamentoDiaTotal = $this->select($sqlTotal);
			$equipamentoDiaTotal = $equipamentoDiaTotal['total'];

			$sqlEquipamentos = "SELECT idequipamento, lacre FROM equipamento WHERE datecreated = '$fechaEquipamento' AND codigoruta = $rutaId AND status != 0 AND tipo = $this->intTipoEquipamento";
			$idEquipamentos = $this->select_all($sqlEquipamentos);

			$equipamentoDia['dia'] = $n_dia;
			$equipamentoDia['equipamento'] = $equipamentoDiaTotal;
			$equipamentoDia['equipamento'] = $equipamentoDia['equipamento'] == "" ? 0 : $equipamentoDia['equipamento'];
			$equipamentoDia['idequipamentos'] = $idEquipamentos;
			$totalComputadoresMes += $equipamentoDiaTotal;
			array_push($arrEquipamentosDias, $equipamentoDia);
			$n_dia++;

		}
		$meses = Meses();
		$arrData = array('anio' => $anio, 'mes' => $meses[intval($mes - 1)], 'total' => $totalComputadoresMes, 'equipamentos' => $arrEquipamentosDias);
		return $arrData;
	}

	//Gráfica anual de cantidades cadastrados
	public function selectEquipamentosAnio(string $anio, int $tipo) {
		$this->intTipoEquipamento = $tipo;
		$arrMEquipamentos = array();
		$arrMeses = Meses();
		$totalEquipamentos = 0;
		$ruta = $_SESSION['idRuta'];

		for ($i=1; $i <= 12; $i++) {
			$arrData = array('anio' => '', 'no_mes' => '', 'mes' => '');
			$sql = "SELECT $anio AS anio, $i AS mes, COUNT(idequipamento) AS total
					FROM equipamento 
					WHERE month(datecreated) = $i 
					AND year(datecreated) = $anio 
					AND status != 0 
					AND tipo = $this->intTipoEquipamento 
					AND codigoruta = $ruta
					GROUP BY month(datecreated)";
			$equipamentoMes = $this->select($sql);
			$arrData['mes'] = $arrMeses[$i-1];

			if(empty($equipamentoMes)){
				$arrData['anio'] = $anio;
				$arrData['no_mes'] = $i;
				$arrData['total'] = 0;
			}else{
				$arrData['anio'] = $equipamentoMes['anio'];
				$arrData['no_mes'] = $equipamentoMes['mes'];
				$arrData['total'] = $equipamentoMes['total'];
				$totalEquipamentos += $equipamentoMes['total'];
			}
			array_push($arrMEquipamentos, $arrData);
		}

		$arrEquipamentos = array('totalEquipamentos' => $totalEquipamentos, 'anio' => $anio, 'meses' => $arrMEquipamentos);
		return $arrEquipamentos;

	}
}