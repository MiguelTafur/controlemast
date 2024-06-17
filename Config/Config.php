<?php 
	
	const BASE_URL = "http://localhost/controleMast";

	//Zona horaria
	date_default_timezone_set('Brazil/East');

	// const DB_HOST = "sldn297.piensasolutions.com";
	// const DB_NAME = "qahi319";
	// const DB_USER = "qahi319";
	// const DB_PASSWORD = "m1Guel03";

	const DB_HOST = "127.0.0.1";
	const DB_NAME = "controle_equipamentos";
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
	const MDASHBOARD = 2;
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

	//Roles
	const RADMINISTRADOR = 1;
	const RGERENTE = 2;
	const RCOORDINADOR = 3;
	const RLIDER = 4;
	const ROPERACAO = 5;

 ?>