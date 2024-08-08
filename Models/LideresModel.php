<?php 

class LideresModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}	

	public function cantLideres()
	{
		$sql = "SELECT COUNT(*) as total FROM persona WHERE status != 0 AND rolid = " . RLIDER;
		$request = $this->select($sql);
		return $request['total'];
	}
}

?>