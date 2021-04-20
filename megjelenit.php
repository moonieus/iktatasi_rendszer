
<?php
//a feltöltött fájlok megjelenítése egy listában:
$href="#";
$fileLista=glob('szamlak/*');
$lista="";
foreach($fileLista as $name)
  $lista.="<option value='{$name}'>{$name}</option>";

if(isset($_POST['view']) && $_POST['fileName']!='0')
      $href=$_POST['fileName'];
      
  

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fájlfeltöltés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="flex-container">
      <div class="box100">
        <h2>A feltöltött fájlok megjelenítése</h2>
      </div>
      <div class="box100">
        <form method="post" >
            <select name="fileName" id="">
              <option value="0">válassz...</option>
              <?=$lista?>
            </select>
            <input type="submit" name="view" value="kiválaszt">
        </form>
      </div>
      <div class="box100"> <a href="<?=$href?>" target="_blank">megnyit <b><?=$href?></b></a> </div>
    </div>

</body>
</html>