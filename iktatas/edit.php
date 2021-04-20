<?php
$lista="";
//ha megerkezett az URL-ben az azonosito, meg kell jeleniteni a megfelelo rekordot:
if(isset($_GET['editId'])){
	$id=$_GET['editId'];//ezt az $id elrejtjuk a form-ban egy hidden tipusu tag-ban
    $sql="SELECT iktatoszam,szamlaszam,partnerek.nev as 'nev',szla_kelte,telj_dat,fiz_hat,netto,afa,
    brutto,status,kep FROM szamlak,partnerek where partnerek.az=szamlak.partnerek_az and iktatoszam={$id}";
	$stmt=$db->query($sql);
	$row=$stmt->fetch();
    extract($row);	
}

$sql="select az,nev as 'pnev' from partnerek order by nev";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
    extract($row);
    $lista.="<option value='{$az}'>{$pnev}</option>";
}
if(isset($_POST['mentes'])) {
    extract($_POST);
    $sql="update szamlak set szamlaszam='{$szamlaszam}',partnerek_az={$pkod},szla_kelte='{$szla_kelte}',telj_dat='{$telj_dat}',
    fiz_hat='{$fiz_hat}',netto={$netto},afa={$afa},brutto={$brutto},status='{$status}',kep='{$kep}' where iktatoszam={$id}";
    try{
        $stmt=$db->exec($sql);
        $msg="Sikeres adatbeírás!"; 
        unset($_GET['insert']);
        header("Location:index.php?p=partnerek.php&msg={$msg}");
    exit;
    }catch(PDOException $e) {
        //echo 'Caught exception: ',  $e->getMessage(), "\n";
        $msg="Hiba! Nem sikerült az adat beírása az adatbázisba!";
    }
}

?>
<div class="container border">
        <h3 class="text-center bg-warning">Adatok módosítása</h3>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="row m-1 p-2">   
            <div class="col">   
                    <div class="form-group">
                        <label for="">Iktatószám:</label>
                        <input type="text" name="iktatoszam" id="iktatoszam" class="form-control" value="<?=$iktatoszam?>" readonly>
                    </div>            
                    <div class="form-group">
                        <label for="">Számlaszám:</label>
                        <input type="text" name="szamlaszam" id="szamlaszam" class="form-control" value="<?=$szamlaszam?>" required autofocus>
                    </div>         
                    <div class="form-group">
                        <label for="">Partner:</label>
                        <select name="pkod" class="form-control" id="pkod">
                            <option value="<?=$partnerek_az?>"><?=$nev?></option>
                            <?=$lista?>
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="">Számla kelte:</label>
                        <input type="date" name="szla_kelte" class="form-control" value="<?=$szla_kelte?>" required>
					</div>
                    <div class="form-group">
                        <label for="">Teljesítés dátuma:</label>
                        <input type="date" name="telj_dat" class="form-control" value="<?=$telj_dat?>" required>
					</div>
            </div>
            <div class="col">
                    <div class="form-group">
                        <label for="">Fizetési határidő:</label>
                        <input type="date" name="fiz_hat" class="form-control" value="<?=$fiz_hat?>" required>
					</div>
                    <div class="form-group">
                        <label for="">Nettó érték:</label>
                        <input type="number" name="netto" id="netto" class="form-control" value="<?=$netto?>">
					</div>
                    <div class="form-group">
                        <label for="">Áfa érték:</label>
                        <input type="number" name="afa" id="afa" class="form-control" value="<?=$afa?>">
					</div>
                    <div class="form-group">
                        <label for="">Bruttó érték:</label>
                        <input type="number" name="brutto" id="brutto" class="form-control" value="<?=$brutto?>">
					</div>
                    <div class="form-group">
                        <label for="">Számlakép:</label>
                        <input type="file" name="file" id="file" class="form-control" value="<?=$kep?>">
					</div>
            </div>
        </div>
        <div class="row justify-content-center p-3">
            <input type="hidden" name="id" value="<?=$id?>">	
		    <a class="btn btn-outline-warning " href="index.php?p=iktatoszam.php">Mégsem</a>
            <input class="btn btn-outline-primary" type="submit" name="mentes" value="Mentés">
	    </div>
        </form>
</div> 

 