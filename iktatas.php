<?php

if(!isset($_SESSION['user']))
    header('Location:index.php');

?>
<div class="tartalom">
    <h1>Számlák iktatása</h1>
    <p>...itt jelennek meg a számlák és különböző szűrési lehetőségek, persze ha a felhasználó bejelentkezett</p>
    <p>ez az ellenőrzés ott kell legyen minden php kódnak az első sorában, hogy másnak ne jelenjen majd meg a tartalom/p>

</div>