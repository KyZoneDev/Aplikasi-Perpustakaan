<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$akses = $_POST['akses'];
$tipe = '';
if ($akses == 'Admin') {
    $tipe = 'admin';
} else {
    $tipe = 'anggota';
}
$query = mysqli_query($koneksi, "SELECT * FROM $tipe WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

if (($cek > 0) && ($tipe == 'admin')) {
        $_SESSION['username'] = $username;
		$_SESSION['status'] = 'login';
        echo "<script>alert('Selamat datang di dashboard admin');
        location.href='../admin/dashboard_admin.php';</script>";

} elseif (($cek > 0) && ($tipe == 'anggota')){
        $data = mysqli_fetch_array($query);
        $_SESSION['id_anggota']=$data['id_anggota'];
        $_SESSION['username']=$data['username'];
        $_SESSION['nama_anggota']=$data['nama_anggota'];
        $_SESSION['status'] = 'login';
        echo "<script>alert('Selamat datang di dashboard anggota');
        location.href='../anggota/dashboard_anggota.php';</script>";
}
// } else {
//         echo "<script>alert('wawadukan');
//         location.href='../login.php';</script>";
// }
?>