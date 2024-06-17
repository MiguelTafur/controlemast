<?php 

	//Retorla la url del proyecto
	function base_url()
	{
		return BASE_URL;
	}
    //Retorna la url de Assets
    function media()
    {
        return BASE_URL."/Assets";
    }

    //Template del Header
    function headerAdmin($data="")
    {
        $view_header = "Views/Template/header_admin.php";
        require_once ($view_header);
    }

    //Template del Footer
    function footerAdmin($data="")
    {
        $view_footer = "Views/Template/footer_admin.php";
        require_once ($view_footer);        
    }

    //Template de las anotaciones
    function anotaciones($data = "")
    {
        $view_anotaciones = "Views/Template/anotaciones.php";
        require_once ($view_anotaciones);
    }

	//Muestra información formateada
	function dep($data)
    {
        $format  = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }
    //Template de las ventanas modales
    function getModal(string $nameModal, $data)
    {
        $view_modal = "Views/Template/Modals/{$nameModal}.php";
        require_once $view_modal;        
    }


    function getFile(string $url, $data)
    {
        ob_start();
        require_once("Views/{$url}.php");
        $file = ob_get_clean();
        return $file;
    }

    //Envío de correos
    function sendEmail($data,$template)
    {
        $asunto = $data['asunto'];
        $emailDestino = $data['email'];
        $empresa = NOMBRE_REMITENTE;
        $remitente = EMAIL_REMITENTE;
        //ENVÍO DE CORREO
        $de = "MIME-Version: 1.0\r\n";
        $de.= "Content-type: text/html; charset=UTF-8\r\n";
        $de.= "From: {$empresa} <{$remitente}>\r\n";
        ob_start();
        require_once("Views/Template/Email/".$template.".php");
        $mensaje = ob_get_clean();
        $send = mail($emailDestino, $asunto, $mensaje, $de);
        return $send;
    }

    function getPermisos(int $idmodulo)
    {
        require_once("Models/PermisosModel.php");
        $objPermisos = new PermisosModel();
        $idrol = $_SESSION['userData']['idrol'];
        $arrPermisos = $objPermisos->permisosModulo($idrol);
        $permisos = '';
        $permisosMod = '';

        if(count($arrPermisos) > 0){
            $permisos = $arrPermisos;
            $permisosMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : "";
        }
        $_SESSION['permisos'] = $permisos;
        $_SESSION['permisosMod'] = $permisosMod;
    }

    //Inserta los usuarios
    function setPersona(int $idusuario, string $matricula, string $nombre, string $apellido, int $telefono, string $email, int $tipoid, int $status, int $empresa, int $modelo, int $option)
    {
        require_once("Models/PersonasModel.php");
        $objPersonas = new PersonasModel();
        if($option === 1) {
            $request = $objPersonas->insertPersona($matricula, $nombre, $apellido, $telefono, $email, $tipoid, $status, $empresa, $modelo);
        } else {
            $request = $objPersonas->updatePersona($idusuario,$matricula, $nombre, $apellido, $telefono, $email, $tipoid, $status, $empresa, $modelo);
        }

        return $request;
    }

    //Traer todos los usuarios
    function getPersonas(int $rol = NULL)
    {
        require_once("Models/PersonasModel.php");
        $objPersonas = new PersonasModel();

        if($rol != NULL) {
            $request = $objPersonas->selectPersonas($rol);
        } else {
            $request = $objPersonas->selectPersonas();
        }

        return $request;
    }

    //Traer un usuario y eliminar usuario
    function getPersona($idpersona, $option)
    {
        require_once("Models/PersonasModel.php");
        $objPersonas = new PersonasModel();

        if($option === 1) {
            $request = $objPersonas->selectPersona($idpersona);
        } else {
            $request = $objPersonas->deletePersona($idpersona);
        }

        return $request;
    }

    //Traer todos los equipamentos y uno por uno
    function getEquipamentos(string $tipo, int $idequipamento)
    {
        require_once("Models/EquipamentosModel.php");
        $objEquipamento = new EquipamentosModel();
        if(!empty($tipo)) {
            $request = $objEquipamento->selectEquipamentos($tipo);
        } else {
            $request = $objEquipamento->selectEquipamento($idequipamento);
        }
        
        return $request;
    }

    //Inserta los equipamentos
    function setEquipamentos(int $idequipamento, string $marca, string $codigo, string $lacre, int $estado, string $tipo, int $ruta, string $observacion, string $imagen) {
        require_once("Models/EquipamentosModel.php");
        $objEquipamento = new EquipamentosModel();

        if($idequipamento === 0) {
            $request = $objEquipamento->insertEquipamento($marca, $codigo, $lacre, $ruta, $observacion, $imagen, $tipo, $estado);
        } else {
            $estado = getEquipamentos("", $idequipamento)['status'];
            $request = $objEquipamento->updateEquipamento($idequipamento, $marca, $codigo, $lacre, $estado, $tipo);
        }

        return $request;
    }

    function setEstadoEquipamento(int $idequipamento, int $estado, string $anotacao, string $imagem, string $tipo)
    {
        require_once("Models/EquipamentosModel.php");
        $objEquipamentos = new EquipamentosModel();

        $request = $objEquipamentos->updateEstadoEquipamento($idequipamento, $estado, $anotacao, $imagem, $tipo);

        return $request;
    }

     //Inserta las anotaciones de los equipamentos
     function setAnotaciones(int $idequipamento, int $usuario, string $anotacao, string $imagem, int $estado, string $tipo)
     {
         require_once("Models/AnotacionesModel.php");
         $objAnotaciones = new AnotacionesModel();
         $request = $objAnotaciones->insertAnotacao($idequipamento, $usuario, $anotacao, $imagem, $estado, $tipo);
         return $request;
     }

    //Trae las anotaciones de los equipamentos
    function getAnotacionesEquipamento(int $idequipamento, string $tipo)
    {
        require_once("Models/AnotacionesModel.php");
        $objAnotaciones = new AnotacionesModel();
        $request = $objAnotaciones->selectAnotacionesEquipamento($idequipamento, $tipo);

        return $request;
    }

    function sessionUser(int $idpersona){
        require_once ("Models/LoginModel.php");
        $objLogin = new LoginModel();
        $request = $objLogin->sessionLogin($idpersona);
        return $request;
    }

    function sessionStart(){
        session_start();
        $inactive = 300;
        if(isset($_SESSION['timeout'])){
            $session_in = time() - $_SESSION['inicio'];
            if($session_in > $inactive){
                header("Location: ".BASE_URL."/logout");
            }
        }else{
            header("Location: ".BASE_URL."/logout");
        }
    }

    function generar_codigo_aleatorio(int $letra, int $longitud)
    {
        for ($i=1; $i<=$longitud ; $i++) { 
            $aleatorio = rand(0,9);
            $letra.=$aleatorio;
        }
        return $letra;
    }

    //Elimina exceso de espacios entre palabras
    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }
    //Genera una contraseña de 10 caracteres
	function passGenerator($length = 10)
    {
        $pass = "";
        $longitudPass=$length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena=strlen($cadena);

        for($i=1; $i<=$longitudPass; $i++)
        {
            $pos = rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }
    //Genera un token
    function token()
    {
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        return $token;
    }
    //Formato para valores monetarios
    function formatMoney($cantidad){
        $cantidad = number_format($cantidad,2,SPD,SPM);
        return $cantidad;
    }

    function Meses()
    {
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        return $meses;
    }
    

 ?>