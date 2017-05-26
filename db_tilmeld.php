<?php 
// forbindelse til mySQL server med mysqli metoden

// 1. Konstanter (har den værdi som den får én gang, den kan ikke opdateres) til forbindelsesdata TIL localhost

const HOSTNAME = 'localhost'; // server navn
	const MYSQLUSER = 'marieegeberg_dk'; // super bruger (remote har man særskilte database brugere)
	const MYSQLPASS = 'Ty7LYgfc'; // bruger password
	const MYSQLDB = 'marieegeberg_dk'; // database navn 

// 2. Oprette forbindelsen via mysqli objekt $con

$con = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

// definere et character set (utf-8) for forbindelsen 
$con->set_charset('utf8');

// 3. Forbindelses-tjek

if($con->connect_error){ 
	die($con->connect_error);
}else {
	echo '<h2 style="text-align:center; color:black;">TAK FOR DIN TILMELDING TIL VALGFESTEN</h2><br>';
}

// hvis filen indeholder rent php kan slut tag undlades..