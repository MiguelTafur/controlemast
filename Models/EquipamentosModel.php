<?php 

class EquipamentosModel extends Mysql
{
	PRIVATE $intIdEquipamento;
	PRIVATE $strNombre;
	PRIVATE $strMarca;
	PRIVATE $strIdHardware;
	PRIVATE $strCodigo;
	PRIVATE $intLacre;
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
}