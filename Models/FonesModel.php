<?php 

class FonesModel extends Mysql
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
}