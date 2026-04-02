<?php
session_start();
if ($_SESSION['status'] != 'login') {
   echo "<script>alert('Sha mnh');
	location.href='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Dashboard Anggota</title>
</head>
<body>
     <nav class="navbar navbar-expand-lg bg-secondary">
 <div class="container">
 <a class="navbar-brand text-light" href="dasboardanggota.php"><strong>Aplikasi Perpustakaan
Digital</a></strong>
 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bstarget="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle
navigation">
 <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNav">
 </div>
 <a href="transaksi_anggota.php" class="btn btn-outline-light m-1">Transaksi</a>
 <a href="../config/logout.php" class="btn btn-outline-light m-1">Logout</a>
 </div>
 </nav>
 <!-- akhir nav -->
 <div class="container">
 <div class="row">
 <div class="col-md-15">
 <div class="card mt-2">
 <h4>Selamat Datang <?php echo $_SESSION['username'] ?>, Di Halaman Dashboard
Anggota</h4>
 <p class="text-justify text-muted">
 Aplikasi Perpustakaan Sekolah Digital merupakan sistem berbasis web yang di rancang untuk
membantu pengelolaan data buku, peminjaman, dan pengembalian secra lebih mudah, cepat dan
terorganisir.
 </p>
 </div>
 </div>
 </div>
 </div>

<footer class="d-flex justify-content-center border-top py-2 mt-auto fixed-bottom bg-secondary">
  <strong>&copy; UKK PPLG 2026 | Dava Maluda Septia</strong>
</footer>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>