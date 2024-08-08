<?php 

class SupervisoresModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}	

	public function cantSupervisores()
	{
		$sql = "SELECT COUNT(*) as total FROM persona WHERE status != 0 AND rolid = " . RSUPERVISOR;
		$request = $this->select($sql);
		return $request['total'];
	}
}

?>