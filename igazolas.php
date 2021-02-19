<?php

if(!isset($_SESSION['user']) || $_SESSION['jog']!=="igazolo")
    header('Location:index.php');

?>
<div class="tartalom">
    <h1>Ellenőrzés</h1>
    
    <p>ez az ellenőrzés ott kell legyen minden php kódnak az első sorában, hogy másnak ne jelenjen majd meg a tartalom/p>

</div>