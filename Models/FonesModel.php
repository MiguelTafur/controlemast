<?php 

class FonesModel extends Mysql
{
	PRIVATE $intIdEquipamento;
	PRIVATE $strMarca;
	PRIVATE $strCodigo;
	PRIVATE $strLacre;
	PRIVATE $intStatus;
	PRIVATE $intTipo;
	PRIVATE $intIdRuta;
	PRIVATE $strAnotacao;
	PRIVATE $strImagem;

	public function __construct()
	{
		parent::__construct();
	}

    public function selectFones()
	{
		$ruta = $_SESSION['idRuta'];
		$sql = "SELECT idequipamento, 
                       marca, 
                       codigo, 
                       lacre, 
                       status 
                FROM equipamento 
                WHERE codigoruta = $ruta  
                AND status != 0
				AND tipo = " . MFONE;
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectFone(int $idequipamento)
	{
		$this->intIdEquipamento = $idequipamento;
		$sql = "SELECT idequipamento, 
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

	public function selectAnotacionesFone(int $idequipamento)
	{
		$this->intIdEquipamento = $idequipamento;
		$sql = "SELECT eq.lacre, 
					   an.idanotacion,
                       an.anotacion,
					   an.imagen, 
					   an.datecreated,
					   an.status
				FROM equipamento eq
				LEFT OUTER JOIN anotaciones an
				ON eq.idequipamento = an.equipamentoid
				WHERE eq.idequipamento = $this->intIdEquipamento
				AND an.tipo = ".MFONE;
		$request = $this->select_all($sql);
		return $request;
	}

	public function updateFone(int $idequipamento, string $marca, string $codigo, string $lacre)
	{
		$this->intIdEquipamento = $idequipamento;
		$this->strMarca = $marca;
		$this->strCodigo = $codigo;
		$this->strLacre = $lacre;

		$sql = "SELECT * FROM equipamento WHERE (lacre = '{$this->strLacre}' AND idequipamento != $this->intIdEquipamento)";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$sql = "UPDATE equipamento 
					SET	marca = ?, 
						codigo = ?, 
						lacre = ?  
					WHERE idequipamento = $this->intIdEquipamento";
			$arrData = array($this->strMarca,$this->strCodigo,$this->strLacre);
			$request = $this->update($sql, $arrData);
		}else{
			$request = "0";
		}
		return $request;
	}

	public function updateEstadoFone(int $idequipamento, int $estado, string $anotacion, string $imagen) 
	{
		$this->intIdEquipamento = $idequipamento;
		$this->intStatus = $estado;
		$this->strAnotacao = $anotacion;
		$this->strImagem = $imagen;
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

			$this->insertAnotacao($this->intIdEquipamento, $this->strAnotacao, $this->strImagem, $this->intStatus);

			$return = $this->intStatus;
		}

		return $return;
	}

	public function insertFone(string $marca, string $codigo, string $lacre, int $ruta, string $observacion, string $imagen, int $checked)
	{
		$this->strMarca = $marca;
		$this->strCodigo = $codigo;
		$this->strLacre = $lacre;
		$this->intIdRuta = $ruta;
		$this->strAnotacao = $observacion;
		$this->strImagem = $imagen;
		$this->intStatus = $checked;
		$this->intTipo = MFONE;
		$return = 0;

		$sql = "SELECT * FROM equipamento WHERE lacre = '{$this->strLacre}' AND codigoruta = $this->intIdRuta";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert = "INSERT INTO equipamento(marca,codigo,lacre,status,tipo,codigoruta)  VALUES(?,?,?,?,?,?)";
			$arrData = array($this->strMarca,$this->strCodigo,$this->strLacre,$this->intStatus,$this->intTipo,$this->intIdRuta);
			$request_insert = $this->insert($query_insert, $arrData);

			if(!empty($this->strAnotacao) || !empty($this->strImagem)) {
				$this->insertAnotacao($request_insert, $this->strAnotacao, $this->strImagem, $this->intStatus);
			}
			$return = $request_insert;
		}else{
			$return = "0";
		}
		return $return;
	}

	public function insertAnotacao(int $idequipamento, string $anotacao, string $imagem, int $estado) 
	{
		$this->intIdEquipamento = $idequipamento;
		$this->strAnotacao = $anotacao;
		$this->strImagem = $imagem;
		$this->intStatus = $estado;
		$this->intTipo = MFONE;

		$query_insert = "INSERT INTO anotaciones(equipamentoid, anotacion, imagen, status, tipo)  VALUES(?,?,?,?,?)";
		$arrData = array($this->intIdEquipamento,$this->strAnotacao, $this->strImagem, $this->intStatus, $this->intTipo);
		$request_insert = $this->insert($query_insert, $arrData);

		return $request_insert;
	}
}