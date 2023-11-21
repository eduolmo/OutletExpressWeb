<?php

// Abre uma conexao com o BD.

$host        = "host = berry.db.elephantsql.com;";
$port        = "port = 5432;";
$dbname      = "dbname = hkrcjfkn;";
$dbuser 	 = "hkrcjfkn";
$dbpassword	 = "NEi4W6BNvckEcn7i56IEbPPJKFuUqGud";

// para conectar ao mysql, substitua pgsql por mysql
$db_con= new PDO('pgsql:' . $host . $port . $dbname, $dbuser, $dbpassword);

//alguns atributos de performance.
$db_con->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
