<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style7.css">
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
		 	</section>
<?php } else { ?>
<section>
        <div class="main">
		 <ul>
         <li class="active"><a href="index.php"><i class="fa fa-home">Home</a></li>
		</ul>
		 </div>
</section>
<?php } ?>
<?php 
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan guard-aktiviti.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

?>


<main class="table" id="customers_table">
        <section class="table__header">
            <h1>Senarai Aktiviti</h1>
            <div class="input-group">
                <input type="search" placeholder="Carian Nama Ahli">
                <img src="search.png" alt="">
            </div>
            <td colspan='2' align='right'>
            | <a href='aktiviti-daftar-borang.php'>Daftar Aktiviti / Perjumpaan Baru</a> |
        </td>
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
                        <th> Nama Aktiviti<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tarikh <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Masa <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tindakan </th>
                    </tr>
               </thead>
                <tbody>
                <?php 



# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai aktiviti
$tambahan="";
if(!empty($_POST['nama_aktiviti']))
{
    $tambahan= "where nama_aktiviti like '%".$_POST['nama_aktiviti']."%'";
}
# arahan query untuk mencari senarai Aktiviti 
$arahan_papar="select* from aktiviti $tambahan "; 

# laksanakan arahan mencari data aktiviti 
$laksana = mysqli_query($condb,$arahan_papar); 

    # Mengambil data yang ditemui 
    while($m = mysqli_fetch_array($laksana)) 
    {  
        # memaparkan senarai nama dalam jadual 
        echo"<tr> 
        <td>".$m['nama_aktiviti']."</td> 
        <td>".$m['tarikh_aktiviti']."</td> 
        <td>".$m['masa_mula']."</td>
        <td align='center'>";
        
        # memaparkan navigasi untuk kemaskini dan hapus data aktiviti
        echo"<td align='right'>
        | <a href='aktiviti-kemaskini-borang.php?id_aktiviti=".$m['id_aktiviti']."'>
        Kemaskini</a>

        | <a href='aktiviti-padam-proses.php?id_aktiviti=".$m['id_aktiviti']."' 
        onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
        Hapus</a>

        | <a href='kehadiran-borang.php?id_aktiviti=".$m['id_aktiviti']."'>
        Pengesahan Kehadiran</a> |
    

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