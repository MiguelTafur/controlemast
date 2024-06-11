<?php 

class AnotacionesModel extends Mysql
{
	PRIVATE $intIdEquipamento;
	PRIVATE $intIdPersona;
	PRIVATE $strAnotacao;
	PRIVATE $strImagem;
	PRIVATE $intStatus;
	PRIVATE $intTipo;

	public function __construct()
	{
        parent::__construct();
    }

    public function insertAnotacao(int $idequipamento, int $usuario, string $anotacao, string $imagem, int $estado, int $tipo) 
	{
		$this->intIdEquipamento = $idequipamento;
		$this->intIdPersona = $usuario;
		$this->strAnotacao = $anotacao;
		$this->strImagem = $imagem;
		$this->intStatus = $estado;
		$this->intTipo = $tipo;

		$query_insert = "INSERT INTO anotaciones(equipamentoid, personaid, anotacion, imagen, status, tipo)  VALUES(?,?,?,?,?,?)";
		$arrData = array($this->intIdEquipamento,$this->intIdPersona,$this->strAnotacao, $this->strImagem, $this->intStatus, $this->intTipo);
		$request_insert = $this->insert($query_insert, $arrData);

		return $request_insert;
	}
}

?>