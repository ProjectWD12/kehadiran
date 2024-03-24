<?php
# memulakan fungsi session
session_start();

# menyemak kewujudan data post yang dihantar dari login-borang.php
if(!empty($_POST['nokp']) and !empty($_POST['katalaluan']))
{
    # memanggil fail connection.php
    include ('connection.php');

    # Mengambil data yang di POST dari fail Borang
    $nokp           =   $_POST['nokp'];
    $katalaluan     =   $_POST['katalaluan'];

    # Arahan SQL (query) untuk membandingkan data yang dimasukkan
    # wujud di pangkalan data atau tidak
    $query_login = "select * from ahli
    where 
            nokp            =   '$nokp'
    and     katalaluan      =   '$katalaluan' LIMIT 1";
   
    # melaksakan arahan membandingkan data
    $laksana_query = mysqli_query($condb,$query_login);

    # jika terdapat 1 data yang sepadan, login berjaya
    if(mysqli_num_rows($laksana_query)==1)
    {
        # mengambil data yang ditemui
        $m  =   mysqli_fetch_array($laksana_query);

        # mengumpukkan kepada pembolehubah session
        $_SESSION['nokp']   =   $m['nokp'];
        $_SESSION['tahap']  =   $m['tahap'];
 	    $_SESSION['nama']    =   $m['nama'];
         # membukan laman index.php
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        # login gagal. kembali ke laman login-borang.php
        die("<script>alert('login Gagal');
        window.location.href='login-borang.php';</script>");
    }
}
else
{
    # data yang dihantar dari laman login-borang.php kosong
    die("<script>alert('sila masukkan nokp dan katalaluan');
    window.location.href='login-borang.php';</script>");
}
?>