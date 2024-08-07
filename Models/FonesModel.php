<?php 

class FonesModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}

	PRIVATE $intStatus;

	public function cantFones($estado) {
		$this->intStatus = $estado;
		$ruta = $_SESSION['idRuta'];

		$sql = "SELECT COUNT(*) AS total FROM equipamento WHERE status = $this->intStatus 
																AND tipo = " . MFONE ." AND codigoruta = $ruta";
		$request = $this->select($sql);
		return $request['total'];
	}
}