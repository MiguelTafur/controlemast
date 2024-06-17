<?php 

class FonesModel extends Mysql
{
	PRIVATE $intIdEquipamento;
	PRIVATE $intIdPersona;
	PRIVATE $strMarca;
	PRIVATE $strCodigo;
	PRIVATE $strLacre;
	PRIVATE $intStatus;
	PRIVATE $intTipo;
	PRIVATE $strAnotacao;
	PRIVATE $strImagem;
	PRIVATE $intIdRuta;

	public function __construct()
	{
		parent::__construct();
	}

	public function selectAnotacionesFone(int $idequipamento)
	{
		$this->intIdEquipamento = $idequipamento;
		$sql = "SELECT pe.nombres,
					   pe.apellidos,
					   eq.lacre, 
					   an.idanotacion,
                       an.anotacion,
					   an.imagen, 
					   an.datecreated,
					   an.status
				FROM equipamento eq
				LEFT OUTER JOIN anotaciones an
				ON eq.idequipamento = an.equipamentoid
				LEFT OUTER JOIN persona pe
				ON pe.idpersona = an.personaid
				WHERE eq.idequipamento = $this->intIdEquipamento
				AND an.tipo = ".MFONE;
		$request = $this->select_all($sql);
		return $request;
	}

	public function updateEstadoFone(int $idequipamento, int $estado, string $anotacion, string $imagen) 
	{
		$this->intIdEquipamento = $idequipamento;
		$this->intIdPersona = $_SESSION['idUser'];
		$this->strAnotacao = $anotacion;
		$this->strImagem = $imagen;
		$this->intStatus = $estado;
		$this->intTipo = MFONE;
		$return = 0;

		$query_select = "SELECT status FROM equipamento WHERE idequipamento = $this->intIdEquipamento";
		$request_select = $this->select($query_select);
		$estado = $request_select['status'];
		
		if($estado === 2) {
			$return = '0';
		} else {
			$query_update = "UPDATE equipamento SET status = ? WHERE idequipamento = $this->intIdEquipamento";
			$arrData = array($this->intStatus);
			$request_update = $this->update($query_update, $arrData);

			setAnotaciones($this->intIdEquipamento,
							   $this->intIdPersona,
							   $this->strAnotacao,
							   $this->strImagem,
							   $this->intStatus,
							   $this->intTipo);

			$return = $this->intStatus;
		}

		return $return;
	}
}