<?php
ob_start();
$lista=$nev=$jog=$jelszo=$msg="";
$azon=0;

$sql="select az as 'jaz',nev as 'jnev' from jogosultsagok order by nev";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
    extract($row);
    $lista.="<option value='{$jaz}'>{$jnev}</option>";
}

if(isset($_POST['mentes'])){
    extract($_POST);
    $sql="insert into felhasznalok values (0,'{$nev}','{$jelszo}','{$jog}')";
    try{
        $stmt=$db->exec($sql);
        $msg="Sikeres adatbeírás!"; 
        unset($_GET['insert']);
        header("Location:index.php?p=felhasznalok.php&msg={$msg}");
    exit;
    }catch(PDOException $e) {
        //echo 'Caught exception: ',  $e->getMessage(), "\n";
        $msg="Hiba! Nem sikerült az adat beírása az adatbázisba!";
    }    
}
?>

    <div class="container border">
        <h6 class="text-center">Az új felhasználó adatai</h6>
        <div class="row justify-content-center ">	
			<div class="col-md-4" id="hibak" ><?=$msg?></div>	
		</div>
        <div class="row m-1 p-2">   
            <div class="col-12">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group row ">
                        <label class="control-label col-sm-5" for="nev">Név:</label>
                        <div class="col-sm-7">
                            <input type="text" name="nev" class="form-control" value="<?=$nev?>" required autofocus>
                        </div>   
                    </div>
                    <div class="form-group row">
                        <label  class="control-label col-sm-5" for="jelszo">Jelszó:</label>
                        <div class="col-sm-7">
                            <input type="text" name="jelszo" class="form-control" value="<?=$jelszo?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5" for="jog">Jogosultság:</label>
                        <div class="col-sm-7">
                            <select name="jog" class="form-control"  id="jog" >
                                <option value="0">Válassz jogosultságot...</option>
                                <?=$lista?>
                            </select>
                        </div>
                    </div>
                    <input class="btn btn-outline-primary" type="submit" name="mentes" value="Mentés" >
                </form>
                <div class="row justify-content-center p-3">	
			        <a class="btn btn-outline-warning " href="index.php?p=felhasznalok.php">Mégsem</a>
		        </div>
              </div>
         </div>
    </div>
                