<?php

class EntregarModel extends Mysql
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

    public function selectEntregues()
	{
		$ruta = $_SESSION['idRuta'];
		$sql = "SELECT co.idcontrole,
                       co.personaid,
                       co.equipamentoid,
                       co.protocolo,
                       co.observacion,
                       DATE_FORMAT(co.datecreated, '%d-%m-%Y') as fechaRegistro,
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
                WHERE co.status = 1 
                AND pe.codigoruta = $ruta";
		$request = $this->select_all($sql);
        //dep($request);exit;
		return $request;
	}

    public function selectEquipamentos()
    {
        $sql = "SELECT idequipamento, tipo, lacre from equipamento WHERE status = 1 AND lacre != ''";
        $request = $this->select_all($sql);
        return $request;
    }

    // Trae os usuários sem relação com o equipamento
    public function selectUsuarios($ruta)
    {
        $this->intIdRuta = $ruta;
        $sql = "SELECT idpersona, matricula, nombres, apellidos
            FROM persona
            WHERE status != 0
            AND codigoruta = $this->intIdRuta
            AND idpersona != 1
            ORDER BY nombres ASC";
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
                       pe.matricula, 
                       pe.nombres, 
                       pe.apellidos, 
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

    public function insertControleEntrega(string $usuario, string $equipamento, string $protocolo, string $observacion)
	{
		$this->listUsuario = $usuario;
		$this->listEquipamento = $equipamento;
		$this->listEstado = 2;
		$this->strProtocolo = $protocolo;
		$this->strObservacion = $observacion;
		$return = 0;

        $query_select = "SELECT personaid FROM controle WHERE personaid = $this->listUsuario AND status = 1";
        $request_select = $this->select($query_select);

        if(empty($request_select)){

            $sql = "SELECT tipo FROM equipamento WHERE idequipamento = $this->listEquipamento";
            $request = $this->select($sql);
            $tipo = $request['tipo'];

            $query_insert = "INSERT INTO controle(personaid,equipamentoid,protocolo,observacion)  VALUES(?,?,?,?)";
            $arrData = array($this->listUsuario,$this->listEquipamento,$this->strProtocolo,$this->strObservacion);
            $request_insert = $this->insert($query_insert, $arrData);
            

            //Actualizar el estado del equipamento
            $query_update = "UPDATE equipamento SET status = ? WHERE idequipamento = $this->listEquipamento";
            $arrData = array($this->listEstado);
            $request = $this->update($query_update,$arrData);

            //Agrega la anotación
            $query_insert_anotacion = "INSERT INTO anotaciones(equipamentoid, anotacion, imagen, status, tipo)  VALUES(?,?,?,?,?)";
            $arrData_anotacion = array($this->listEquipamento,$this->strObservacion, $this->strProtocolo, $this->listEstado, $tipo);
            $request_insert_anotacion = $this->insert($query_insert_anotacion, $arrData_anotacion);

            $return = $request_insert;

        } else {
            $return = "0";
        }

		//dep($return);exit;
        return $return;
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
}