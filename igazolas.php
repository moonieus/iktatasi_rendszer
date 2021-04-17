<?php
ob_start();

require_once 'config.php';
if(isset($_GET['igazolId']))
	include "igazolas\\igazol.php";
else if(isset($_GET['visszautasitId']))
	include "igazolas\\visszautasit.php";
else
	include "igazolas\\igazolasView.php";
?>