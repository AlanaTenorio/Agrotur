<?php
	//Criar a conexão
	$dbconn = pg_connect("host=localhost port=5432 dbname=agrotur user=eberson password=525Nosrebe") or die('Não foi possível conectar: ' . pg_last_error());

?>
