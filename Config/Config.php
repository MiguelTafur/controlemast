<?php 
	
	const BASE_URL = "http://localhost/controleMast";
	//const BASE_URL = "https://credimast.com/controleMast";

	//Zona horaria
	date_default_timezone_set('Brazil/East');

	/*const DB_HOST = "sldn297.piensasolutions.com";
	const DB_NAME = "qahg656";
	const DB_USER = "qahg656";
	const DB_PASSWORD = "m1Guel03";*/

	const DB_HOST = "127.0.0.1";
	const DB_NAME = "qahg656";
	const DB_USER = "root";
	const DB_PASSWORD = "";

	const DB_CHARSET = "utf8";

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "R$";

	//Datos envío de correo
	const NOMBRE_REMITENTE = "CREDIMAST";
	const EMAIL_REMITENTE = "no-reply@credimast.com";	
	const NOMBRE_EMPRESA = "CREDIMAST";
	const WEB_EMPRESA = "www.credimast.com";

	//Módulos
	const MRUTAS = 1;
	const MMANUAL = 2;
	const MUSUARIO = 3;
	const MGERENTE = 4;
	const MCOORDINADOR = 5;
	const MLIDER = 6;
	const MOPERADOR = 7;
	const MFONE = 8;
	const MMOUSE = 9;
	const MTECLADO = 10;
	const MTELA = 11;
	const MCONTROLE = 12;
	const MAPRENDIZ = 13;
	const MSUPERVISOR = 14;
	const MGESTOR = 15;
	const MCOMPUTADOR = 16;

	//Roles
	const RADMINISTRADOR = 1;
	const RGERENTE = 2;
	const RCOORDINADOR = 3;
	const RLIDER = 4;
	const ROPERACAO = 5;
	const RAPRENDIZ = 6;
	const RSUPERVISOR = 7;
	const RGESTOR = 8;

	//Fecha Actual
	define('NOWDATE', date("Y-m-d"));

 ?>