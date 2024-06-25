<?php

class DashboardModel extends Mysql
{
	PRIVATE $intIdRuta;
	PRIVATE $intIdPrestamo;
	PRIVATE $intIdCliente;
	PRIVATE $strFecha;
	PRIVATE $strFecha2;
	PRIVATE $intTipoEquipamento;
	PRIVATE $intEstadoEquipamento;

	public function __construct()
	{
		parent::__construct();
	}

	/***********   USUARIOS   ************/

	//Cantidad total de usuarios dependiendo del rol
	public function cantPersonas($rol)
	{
		$rutaId = $_SESSION['idRuta'];
		$sql = "SELECT COUNT(*) AS total FROM persona WHERE codigoruta = $rutaId AND status != 0 AND rolid = ".$rol;
			$request = $this->select($sql);

		return $request['total'];
	}

	//Cantidad total de equiopamentos dependiendo del módulo
	public function cantEquipamentos($tipo) 
	{
		$rutaId = $_SESSION['idRuta'];
		$sql = "SELECT COUNT(*) AS total FROM equipamento WHERE codigoruta = $rutaId AND status != 0 AND tipo = ".$tipo;
		$request = $this->select($sql);

		return $request['total'];
	}

	//Traer los usuários Activos e inactivos
	public function estadoUsuarios(int $estado)
	{
		$rutaId = $_SESSION['idRuta'];
		if($estado === 1) {
			$sql = "SELECT pe.matricula,
					   pe.nombres,
					   pe.apellidos,
					   pe.datecreated,
					   pe.rolid,
					   pe.modelo,
					   co.status,
					   ro.nombrerol
					FROM persona pe LEFT OUTER JOIN controle co
					ON pe.idpersona = co.personaid 
					LEFT OUTER JOIN rol ro
					ON pe.rolid = ro.idrol
					WHERE codigoruta = $rutaId AND pe.status != 0 AND (co.status != 3 || co.status != 4)
					ORDER BY datecreated DESC LIMIT 6";
		} else {
			$sql = "SELECT pe.matricula,
					   pe.nombres,
					   pe.apellidos,
					   pe.datecreated,
					   pe.rolid,
					   pe.modelo,
					   co.status,
					   ro.nombrerol
					FROM persona pe LEFT OUTER JOIN controle co
					ON pe.idpersona = co.personaid 
					LEFT OUTER JOIN rol ro
					ON pe.rolid = ro.idrol
					WHERE codigoruta = $rutaId AND pe.status = 0 AND (co.status = 3 || co.status = 4)
					ORDER BY datecreated DESC LIMIT 6";
		}
		
		$request = $this->select_all($sql);
		return $request;
	}

	//Gráfica mensual de usuarios 
	public function selectUsuariosMes(int $anio, int $mes, int $estado)
	{
		$totalUsuariosMes = 0;
		$arrUsuariosDias = array();
		$rutaId = $_SESSION['idRuta'];
		$dias = cal_days_in_month(CAL_GREGORIAN,$mes,$anio);
		$n_dia = 1;
		for ($i=0; $i < $dias; $i++)
		{
			$date = date_create($anio.'-'.$mes.'-'.$n_dia);
			$fechaUsuario = date_format($date, "Y-m-d");
			
			if($estado === 1) 
			{
				$sql = "SELECT DAY(datecreated) as dia FROM persona WHERE DATE(datecreated) = '$fechaUsuario' AND codigoruta = $rutaId AND status != 0";
				$usuarioDia = $this->select($sql);

				$sqlTotal = "SELECT COUNT(*) as total FROM persona WHERE DATE(datecreated) = '$fechaUsuario' AND codigoruta = $rutaId AND status != 0 AND rolid != 1";
				$usuarioDiaTotal = $this->select($sqlTotal);
				$usuarioDiaTotal = $usuarioDiaTotal['total'];
			} else {
				$sql = "SELECT DAY(datecreated) as dia FROM persona WHERE DATE(datecreated) = '$fechaUsuario' AND codigoruta = $rutaId AND status = 0";
				$usuarioDia = $this->select($sql);

				$sqlTotal = "SELECT COUNT(*) as total FROM persona WHERE DATE(datecreated) = '$fechaUsuario' AND codigoruta = $rutaId AND status = 0 AND rolid != 1";
				$usuarioDiaTotal = $this->select($sqlTotal);
				$usuarioDiaTotal = $usuarioDiaTotal['total'];
			}
			

			$usuarioDia['dia'] = $n_dia;
			$usuarioDia['usuario'] = $usuarioDiaTotal;
			$usuarioDia['usuario'] = $usuarioDia['usuario'] == "" ? 0 : $usuarioDia['usuario'];
			$totalUsuariosMes += $usuarioDiaTotal;
			array_push($arrUsuariosDias, $usuarioDia);
			$n_dia++;

		}
		$meses = Meses();
		$arrData = array('anio' => $anio, 'mes' => $meses[intval($mes - 1)], 'total' => $totalUsuariosMes, 'usuarios' => $arrUsuariosDias);
		return $arrData;
	}

	//Trae los usuarios en un rango de fechas 
	public function selectUsuariosD(string $fechaI, string $fechaF, int $ruta, int $estado)
	{
		$this->strFecha = $fechaI;
		$this->strFecha2 = $fechaF;
		$this->intIdRuta = $ruta;

		if($estado === 1) {
			$sql = "SELECT pe.matricula,
					   pe.nombres,
					   pe.apellidos,
					   pe.modelo,
					   pe.datecreated,
					   ro.nombrerol
					FROM persona pe 
					LEFT OUTER JOIN rol ro 
					ON(pe.rolid = ro.idrol)
					WHERE pe.datecreated
					BETWEEN '{$this->strFecha}' AND '{$this->strFecha2}' AND pe.codigoruta = $ruta AND pe.status != 0 ORDER BY pe.datecreated desc";
		} else {
			$sql = "SELECT pe.matricula,
					   pe.nombres,
					   pe.apellidos,
					   pe.modelo,
					   pe.datecreated,
					   ro.nombrerol
					FROM persona pe 
					LEFT OUTER JOIN rol ro 
					ON(pe.rolid = ro.idrol) 
					WHERE pe.datecreated
					BETWEEN '{$this->strFecha}' AND '{$this->strFecha2}' AND pe.codigoruta = $ruta AND pe.status = 0 ORDER BY pe.datecreated desc";
		}
		
		$request = $this->select_all($sql);

		return $request;

	}

	/***********   EQUIPAMENTOS   ************/
	public function ultimosEquipamentos(int $tipo, int $estado)
	{
		$rutaId = $_SESSION['idRuta'];
		$this->intTipoEquipamento = $tipo;
		$this->intEstadoEquipamento = $estado;
		$sql = "SELECT idequipamento,
					   marca,
					   codigo,
					   lacre,
					   datecreated,
					   status
				FROM equipamento
				WHERE codigoruta = $rutaId AND tipo = $this->intTipoEquipamento AND status = $this->intEstadoEquipamento
				ORDER BY datecreated DESC LIMIT 6";
		$request = $this->select_all($sql);
		return $request;
	}
}