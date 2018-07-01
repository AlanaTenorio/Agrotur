<?php
	//Criar a conexão
	$dbconn = pg_connect("host=localhost port=5432 dbname=agrotur user=alana password=123456") or die('Não foi possível conectar: ' . pg_last_error());

?>
