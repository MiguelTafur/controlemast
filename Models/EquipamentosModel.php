<?php 

class EquipamentosModel extends Mysql
{
	PRIVATE $intIdEquipamento;
	PRIVATE $strNombre;
	PRIVATE $strMarca;
	PRIVATE $strCodigo;
	PRIVATE $strLacre;
	PRIVATE $intStatus;
	PRIVATE $intIdRuta;

	public function __construct()
	{
		parent::__construct();
	}

    public function selectEquipamentos()
	{
		$ruta = $_SESSION['idRuta'];
		$sql = "SELECT idequipamento, 
                       nombre, 
                       marca, 
                       codigo, 
                       lacre, 
                       status 
                FROM equipamento 
                WHERE codigoruta = $ruta  
                AND status != 0 
                ORDER BY nombre ASC";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectEquipamento(int $idequipamento)
	{
		$this->intIdEquipamento = $idequipamento;
		$sql = "SELECT idequipamento, 
                       nombre, 
                       marca, 
                       codigo, 
                       lacre, 
                       status, 
					   DATE_FORMAT(datecreated, '%Y-%m-%d') as fechaRegistro 
				FROM equipamento 
				WHERE idequipamento = $this->intIdEquipamento";
		$request = $this->select($sql);
		return $request;
	}

	public function insertEquipamento(string $nombre, string $marca, string $codigo, string $lacre, int $ruta)
	{
		$this->strNombre = $nombre;
		$this->strMarca = $marca;
		$this->strCodigo = $codigo;
		$this->strLacre = $lacre;
		$this->intIdRuta = $ruta;
		$return = 0;

		$sql = "SELECT * FROM equipamento WHERE lacre = '{$this->strLacre}' AND codigoruta = $this->intIdRuta";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert = "INSERT INTO equipamento(nombre,marca,codigo,lacre,codigoruta)  VALUES(?,?,?,?,?)";
			$arrData = array($this->strNombre,$this->strMarca,$this->strCodigo,$this->strLacre,$this->intIdRuta);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		}else{
			$return = "0";
		}
		return $return;
	}

	public function updateEquipamento(int $idequipamento, string $nombre, string $marca, string $codigo, string $lacre)
	{
		$this->intIdEquipamento = $idequipamento;
		$this->strNombre = $nombre;
		$this->strMarca = $marca;
		$this->strCodigo = $codigo;
		$this->strLacre = $lacre;

		$sql = "SELECT * FROM equipamento WHERE (lacre = '{$this->strLacre}' AND idequipamento != $this->intIdEquipamento)";
		$request = $this->select_all($sql);

		if(empty($request))
		{

			$sql = "UPDATE equipamento 
					SET nombre = ?, 
						marca = ?, 
						codigo = ?, 
						lacre = ?  
					WHERE idequipamento = $this->intIdEquipamento";
			$arrData = array($this->strNombre,$this->strMarca,$this->strCodigo,$this->strLacre);
			$request = $this->update($sql, $arrData);
		}else{
			$request = "0";
		}
		return $request;
	}

	public function updateEstadoEquipamento(int $idequipamento, int $estado) {
		$this->intIdEquipamento = $idequipamento;
		$this->intStatus = $estado;
		$return = 0;

		$query_select = "SELECT status FROM equipamento WHERE idequipamento = $this->intIdEquipamento";
		$request_select = $this->select($query_select);
		$estado = $request_select['status'];
		
		if($estado === 2) {
			$return = '0';
		} else {
			$query_update = "UPDATE equipamento SET status = ? WHERE idequipamento = $this->intIdEquipamento";
			$arrData = array($this->intStatus);
			$request_update = $this->update($query_update, $arrData);
			$return = $this->intStatus;
		}

		return $return;
	}
}