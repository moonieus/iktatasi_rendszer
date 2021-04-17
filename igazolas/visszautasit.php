<?php
$msg="";
$id = $_GET['visszautasitId'];
$sql="update szamlak set status='V' where iktatoszam={$id}";
//$sql="delete from partnerek where az={$id}";
try{
	$count=$db->exec($sql);
	$msg ="A számla visszautasítva!"; 
}catch(PDOException $e){		
	$msg= "A visszautasítás nem végrehajtható!"; 
}
header("Location:index.php?p=igazolas.php&msg={$msg}");
?> 