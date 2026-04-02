<?php
include '../config/koneksi.php';
session_start();
if ($_SESSION['status'] != 'login') {
 echo "<script>alert('Sha mnh');
 location.href='../index.php';</script>";
}    
$anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
$buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE status='tersedia'"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Anggota</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
 <nav class="navbar navbar-expand-lg bg-secondary">
   <div class="container">
     <a class="navbar-brand text-light px-3" href="#">Aplikasi Perpustakaan Digital</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNav">
     </div>
     <a href="../config/logout.php" class="btn btn-outline-danger m-1">Logout</a>

   </div>
 </nav>
 <!-- Bagian awal -->
 <div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="card mt-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
         Tambah Data Transaksi
       </button>

       <!-- Modal -->
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <form action="../config/proses_transaksi_anggota.php" method="POST">
               <input type="hidden" name="id_anggota" value="<?php $_SESSION['id_anggota']?>">
               <strong><p class="mb-3">Halo, <?php echo $_SESSION['nama_anggota'];?>  ingin meminjam buku apa?</p></strong>
               <select class="form-select" name="buku" aria-label="Default select example">
                 <option>Pilih Buku</option>
                 <?php
                 foreach ($buku as $data) {
                  echo "<option value='$data[id_buku]'>$data[judul_buku]</option>";
                }
                ?>
              </select>	
              <br>
              <input type="datetime-local" name="tglpinjam" class="form-control mb-2">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="heeh" class="btn btn-primary">Pinjam</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>

</div>

<div class="col-md-14">
 <div class="card mt-2">
   <div class="card-header bg-primary text-light">Data Peminjaman</div>
   <div class="card-body">
     <table class="table table-bordered">
       <thead>
         <th>No</th>
         <th>judul buku</th>
         <th>tanggal Pinjam</th>
         <th>Aksi</th>
       </thead>
       <tbody>
         <?php
         $no = 1;
         $query = mysqli_query($koneksi, "SELECT * FROM transaksi, buku  WHERE buku.id_buku = transaksi.id_buku AND transaksi.id_anggota=$_SESSION[id_anggota] AND status_transaksi='Peminjaman'");
         while ($data = mysqli_fetch_array($query)) { ?>
           <tr>
             <td><?php echo $no++;?></td>
             <td><?php echo $data['judul_buku'];?></td>
             <td><?php echo $data['tgl_pinjam'];?></td>
             <td>
              <button type="button" id="pengembalian" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#pengembalian<?php echo $data['id_transaksi'];?>">
                Kembalikan
              </button>

              <!-- Modal -->
              <div class="modal fade" id="pengembalian<?php echo $data['id_transaksi'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">pengembalian</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="../config/proses_transaksi_anggota.php" method="POST">
                        <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi'];?>">
                        <input type="hidden" name="buku" value="<?php echo $data['id_buku'];?>">
                        Pengembalian oleh <?php echo $_SESSION['nama_anggota']; ?>, buku <?php echo $data['judul_buku'];?>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="hooh" class="btn btn-primary">Kembalikan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </td>       
          </tr>
        </tbody>
      <?php } ?>
    </table>
  </div>
</div>
</div>
<div class="col-md-14">
 <div class="card mt-2">
   <div class="card-header bg-primary text-light">Histori Peminjaman</div>
   <div class="card-body">
     <table class="table table-bordered">
       <thead>
         <th>No</th>
         <th>judul buku</th>
         <th>Tanggal pinjam</th>
         <th>tanggal Kembali</th>
       </thead>
       <tbody>
         <?php
         $no = 1;
         $teuing = mysqli_query($koneksi, "SELECT * FROM transaksi, buku WHERE buku.id_buku = transaksi.id_buku AND transaksi.id_anggota = $_SESSION[id_anggota] AND transaksi.status_transaksi='Pengembalian'");
         while ($data = mysqli_fetch_array($teuing)) { ?>
           <tr>
             <td><?php echo $no++;?></td>
             <td><?php echo $data['judul_buku'];?></td>
             <td><?php echo $data['tgl_pinjam'];?></td>
             <td><?php echo $data['tgl_kembali'];?></td>
           </tr>
         </tbody>
       <?php } ?>
     </table>
   </div>
 </div>
</div>
</div>


<!-- Akhir wawadukan tambah transaksi -->

</div>
<footer class="d-flex justify-content-center border-top py-2 mt-auto fixed-bottom bg-secondary">
  <strong>&copy; UKK PPLG 2026 | Dava Maluda Septia</strong>
</footer>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>