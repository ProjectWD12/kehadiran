<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style5.css">
</head>
<body>

<?PHP if(!empty($_SESSION['tahap']) and
        $_SESSION['tahap'] == "ADMIN") { ?>


		<section>
        <div class="main">
		 <ul>
         <li class="active"><a href="index.php"><i class="fa fa-home">Home</a></li>
         <li class="active"><a href="upload.php"><i class="fa fa-home">Muat Naik Ahli</a></li>
		</ul>
		 </div>
		</section>
<?php } else if(!empty($_SESSION['tahap']) and
$_SESSION['tahap'] == "AHLI BIASA"){ ?>
        <section>
        <div class="main">
		 <ul>
         <li class="active"><a href="index.php"><i class="fa fa-home">Home</a></li>
         <li class="active"><a href="upload.php"><i class="fa fa-home">Muat Naik Ahli</a></li>
		</ul>
		 </div>
		 	</section>
<?php } else { ?>
<section>
        <div class="main">
		 <ul>
         <li class="active"><a href="index.php"><i class="fa fa-home">Home</a></li>
		</ul>
        <ul>
         <li><a href="upload.php"><i class="fa fa-home">Muat Naik Ahli</a></li>
		</ul>
		 </div>
</section>
<?php } ?>

<?php 
# memulakan fungsi session
session_start();
#memanggil fail header.php, connection.php dan kawalan-admin.php
include('connection.php');
include('kawalan-admin.php');

?>


<main class="table" id="customers_table">
        <section class="table__header">
            <h1>Senarai ahli</h1>
            <div class="input-group">
                <input type="search" placeholder="Carian Nama Ahli">
                <img src="search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Nama <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nokp <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Kelas <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Katalaluan <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tahap <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tindakan </th>
                    </tr>
               </thead>
                <tbody>
                <?php 

# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai ahli
$tambahan="";
if(!empty($_POST['nama']))
{
    $tambahan= " and ahli.nama like '%".$_POST['nama']."%'";
}
# arahan query untuk mencari senarai nama ahli 
$arahan_papar="select* from ahli, kelas 
where ahli.id_kelas = kelas.id_kelas 
$tambahan "; 

# laksanakan arahan mencari data ahli 
$laksana = mysqli_query($condb,$arahan_papar); 

# Mengambil data yang ditemui 
while($m = mysqli_fetch_array($laksana)) 
{
    # umpukkan data kepada tatasusunan bagi tujuan kemaskini ahli

    $data_get = array (
        'nama'              => $m['nama'],
        'nokp'              => $m['nokp'],
        'katalaluan'        => $m['katalaluan'],
        'tahap'             => $m['tahap'],
        'id_kelas'          => $m['id_kelas'],
        'ting'              => $m['ting'],
        'nama_kelas'        => $m['nama_kelas']

    
    );
        


    # memaparkan senarai nama dalam jadual 
    echo"<tr> 
    <td>".$m['nama']."</td> 
    <td>".$m['nokp']."</td> 
    <td>".$m['ting']." ".$m['nama_kelas']."</td> 
    <td>".$m['katalaluan']."</td>
    <td>".$m['tahap']."</td>  ";
    
        # memaparkan navigasi untuk kemaskini dan hapus data ahli
        echo"<td>
        |<a href='ahli-kemaskini-borang.php?".http_build_query($data_get)."'>
         Kemaskini</a>

        |<a href='ahli-padam-proses.php?nokp=".$m['nokp']."' 
        onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
        Hapus</a>|

    </td>
    </tr>"; 
}
 ?> 
    
 
                </tbody>
            </table>
        </section>
    </main>


<script src="script.js"></script>
</body>
</html>