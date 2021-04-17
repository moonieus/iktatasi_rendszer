<?php
ob_start();

require_once 'config.php';
if(isset($_GET['editId']))
	include "partnerek\\edit.php";
else if(isset($_GET['deleteId']))
	include "partnerek\\delete.php";
else if(isset($_GET['insert']))
	include "partnerek\\insert.php";
else 
	include "partnerek\\partnerekView.php";
?>