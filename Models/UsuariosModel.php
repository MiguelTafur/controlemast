<?php 

class UsuariosModel extends Mysql
{
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