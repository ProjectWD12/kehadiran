<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style6.css">
</head>
<body>
<?php 
# Memulakan fungsi session
session_start();

# Memanggil fail header dan fail kawalan-admin.php

include('kawalan-admin.php');
?>
 
<h3>daftar aktiviti Baru</h3>
<!-- borang untuk menerima data dari pengguna -->
<form action='aktiviti-daftar-proses.php' method='POST'>

nama_aktiviti        
<input  type='text' name='nama_aktiviti'  required><br>

tarikh_aktiviti
<input  type='date' name='tarikh_aktiviti' min='<?= date("Y-m-d") ?>' required><br>
    
masa_mula
<input  type='text' name='masa_mula'  required><br>

<input type='submit' value='daftar'>

</form>
</body>
</html>