<?php
if(count($_POST) > 0)
{
	include_once('classes/utility_functions.php');
	$conn = db_connect();
	
	$sTitle = addslashes($_POST['sTitle']);
	$eStatus = addslashes($_POST['eStatus']);
	$fAmount = floatval($_POST['fAmount']);
	$fAmountRemaining = floatval($_POST['fAmountRemaining']);
	$dDue = date('Y-m-d H:i:s',strtotime($_POST['dDue']));
	$dToSend = date('Y-m-d H:i:s',strtotime($_POST['dToSend']));
	
	$insert_sql = "insert into Invoices (sTitle,eStatus,fAmount,fAmountRemaining,dDue,dToSend,dCreated,dModified) VALUES('{$sTitle}','{$eStatus}',{$fAmount},{$fAmountRemaining},'{$dDue}','{$dToSend}','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."')";
	
	mysql_query($insert_sql);
}

header('location: /billing.php');
die;
?>