<?php
# memulakan fungsi session
session_start();

# memanggil fail kawalan-admin.php
include('kawalan-admin.php');

# menyemak kewujudan data POST
if(!empty($_POST))
{
    # memanggil fail connection.php
    include('connection.php');

    # arahan SQL (query) untuk kemaskini maklumat aktiviti
    $arahan             =   "update aktiviti set
    nama_aktiviti       =   '".$_POST['nama_aktiviti']."',
    tarikh_aktiviti     =   '".$_POST['tarikh_aktiviti']."',
    masa_mula           =   '".$_POST['masa_mula']."'
    where       
    id_aktiviti         =   '".$_GET['id_aktiviti']."' ";

    # melaksana dan menyemak proses kemaskini
    if(mysqli_query($condb,$arahan))
    { 
        # kemaskini berjaya
        echo "<script>alert('Kemaskini Berjaya');
        window.location.href='senarai-aktiviti.php';</script>";
        
    }
    else
    {
        # kemaskini gagal
        echo "<script>alert('kemaskini Gagal');
        window.history.back();</script>";
    }
}
else
{
    # jika data GET tidak wujud. kembali ke fail senarai-aktiviti.php
    die("<script>alert('sila lengkapkan data');
    window.location.href='senarai-aktiviti.php';</script>");
}
?>