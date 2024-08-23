<?php

class ReceberModel extends Mysql
{
	PRIVATE $intIdControle;
	PRIVATE $listUsuario;
	PRIVATE $intIdUsuario;
	PRIVATE $listEquipamento;
	PRIVATE $listEstado;
	PRIVATE $strProtocolo;
	PRIVATE $strObservacion;
	PRIVATE $intIdEquipamento;
	PRIVATE $intIdRuta;
	PRIVATE $intTipo;

	public function __construct()
	{
		parent::__construct();
	}

	public function selectRecebidos(int $tipo)
	{
		$ruta = $_SESSION['idRuta'];
		$this->intTipo = $tipo;

		$sql = "SELECT co.idcontrole,
                       co.personaid,
                       co.equipamentoid,
                       co.observacion,
                       DATE_FORMAT(co.datecreated, '%d-%m-%Y') as fechaRegistro,
					   co.status,
                       pe.matricula,
                       pe.nombres,
                       pe.apellidos,
                       eq.tipo as equipamento,
                       eq.lacre
                FROM controle co
                LEFT OUTER JOIN persona pe
                ON co.personaid = pe.idpersona
                LEFT OUTER JOIN equipamento eq
                ON co.equipamentoid = eq.idequipamento
                WHERE co.status != 1 
				AND co.status != 0
				AND eq.tipo = $this->intTipo
                AND pe.codigoruta = $ruta";
		$request = $this->select_all($sql);
		return $request;
	}

