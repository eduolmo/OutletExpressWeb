<?php

//Conexão com banco de dados
$servername = "db4free.net"; //endereço do servidor
$username="outletexpress";
$password="outletexpress";
$db_name="outletexpress";

//pdo - somente orientado objeto
$connect =mysqli_connect($servername,$username,$password,$db_name);

//codifica com o caracteres ao manipular dados do banco de dados
//mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()):
	echo "Falha na conexão: ". mysqli_connect_error();
endif;
//delear codigo abaixo depois do teste da Consulta
/*
else:
	$sql = "SELECT * FROM USUARIO"
	$resultado= mysqli_query($connect,$sql);

	if (mysqli_num_rows($resultado)>0):   
		while($linha =mysqli_fetch_array($resultado)):
*/
?>

