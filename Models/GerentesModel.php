<?php 

class GerentesModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}	

	public function cantGerentes()
	{
		$sql = "SELECT COUNT(*) as total FROM persona WHERE status != 0 AND rolid = " . RGERENTE;
		$request = $this->select($sql);
		return $request['total'];
	}
}