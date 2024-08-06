<?php 

class EquipamentosModel extends Mysql
{
	PRIVATE $intIdEquipamento;
	PRIVATE $intIdPersona;
	PRIVATE $strMarca;
	PRIVATE $strCodigo;
	PRIVATE $strLacre;
	PRIVATE $intStatus;
	PRIVATE $stringTipo;
	PRIVATE $strAnotacao;
	PRIVATE $strImagem;
	PRIVATE $intIdRuta;

	public function __construct()
	{
		parent::__construct();
	}

    public function selectEquipamentos(string $tipo)
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
				AND tipo = " . $tipo . " ORDER BY datecreated DESC";
		$request = $this->select_all($sql);
		return $request;
	}

    public function selectEquipamento(int $idequipamento)
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

    public function insertEquipamento(string $marca, string $codigo, string $lacre, int $ruta, string $observacion, string $imagen, int $estado, int $checked)
	{
		$this->intIdPersona = $_SESSION['idUser'];
		$this->strMarca = $marca;
		$this->strCodigo = $codigo;
		$this->strLacre = $lacre;
		$this->intIdRuta = $ruta;
		$this->strAnotacao = $observacion;
		$this->strImagem = $imagen;
		$this->intStatus = $checked;
		$this->stringTipo = $estado;
		$fecha = date('Y-m-d');
		$return = 0;

		$sql = "SELECT * FROM equipamento WHERE (lacre = '{$this->strLacre}' || codigo = '{$this->strCodigo}') AND codigoruta = $this->intIdRuta";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert = "INSERT INTO equipamento(marca,codigo,lacre,datecreated,status,tipo,codigoruta)  VALUES(?,?,?,?,?,?,?)";
			$arrData = array($this->strMarca,
							 $this->strCodigo,
							 $this->strLacre,
							 $fecha,
							 $this->intStatus,
							 $this->stringTipo,
							 $this->intIdRuta);
			$request_insert = $this->insert($query_insert, $arrData);

			if((!empty($this->strAnotacao) && empty($this->strImagem)) || (!empty($this->strAnotacao) && !empty($this->strImagem))) { 
				setAnotaciones($request_insert,
							   $this->intIdPersona,
							   $this->strAnotacao,
							   $this->strImagem,
							   $this->intStatus,
							   $this->stringTipo);
			} else if(empty($this->strAnotacao) && !empty($this->strImagem)) {
                setAnotaciones($request_insert,
							   $this->intIdPersona,
							   'Equipamento adicionado',
							   $this->strImagem,
							   $this->intStatus,
							   $this->stringTipo);
            }else {
				setAnotaciones($request_insert,
							   $this->intIdPersona,
							   'Equipamento adicionado',
							   $this->strImagem,
							   $this->intStatus,
							   $this->stringTipo);
			}
			$return = $request_insert;
		}else{
			$return = "0";
		}
		return $return;
	}

    public function updateEquipamento(int $idequipamento, string $marca, string $codigo, string $lacre, int $estado, string $tipo)
	{
		$this->intIdEquipamento = $idequipamento;
		$this->intIdPersona = $_SESSION['idUser'];
		$this->strMarca = $marca;
		$this->strCodigo = $codigo;
		$this->strLacre = $lacre;
        $this->intStatus = $estado;
		$this->stringTipo = $tipo;

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

			setAnotaciones($this->intIdEquipamento,
							   $this->intIdPersona,
							   'Alteração de dados do Equipamento',
							   '',
							   $this->intStatus,
							   $this->stringTipo);

			$request = $this->update($sql, $arrData);
		}else{
			$request = "0";
		}
		return $request;
	}

	public function updateEstadoEquipamento(int $idequipamento, int $estado, string $anotacion, string $imagen, string $tipo) 
	{
		$this->intIdEquipamento = $idequipamento;
		$this->intIdPersona = $_SESSION['idUser'];
		$this->strAnotacao = $anotacion;
		$this->strImagem = $imagen;
		$this->intStatus = $estado;
		$this->stringTipo = $tipo;
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

			setAnotaciones($this->intIdEquipamento,
							   $this->intIdPersona,
							   $this->strAnotacao,
							   $this->strImagem,
							   $this->intStatus,
							   $this->stringTipo);

			$return = $this->intStatus;
		}

		return $return;
	}
}