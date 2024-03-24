

<!DOCTYPE html>
<html>
<head>
	<title>E-KEHADIRAN AHLI</title>
	<link rel="stylesheet"href="style.css">

</head>
<body>
<?PHP if(!empty($_SESSION['tahap']) and
        $_SESSION['tahap'] == "ADMIN") { ?>


		<section>

		<div class="title">
		 	<h1>KEHADIRAN AHLI</h1>
		 </div>

        <div class="main">
		 <ul>
		 <li class="active"><a href="index.php"><i class="fa fa-home">Home</a></li>
		 <li><a href="profil.php">Profil</a></li>
		 <li><a href="kehadiran-rekod.php">Kaunter Kehadiran</a></li>
		 <li><a href="senarai-ahli.php">Senarai Ahli</a></li>
		 <li><a href="senarai-aktiviti.php">Senarai Aktiviti</a></li>
		 <li><a href="kehadiran-laporan.php">Laporan Kehadiran</a></li>
		 <li><a href="logout.php">Log Out</a></li>
		</ul>
		 </div>
    

		</section>
<?php } else if(!empty($_SESSION['tahap']) and
$_SESSION['tahap'] == "AHLI BIASA"){ ?>
        <section>
        <div class="main">
		 <ul>
		 <li class="active"><a href="index.php"><i class="fa fa-home">Home</a></li>
		 <li><a href="profil.php">Profil</a></li>
		 <li><a href="logout.php">Log Out</a></li>
		</ul>
		 </div>
		 <div class="title">
		 	<h1>KEHADIRAN AHLI</h1>
		 </div>
		 	</section>
<?php } else { ?>
<section>
        <div class="main">
		 <ul>
		 <li class="active"><a href="index.php"><i class="fa fa-home">Home</a></li>
		 <li><a href="login-borang.php">Log In</a></li>
		 <li><a href="signup-borang.php">Sign Up</a></li>
		</ul>
		 </div>
		 <div class="title">
		 	<h1>KEHADIRAN AHLI</h1>
		 </div>
</section>
<?php } ?>


</body>
</html>