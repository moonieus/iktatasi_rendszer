<?php
    if(isset($_SESSION['user']))
        include "logout.php";
    else
        include "login.php";
 ?>