	// Trae los usuarios con el estado del equipamento 1(Entregue)
	public function selectUsuarios($ruta)
	{
		$this->intIdRuta = $ruta;
		$sql = "SELECT pe.idpersona, pe.matricula, pe.nombres, pe.apellidos, co.equipamentoid, co.personaid, co.status
			FROM persona pe
			LEFT OUTER JOIN controle co
			ON pe.idpersona = co.personaid
			WHERE pe.status != 0
			AND pe.idpersona != 1
			AND co.status = 1
			AND codigoruta = $this->intIdRuta
			ORDER BY nombres ASC";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectEquipamento(int $idusuario, int $idequipamento) 
	{
		$this->listUsuario = $idusuario;
		$this->intIdEquipamento = $idequipamento;
		$sql = "SELECT eq.idequipamento, eq.tipo, eq.lacre 
				FROM controle co 
				LEFT OUTER JOIN equipamento eq
				ON co.equipamentoid = eq.idequipamento
				WHERE co.personaid = $this->listUsuario
				AND co.equipamentoid = $this->intIdEquipamento
				AND co.status = 1";
		$request = $this->select($sql);
		return $request;
	}

	public function selectRecebido(int $idrecebido)
	{
		$this->intIdControle = $idrecebido;
		$sql = "SELECT co.idcontrole, 
                       co.observacion, 
                       co.protocolo, 
                       co.datecreated, 
					   co.status,
                       pe.matricula, 
                       pe.nombres, 
                       pe.apellidos, 
                       eq.marca,
                       eq.lacre
				FROM controle co 
                LEFT OUTER JOIN persona pe
                ON pe.idpersona = co.personaid
                LEFT OUTER JOIN equipamento eq
                ON eq.idequipamento = co.equipamentoid
				WHERE idcontrole = $this->intIdControle";
		$request = $this->select($sql);
		return $request;
	}

	public function insertControleReceber(int $idequipamento, int $usuario, int $acao, string $observacion, int $check, string $imagem)
	{
		$this->listEquipamento = $idequipamento;
		$this->listUsuario = $usuario;
		$this->intIdUsuario = $_SESSION['idUser'];
		$this->listEstado = $acao;
		$this->strObservacion = $observacion;
		$this->strProtocolo = $imagem;
		$fecha = date('Y-m-d');
		$return = 0;

		//Selecciona el ID del control actual entregado
		$query_select = "SELECT * 
						 FROM controle 
						 WHERE personaid = $this->listUsuario 
						 AND equipamentoid = $this->listEquipamento
						 AND status = 1";
		$request_select = $this->select($query_select);
		$idcontrole = $request_select['idcontrole'];

		$e = $this->selectEquipamento($this->listUsuario, $this->listEquipamento);

        $query_insert = "INSERT INTO controle(personaid,equipamentoid,protocolo,observacion,datecreated,status)  VALUES(?,?,?,?,?,?)";
        $arrData = array($this->listUsuario,$this->listEquipamento,$this->strProtocolo,$this->strObservacion,$fecha,$this->listEstado);
        $request_insert = $this->insert($query_insert, $arrData);
		
        if($request_insert) {
			//Actualizar el estado del usuario
			if($this->listEstado !== 2) {
				$query_update_usuario = "UPDATE persona SET status = ? WHERE idpersona = $this->listUsuario";
				$arrData = array(0);
				$request_update_usuario = $this->update($query_update_usuario, $arrData);
			}

			//Actualiza el estado del control
			$query_update_controle = "UPDATE controle SET status = ? WHERE idcontrole = $idcontrole";
			$arrDataControle = array(0);
			$request_update_controle = $this->update($query_update_controle, $arrDataControle);

			//Actualiza el estado del equipamento
            $query_update = "UPDATE equipamento SET status = ? WHERE idequipamento = $this->listEquipamento";
			if($check === 1) { $estado = 3; } else { $estado = 1;}

			$arrData = array($estado);
			$request_update = $this->update($query_update,$arrData);

			$tipo = $e['tipo'];
			$equipamento = $e['idequipamento'];
            

			//Agrega la anotacion
			setAnotaciones($equipamento,
                           $this->intIdUsuario,
                           $this->strObservacion,
                           $this->strProtocolo,
                           $estado,
                           $tipo);

            $return = $request_insert;
        } else {
            $return = "0";
        }

		return $return;
	}

	public function cantRecebidos(string $fecha = NULL)
    {
        $where = "";
        if(!empty($fecha)) {
            $where = " AND datecreated = '{$fecha}'";
        }
        $sql = "SELECT COUNT(*) as total FROM controle WHERE status != 0 AND status != 1 " . $where;
        $request = $this->select($sql);
        return $request['total'];
    }

	/***** GRÁFICAS *****/

    //Gráfica mensual de ControleFones
	public function selectControleEquipamentosMes(string $anio, string $mes, int $tipo)
	{
		$totalControleMes = 0;
		$arrControleDias = array();
		$rutaId = $_SESSION['idRuta'];
        $this->intTipo = $tipo;
		$dias = cal_days_in_month(CAL_GREGORIAN,$mes,$anio);
		$n_dia = 1;
		for ($i=0; $i < $dias; $i++)
		{
			$date = date_create($anio.'-'.$mes.'-'.$n_dia);
			$fechaControle = date_format($date, "Y-m-d");
		
			$sql = "SELECT DAY(co.datecreated) as dia FROM controle co
					LEFT OUTER JOIN persona pe
					ON(pe.idpersona = co.personaid)
                    LEFT OUTER JOIN equipamento eq
					ON(eq.idequipamento = co.equipamentoid)
					WHERE DATE(co.datecreated) = '$fechaControle' 
					AND pe.codigoruta = $rutaId 
					AND (co.status != 1 AND co.status != 0)
                    AND eq.tipo = $this->intTipo";
			$controleDia = $this->select($sql);

			$sqlTotal = "SELECT COUNT(*) as total FROM controle co 
						 LEFT OUTER JOIN persona pe
						 ON(pe.idpersona = co.personaid)
                         LEFT OUTER JOIN equipamento eq
                         ON(eq.idequipamento = co.equipamentoid)
						 WHERE DATE(co.datecreated) = '$fechaControle' 
						 AND pe.codigoruta = $rutaId 
						 AND (co.status != 1 AND co.status != 0)
                         AND eq.tipo = $this->intTipo";
			$controleDiaTotal = $this->select($sqlTotal);
			$controleDiaTotal = $controleDiaTotal['total'];

			$controleDia['dia'] = $n_dia;
			$controleDia['controle'] = $controleDiaTotal;
			$controleDia['controle'] = $controleDia['controle'] == "" ? 0 : $controleDia['controle'];
			$totalControleMes += $controleDiaTotal;
			array_push($arrControleDias, $controleDia);
			$n_dia++;

		}
		$meses = Meses();
		$arrData = array('anio' => $anio, 'mes' => $meses[intval($mes - 1)], 'numeroMes' => $mes, 'total' => $totalControleMes, 'controles' => $arrControleDias);
		return $arrData;
	}

	//Gráfica anual de ControleFones
    public function selectControleEquipamentosAnio(string $anio, int $tipo) 
    {
		$this->intTipo = $tipo;
		$arrMEntrega = array();
		$arrMeses = Meses();
		$totalControle = 0;
		$ruta = $_SESSION['idRuta'];

		for ($i=1; $i <= 12; $i++) {
			$arrData = array('anio' => '', 'no_mes' => '', 'mes' => '');
			$sql = "SELECT $anio AS anio, $i AS mes, COUNT(idcontrole) AS total
					FROM controle co
                    LEFT OUTER JOIN persona pe
					ON(pe.idpersona = co.personaid)
                    LEFT OUTER JOIN equipamento eq
					ON(eq.idequipamento = co.equipamentoid)
					WHERE month(co.datecreated) = $i 
					AND year(co.datecreated) = $anio 
					AND (co.status != 1 AND co.status != 0)
					AND pe.codigoruta = $ruta
                    AND eq.tipo = $this->intTipo
					GROUP BY month(co.datecreated)";
			$controleMes = $this->select($sql);
			$arrData['mes'] = $arrMeses[$i-1];

			if(empty($controleMes)){
				$arrData['anio'] = $anio;
				$arrData['no_mes'] = $i;
				$arrData['total'] = 0;
			}else{
				$arrData['anio'] = $controleMes['anio'];
				$arrData['no_mes'] = $controleMes['mes'];
				$arrData['total'] = $controleMes['total'];
				$totalControle += $controleMes['total'];
			}
			array_push($arrMEntrega, $arrData);
		}

		$arrControle = array('totalControle' => $totalControle, 'anio' => $anio, 'meses' => $arrMEntrega);
		return $arrControle;

	}

	//Información de la gráfica
	public function datosGraficaEquipamento(string $fecha, int $tipo) 
	{
		$this->strFecha = $fecha;
		$this->intTipo = $tipo;
        $ruta = $_SESSION['idRuta'];

		$sql = "SELECT co.protocolo, 
                       DATE_FORMAT(co.datecreated, '%d-%m-%Y') as fecha,
                       co.status,
                       pe.matricula,
                       pe.nombres,
                       pe.apellidos,
                       eq.tipo as equipamento,
                       eq.lacre
                FROM controle co
                LEFT OUTER JOIN persona pe
                ON co.personaid = pe.idpersona
                LEFT OUTER JOIN equipamento eq
                ON co.equipamentoid = eq.idequipamento
                WHERE (co.status != 1 AND co.status != 0)
                AND co.datecreated = '{$this->strFecha}' 
                AND eq.tipo = $this->intTipo 
                AND pe.codigoruta = $ruta";
		$request = $this->select_all($sql);

		return $request;
	}
}