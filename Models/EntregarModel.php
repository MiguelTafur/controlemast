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

    public function selectProtocolo(int $idequipamento) {
        $this->intIdEquipamento = $idequipamento;

        $sql = "SELECT co.protocolo FROM controle co 
                LEFT OUTER JOIN equipamento eq
                ON(co.equipamentoid = eq.idequipamento)
                WHERE co.status = 0 AND eq.idequipamento = $this->intIdEquipamento";
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

        $query_select = "SELECT personaid FROM controle WHERE personaid = $this->listUsuario AND status = 1";
        $request_select = $this->select($query_select);

        if(empty($request_select)){

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

		//dep($return);exit;
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
}