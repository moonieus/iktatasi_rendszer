<?php
//az url-bol kapjuk az adatot:
$msg="";
$id = $_GET['deleteId'];
$sql="delete from szamlak where iktatoszam={$id}";
try{
	$count=$db->exec($sql);
	$msg ="A számla törölve az adatbázisból!"; 
}catch(PDOException $e){		
	$msg= "A számla nem törölhető!"; 
}
header("Location:index.php?p=iktatas.php&msg={$msg}");
?> 