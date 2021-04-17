<?php
$tbl="";
$sql="SELECT az,nev,adoszam,varos,utca,irszam,kapcsolattarto,telszam,email FROM partnerek";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
	extract($row);
	$tbl.="<tr><td>{$az}</td><td>{$nev}</td><td>{$adoszam}</td><td>{$varos}</td><td>{$utca}</td><td>{$irszam}</td>
	<td>{$kapcsolattarto}</td><td>{$telszam}</td><td>{$email}</td>";           
	$tbl.="<td class=' btn btn-outline-primary m-1'><a class='text-warning' href='index.php?p=partnerek.php&editId=$az'>Módosítás</a></td>";
	$tbl.="<td class=' btn btn-outline-primary  m-1'><a class='text-danger' href='index.php?p=partnerek.php&deleteId=$az&deleteNev=$nev'>Törlés</a></td></tr>";
}	
?>

<div class="container border">
  <h3 class="text-center bg-warning">Partnerek kezelése</h3>
  <div class="row">
	 <div class="col-md-4"  ><?=isset($_GET['msg'])? $_GET['msg']: "" ?></div>
	 <div class="col-md-4 shadow rounded">
	 	
	  </div>
  </div>
  <div class="btn btn-sm btn-outline-light m-1 p-1 rounded"><a  href="index.php?p=partnerek.php&insert=insert.php"><b>Új partner rögzítése</b></a></div>
	<div class="row shadow p-1 bg-light">
		 <div class="tbl-container">
		   <table class="table table-striped table-fixed table-bordered table-sm" >
				<thead class="thead-dark">
					<tr>
						<th scope="col">Pkód</th>
						<th scope="col">Név</th>
						<th scope="col">Adószám</th>
						<th scope="col">Város</th>
						<th scope="col">Utca</th>
						<th scope="col">Irsz</th>
						<th scope="col">Kapcsolattartó</th>
						<th scope="col">Telefonszám</th>
						<th scope="col">E-mail</th>
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


