<?php 

class CoordinadoresModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}	

	public function cantCoordenadores()
	{
		$sql = "SELECT COUNT(*) as total FROM persona WHERE status != 0 AND rolid = " . RCOORDINADOR;
		$request = $this->select($sql);
		return $request['total'];
	}
}