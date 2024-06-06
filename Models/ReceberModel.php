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
                AND pe.codigoruta = $ruta";
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
			AND pe.idpersona != 1
			AND co.status = 1
			AND codigoruta = $this->intIdRuta
			ORDER BY nombres ASC";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectEquipamento(int $idusuario) 
	{
		$this->listUsuario = $idusuario;
		$sql = "SELECT eq.idequipamento, eq.tipo, eq.lacre 
				FROM controle co 
				LEFT OUTER JOIN equipamento eq
				ON co.equipamentoid = eq.idequipamento
				WHERE co.personaid = $this->listUsuario
				AND co.status = 1";
		$request = $this->select($sql);
		return $request;
	}

	public function selectRecebido(int $idrecebido)
	{
		$this->intIdControle = $idrecebido;
		$sql = "SELECT co.idcontrole, 
                       co.observacion, 
                       co.datecreated, 
					   co.status,
                       pe.matricula, 
                       pe.nombres, 
                       pe.apellidos, 
					   eq.id_hardware as ID,
                       eq.nombre as equipamento,
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

	public function insertControleReceber(int $idequipamento, int $usuario, int $acao, string $observacion)
	{
		$this->listEquipamento = $idequipamento;
		$this->listUsuario = $usuario;
		$this->listEstado = $acao;
		$this->strObservacion = $observacion;
		$return = 0;

		//Selecciona el ID del control actual entregado
		$query_select = "SELECT * 
						 FROM controle 
						 WHERE personaid = $this->listUsuario 
						 AND equipamentoid = $this->listEquipamento
						 AND status = 1";
		$request_select = $this->select($query_select);
		$idcontrole = $request_select['idcontrole'];

        $query_insert = "INSERT INTO controle(personaid,equipamentoid,observacion,status)  VALUES(?,?,?,?)";
        $arrData = array($this->listUsuario,$this->listEquipamento,$this->strObservacion,$this->listEstado);
        $request_insert = $this->insert($query_insert, $arrData);
		

        if($request_insert) {

			$query_update_controle = "UPDATE controle SET status = ? WHERE idcontrole = $idcontrole";
			$arrDataControle = array(0);
			$request_update_controle = $this->update($query_update_controle, $arrDataControle);

            $query_update = "UPDATE equipamento SET status = ? WHERE idequipamento = $this->listEquipamento";
			if($this->listEstado === 3) {
				$arrData = array(3);
			} else {
				$arrData = array(1);
			}
            
            $return = $request_update = $this->update($query_update,$arrData);
        } else {
            $return = "0";
        }

		return $return;
	}
}