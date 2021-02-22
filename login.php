<?php
require_once "config.php";

if(isset($_POST['belepes'])){
	extract($_POST);
	$sql="select felhasznalok.nev as 'felhasznalo',jelszo,jogosultsagok.nev as 'jogosultsag' FROM felhasznalok,jogosultsagok 
	WHERE felhasznalok.jogosultsagok_az=jogosultsagok.az and felhasznalok.nev='{$azonosito}' and jelszo='{$password}'";
    $stmt=$db->query($sql);
	if($stmt->rowCount()==1){
		$row=$stmt->fetch();
		extract($row);
		$_SESSION['user']=$felhasznalo;
		$_SESSION['jog']=$jogosultsag;
		unset($_SESSION['msg']);
	}else{
		$_SESSION['msg']="Hibás azonosító/jelszó páros!";
		unset($_SESSION['user']);
	}
	header('Location:index.php');
}               
?>

<div class="jumbotron login">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Bejelentkezés</h3>
				
			</div>
			<div class="card-body">
				<form method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="felhasználó név" name="azonosito">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="jelszó" name="password">
					</div>
					<div class="form-group">
						<input type="submit" value="Belépés" name="belepes" class="btn float-right login_btn">
					</div>
				</form>
			</div>
            <div class="btn btn-outline btn-warning text-center"><?=isset($_SESSION['msg'])? $_SESSION['msg'] : ""?></div>
		</div>
	</div>
</div>
