<?php
if(isset($_GET['p'])=='logout.php'){
	session_destroy();
	print_r($_GET);
	print_r($_SESSION);
	header('Location:index.php');
}
?> 

<!--<p >Bejelentkezve:<?=isset($_SESSION['user'])?$_SESSION['user']:""?></h1>
    