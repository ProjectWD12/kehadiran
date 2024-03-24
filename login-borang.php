<?php  
# Memulakan fungsi session
session_start();

# memanggil fail header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>


<!-- borang daftar masuk (log in/sign in)  -->
<div class="form-box">
<form action='login-proses.php' method='POST' class="form">
<span class="title">Daftar Ahli</span>
    <div class="form-container">
      <input type="text" name="nokp" class="input" placeholder="Nokp" required><br>
      <input type="password" name="katalaluan" class="input" placeholder="Password" required>
    
    </div>
    <button type="submit" onclick="redirectToNewPage()">Log In</button>           
</form>
<div class="form-section">
  <p>Does't Have an account? <a href="signup-borang.php">Sign in</a></p>
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

