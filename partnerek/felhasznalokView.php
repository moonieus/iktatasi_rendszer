<?php
$tbl="";
$sql="select felhasznalok.az as 'azonosito',felhasznalok.nev as 'felhasznalo',jelszo,jogosultsagok.nev as 'jogosultsag' FROM felhasznalok,jogosultsagok 
	WHERE felhasznalok.jogosultsagok_az=jogosultsagok.az order by felhasznalok.nev";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
	extract($row);
	$tbl.="<tr><td>{$felhasznalo}</td><td>{$jelszo}</td><td>{$jogosultsag}</td>";           
	$tbl.="<td class=' btn btn-outline-primary m-1'><a class='text-warning' href='index.php?p=felhasznalok.php&editId=$azonosito'>Módosítás</a></td>";
	$tbl.="<td class=' btn btn-outline-primary  m-1'><a class='text-danger' href='index.php?p=felhasznalok.php&deleteId=$azonosito&deleteNev=$felhasznalo'>Törlés</a></td></tr>";
}	
?>

<div class="container border">
  <h3 class="text-center">Felhasználók kezelése</h3>
  <div class="row">
	 <div class="col-md-4"  ><?=isset($_GET['msg'])? $_GET['msg']: "" ?></div>
	 <div class="col-md-4 shadow rounded">
	 	
	  </div>
  </div>
  <div class="btn btn-outline-light m-1 p-1 rounded"><a  href="index.php?p=felhasznalok.php&insert=insert.php"><b>Új felhasználó rögzítése</b></a></div>
	<div class="row shadow p-1 bg-light">
	  <div class="col-md-6">
		 <div class="tbl-container">
		   <table class="table table-striped table-fixed" >
				<thead class="thead-dark">
					<tr>
						<th scope="col">Név</th>
						<th scope="col">Jelszó</th>
						<th scope="col">Jogosultság</th>
						<th scope="col">&nbsp</th>
						<th scope="col">&nbsp</th>
					</tr>
				</thead>
			   <tbody ><?=$tbl?></tbody>
		  </table>
		</div>
	  </div>
	  <div class="col-md-6">
			<?php
			if(isset($_GET['insert']))
				include $_GET['insert'];
			?>
	</div>
	</div>
</div>


