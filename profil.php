<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>


<?php 
# Memulakan fungsi session
session_start();

# Memanggil fail header.php dan fail connection.php
include('header.php');
include('connection.php');

# Menyemak kewujudan nilai pembolehubah session['nokp']
if(empty($_SESSION['nokp'])){
    
    # jika nilai session nokp tidak wujud/kosong. aturcara akan dihentikan
    die("<script>alert('sila login'); 
    window.location.href='logout.php';</script>");   
}
?>

<main class="table" id="customers_table">
        <section class="table__header">
            <h1>Rekod Kehadiran</h1>

        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Nama Aktiviti <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tarikh <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Masa <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Kehadiran <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
               </thead>
                <tbody>
                <?php 

# arahan query untuk mencari senarai Aktiviti 
$arahan_papar="select* from aktiviti"; 

# laksanakan arahan mencari data aktiviti 
$laksana = mysqli_query($condb,$arahan_papar); 

# Mengambil data yang ditemui 
    while($m = mysqli_fetch_array($laksana)){ 
        # memaparkan senarai nama dalam jadual 
        echo"<tr > 
        <td>".$m['nama_aktiviti']."</td> 
        <td>".$m['tarikh_aktiviti']."</td> 
        <td>".$m['masa_mula']."</td>
        <td align='center'>";

# Arahan mendapatkan data kehadiran ahli bagi setiap aktiviti
$arahan_sql_hadir = "select * from kehadiran where 
nokp ='".$_SESSION['nokp']."' and id_aktiviti ='".$m['id_aktiviti']."' ";

# melaksanakan arahan sql mendapatkan data
$laksana_hadir=mysqli_query($condb, $arahan_sql_hadir);

if(mysqli_num_rows($laksana_hadir)==1) {
echo "&#9989;";  
} else {
echo "&#10060; <br>";     

if(date("Y-m-d") == $m['tarikh_aktiviti']){
# Pengesahan Kehadiran Kendiri
echo "<a href='profil-sahkendiri.php?id_aktiviti=".$m['id_aktiviti']."'>
[ PENGESAHAN KENDIRI ] </a>";
}
}
echo"</td></tr>"; 
}  ?> 
 
                </tbody>
            </table>
        </section>
    </main>

<script src="script.js"></script>
</body>
</html>