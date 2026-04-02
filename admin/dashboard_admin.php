<?php
// session_start();
// if ($_SESSION['status']!='kirim'){
//   echo "<script>alert('anda belum login'); location.href='../index.php';</script>";
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan Digital</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" >
</head>
<body>
    
<nav class="navbar bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand">Aplikasi Perpustakaan
Digital</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
      <button class="btn btn-outline-light m-1" type="submit">Search</button>
      <a href="dashboard_admin.php" class="btn btn-outline-light m-1">Home</a>
      <a href="anggota.php" class="btn btn-outline-light m-1">Anggota</a>
      <a href="buku.php" class="btn btn-outline-light m-1">Buku</a>
      <a href="transaksi.php" class="btn btn-outline-light m-1">Transaksi</a>
      <a href="../index.php" class="btn btn-outline-danger m-1">Logout</a>
    </form>
  </div>
</nav>

<footer class="d-flex justify-content-center border-top py-2 mt-auto fixed-bottom bg-secondary">
  <strong>&copy; UKK PPLG 2026 | Dava Maluda Septia</strong>
</footer>

    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>




