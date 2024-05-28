<?php 

class OperacaoModel extends Mysql
{
	PRIVATE $intIdOperador;
	PRIVATE $intMatricula;
	PRIVATE $strNombre;
	PRIVATE $strApellido;
	PRIVATE $intTelefono;
	PRIVATE $strEmail;
	PRIVATE $intTipoId;
	PRIVATE $intStatus;
	PRIVATE $intIdRuta;

	public function __construct()
	{
		parent::__construct();
	}

    public function insertOperador(int $matricula, string $nombre, string $apellido, int $telefono, string $email, int $tipoid, int $ruta)
	{
		$this->intMatricula = $matricula;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->intTipoId = $tipoid;
		$this->intIdRuta = $ruta;
		$return = 0;

		$sql = "SELECT * FROM persona WHERE matricula = $this->intMatricula";
		$request = $this->select_all($sql);

		

		if(empty($request))
		{
			$query_insert = "INSERT INTO persona(matricula,nombres,apellidos,telefono,email_user,rolid,codigoruta)  VALUES(?,?,?,?,?,?,?)";
			$arrData = array($this->intMatricula,$this->strNombre,$this->strApellido,$this->intTelefono,$this->strEmail,$this->intTipoId,$this->intIdRuta);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		}else{
			$return = "0";
		}
		return $return;
	}

    public function selectOperadores()
	{
		$ruta = $_SESSION['idRuta'];
		$sql = "SELECT 
					idpersona, 
					matricula, 
					nombres, 
					apellidos, 
					telefono, 
					status 
					FROM persona 
					WHERE rolid = '".ROPERACAO."' 
					AND codigoruta = $ruta  
					AND status != 0 
					ORDER BY nombres ASC";
		$request = $this->select_all($sql);
		return $request;
	}

    public function selectOperador(int $idpersona)
	{
		$this->intIdOperador = $idpersona;
		$sql = "SELECT 
					pe.idpersona, 
					pe.matricula, 
					pe.nombres, 
					pe.apellidos, 
					pe.telefono, 
					pe.email_user, 
					pe.status, 
				DATE_FORMAT(pe.datecreated, '%d-%m-%Y') as fechaRegistro 
				FROM persona pe 
				WHERE pe.idpersona = $this->intIdOperador 
				AND rolid = ".ROPERACAO;
		$request = $this->select($sql);
		return $request;
	}

    public function updateOperador(int $idUsuario, string $matricula, string $nombre, string $apellido, int $telefono, string $email)
	{
		$this->intIdOperador = $idUsuario;
		$this->intMatricula = $matricula;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;

		$sql = "SELECT * FROM persona WHERE (matricula = '{$this->intMatricula}' AND idpersona != $this->intIdOperador)";
		$request = $this->select_all($sql);

		if(empty($request))
		{

			$sql = "UPDATE persona 
					SET matricula = ?, 
					    nombres = ?, 
						apellidos = ?, 
						telefono = ?, 
						email_user = ?  
					WHERE idpersona = $this->intIdOperador";
			$arrData = array($this->intMatricula,$this->strNombre,$this->strApellido,$this->intTelefono,$this->strEmail);
			$request = $this->update($sql, $arrData);
		}else{
			$request = "0";
		}
		return $request;
	}
}