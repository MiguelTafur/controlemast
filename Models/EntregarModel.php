<?php

class EntregarModel extends Mysql
{
	PRIVATE $intIdControle;
	PRIVATE $listUsuario;
	PRIVATE $listEquipamento;
    PRIVATE $intIdUsuario;
	PRIVATE $listEstado;
	PRIVATE $strProtocolo;
	PRIVATE $strObservacion;
	PRIVATE $intIdEquipamento;
	PRIVATE $intIdRuta;
    PRIVATE $intTipo;
    PRIVATE $strFecha;

	public function __construct()
	{
		parent::__construct();
	}

    public function selectEntregues(int $tipo)
	{
		$ruta = $_SESSION['idRuta'];
        $this->intTipo = $tipo;
		$sql = "SELECT co.idcontrole,
                       co.personaid,
                       co.equipamentoid,
                       co.protocolo,
                       co.observacion,
                       co.datecreated as fechaRegistro,
                       pe.matricula,
                       pe.nombres,
                       pe.apellidos,
                       eq.tipo as equipamento,
                       eq.lacre,
                       eq.status
                FROM controle co
                LEFT OUTER JOIN persona pe
                ON co.personaid = pe.idpersona
                LEFT OUTER JOIN equipamento eq
                ON co.equipamentoid = eq.idequipamento
                WHERE co.status = 1 AND eq.tipo = $this->intTipo 
                AND pe.codigoruta = $ruta";
		$request = $this->select_all($sql);
		return $request;
	}

