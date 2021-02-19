<?php
print_r($_SESSION);
if(!isset($_SESSION['jog'])=="utalvanyozo"){
    header('Location:index.php');
}
?>
<div class="tartalom">
    <h1>Számlák jóváhagyása</h1>
    
    <p>ez az ellenőrzés ott kell legyen minden php kódnak az első sorában, hogy másnak ne jelenjen majd meg a tartalom/p>

</div>