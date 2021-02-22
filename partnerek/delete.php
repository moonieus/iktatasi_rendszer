<?php
//az url-bol kapjuk az adatot:
$msg="";
$id = $_GET['deleteId'];
$nev= $_GET['deleteNev'];
$sql="delete from felhasznalok where az={$id}";
try{
	$count=$db->exec($sql);
	$msg ="{$nev} törölve az adatbázisból!"; 
}catch(PDOException $e){		
	$msg= "{$nev} nem törölhető!"; 
}
header("Location:index.php?p=felhasznalok.php&msg={$msg}");
?> 