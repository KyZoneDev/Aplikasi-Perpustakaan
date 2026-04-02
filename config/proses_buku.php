<!-- Menginput data ke database -->

<?php
session_start();
include 'koneksi.php';

if (isset($_POST['simpan'])){
$nis =$_POST['judul_buku'] ;
$nama = $_POST['pengarang'];
$username =$_POST['penerbit'];
$password =$_POST['tahun_terbit'];
$kelas= $_POST['status'];

mysqli_query($koneksi, "INSERT INTO buku VALUES ('','$nis','$nama','$username','$password','$kelas')");
echo "<script>alert('tambah akun berhasil'); location.href='../admin/buku.php'</script>";
}




if (isset($_POST['edit'])){
	$id=$_POST['id_buku'];
$nis =$_POST['judul_buku'] ;
$nama = $_POST['pengarang'];
$username =$_POST['penerbit'];
$password =$_POST['tahun_terbit'];
$kelas= $_POST['status'];

$edit = mysqli_query($koneksi, "UPDATE buku SET judul_buku='$nis',pengarang='$nama',penerbit='$username',tahun_terbit='$password',status='$kelas' WHERE id_buku='$id'");
echo "<script>alert('edit akun berhasil'); location.href='../admin/buku.php'</script>";
}


if (isset($_POST['hapus'])){
	$id=$_POST['id_buku'];

$edit = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$id'");
echo "<script>alert('Hapus akun berhasil'); location.href='../admin/buku.php'</script>";
}

?>