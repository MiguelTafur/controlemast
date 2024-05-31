<?php

class ReceberModel extends Mysql
{
	PRIVATE $intIdControle;
	PRIVATE $listUsuario;
	PRIVATE $listEquipamento;
	PRIVATE $listEstado;
	PRIVATE $strProtocolo;
	PRIVATE $strObservacion;
	PRIVATE $intIdEquipamento;
	PRIVATE $intIdRuta;

	public function __construct()
	{
		parent::__construct();
	}

	public function selectRecebidos()
	{
		$ruta = $_SESSION['idRuta'];
		$sql = "SELECT co.idcontrole,
                       co.personaid,
                       co.equipamentoid,
                       co.observacion,
                       DATE_FORMAT(co.datecreated, '%d-%m-%Y') as fechaRegistro,
					   co.status as estadoControl,
                       pe.matricula,
                       pe.nombres,
                       pe.apellidos,
                       eq.nombre as equipamento,
                       eq.lacre,
                       eq.status as estadoEquipamento
                FROM controle co
                LEFT OUTER JOIN persona pe
                ON co.personaid = pe.idpersona
                LEFT OUTER JOIN equipamento eq
                ON co.equipamentoid = eq.idequipamento
                WHERE co.status != 1 
				AND co.status != 0
                AND pe.codigoruta = $ruta
                ORDER BY nombre ASC";
		$request = $this->select_all($sql);
		return $request;
	}

	// Trae los usuarios con el estado del equipamento 1(Entregue)
	public function selectUsuarios($ruta)
	{
		$this->intIdRuta = $ruta;
		$sql = "SELECT pe.idpersona, pe.matricula, pe.nombres, pe.apellidos, co.personaid, co.status
			FROM persona pe
			LEFT OUTER JOIN controle co
			ON pe.idpersona = co.personaid
			WHERE pe.status != 0
			AND codigoruta = $this->intIdRuta
			AND idpersona != 1
			ORDER BY nombres ASC";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectEquipamento(int $idusuario) 
	{
		$this->listUsuario = $idusuario;
		$sql = "SELECT eq.idequipamento, eq.nombre, eq.lacre 
				FROM controle co 
				LEFT OUTER JOIN equipamento eq
				ON co.equipamentoid = eq.idequipamento
				WHERE co.personaid = $this->listUsuario";
		$request = $this->select($sql);
		return $request;
	}

	public function insertControleEntrega(int $idequipamento, int $usuario, int $acao, string $observacion)
	{
		$this->listEquipamento = $idequipamento;
		$this->listUsuario = $usuario;
		$this->listEstado = $acao;
		$this->strObservacion = $observacion;
		$return = 0;

        $query_insert = "INSERT INTO controle(personaid,equipamentoid,observacion,status)  VALUES(?,?,?,?)";
        $arrData = array($this->listUsuario,$this->listEquipamento,$this->strObservacion,$this->listAcao);
        $request_insert = $this->insert($query_insert, $arrData);

        if($request_insert) {
            $query_update = "UPDATE equipamento SET status = ? WHERE idequipamento = $this->listEquipamento";
			if($this->listEstado === 2 || ($this->listEstado === 4 || ($this->listEstado === 5) {
				$arrData = array(1);
			} else if($this->listEstado === 3) {
				$arrData = array(3);
			}
            
            $request = $this->update($query_update,$arrData);
			$return = $request;
        } else {
            $return = "0";
        }

		return $return;
	}
}