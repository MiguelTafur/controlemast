<?php 

    class Rutas extends Controllers{
        public function __construct()
        {
            session_start();
            parent::__construct();
            if(empty($_SESSION['login'])){
                header('Location: '.base_url().'/login');
            }
            getPermisos(MRUTAS);
        }

        public function Rutas()
        {
            if(empty($_SESSION['permisosMod']['r'])){
                header("Location: ".base_url().'/fones');
            }
            $data['page_tag'] = "Empresas";
            $data['page_title'] = "EMPRESAS";
            $data['page_name'] = "empresas";
            //$data['pagamentos'] = $this->model->selectDatePagoPrestamo();
            $data['page_functions_js'] = "functions_rutas.js";
            $this->views->getView($this,"rutas",$data);
        }

        public function getRutas()
        {
            if($_SESSION['permisosMod']['r']){
                $arrData = $this->model->selectRutas();
                //dep($arrData);exit;
                for ($i=0; $i < count($arrData); $i++) {
                    
                    $btnEdit = '';
                    $btnDelete = '';

                    if($_SESSION['permisosMod']['u']){
                        $btnEdit = '<button class="btn btn-secondary btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idruta'].')" title="Atualizar Empresa"><i class="fas fa-pencil-alt"></i></button>';
                    }
                    if($_SESSION['permisosMod']['d']){
                        $btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idruta'].')" title="Remover Empresa"><i class="far fa-trash-alt"></i></button>';
                    }

                    $arrData[$i]['options'] = '<div class="text-center">'.$btnEdit.' '.$btnDelete.'</div>';
                }
                echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function setRutas()
        {
            if($_POST)
            {
                if(empty($_POST['txtNombre']))
                {
                    $arrResponse = array("status" => false, "msg" => "Digite o nome da Empresa.");
                }else{
                    $idRuta = intval($_POST['idRuta']);
                    $codigoRuta = intval($_POST['codigoRuta']);
                    $strNombre =  ucwords(strClean($_POST['txtNombre']));
                    $request_user = "";

                    if($idRuta == 0)
                    {
                        $option = 1;
                        if($_SESSION['permisosMod']['w']){
                            $request_user = $this->model->insertRuta($codigoRuta, $strNombre);
                        }
                    }else{
                         $option = 2;
                         if($_SESSION['permisosMod']['u']){
                            $request_user = $this->model->updateRuta($idRuta, $codigoRuta, $strNombre);
                         }
                     }

                    if($request_user > 0)
                    {
                        if($option == 1){
                            $arrResponse = array('status' => true, 'msg' => 'Empresa criada com sucesso.');
                        }else{
                            $arrResponse = array('status' => true, 'msg' => 'Empresa atualizada com sucesso.');
                        }
                        
                    }else if($request_user == '0'){
                        $arrResponse = array('status' => false, 'msg' => 'Atenção! o código ja existe, digite outro.');
                    }else{
                        $arrResponse = array("status" => false, "msg" => 'Não foi possível armazenar os dados.');
                    }
                }	
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();

            // $codigoRuta = intval($_POST['codigoRuta']);
            // $strNombre =  ucwords(strClean($_POST['txtNombre']));
            // $datos = array('codigo' => $codigoRuta, 'nombre' => $strNombre);
            // $arrResponse = array('status' => true, 'msg' => 'Teste desde setRutas.', 'datos' => $datos);
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }

        public function getRuta($idRuta)
        {
            if($_SESSION['permisosMod']['r']){
                $idRuta = intval($idRuta);
                if($idRuta > 0)
                {
                    $arrData = $this->model->selectRuta($idRuta);
                    if(empty($arrData))
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else{
                        $arrResponse = array('status' => true, 'data' => $arrData);
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                }
            }
            die();
        }

        public function delRuta()
        {
            if($_POST)
            {
                if($_SESSION['permisosMod']['d']){
                    $intIdRuta = intval($_POST['idRuta']);
                    $requestDelete = $this->model->deleteRuta($intIdRuta);
                    if($requestDelete)
                    {
                        $arrResponse = array('status' => true, 'msg' => 'A Empresa foi removida.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'A Empresa não pode ser removida.');
                    }
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);	
                }
            }
            die();
        }
    }

?>