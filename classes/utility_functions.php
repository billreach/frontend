<?php
function db_connect()
{
	$rs = mysql_pconnect('localhost:8889','root','root');

	mysql_select_db('billreach');
	
	return $rs;
}

?>