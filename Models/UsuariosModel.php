<?php 

class UsuariosModel extends Mysql
{
	PRIVATE $intIdUsuario;
	PRIVATE $strMatricula;
	PRIVATE $strNombre;
	PRIVATE $strApellido;
	PRIVATE $intTelefono;
	PRIVATE $strEmail;
	PRIVATE $intTipoId;
	PRIVATE $intStatus;
	PRIVATE $intRuta;
	PRIVATE $strNit;
	PRIVATE $strNomFiscal;
	PRIVATE $strDirFiscal;

	public function __construct()
	{
		parent::__construct();
	}	
	
	public function selectRutas()
	{
		$sql = "SELECT * from ruta WHERE estado != 0";
		$request = $this->select_all($sql);
		return $request;
	}
}

?>