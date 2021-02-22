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
//print_r($_POST);
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
        //echo 'Caught exception: ',  $e->getMessage(), "\n";
        $msg="Hiba! Nem sikerült az adat beírása az adatbázisba!";
    }
}

?>
   <div class="container border">
        <h3 class="text-center">Adatok módosítása</h3>
        <div class="row justify-content-center p-3">	
			<a class="btn btn-outline-primary " href="index.php?p=felhasznalok.php">Vissza</a>
		</div>
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
                    <input type="submit" name="mentes" value="modositas" >
                </form>
              </div>
         </div>
    </div>

 