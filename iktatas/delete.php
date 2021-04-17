<?php
//az url-bol kapjuk az adatot:
$msg="";
$id = $_GET['deleteId'];
$nev= $_GET['deleteNev'];
$sql="delete from partnerek where az={$id}";
try{
	$count=$db->exec($sql);
	$msg ="A(z) {$nev} törölve az adatbázisból!"; 
}catch(PDOException $e){		
	$msg= "A(z) {$nev} nem törölhető!"; 
}
header("Location:index.php?p=partnerek.php&msg={$msg}");
?> 