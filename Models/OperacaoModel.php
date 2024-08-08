<?php 

class OperacaoModel extends Mysql
{
	PRIVATE $intModelo;

	public function __construct()
	{
		parent::__construct();
	}

	public function cantOperadores(int $modelo)
	{
		$this->intModelo = $modelo;
		$sql = "SELECT COUNT(*) as total FROM persona WHERE modelo = $this->intModelo AND status != 0 AND rolid = " . ROPERACAO;
		$request = $this->select($sql);
		return $request['total'];
	}
}