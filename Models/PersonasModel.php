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

    public function insertPersona(string $matricula, string $nombre, string $apellido, int $telefono, string $email, int $tipoid, int $status, int $ruta, int $modelo) {
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
}