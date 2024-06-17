<?php 

class AnotacionesModel extends Mysql
{
	PRIVATE $intIdEquipamento;
	PRIVATE $intIdPersona;
	PRIVATE $strAnotacao;
	PRIVATE $strImagem;
	PRIVATE $intStatus;
	PRIVATE $stringTipo;

	public function __construct()
	{
        parent::__construct();
    }

    public function insertAnotacao(int $idequipamento, int $usuario, string $anotacao, string $imagem, int $estado, string $tipo) 
	{
		$this->intIdEquipamento = $idequipamento;
		$this->intIdPersona = $usuario;
		$this->strAnotacao = $anotacao;
		$this->strImagem = $imagem;
		$this->intStatus = $estado;
		$this->stringTipo = $tipo;

		$query_insert = "INSERT INTO anotaciones(equipamentoid, personaid, anotacion, imagen, status, tipo)  VALUES(?,?,?,?,?,?)";
		$arrData = array($this->intIdEquipamento,$this->intIdPersona,$this->strAnotacao, $this->strImagem, $this->intStatus, $this->stringTipo);
		$request_insert = $this->insert($query_insert, $arrData);

		return $request_insert;
	}

	public function selectAnotacionesEquipamento(int $idequipamento, string $tipo)
	{
		$this->intIdEquipamento = $idequipamento;
		$this->stringTipo = $tipo;
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
				AND an.tipo = ".$this->stringTipo;
		$request = $this->select_all($sql);
		return $request;
	}
}

?>