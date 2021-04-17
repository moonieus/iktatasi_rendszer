<?php
$tbl="";
$sql="SELECT iktatoszam,szamlaszam,partnerek.nev as 'nev',szla_kelte,telj_dat,fiz_hat,szamla_tipus.nev as 'szlatip',netto,afa,
brutto,status,kep FROM szamlak,partnerek where szamlak.szla_tip_az=szamla_tipus.az and partnerek.az=szamlak.partnerek_az order by iktatoszam";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
	extract($row);
	$tbl.="<tr><td>{$iktatoszam}</td><td>{$szamlaszam}</td><td>{$nev}</td><td>{$szla_kelte}</td>
	<td>{$telj_dat}</td><td>{$fiz_hat}</td><td>{$netto}</td><td>{$afa}</td><td>{$brutto}</td><td>{$status}</td><td>{$kep}</td>";           
	$tbl.="<td class=' btn btn-outline-primary m-1'><a class='text-warning' href='index.php?p=iktatas.php&editId=$iktatoszam'>Módosítás</a></td>";
	$tbl.="<td class=' btn btn-outline-primary  m-1'><a class='text-danger' href='index.php?p=iktatas.php&deleteId=$iktatoszam'>Törlés</a></td></tr>";
}	
?>

<div class="container border">
  <h3 class="text-center bg-warning">Számlák iktatása</h3>
  
  <div class="row">
	 <div class="col-md-4"  ><?=isset($_GET['msg'])? $_GET['msg']: "" ?></div>
	 <div class="col-md-4 shadow rounded">
	 	
	  </div>
  </div>
  <div class="btn btn-sm btn-outline-light m-1 p-1 rounded"><a  href="index.php?p=iktatas.php&insert=insert.php"><b>Új számla rögzítése</b></a></div>
	<div class="row shadow p-1 bg-light">
		 <div class="tbl-container">
		   <table class="table table-striped table-fixed table-bordered table-sm" >
				<thead class="thead-dark">
					<tr>
						<th scope="col">Ikt</th>
						<th scope="col">Számlaszám</th>
						<th scope="col">Név</th>
						<th scope="col">Szla. kelte</th>
						<th scope="col">Telj. dat.</th>
						<th scope="col">Fiz. hat.</th>
						<th scope="col">Nettó</th>
						<th scope="col">Áfa</th>
						<th scope="col">Bruttó</th>
						<th scope="col">Ig</th>		
						<th scope="col">PDF</th>				
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


