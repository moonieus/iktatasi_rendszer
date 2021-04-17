<?php
$msg="";
$id = $_GET['igazolId'];
$sql="update szamlak set status='I' where iktatoszam={$id}";
//$sql="delete from partnerek where az={$id}";
try{
	$count=$db->exec($sql);
	$msg ="A számla igazolva!"; 
}catch(PDOException $e){		
	$msg= "Az igazolás nem végrehajtható!"; 
}
header("Location:index.php?p=igazolas.php&msg={$msg}");
?> 