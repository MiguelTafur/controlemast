<?php 

class MousesModel extends Mysql
{
	PRIVATE $intIdEquipamento;
	PRIVATE $intIdPersona;
	PRIVATE $strMarca;
	PRIVATE $strCodigo;
	PRIVATE $strLacre;
	PRIVATE $intStatus;
	PRIVATE $intTipo;
	PRIVATE $strAnotacao;
	PRIVATE $strImagem;
	PRIVATE $intIdRuta;

	public function __construct()
	{
		parent::__construct();
	}

    public function selectMouses()
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
				AND tipo = " . MMOUSE;
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectMouse(int $idequipamento)
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

	public function selectAnotacionesMouse(int $idequipamento)
	{
		$this->intIdEquipamento = $idequipamento;
		$sql = "SELECT pe.nombres,
					   pe.apellidos,
					   eq.lacre, 
					   an.idanotacion,
                       an.anotacion,
					   an.imagen, 
					   an.datecreated,
					   an.status
				FROM equipamento eq
				LEFT OUTER JOIN anotaciones an
				ON eq.idequipamento = an.equipamentoid
				LEFT OUTER JOIN persona pe
				ON pe.idpersona = an.personaid
				WHERE eq.idequipamento = $this->intIdEquipamento
				AND an.tipo = ".MMOUSE;
		$request = $this->select_all($sql);
		return $request;
	}

	public function updateMouse(int $idequipamento, string $marca, string $codigo, string $lacre)
	{
		$this->intIdEquipamento = $idequipamento;
		$this->intIdPersona = $_SESSION['idUser'];
		$this->strMarca = $marca;
		$this->strCodigo = $codigo;
		$this->strLacre = $lacre;
		$this->intTipo = MMOUSE;

		$sql = "SELECT * FROM equipamento WHERE (lacre = '{$this->strLacre}' AND idequipamento != $this->intIdEquipamento)";
		$request = $this->select_all($sql);

		$estado = $this->selectMouse($this->intIdEquipamento)['status'];

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
							   'Alteração dos dados do Mouse',
							   '',
							   $estado,
							   $this->intTipo);

			$request = $this->update($sql, $arrData);
		}else{
			$request = "0";
		}
		return $request;
	}

	public function updateEstadoMouse(int $idequipamento, int $estado, string $anotacion, string $imagen) 
	{
		$this->intIdEquipamento = $idequipamento;
		$this->intIdPersona = $_SESSION['idUser'];
		$this->strAnotacao = $anotacion;
		$this->strImagem = $imagen;
		$this->intStatus = $estado;
		$this->intTipo = MMOUSE;
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
							   $this->intTipo);

			$return = $this->intStatus;
		}

		return $return;
	}

	public function insertMouse(string $marca, string $codigo, string $lacre, int $ruta, string $observacion, string $imagen, int $checked)
	{
		$this->intIdPersona = $_SESSION['idUser'];
		$this->strMarca = $marca;
		$this->strCodigo = $codigo;
		$this->strLacre = $lacre;
		$this->intIdRuta = $ruta;
		$this->strAnotacao = $observacion;
		$this->strImagem = $imagen;
		$this->intStatus = $checked;
		$this->intTipo = MMOUSE;
		$return = 0;

		$sql = "SELECT * FROM equipamento WHERE lacre = '{$this->strLacre}' AND codigoruta = $this->intIdRuta";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert = "INSERT INTO equipamento(marca,codigo,lacre,status,tipo,codigoruta)  VALUES(?,?,?,?,?,?)";
			$arrData = array($this->strMarca,$this->strCodigo,$this->strLacre,$this->intStatus,$this->intTipo,$this->intIdRuta);
			$request_insert = $this->insert($query_insert, $arrData);

			if(!empty($this->strAnotacao) || !empty($this->strImagem)) { 
				setAnotaciones($request_insert,
							   $this->intIdPersona,
							   $this->strAnotacao,
							   $this->strImagem,
							   $this->intStatus,
							   $this->intTipo);
			} else {
				setAnotaciones($request_insert,
							   $this->intIdPersona,
							   'Teclado adicionado',
							   $this->strImagem,
							   $this->intStatus,
							   $this->intTipo);
			}
			$return = $request_insert;
		}else{
			$return = "0";
		}
		return $return;
	}
}