<?php
ob_start();

require_once 'config.php';
if(isset($_GET['editId']))
	include "iktatas\\edit.php";
else if(isset($_GET['deleteId']))
	include "iktatas\\delete.php";
else if(isset($_GET['insert']))
	include "iktatas\\insert.php";
else
	include "iktatas\\iktatasView.php";
?>