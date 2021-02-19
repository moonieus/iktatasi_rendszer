<?php
ob_start();

if(!isset($_SESSION["user"])=="admin"){
	header("Location:index.php");
}

require_once 'config.php';
if(isset($_GET['editId']))
	include "felhasznalok\\edit.php";
else if(isset($_GET['deleteId']))
	include "felhasznalok\\delete.php";
else 
	include "felhasznalok\\felhasznalokView.php";
?>