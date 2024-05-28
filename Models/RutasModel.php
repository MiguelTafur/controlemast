<?php

    class RutasModel extends Mysql
    {
	    PRIVATE $strNombre;
        PRIVATE $intIdRuta;
        PRIVATE $intCodigoRuta;
        PRIVATE $strDia;

        public function __construct()
        {
            parent::__construct();
        }
        
        public function insertRuta(int $codigo, string $nombre)
        {
            $this->strNombre = $nombre;
            $this->intCodigoRuta = $codigo;
            $return = 0;
            
            $sql = "SELECT codigo FROM ruta WHERE codigo = $this->intCodigoRuta";
            $request = $this->select_all($sql);

            if(empty($request)) {
                $query_insert = "INSERT INTO ruta(codigo, nombre) VALUES(?,?)";
                $arrData = array($this->intCodigoRuta, $this->strNombre);
                $request_insert = $this->insert($query_insert, $arrData);

                $return = $request_insert;
            } else {
                $return = "0";
            }

            return $return;
        }

        public function selectRutas()
        {
            $sql = "SELECT idruta, codigo, nombre, DATE_FORMAT(datecreated, '%d-%m-%Y') as datecreated 
                    FROM ruta 
                    WHERE estado = 1";
            $request = $this->select_all($sql);
            return $request;
        }

        public function selectRuta(int $idRuta)
        {
            $this->intIdRuta = $idRuta;
            $sql = "SELECT idruta, codigo, nombre, DATE_FORMAT(datecreated, '%d-%m-%Y') as datecreated 
                    FROM ruta 
                    WHERE idruta = $this->intIdRuta";
            $request = $this->select($sql);
            return $request;
        }

        public function updateRuta(int $id, int $codigo, string $nombre)
        {
            $this->intIdRuta = $id;
            $this->intCodigoRuta = $codigo;
            $this->strNombre = $nombre;

            $sql = "UPDATE ruta SET codigo = ?, nombre = ? WHERE idruta = $this->intIdRuta";
            $arrData = array($this->intCodigoRuta, $this->strNombre);
            $request = $this->update($sql, $arrData);

            return $request;
        }

        public function deleteRuta(int $idRuta)
        {
            $this->intIdRuta = $idRuta;

            $sqlPr = "SELECT * FROM ruta ru 
                      INNER JOIN persona pe 
                      ON(ru.idruta = pe.codigoruta) 
                      WHERE pe.codigoruta = $this->intIdRuta 
                      AND pe.rolid = 1 
                      AND ru.estado = 1 
                      AND pe.status = 1";
            $requestPr = $this->select_all($sqlPr);
            
            if(empty($requestPr)){
                $sql = "UPDATE ruta SET estado = ? WHERE idruta = $this->intIdRuta";
                $arrData = array(0);
                $request = $this->update($sql, $arrData);
            }else{
                $request = "0";	
            }

            return $request;
        }
    }
?>