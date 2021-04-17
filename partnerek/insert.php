<?php
$msg=$adoszam=$nev=$varos=$utca=$irszam=$kapcsolattarto=$telszam=$email="";

if(isset($_POST['mentes'])){
    extract($_POST);
    print_r($_POST);
    $sql="insert into partnerek values (0,'$nev','$adoszam','$varos','$utca','$irszam','$kapcsolattarto','$telszam','$email')";
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
        <h3 class="text-center bg-warning">Az új partner adatai</h3>
        <form action="" method="post">
        <div class="row m-1 p-2">   
            <div class="col">              
                    <div class="form-group">
                        <label for="">Adószám:</label>
                        <input type="number" name="adoszam" id="adoszam" min="10000000000" max="99999999999" class="form-control" value="<?=$adoszam?>" required autofocus>
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
            </div>
        </div>
            <div class="row justify-content-center p-3">	
		        <a class="btn btn-outline-warning " href="index.php?p=partnerek.php">Mégsem</a>
               <input class="btn btn-outline-primary" type="submit" name="mentes" value="Mentés" >
	    	</div>
        </form>
</div>                