<?php
ob_start();

require_once 'config.php';
if(isset($_GET['editId']))
	include "felhasznalok\\edit.php";
else if(isset($_GET['deleteId']))
	include "felhasznalok\\delete.php";
else 
	include "felhasznalok\\felhasznalokView.php";
?>