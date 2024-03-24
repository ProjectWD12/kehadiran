<?php 
// Memulakan fungsi session
session_start();

// Memanggil fail header dan fail kawalan-admin.php
include('kawalan-admin.php');
include('connection.php');

// Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-ahli
if (empty($_GET)) { 
    die("<script>window.location.href='senarai-ahli.php';</script>"); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemaskini Ahli Baru</title>
    <link rel="stylesheet" href="style6.css">
</head>

<body>

<?PHP if(!empty($_SESSION['tahap']) and
        $_SESSION['tahap'] == "ADMIN") { ?>


		<section>
        <div class="main">
		 <ul>
         <li class="active"><a href="senarai-ahli.php"><i class="fa fa-home">Back</a></li>
		</ul>
		 </div>
		</section>
<?php } else if(!empty($_SESSION['tahap']) and
$_SESSION['tahap'] == "AHLI BIASA"){ ?>
        <section>
        <div class="main">
		 <ul>
         <li class="active"><a href="senarai-ahli.php"><i class="fa fa-home">Back</a></li>
		</ul>
		 </div>
		 	</section>
<?php } else { ?>
<section>
        <div class="main">
		 <ul>
         <li class="active"><a href="senarai-ahli.php"><i class="fa fa-home">Back</a></li>
		</ul>
		 </div>
</section>
<?php } ?>

    <form action='ahli-kemaskini-proses.php?nokp_lama=<?= $_GET['nokp'] ?>' method='POST'>
        <h3>Kemaskini Ahli Baru</h3>
        
        <label for="nama">Nama</label>
        <input type='text' name='nama' value='<?= $_GET['nama'] ?>' required>

        <label for="nokp">No. Kad Pengenalan</label>
        <input type='text' name='nokp' value='<?= $_GET['nokp'] ?>' required>

        <label for="katalaluan">Kata Laluan</label>
        <input type='text' name='katalaluan' value='<?= $_GET['katalaluan'] ?>' required>

        <label for="tahap">Tahap</label>
        <select name='tahap'>
            <option value='<?= $_GET['tahap'] ?>'><?= $_GET['tahap'] ?></option>
            <?php 
            # Proses memaparkan senarai tahap dalam bentuk drop-down list
            $arahan_sql_tahap = "SELECT tahap FROM ahli GROUP BY tahap ORDER BY tahap";
            $laksana_arahan_tahap = mysqli_query($condb, $arahan_sql_tahap);
            while ($n = mysqli_fetch_array($laksana_arahan_tahap)) {
                if ($n['tahap'] != $_GET['tahap']) {
                    echo "<option value='" . $n['tahap'] . "'>" . $n['tahap'] . "</option>";
                }
            }
            ?>
        </select>

        <label for="id_kelas">Tingkatan</label>
        <select name='id_kelas'>
            <option value='<?= $_GET['id_kelas'] ?>'>
                <?= $_GET['ting'] . " " . $_GET['nama_kelas'] ?>
            </option>
            <?php 
            # Proses memaparkan senarai kelas dalam bentuk drop-down list
            $arahan_sql_pilih = "SELECT * FROM kelas";
            $laksana_arahan_pilih = mysqli_query($condb, $arahan_sql_pilih);
            while ($m = mysqli_fetch_array($laksana_arahan_pilih)) {
                if ($m['id_kelas'] != $_GET['id_kelas']) {
                    echo "<option value='" . $m['id_kelas'] . "'>" . $m['ting'] . " " . $m['nama_kelas'] . "</option>";
                }
            }
            ?>
        </select>

        <input type='submit' value='Kemaskini'>
    </form>
</body>

</html>
