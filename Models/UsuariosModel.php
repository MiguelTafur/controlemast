<?php 

class UsuariosModel extends Mysql
{
	PRIVATE $intIdUsuario;
	PRIVATE $strMatricula;
	PRIVATE $strNombre;
	PRIVATE $strApellido;
	PRIVATE $intTelefono;
	PRIVATE $strEmail;
	PRIVATE $intTipoId;
	PRIVATE $intStatus;
	PRIVATE $intRuta;
	PRIVATE $strNit;
	PRIVATE $strNomFiscal;
	PRIVATE $strDirFiscal;

	public function __construct()
	{
		parent::__construct();
	}	

	/*public function insertUsuario(string $matricula, string $nombre, string $apellido, int $telefono, string $email, int $tipoid, int $status, int $ruta)
	{
		$this->strMatricula = $matricula;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->intTipoId = $tipoid;
		$this->intStatus = $status;
		$this->intRuta = $ruta;
		$return = 0;

		$sql = "SELECT * FROM persona WHERE codigoRuta = $this->intRuta AND matricula = '{$this->strMatricula}'";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert = "INSERT INTO persona(matricula,nombres,apellidos,telefono,email_user,rolid,codigoruta,status)  VALUES(?,?,?,?,?,?,?,?)";
			$arrData = array($this->strMatricula,$this->strNombre,$this->strApellido,$this->intTelefono,$this->strEmail,$this->intTipoId,$this->intRuta,$this->intStatus);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		}else{
			$return = "0";
		}
		return $return;
	}*/

	public function selectUsuarios()
	{
		$whereAdmin = "";
		if($_SESSION['idUser'] != 1){
			$ruta = $_SESSION['idRuta'];
			$whereAdmin = " and p.idpersona != 1 and p.codigoruta = $ruta";
		}
		$sql = "SELECT 
					p.idpersona, 
					p.nombres, 
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
				WHERE p.status != 0 ".$whereAdmin;
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectUsuario(int $idpersona)
	{
		$this->intIdUsuario = $idpersona;
		$sql = "SELECT p.idpersona, 
						p.nombres, 
						p.apellidos,
						p.matricula, 
						p.telefono, 
						p.email_user, 
						p.modelo, 
						r.idrol, 
						r.nombrerol, 
						p.status, 
				DATE_FORMAT(p.datecreated, '%Y-%m-%d') as fechaRegistro 
				FROM persona p 
				INNER JOIN rol r 
				ON p.rolid = r.idrol 
				WHERE p.idpersona = $this->intIdUsuario";
		$request = $this->select($sql);
		return $request;
	}

	public function selectRutas()
	{
		$sql = "SELECT * from ruta WHERE estado != 0";
		$request = $this->select_all($sql);
		return $request;
	}

	public function updateUsuario(int $idUsuario, string $matricula, string $nombre, string $apellido, int $telefono, string $email, int $tipoid, int $status)
	{
		$this->intIdUsuario = $idUsuario;
		$this->strMatricula = $matricula;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->intTipoId = $tipoid;
		$this->intStatus = $status;

		$sql = "SELECT * FROM persona WHERE (matricula = '{$this->strMatricula}' AND idpersona != $this->intIdUsuario)";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$sql = "UPDATE persona SET matricula = ?, nombres = ?, apellidos = ?, telefono = ?, email_user = ?, rolid = ?, status = ? WHERE idpersona = $this->intIdUsuario";
			$arrData = array($this->strMatricula,$this->strNombre,$this->strApellido,$this->intTelefono,$this->strEmail,$this->intTipoId,$this->intStatus);
			$request = $this->update($sql, $arrData);
		}else{
			$request = "0";
		}
		return $request;
	}

	public function deleteUsuario(int $idtipousuario)
	{
		$usuarioId = $_SESSION['idUser'];
		$this->intIdUsuario = $idtipousuario;
		$sql2 = "SELECT * FROM persona pe INNER JOIN ruta ru ON(pe.codigoruta = ru.idruta) WHERE pe.idpersona = $usuarioId";
		$request = $this->select($sql2);
		$codigoRuta = $request['idruta'];
		$sql = "UPDATE persona SET status = ? WHERE idpersona = $this->intIdUsuario AND codigoruta = $codigoRuta";
		$arrData = array(0);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updatePerfil(int $idUsuario, string $matricula, string $nombre, string $apellido, int $telefono)
	{
		$this->intIdUsuario = $idUsuario;
		$this->strMatricula = $matricula;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;

		$sql = "SELECT * FROM persona WHERE (matricula = '{$this->strMatricula}' AND idpersona != $this->intIdUsuario)";
		$request = $this->select_all($sql);

		if(empty($request)){
				$sql = "UPDATE persona SET matriucla = ?, nombres = ?, apellidos = ?, telefono = ? WHERE idpersona = $this->intIdUsuario";
				$arrData = array($this->strMatricula,$this->strNombre,$this->strApellido,$this->intTelefono);
			$request = $this->update($sql,$arrData);
		}else{
			$request = "0";
		}
		return $request;
	}
}
?>