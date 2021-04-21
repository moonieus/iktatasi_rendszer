<?php
$lista="";
//ha megerkezett az URL-ben az azonosito, meg kell jeleniteni a megfelelo rekordot:
if(isset($_GET['editId'])){
	$id=$_GET['editId'];//ezt az $id elrejtjuk a form-ban egy hidden tipusu tag-ban
	$sql="select felhasznalok.az,felhasznalok.nev as 'fnev',jelszo,jogosultsagok_az as 'fjaz',jogosultsagok.nev as 'fjnev' FROM felhasznalok,jogosultsagok 
	WHERE felhasznalok.jogosultsagok_az=jogosultsagok.az and felhasznalok.az={$id}";
	$stmt=$db->query($sql);
	$row=$stmt->fetch();
    extract($row);	
}

$sql="select az as 'jaz',nev as 'jnev' from jogosultsagok order by nev";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
    extract($row);
    $lista.="<option value='{$jaz}'>{$jnev}</option>";
}

if(isset($_POST['mentes'])) {
    extract($_POST);
    $sql="update felhasznalok set nev='{$nev}',jelszo='{$jelszo}',jogosultsagok_az={$jog} where az={$id}";
    try{
        $stmt=$db->exec($sql);
        $msg="Sikeres adatbeírás!"; 
        unset($_GET['insert']);
        header("Location:index.php?p=felhasznalok.php&msg={$msg}");
    exit;
    }catch(PDOException $e) {
        $msg="Hiba! Nem sikerült az adat beírása az adatbázisba!";
    }
}

?>
   <div class="container border">
        <h3 class="text-center bg-warning">Adatok módosítása</h3>
        <div class="row m-1 p-2">   
            <div class="col-5">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Név:</label>
                        <input type="text" name="nev" class="form-control" value="<?=$fnev?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Jelszó:</label>
                        <input type="text" name="jelszo" class="form-control" value="<?=$jelszo?>" required>
					</div>
                    <div class="form-group">
                        <label for="">Jogosultság:</label>
                        <select name="jog" class="form-control" id="jog">
                            <option value="<?=$fjaz?>"><?=$fjnev?></option>
                            <?=$lista?>
                        </select>
                    </div>
					<input type="hidden" name="id" value="<?=$id?>">
                    <a class="btn btn-outline-warning " href="index.php?p=felhasznalok.php">Mégsem</a>
                    <input class="btn btn-outline-primary" type="submit" name="mentes" value="Mentés">  
                </form>
              </div>
         </div>
    </div>

 