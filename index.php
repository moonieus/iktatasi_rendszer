<?php
    session_start();
	
 ?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">i
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Számla iktatási rendszer</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="partnerek\partnerekView.css">
	<!--<script src="menu.js"></script>-->
	<link rel="stylesheet" href="style.css">            
	<script src="fuggvenyek.js"></script>
</head>

<body>

<div class="container-fluid index">

<nav class="navbar navbar-expand-lg navbar-light text-white fixed-top bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon bg-light"></span>
  </button>

  <div class="collapse navbar-collapse border" id="navbarNav">
		<ul class="navbar-nav w-100 justify-content-around">
			<li class="nav-item ">
				<a class="nav-link text-white" href="index.php">Főoldal</a>
			</li>

			<li class="nav-item">
				<a class="nav-link text-white" href="index.php?p=iktatas.php" >Számlák iktatása</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white " href="index.php?p=igazolas.php">Számlák igazolása</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="index.php?p=igazolt.php" >Igazolt számlák</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="index.php?p=visszautasitott.php" >Visszautasított számlák</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="index.php?p=partnerek.php">Partnerek kezelése</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="index.php?p=felhasznalok.php">Felhasználók kezelése</a>
			</li>
            <?php if(isset($_SESSION['user'])){
				echo '<li class="nav-item">
				        <a class="nav-link btn btn-outline-warning text-warning" href="index.php?p=logout.php">Kijelentkezés</a>
			        </li>';
				}                
            ?>
		</ul>
  </div>

</nav>

    <main class="tartalom">
		<?php
				//print_r($_GET);
				//print_r($_SESSION);
				if(isset($_GET["p"]) && isset($_SESSION["jog"])){
					$oldal = $_GET["p"];
					switch($oldal){
						case "iktatas.php" :
							if ($_SESSION["jog"]=="iktatas" || $_SESSION["jog"]=="admin")
								include $oldal;
							else include("fooldal.php");
							break;
						case "felhasznalok.php" :
							if ($_SESSION["jog"]=="admin")
								include $oldal;
							else include("fooldal.php");
							break;
						case "partnerek.php" :
							if ($_SESSION["jog"]=="iktatas" || $_SESSION["jog"]=="admin")
								include $oldal;
							else include("fooldal.php");
							break;
						case "igazolas.php" :
							if ($_SESSION["jog"]=="igazolas" || $_SESSION["jog"]=="admin")
								include $oldal;
							else include("fooldal.php");
							break;
						case "igazolt.php" :
							if (isset($_SESSION['user']))
								include $oldal;
							else include("fooldal.php");
							break;
						case "visszautasitott.php" :
							if (isset($_SESSION['user']))
								include $oldal;
							else include("fooldal.php");
							break;		
						case "logout.php" :
							session_destroy();
							print_r($_GET);
							print_r($_SESSION);
							header('Location:index.php');
							break;													
					}
				}	
				else include("fooldal.php");
		?>
	</main>	
           

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                                                                                                                                                                                         
</body>
</html>            


