<?php include "config/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
?>
<?php
session_start();
// cek session aktif user 
if (empty($_SESSION['username'])) {

  $_SESSION["alert"] = "
    <div class='alert alert-danger' role='alert'>
      Silakan login terlebih dulu!
    </div>";

  //redirect ke halaman awal 
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Muda Pustaka</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css'>
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class='dashboard'>

    <!-- navbar -->
    <?php include "template/template-navbar.php"; ?>
    <!-- end navbar -->

    <div class='dashboard-app'>
      <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
      <div class='dashboard-content'>
        <div class='container'>
          <!-- content -->
          <?php include "content.php"; ?>
          <!-- end content -->
        </div>
      </div>
    </div>
  </div>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script src="assets/script.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>