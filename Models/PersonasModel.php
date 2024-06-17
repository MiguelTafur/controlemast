<?php 

class PersonasModel extends Mysql
{
	PRIVATE $intIdUsuario;
	PRIVATE $strMatricula;
	PRIVATE $strNombre;
	PRIVATE $strApellido;
	PRIVATE $intTelefono;
	PRIVATE $strEmail;
	PRIVATE $intTipoId;
	PRIVATE $intRuta;
    PRIVATE $intModelo;
	PRIVATE $intStatus;

	public function __construct()
	{
        parent::__construct();
    }

    public function insertPersona(string $matricula, string $nombre, string $apellido, int $telefono, string $email, int $tipoid, int $status, int $ruta, int $modelo) 
	{
        $this->strMatricula = $matricula;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->intTipoId = $tipoid;
		$this->intRuta = $ruta;
        $this->intModelo = $modelo;
		$this->intStatus = $status;
		$return = 0;

        $sql = "SELECT * FROM persona WHERE codigoRuta = $this->intRuta AND matricula = '{$this->strMatricula}'";
		$request = $this->select_all($sql);

        if(empty($request))
		{
			$query_insert = "INSERT INTO persona(matricula,nombres,apellidos,telefono,email_user,rolid,codigoruta,modelo,status)  VALUES(?,?,?,?,?,?,?,?,?)";
			$arrData = array($this->strMatricula,$this->strNombre,$this->strApellido,$this->intTelefono,$this->strEmail,$this->intTipoId,$this->intRuta,$this->intModelo,$this->intStatus);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		}else{
			$return = "0";
		}

		return $return;

    }

	public function updatePersona(int $idUsuario, string $matricula, string $nombre, string $apellido, int $telefono, string $email, int $tipoid, int $status, int $ruta, int $modelo)
	{
		$this->intIdUsuario = $idUsuario;
		$this->strMatricula = $matricula;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->intTipoId = $tipoid;
		$this->intRuta = $ruta;
		$this->intModelo = $modelo;
		$this->intStatus = $status;

		$sql = "SELECT * FROM persona WHERE (matricula = '{$this->strMatricula}' AND idpersona != $this->intIdUsuario)";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$sql = "UPDATE persona SET matricula = ?, nombres = ?, apellidos = ?, telefono = ?, email_user = ?, rolid = ?, modelo = ?, status = ? WHERE idpersona = $this->intIdUsuario";
			$arrData = array($this->strMatricula,$this->strNombre,$this->strApellido,$this->intTelefono,$this->strEmail,$this->intTipoId,$this->intModelo,$this->intStatus);
			$request = $this->update($sql, $arrData);
		}else{
			$request = "0";
		}
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
				WHERE p.status != 0 AND p.codigoruta = $ruta".$whereAdmin."".$whereRol;
		//dep($sql);exit;
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectPersona(int $idpersona)
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

	public function deletePersona(int $idpersona)
	{
		$this->intIdUsuario = $idpersona;
		$sql = "UPDATE persona SET status = ? WHERE idpersona = $this->intIdUsuario";
		$arrData = array(0);
		$request = $this->update($sql, $arrData);
		return $request;
	}
}