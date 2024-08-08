<?php 

class AprendizesModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}

	public function cantAprendizes()
	{
		$sql = "SELECT COUNT(*) as total FROM persona WHERE status != 0 AND rolid = " . RAPRENDIZ;
		$request = $this->select($sql);
		return $request['total'];
	}
}