<?php
session_start();
# memanggil fail connection dan kawalan-biasa
include('connection.php');

$masa=date("H:i:s");

# Menyemak kewujudan data GET id_aktiviti
if(!empty($_GET['id_aktiviti']) and !empty($_SESSION['nokp']))
{
    
    # Arahan Simpan data kehadiran
    $sql = "insert into kehadiran (id_aktiviti,nokp,masa_hadir) 
    values ('".$_GET['id_aktiviti']."', '".$_SESSION['nokp']."','$masa') ";

    # Laksana arahan Simpan
    $simpandata=mysqli_query($condb,$sql);

    # menguji proses simpan
    if($simpandata){
        echo "<script>
            alert('Kehadiran Telah Disahkan');
            window.location.href='profil.php';
        </script>";
    }
    else {
        echo "<script>
            alert('Kehadiran GAGAL Disahkan. Sila Ke Meja Urusetia');
            window.location.href='profil.php';
        </script>";
    }
}
else
{
    echo "<script>
        alert('Akses secara terus');
        window.location.href='logout.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
<?PHP if(!empty($_SESSION['tahap']) and
        $_SESSION['tahap'] == "ADMIN") { ?>


		<section>
        <div class="main">
		 <ul>
		 <li class="active"><a href="index.php"><i class="fa fa-home">Home</a></li>
		</ul>
		 </div>
		</section>
<?php } else if(!empty($_SESSION['tahap']) and
$_SESSION['tahap'] == "AHLI BIASA"){ ?>
        <section>
        <div class="main">
		 <ul>
         <li class="active"><a href="index.php"><i class="fa fa-home">Home</a></li>

		</ul>
		 </div>
<?php } else { ?>
<section>
        <div class="main">
		 <ul>
         <li class="active"><a href="index.php"><i class="fa fa-home">Home</a></li>
		</ul>
		 </div>
</section>
<?php } ?>	
	 	</section>

</body>
</html>