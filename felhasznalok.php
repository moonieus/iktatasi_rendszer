<?php
	require_once "config.php";

	if(!isset($_SESSION['jog'])=="admin")
    	header('Location:index.php');
	else{
		$tbl="";
		$sql="select felhasznalok.nev as 'felhasznalo',jogosultsagok.nev as 'jogosultsag' FROM felhasznalok,jogosultsagok 
		WHERE felhasznalok.jogosultsagok_az=jogosultsagok.az";
	    $stmt=$db->query($sql);
	    while($row=$stmt->fetch()){
			extract($row);
	    	$tbl.="<tr><td>{$felhasznalo}</td><td>{$jogosultsag}</td>";           
	        $tbl.="<td class=' btn btn-outline-primary m-1'><a class='text-warning' href='index.php?p=alkalmazottak.php&editId=$azonosito'>Edit</a></td>";
		    $tbl.="<td class=' btn btn-outline-primary  m-1'><a class='text-danger' href='index.php?p=alkalmazottak.php&deleteId=$azonosito'>Delete</a></td></tr>";
		}
	}
	
?>

<div class="container border">
  <h6 class="text-center">Felhasználók kezelése</h6>
  <div class="row ">
	 <div class="col-md-4"  ><?=isset($_GET['msg'])? $_GET['msg']: "" ?></div>
	 <div class="col-md-4 text-center shadow rounded">
	 	<div class="btn btn-outline-light  m-1 p-1 rounded"><a  href="index.php?p=alkalmazottak.php&insert=insert.php"><b>Insert</b> (uj alkalmazott bevezetese)</a></div>
	  </div>
  </div>
	<div class="row shadow p-1 bg-light">
	  <div class="col-md-6">
		 <div class="tbl-container">
		   <table class="table table-striped  table-fixed" >
			   <thead class="thead-dark"><tr><th scope="col">Azonosito</th><th scope="col">Nev</th><th scope="col">beosztas</th><th scope="col">&nbsp</th><th scope="col">&nbsp</th></tr></thead>
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