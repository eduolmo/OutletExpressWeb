<?php

// Abre uma conexao com o BD.

$host        = "host = db4free.net;";
$port        = "port = 6649;";
$dbname      = "dbname = outletexpress;";
$dbuser 	 = "outletexpress";
$dbpassword	 = "outletexpress";

// para conectar ao mysql, substitua pgsql por mysql
$db_con= new PDO('mysql:' . $host . $port . $dbname, $dbuser, $dbpassword);

//alguns atributos de performance.
$db_con->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>