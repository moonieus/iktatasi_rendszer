<?php
ob_start();
$msg=$partnerek_az=$szamlaszam=$szla_kelte=$telj_dat=$fiz_hat=$kep=$lista="";
$pkod=$netto=$afa=$brutto=0;

$sql="select az,nev from partnerek order by nev";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
    extract($row);
    $lista.="<option value='{$az}'>{$nev}</option>";
}
if(isset($_POST['mentes'])){
    $kep=$_FILES['file']['name'];
    extract($_POST);
    $sql="insert into szamlak values (0,'{$szamlaszam}',{$pkod},'{$szla_kelte}','{$telj_dat}','{$fiz_hat}',{$netto},{$afa},{$brutto},'N','{$kep}')";
    try{
        $stmt=$db->exec($sql);
        $msg="Sikeres adatbeírás!"; 
        unset($_GET['insert']);
        header("Location:index.php?p=iktatas.php&msg={$msg}");
    exit;
    }catch(PDOException $e) {
        //echo 'Caught exception: ',  $e->getMessage(), "\n";
        $msg="Hiba! Nem sikerült az adat beírása az adatbázisba!";
    }    
}
?>
<script src="insert.js"></script>
<div class="container border">
        <h3 class="text-center bg-warning">Az új számla adatai</h3>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="row m-1 p-2">   
            <div class="col">              
                    <div class="form-group">
                        <label for="">Számlaszám:</label>
                        <input type="text" name="szlasz" id="szlasz" class="form-control" value="<?=$szamlaszam?>" required autofocus>
                    </div>         
                    <div class="form-group">
                        <label for="">Partner:</label>
                        <select name="pkod" class="form-control" id="pkod">
                            <option value="0">Válassz partnert...</option>
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
                    <div class="form-group">
                        <label for="">Fizetési határidő:</label>
                        <input type="date" name="fiz_hat" class="form-control" value="<?=$fiz_hat?>" required>
					</div>
            </div>
            <div class="col">
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
		    <a class="btn btn-outline-warning " href="index.php?p=iktatoszam.php">Mégsem</a>
            <input class="btn btn-outline-primary" type="submit" name="mentes" value="Mentés" onclick="ellenoriz()">
	    </div>
        </form>
</div> 
                