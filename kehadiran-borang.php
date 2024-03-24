<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style5.css">
</head>
<body>
<?php 
# memulakan fungsi session
session_start();

#memanggil fail connection.php dan guard-admin.php

include('connection.php');
include('kawalan-admin.php');

# Mendapatkan maklumat aktiviti dari pangkalan data
$arahan_sql_aktiviti   =   "select * from aktiviti where id_aktiviti ='".$_GET['id_aktiviti']."' ";
$laksana_aktiviti    =   mysqli_query($condb,$arahan_sql_aktiviti);
$n  =   mysqli_fetch_array($laksana_aktiviti);

?>




<main class="table" id="customers_table">
        <section class="table__header">
            <h1>Pengesahan Kehadiran Ahli</h1>
            Nama Aktiviti : <?= $n['nama_aktiviti'] ?> <br>
Tarikh | Masa : <?= $n['tarikh_aktiviti']." | ".$n['masa_mula'] ?><br>
<br><br>

            <div class="input-group">
                <input type="search" placeholder="Carian Nama Ahli">
                <img src="search.png" alt="">
            </div>
            <tr>

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
                        <th> Bil <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nama <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nokp <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Kelas <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Kehadiran<span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
               </thead>
                <tbody>
               
                <?php
                    # Arahan untuk mendapatkan data kehadiran setiap ahli
$arahan_sql_kehadiran = "SELECT  
ahli.nokp, ahli.nama,
kelas.ting, kelas.nama_kelas,
kehadiran.id_aktiviti
FROM ahli
LEFT JOIN kelas
ON ahli.id_kelas 	= 	kelas.id_kelas
LEFT JOIN kehadiran
ON ahli.nokp 		= 	kehadiran.nokp 
AND kehadiran.id_aktiviti='".$_GET['id_aktiviti']."'
ORDER BY ahli.nama";

# Laksanakan arahan untuk memproses data
$laksana_kehadiran 	= 	mysqli_query($condb,$arahan_sql_kehadiran);
$bil=0;

# Mengambil dan memaparkan semua data kehadiran yang ditemui
while($m=mysqli_fetch_array($laksana_kehadiran)){  ?>
    <tr>
        <td><?= ++$bil; ?></td>
        <td><?= $m['nama'] ?></td>
        <td><?= $m['nokp'] ?></td>
        <td><?= $m['ting']." ".$m['nama_kelas'] ?> </td>
        <td><?php 
        
        if($m['id_aktiviti'] != null)
        {
            $tanda='checked';
        } else 
        $tanda="";
        ?>


<input <?= $tanda ?>  type='checkbox' name='kehadiran[]' 
        value='<?= $m['nokp'] ?> ' style='width:30px; height:30px;'>
        </td>
    </tr>
    <?PHP
}
?>
<tr>
    <td colspan='4'></td>
    <td>
        <input type='submit' value='Simpan' style='background-color: #4caf50; color: #fff; padding: 10px; border: none; border-radius: 4px; cursor: pointer;'>
    </td>
</tr>

                </tbody>
            </table>
        </section>
    </main>

<script src="script.js"></script>

</body>
</html>