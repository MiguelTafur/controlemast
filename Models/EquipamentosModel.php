<?php 

class EquipamentosModel extends Mysql
{
	PRIVATE $intIdEquipamento;
	PRIVATE $strIdHardware;
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
					   id_hardware,
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

	public function insertEquipamento(string $ID, string $nombre, string $marca, string $codigo, string $lacre, int $ruta)
	{
		$this->strIdHardware = $ID;
		$this->strNombre = $nombre;
		$this->strMarca = $marca;
		$this->strCodigo = $codigo;
		$this->strLacre = $lacre;
		$this->intIdRuta = $ruta;
		$return = 0;

		$sql = "SELECT * FROM equipamento WHERE id_hardware = '{$this->strIdHardware}' AND codigoruta = $this->intIdRuta";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert = "INSERT INTO equipamento(id_hardware,nombre,marca,codigo,lacre,codigoruta)  VALUES(?,?,?,?,?,?)";
			$arrData = array($this->strIdHardware,$this->strNombre,$this->strMarca,$this->strCodigo,$this->strLacre,$this->intIdRuta);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		}else{
			$return = "0";
		}
		return $return;
	}

	public function updateEquipamento(int $idequipamento, string $idhardware, string $nombre, string $marca, string $codigo, string $lacre)
	{
		$this->intIdEquipamento = $idequipamento;
		$this->strIdHardware = $idhardware;
		$this->strNombre = $nombre;
		$this->strMarca = $marca;
		$this->strCodigo = $codigo;
		$this->strLacre = $lacre;

		$sql = "SELECT * FROM equipamento WHERE (id_hardware = '{$this->strIdHardware}' AND idequipamento != $this->intIdEquipamento)";
		$request = $this->select_all($sql);

		if(empty($request))
		{

			$sql = "UPDATE equipamento 
					SET id_hardware = ?, 
					    nombre = ?, 
						marca = ?, 
						codigo = ?, 
						lacre = ?  
					WHERE idequipamento = $this->intIdEquipamento";
			$arrData = array($this->strIdHardware,$this->strNombre,$this->strMarca,$this->strCodigo,$this->strLacre);
			$request = $this->update($sql, $arrData);
		}else{
			$request = "0";
		}
		return $request;
	}
}