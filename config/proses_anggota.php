<!-- Menginput data ke database -->

<?php
session_start();
include 'koneksi.php';

if (isset($_POST['simpan'])){
$nis =$_POST['nis'] ;
$nama = $_POST['nama'];
$username =$_POST['username'];
$password =$_POST['password'];
$kelas= $_POST['kelas'];

$anggota = mysqli_query($koneksi, "INSERT INTO anggota VALUES ('','$nis','$nama','$username','$password','$kelas')");
echo "<script>alert('tambah akun berhasil'); location.href='../admin/anggota.php'</script>";
}




if (isset($_POST['edit'])){
	$id=$_POST['id_anggota'];
$nis =$_POST['nis'] ;
$nama = $_POST['nama'];
$username =$_POST['username'];
$password =$_POST['password'];
$kelas= $_POST['kelas'];

$edit = mysqli_query($koneksi, "UPDATE anggota SET nis='$nis',nama_anggota='$nama',username='$username',password='$password',kelas='$kelas' WHERE id_anggota='$id'");
echo "<script>alert('edit akun berhasil'); location.href='../admin/anggota.php'</script>";
}


if (isset($_POST['hapus'])){
	$id=$_POST['id_anggota'];

$edit = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota='$id'");
echo "<script>alert('Hapus akun berhasil'); location.href='../admin/anggota.php'</script>";
}

?>