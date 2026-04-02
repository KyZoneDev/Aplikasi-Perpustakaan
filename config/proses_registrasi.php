<?php

include 'koneksi.php';

$nis =$_POST['nis'] ;
$nama = $_POST['nama'];
$username =$_POST['username'];
$password =$_POST['password'];
$kelas= $_POST['kelas'];

$anggota = mysqli_query($koneksi, "INSERT INTO anggota VALUE ('','$nis','$nama','$username','$password','$kelas')");
 
 if($anggota){
 	echo "<script>alert('Daftar akun berhasil')
 	location.href='../index.php'
 	</script>";
 }
 else {
 	echo "<script>alert('Daftar akun gagal')
 	location.href='../index.php'
 	</script>";
 }


?>