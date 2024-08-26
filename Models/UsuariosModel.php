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

	public function selectPersonas(int $rol = NULL)
	{
		$whereAdmin = "";
		$whereRol = "";
		$ruta = $_SESSION['idRuta'];
		if($_SESSION['idUser'] != 1){
			$whereAdmin = " and p.idpersona != 1";
		}
		if($rol != NULL) {
			$whereRol = " and rolid = $rol";
		}
		$sql = "SELECT 
					p.idpersona, 
					p.nombres,
					p.apellidos, 
					p.matricula,
					p.codigoruta, 
					p.telefono, 
					p.email_user, 
					p.modelo,
					p.codigoruta, 
					p.status, 
					r.idrol, 
					r.nombrerol 
				FROM persona p 
				INNER JOIN rol r 
				ON p.rolid = r.idrol 
				WHERE p.status != 0 AND /*p.codigoruta = $ruta*/".$whereAdmin."".$whereRol;
		$request = $this->select_all($sql);
		return $request;
	}
}

?>