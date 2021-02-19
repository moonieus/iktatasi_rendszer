<?php
if(isset($_GET['p'])=='logout.php'){
	session_destroy();
	header('Location:index.php');
}
?> 

         <p >Bejelentkezve:<?=isset($_SESSION['user'])?$_SESSION['user']:""?></h1>
    