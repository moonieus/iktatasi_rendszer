<?php
ob_start();
$nev=$beosztas=$msg=$datum="";
$azon=0;
//print_r($_POST);
if(isset($_POST['mentes']) ){
    extract($_POST);
    $sql="insert into szemelyek values ({$azon},'{$nev}','{$beosztas}','{$datum}','{$jog}','{$jelszo}')";
    try{
        $stmt=$db->exec($sql);
        $msg="sikeres adatbeiras"; 
        unset($_GET['insert']);
        header("Location:index.php?p=alkalmazottak.php&msg={$msg}");
       exit;
    }catch(Exception $e) {
        //echo 'Caught exception: ',  $e->getMessage(), "\n";
        $msg="hiba!! nem sikerult az adat beirasa az adatbazisba";
    }
    
}


?>

    <div class="container border">
        <h6 class="text-center">Új alkalmazott adatainak bevezetése</h6>
        <div class="row justify-content-center ">	
			<div class="col-md-4" id="hibak" ><?=$msg?></div>	
		</div>
        <div class="row m-1 p-2">   
            <div class="col-12">
                <form action="" method="post" class="form-horizontal">
                     <div class="form-group row">
                        <label  class="control-label col-sm-5"for="azon">Személyes azonosító:</label>
                        <div class="col-sm-7">
                            <input type="number" name="azon" class="form-control" value="<?=$azon>0 ? $azon : ""?>" id="azon" required>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-sm-5" for="">Az alkalmazott neve:</label>
                        <div class="col-sm-7">
                            <input type="text" name="nev" class="form-control" value="<?=$nev?>" required>
                        </div>   
                    </div>
                    <div class="form-group row">
                        <label  class="control-label col-sm-5" for="">Beosztása:</label>
                        <div class="col-sm-7">
                            <input type="text" name="beosztas" class="form-control" value="<?=$beosztas?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5" for="datum">Kezdési dátum:</label>
                        <div class="col-sm-7">
                            <input type="date" name="datum" class="form-control" value="<?=$datum?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5" for="jog">Jog:</label>
                        <div class="col-sm-7">
                            <select name="jog" class="form-control"  id="jog" >
                                <option value="user">felhasználó</option>
                                <option value="admin">adminisztrátor</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5" for="jelszo">Jelszó:</label>
                        <div class="col-sm-7">
                         <input type="text" name="jelszo" class="form-control" value="<?=$jelszo?>" id="jelszo" required>
                        </div>
                    </div>
                    <input class="btn btn-outline-primary" type="submit" name="mentes" value="mentés" >
                </form>
                <div class="row justify-content-center p-3">	
			        <a class="btn btn-outline-warning " href="index.php?p=alkalmazottak.php">mégsem</a>
		        </div>
              </div>
         </div>
    </div>
                