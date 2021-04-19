<?php
$lista="";
//ha megerkezett az URL-ben az azonosito, meg kell jeleniteni a megfelelo rekordot:
if(isset($_GET['editId'])){
	$id=$_GET['editId'];//ezt az $id elrejtjuk a form-ban egy hidden tipusu tag-ban
    $sql="SELECT az,nev,adoszam,varos,utca,irszam,kapcsolattarto,telszam,email FROM partnerek where az={$id}";
	$stmt=$db->query($sql);
	$row=$stmt->fetch();
    extract($row);	
}

if(isset($_POST['mentes'])) {
    extract($_POST);
    $sql="select az from partnerek where adoszam={$adoszam}";
    $stmt=$db->query($sql);
	if($stmt->rowCount()==1){
        $msg="Az adószám már létezik az adatbázisban!";
        echo "<script type='text/javascript'>alert('$msg');</script>";
	}else{
        $sql="update partnerek set nev='{$nev}',adoszam={$adoszam},varos='{$varos}',utca='{$utca}',irszam={$irszam},
        kapcsolattarto='{$kapcsolattarto}',telszam='{$telszam}',email='{$email}' where az={$id}";
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
}

?>
   <div class="container border">
        <h3 class="text-center bg-warning">Adatok módosítása</h3>
        <div class="row justify-content-center p-3">	
			<a class="btn btn-outline-primary " href="index.php?p=partnerek.php">Vissza</a>
		</div>
        <form action="" method="post">
        <div class="row m-1 p-2">   
            <div class="col">

                   <div class="form-group">
                        <label for="">Partnerkód:</label>
                        <input type="number" name="az" value="<?=$az?>" style="width: 50px" readonly>
                    </div>                 
                    <div class="form-group">
                        <label for="">Adószám:</label>
                        <input type="number" name="adoszam" id="adoszam" class="form-control" min="10000000000" max="99999999999" value="<?=$adoszam?>" required autofocus change="adoszamell()">
                    </div>               
                    <div class="form-group">
                        <label for="">Név:</label>
                        <input type="text" name="nev" class="form-control" value="<?=$nev?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Város:</label>
                        <input type="text" name="varos" class="form-control" value="<?=$varos?>" required>
					</div>
                    <div class="form-group">
                        <label for="">Utca:</label>
                        <input type="text" name="utca" class="form-control" value="<?=$utca?>" required>
					</div>
            </div>
            <div class="col">
                    <div class="form-group">
                        <label for="">Irányítószám:</label>
                        <input type="number" name="irszam" class="form-control" min="1000" max="9999" value="<?=$irszam?>" required>
					</div>
                    <div class="form-group">
                        <label for="">Kapcsolattartó:</label>
                        <input type="text" name="kapcsolattarto" class="form-control" value="<?=$kapcsolattarto?>">
					</div>
                    <div class="form-group">
                        <label for="">Telefonszám:</label>
                        <input type="text" name="telszam" class="form-control" value="<?=$telszam?>">
					</div>
                    <div class="form-group">
                        <label for="">E-mail cím:</label>
                        <input type="email" name="email" class="form-control" value="<?=$email?>">
					</div>
					<input type="hidden" name="id" value="<?=$id?>">
                    <div class="row justify-content-center p-3">
                    <input type="submit" name="mentes" value="Módosítás" class="btn btn-outline-warning">
                    </div>
                </div>
                </form>
         </div>
    </div>

 