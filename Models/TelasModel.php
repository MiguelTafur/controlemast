<?php 

class TelasModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}

	PRIVATE $intStatus;

	public function cantTelas($estado) {
		$this->intStatus = $estado;
		$ruta = $_SESSION['idRuta'];

		$sql = "SELECT COUNT(*) AS total FROM equipamento WHERE status = $this->intStatus 
																AND tipo = " . MTELA ." AND codigoruta = $ruta";
		$request = $this->select($sql);
		return $request['total'];
	}
}