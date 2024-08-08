<?php 

class GestoresModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}	

	public function cantGestores()
	{
		$sql = "SELECT COUNT(*) as total FROM persona WHERE status != 0 AND rolid = " . RGESTOR;
		$request = $this->select($sql);
		return $request['total'];
	}
}

?>