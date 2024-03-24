<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<div class="form-box">
  <form action="signup-proses.php" method="POST" class="form">
    <span class="title">Daftar Ahli Baru</span>
    <div class="form-container">
      <input type="text" name="nama" class="input" placeholder="Nama Penuh" required><br>
      <input type="text" name="nokp" class="input" placeholder="Nokp" required><br>
      <input type="password" name="katalaluan" class="input" placeholder="Password" required>
      <select name='id_kelas' style='width: 100%; padding: 10px; margin-bottom: 15px;  border-radius: 4px;  background-color: rgba(255, 255, 255, 0);'>
    <option selected disabled value>Sila Pilih Kelas</option>
    <?php 
    $arahan_sql_pilih = "SELECT * FROM kelas";
    $laksana_arahan_pilih = mysqli_query($condb, $arahan_sql_pilih);
    while ($m = mysqli_fetch_array($laksana_arahan_pilih)) {
        echo "<option value='" . $m['id_kelas'] . "'>" . $m['ting'] . " " . $m['nama_kelas'] . "</option>";
    }
    ?>
</select>


    </div>

    <button type="submit" onclick="redirectToNewPage()">Sign In</button>
  </form>

  <div class="form-section">
    <p>Have an account? <a href="login-borang.php">Log in</a></p>
  </div>
</div>

<script>
  function redirectToNewPage() {
    // Optional: Add any custom JavaScript actions here if needed
    // This function will be called when the button is clicked.

    // Note: The form will automatically submit to "signup-proses.php"
    // as specified in the form's "action" attribute.
    // No need to manually redirect in this case.
  }
</script>

</body>
</html>
