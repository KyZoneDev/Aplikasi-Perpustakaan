<?php
session_start();
include 'koneksi.php';
if(isset($_POST['heeh'])){
date_default_timezone_set("Asia/Jakarta");
$tgl_pinjam=date('Y-m-d H:i:s');
$id_buku = $_POST['buku'];
$query = "INSERT INTO transaksi (id_anggota,id_buku, tgl_pinjam, status_transaksi)
VALUES ('$_SESSION[id_anggota]', '$id_buku', '$tgl_pinjam', 'Peminjaman')";
$data= mysqli_query($koneksi, $query);
if($data){
mysqli_query($koneksi,"UPDATE buku SET status='tidak' WHERE
id_buku='$id_buku'");
echo "<script>
alert('Buku sudah dipinjam');
location.href='../anggota/transaksi_anggota.php';
</script>";
}else{
echo "<script>
alert('Buku gagal dipinjam');
// location.href='../anggota/transaksi_anggota.php';
</script>";
}
}


if(isset($_POST['hooh'])){
date_default_timezone_set("Asia/Jakarta");
$id_transaksi = $_POST['id_transaksi'];
$id_buku = $_POST['buku'];
$tgl_kembali=date('Y-m-d H:i:s');
$data=mysqli_query($koneksi,"UPDATE transaksi SET tgl_kembali='$tgl_kembali',
status_transaksi='Pengembalian' WHERE id_transaksi='$id_transaksi'");
if($data){
mysqli_query($koneksi,"UPDATE buku SET status='tersedia' WHERE
id_buku='$id_buku'");
echo "<script>
alert('Buku sudah dikembalikan');
location.href='../anggota/transaksi_anggota.php';
</script>";
}else{
echo "<script>
alert('data gagal terimpan');
location.href='../anggota/transaksi_anggota.php';
</script>";
}
}

// if (isset['hapus']) {
//     # code...
// }

?>