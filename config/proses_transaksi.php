][[<!-- Menginput data ke database -->

<?php
session_start();
include 'koneksi.php';

if (isset($_POST['simpan'])){
$id_anggota =$_POST['id_anggota'];
$id_buku = $_POST['id_buku'];
$tgl_pinjam=$_POST['tgl_pinjam'];
$status_transaksi ="peminjaman";

$query= "INSERT INTO transaksi (id_anggota, id_buku, tgl_pinjam, status_transaksi) VALUES ('$id_anggota','$id_buku','$tgl_pinjam','$status_transaksi')";
$data= mysqli_query($koneksi, $query);
if($data){
	 mysqli_query($koneksi, "UPDATE buku SET status='tidak tersedia' WHERE id_buku='$id_buku'");
 echo"<script>alert('data peminjalam tersimpan');location.href='../admin/transaksi.php';;</script>";
 
	}

}

if (isset($_POST['balian'])){
    $id_transaksi = $_POST['id_transaksi'];
    $id_buku = $_POST['id_buku'];

    date_default_timezone_set("Asia/Jakarta");
    $tgl_kembali = date('Y-m-d H:i:s');

    $queri = "UPDATE transaksi SET status_transaksi='pengembalian', tgl_kembali='$tgl_kembali' WHERE id_transaksi='$id_transaksi'";
    $data = mysqli_query($koneksi, $queri);
    if($data){
        mysqli_query($koneksi, "UPDATE buku SET status='tersedia' WHERE id_buku='$id_buku'");
        echo "<script>alert('data pengembalian tersimpan'); location.href='../admin/transaksi.php';</script>";
    }
}

// hapus Peminjaman
if (isset($_POST['hapus'])){
$id_transaksi = $_POST['id_transaksi'];
$id_buku = $_POST['id_buku'];
$sql = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi
='$id_transaksi'");
if ($sql) {
     mysqli_query($koneksi, "UPDATE buku SET status='tersedia' WHERE id_buku='$id_buku'");
     echo "<script>
     alert('Data Berhasil Dihapus');
     location.href='../admin/transaksi.php';
     </script>";
}
}
?>