<?php

// Abre uma conexao com o BD.

$host        = "host = isabelle.db.elephantsql.com;";
$port        = "port = 5432;";
$dbname      = "dbname = aarpgxeh;";
$dbuser 	 = "aarpgxeh";
$dbpassword	 = "J6JetsRuN1TROLwMprZK7t7Vq_yQxJzL";

// para conectar ao mysql, substitua pgsql por mysql
$db_con= new PDO('pgsql:' . $host . $port . $dbname, $dbuser, $dbpassword);

//alguns atributos de performance.
$db_con->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
