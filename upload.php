<?php
// Start session function
session_start();

// Include header file and admin control
include('kawalan-admin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Member Data</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }
    h3 {
      text-align: center;
    }
    form {
      text-align: center;
      margin-top: 20px;
    }
    input[type='file'] {
      margin-bottom: 10px;
    }
    button[type='submit'] {
      padding: 10px 20px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button[type='submit']:hover {
      background-color: #45a049;
    }
    .message {
      margin-top: 20px;
      text-align: center;
    }
    .error {
      color: red;
    }
    .success {
      color: green;
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Page Title -->
  <h3>Upload Member Data (*.txt)</h3>

  <!-- Form for file upload -->
  <form action='' method='POST' enctype='multipart/form-data'>
    <h3><b>Select the txt file to upload</b></h3>
    <input type='file' name='data_ahli'>
    <button type='submit' name='btn-upload'>Upload</button>
  </form>

  <!-- Processing Uploaded Data Section -->
  <?php
  // Data validation: check for the existence of data from the form
  if (isset($_POST['btn-upload'])) {
      // Include connection file
      include('connection.php');

      // Get the temporary file name
      $namafailsementara = $_FILES["data_ahli"]["tmp_name"];

      // Get the file name
      $namafail = $_FILES['data_ahli']['name'];

      // Get the file type
      $jenisfail = pathinfo($namafail, PATHINFO_EXTENSION);

      // Test the file type and file size
      if ($_FILES["data_ahli"]["size"] > 0 && $jenisfail == "txt") {
          // Open the uploaded file
          $fail_data_ahli = fopen($namafailsementara, "r");

          // Retrieve data from the file line by line
          while (!feof($fail_data_ahli)) {
              // Get data line by line
              $ambilbarisdata = fgets($fail_data_ahli);

              // Explode the line based on the pipe character
              $pecahkanbaris = explode("|", $ambilbarisdata);

              // Assign values after explode to variables
              list($nokp, $nama, $id_kelas, $katalaluan, $tahap) = $pecahkanbaris;

              // SQL query to save data
              $arahan_sql_simpan = "INSERT INTO ahli
              (nokp, nama, id_kelas, katalaluan, tahap) VALUES
              ('$nokp', '$nama', '$id_kelas', '$katalaluan', '$tahap')";

              // Insert data into the 'ahli' table
              $laksana_arahan_simpan = mysqli_query($condb, $arahan_sql_simpan);
              
              echo "<div class='message success'>Data import successful</div>";
          }
          // Close the opened txt file
          fclose($fail_data_ahli);
      } else {
          // If the uploaded file is empty or in the wrong format
          echo "<div class='message error'>Only txt files are allowed</div>";
      }
  }
  ?>
</div>

</body>
</html>