    public function selectEquipamentos()
    {
        $rutaId = $_SESSION['idRuta'];
        $sql = "SELECT idequipamento, tipo, lacre from equipamento eq
                LEFT OUTER JOIN controle co ON(eq.idequipamento = co.equipamentoid)
                WHERE (eq.status = 1 OR (eq.status = 2 AND co.equipamentoid IS NULL)) AND eq.codigoruta = $rutaId";
                /*WHERE status = 1 OR (status = 2 AND NOT EXISTS(select * from controle WHERE controle.equipamentoid = equipamento.idequipamento))";*/
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectUsuarios($ruta)
    {
        $this->intIdRuta = $ruta;
        $sql = "SELECT pe.idpersona, pe.matricula, pe.nombres, pe.apellidos
            FROM persona pe
            LEFT OUTER JOIN rol ro ON(pe.rolid = ro.idrol)
            WHERE pe.status != 0
            AND pe.codigoruta = $this->intIdRuta
            AND pe.rolid != 1
            ORDER BY pe.nombres ASC";
        $request = $this->select_all($sql);
        return $request;
    }
    
    public function selectEntrega(int $identrega)
	{
		$this->intIdControle = $identrega;
		$sql = "SELECT co.idcontrole, 
					   co.protocolo,
                       co.observacion, 
                       co.datecreated, 
                       co.status,
                       pe.matricula, 
                       pe.nombres, 
                       pe.apellidos, 
                       pe.modelo,
                       eq.idequipamento,
                       eq.tipo as equipamento,
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

    public function selectProtocolo(int $idequipamento, int $estado, int $idpersona) {
        $this->intIdEquipamento = $idequipamento;
        $this->listEstado = $estado;
        $this->intIdUsuario = $idpersona;

        // if($estado === 0) {
        //     $sql = "SELECT co.protocolo FROM controle co 
        //             LEFT OUTER JOIN equipamento eq
        //             ON(co.equipamentoid = eq.idequipamento)
        //             WHERE co.status = 0 AND eq.idequipamento = $this->intIdEquipamento";
        // } else {
            $sql = "SELECT co.protocolo FROM controle co 
                    LEFT OUTER JOIN equipamento eq
                    ON(co.equipamentoid = eq.idequipamento)
                    LEFT OUTER JOIN persona pe
                    ON(co.personaid = pe.idpersona)
                    WHERE co.status = $this->listEstado AND eq.idequipamento = $this->intIdEquipamento AND pe.idpersona = $this->intIdUsuario";
        //}
        $request = $this->select($sql);
        return $request;
    }

    public function insertControleEntrega(string $usuario, string $equipamento, string $protocolo, string $observacion)
	{
		$this->listUsuario = $usuario;
		$this->listEquipamento = $equipamento;
        $this->intIdUsuario = $_SESSION['idUser'];
		$this->listEstado = 2;
		$this->strProtocolo = $protocolo;
		$this->strObservacion = $observacion;
        $fecha = date('Y-m-d');
		$return = 0;
        $teste = '';

        $query_select = "SELECT co.personaid, pe.modelo, pe.rolid FROM controle co
                         LEFT OUTER JOIN persona pe
                         ON(pe.idpersona = co.personaid)
                         WHERE personaid = $this->listUsuario AND co.status = 1";
        $request_select = $this->select($query_select);
        //dep($request_select);exit;

        if(!empty($request_select))
        {
            if($request_select['modelo'] === 2 || ($request_select['rolid'] === RGERENTE || $request_select['rolid'] === RSUPERVISOR || $request_select['rolid'] === RCOORDINADOR || $request_select['rolid'] === RLIDER || $request_select['rolid'] === RGESTOR))
            {
                $query_insert = "INSERT INTO controle(personaid,equipamentoid,protocolo,observacion, datecreated)  VALUES(?,?,?,?,?)";
                $arrData = array($this->listUsuario,$this->listEquipamento,$this->strProtocolo,$this->strObservacion,$fecha);
                $request_insert = $this->insert($query_insert, $arrData);
                
    
                //Actualizar el estado del equipamento
                $query_update = "UPDATE equipamento SET status = ? WHERE idequipamento = $this->listEquipamento";
                $arrData = array($this->listEstado);
                $request = $this->update($query_update,$arrData);
    
                //Selecciona el tipo de equipamento
                $sql = "SELECT tipo FROM equipamento WHERE idequipamento = $this->listEquipamento";
                $request = $this->select($sql);
                $tipo = $request['tipo'];
    
                //Agrega la anotación
                if(empty($this->strObservacion)) {
                    setAnotaciones($this->listEquipamento,
                                   $this->intIdUsuario,
                                   'Equipamento entregue',
                                   $this->strProtocolo,
                                   $this->listEstado,
                                   $tipo);
                } else {
                    setAnotaciones($this->listEquipamento,
                                   $this->intIdUsuario,
                                   $this->strObservacion,
                                   $this->strProtocolo,
                                   $this->listEstado,
                                   $tipo);
                }
    
                $return = $request_insert;
    
            } else {
                $return = "0";
            }
        } else {
            $query_insert = "INSERT INTO controle(personaid,equipamentoid,protocolo,observacion, datecreated)  VALUES(?,?,?,?,?)";
            $arrData = array($this->listUsuario,$this->listEquipamento,$this->strProtocolo,$this->strObservacion,$fecha);
            $request_insert = $this->insert($query_insert, $arrData);
            

            //Actualizar el estado del equipamento
            $query_update = "UPDATE equipamento SET status = ? WHERE idequipamento = $this->listEquipamento";
            $arrData = array($this->listEstado);
            $request = $this->update($query_update,$arrData);

            //Selecciona el tipo de equipamento
            $sql = "SELECT tipo FROM equipamento WHERE idequipamento = $this->listEquipamento";
            $request = $this->select($sql);
            $tipo = $request['tipo'];

            //Agrega la anotación
            if(empty($this->strObservacion)) {
                setAnotaciones($this->listEquipamento,
                               $this->intIdUsuario,
                               'Equipamento entregue',
                               $this->strProtocolo,
                               $this->listEstado,
                               $tipo);
            } else {
                setAnotaciones($this->listEquipamento,
                               $this->intIdUsuario,
                               $this->strObservacion,
                               $this->strProtocolo,
                               $this->listEstado,
                               $tipo);
            }

            $return = $request_insert;
        }

        return $return;
	}

    public function updateProtocolo(int $idcontrole, string $imagen, int $idequipamento, int $tipo) 
    {
        $this->intIdControle = $idcontrole;
        $this->strProtocolo = $imagen;
        $this->intIdUsuario = $_SESSION['idUser'];
        $this->intIdEquipamento = $idequipamento;
        $this->listEquipamento = $tipo;

        $sql = "UPDATE controle SET protocolo = ? WHERE idcontrole = $this->intIdControle";
        $arrData = array($this->strProtocolo);
        $request = $this->update($sql, $arrData);

        setAnotaciones($this->intIdEquipamento,
                       $this->intIdUsuario,
                       'Protocolo da Entrega alterado',
                       $this->strProtocolo,
                       2,
                       $this->listEquipamento);

        return $request;
    }

    public function deleteEntrega(int $identrega, int $idequipamento)
    {
        $return = 0;
        $this->intIdControle = $identrega;
        $this->intIdEquipamento = $idequipamento;
        $this->listEstado = 1;
        $sql = "UPDATE controle SET status = ? WHERE idcontrole = $this->intIdControle";
        $arrData = array(0);
        $request = $this->update($sql, $arrData);

        if($request) {
            $sql2 = "UPDATE equipamento SET status = ? WHERE idequipamento = $this->intIdEquipamento";
            $arrData2 = array($this->listEstado);
            $request2 = $this->update($sql2, $arrData2);
        }

        return $request;
    }

    public function cantEntregues(string $fecha = NULL)
    {
        $where = "";
        if(!empty($fecha)) {
            $where = " AND datecreated = '{$fecha}'";
        }
        $sql = "SELECT COUNT(*) as total FROM controle WHERE status = 1 " . $where;
        $request = $this->select($sql);
        return $request['total'];
    }

    /***** GRÁFICAS *****/

    //Gráfica mensual de Controle Equipamentos
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
					AND (co.status = 1 || co.status = 0)
                    AND eq.tipo = $this->intTipo";
			$controleDia = $this->select($sql);

			$sqlTotal = "SELECT COUNT(*) as total FROM controle co 
						 LEFT OUTER JOIN persona pe
						 ON(pe.idpersona = co.personaid)
                         LEFT OUTER JOIN equipamento eq
                         ON(eq.idequipamento = co.equipamentoid)
						 WHERE DATE(co.datecreated) = '$fechaControle' 
						 AND pe.codigoruta = $rutaId 
						 AND (co.status = 1 || co.status = 0)
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

    //Gráfica anual de Controle Equipamentos
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
					AND (co.status = 0 || co.status = 1) 
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
                WHERE (co.status = 1 || co.status = 0)
                AND co.datecreated = '{$this->strFecha}' 
                AND eq.tipo = $this->intTipo 
                AND pe.codigoruta = $ruta";
		$request = $this->select_all($sql);

		return $request;
	}
}