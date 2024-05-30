<?php

class ControleModel extends Mysql
{
	PRIVATE $intIdControle;
	PRIVATE $listUsuario;
	PRIVATE $listEquipamento;
	PRIVATE $listEstado;
	PRIVATE $strProtocolo;
	PRIVATE $strObservacion;
	//PRIVATE $intStatus;
	PRIVATE $intIdRuta;

	public function __construct()
	{
		parent::__construct();
	}

    public function selectControles()
	{
		$ruta = $_SESSION['idRuta'];
		$sql = "SELECT co.idcontrole,
                       pe.matricula,
                       pe.nombres,
                       pe.apellidos,
                       eq.nombre as equipamento,
                       eq.lacre,
                       eq.status,
                       co.protocolo,
                       co.observacion,
                       DATE_FORMAT(co.datecreated, '%d-%m-%Y') as fechaRegistro
                FROM controle co
                LEFT OUTER JOIN persona pe
                ON co.personaid = pe.idpersona
                LEFT OUTER JOIN equipamento eq
                ON co.equipamentoid = eq.idequipamento
                WHERE eq.status != 0 AND pe.codigoruta = $ruta
                ORDER BY nombre ASC";
		$request = $this->select_all($sql);
        //dep($request);exit;
		return $request;
	}

    public function selectEquipamentos()
    {
        $sql = "SELECT idequipamento, nombre, lacre from equipamento WHERE status = 1 AND lacre != ''";
        $request = $this->select_all($sql);
        return $request;
    }

    // Trae os usuários sem relação com o equipamento
    public function selectUsuarios($ruta)
    {
        $this->intIdRuta = $ruta;


        $sql2 = "SELECT co.personaid,eq.status
                 FROM controle co
                 LEFT OUTER JOIN equipamento eq
                 ON co.equipamentoid = eq.idequipamento";
        $request2 = $this->select_all($sql2);
        // for ($i=0; $i < count($request2); $i++) {
            //$personaid = $request2[$i]['personaid'];
            $sql = "SELECT pe.idpersona, pe.matricula, pe.nombres, pe.apellidos, co.personaid
                FROM persona pe
                LEFT OUTER JOIN controle co
                ON pe.idpersona = co.personaid
                WHERE status != 0
                AND codigoruta = $this->intIdRuta
                AND idpersona != 1
                ORDER BY nombres ASC";
            $request = $this->select_all($sql);

        return $request;
    }

    public function insertControleEntrega(string $usuario, string $equipamento, string $protocolo, string $observacion)
	{
		$this->listUsuario = $usuario;
		$this->listEquipamento = $equipamento;
		$this->listEstado = 2;
		$this->strProtocolo = $protocolo;
		$this->strObservacion = $observacion;
		$return = 0;

        $query_insert = "INSERT INTO controle(personaid,equipamentoid,protocolo,observacion)  VALUES(?,?,?,?)";
        $arrData = array($this->listUsuario,$this->listEquipamento,$this->strProtocolo,$this->strObservacion);
        $request_insert = $this->insert($query_insert, $arrData);

        if($request_insert) {
            $query_update = "UPDATE equipamentos SET status = ? WHERE idequipamento = $this->listEquipamento";
            $arrData = array($this->$this->listEstado);
            $request = $this->update($query_update,$arrData);
			$return = $request;
        } else {
            $return = "0";
        }

		return $return;
	}
}