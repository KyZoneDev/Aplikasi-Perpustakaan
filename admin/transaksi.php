<?php
include '../config/koneksi.php';
// if ($_SESSION['status'] != 'login'){
//   echo "<script>
//   alert('anda belum login'); location.href='..index.php';
//   </script>"
// }

?>
<?php
$anggota=mysqli_query($koneksi, "SELECT * FROM anggota");
$buku=mysqli_query($koneksi, "SELECT * FROM buku WHERE status='tersedia'");
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
        <a href="../admin/dashboard_admin.php" class="btn btn-outline-light m-1">Home</a>
        <a href="anggota.php" class="btn btn-outline-light m-1">Anggota</a>
        <a href="../admin/buku.php" class="btn btn-outline-light m-1">Buku</a>
        <a href="../admin/transaksi.php" class="btn btn-outline-light m-1">Transaksi</a>
        <a href="../index.php" class="btn btn-outline-danger m-1">Logout</a>
      </form>
    </div>
  </nav>

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
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Transaksi</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 <form action="../config/proses_transaksi.php" method="POST">
                  <select name="id_anggota" class="form-control mb-2" required>
                    <option>== Pilih Anggota ==</option>
                    <?php
                    foreach ($anggota as $data) {
                      echo"<option value='$data[id_anggota]'>$data[nama_anggota]</option>";
                    }
                    ?>
                  </select>
                  <select name="id_buku" class="form-control mb-2" required>
                    <option>== Pilih Buku ==</option>
                    <?php
                    foreach ($buku as $data) {
                      echo"<option value='$data[id_buku]'>$data[judul_buku]</option>";
                    }
                    ?>
                  </select>
                  <input type="datetime-local" name="tgl_pinjam" class="form-control mb-2">
                  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="simpan">Save changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>







      </div>
    </div>
  </div>
  

  <!-- Bagian tampil data anggota -->
  <div class="col-md-14">
    <div class="card mt-2">
      <div class="card-header bg-primary text-light">Data Peminjaman</div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nis</th>
              <th>Nama</th>
              <th>Buku</th>
              <th>Tanggal Pinjam</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no=1;
            $sql = mysqli_query($koneksi, "SELECT * FROM transaksi, buku, anggota WHERE buku.id_buku=transaksi.id_buku AND anggota.id_anggota=transaksi.id_anggota AND transaksi.status_transaksi='peminjaman' ORDER BY transaksi.id_transaksi DESC");
            while ($data = mysqli_fetch_array($sql)) {
              ?>

              <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama_anggota']; ?></td>
                <td><?php echo $data['judul_buku']; ?></td>
                <td><?php echo $data['tgl_pinjam']; ?></td>
                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pengembalian<?php echo $data['id_transaksi'];?>">
                    Pengembalian
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="pengembalian<?php echo $data['id_transaksi'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         <form action="../config/proses_transaksi.php" method="POST">
                          <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi'];?>">
                          Pengembalian oleh <?php echo $data['nama_anggota']; ?>, buku <?php echo $data['judul_buku'];?>?
                          
                          <form>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="balian">penembalian</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
                <td>

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_transaksi'];?>">
                    Hapus
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="hapus<?php echo $data['id_transaksi'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         <form action="../config/proses_transaksi.php" method="POST">
                          <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi'];?>">
                          <input type="hidden" name="id_buku" value="<?php echo $data['id_buku'];?>">
                          <form>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
                          </form>
                        </td>
                      </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>

              <!-- Bagian tampil data anggota -->
              <div class="col-md-14">
                <div class="card mt-2">
                  <div class="card-header bg-primary text-light">Data Peminjaman</div>
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nis</th>
                          <th>Nama</th>
                          <th>Buku</th>
                          <th>Tanggal Pinjam</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $no=1;
                        $sql = mysqli_query($koneksi, "SELECT * FROM transaksi, buku, anggota WHERE buku.id_buku=transaksi.id_buku AND anggota.id_anggota=transaksi.id_anggota AND transaksi.status_transaksi='pengembalian' ORDER BY transaksi.id_transaksi DESC");
                        while ($data = mysqli_fetch_array($sql)) {
                          ?>

                          <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $data['nis']; ?></td>
                            <td><?php echo $data['nama_anggota']; ?></td>
                            <td><?php echo $data['judul_buku']; ?></td>
                            <td><?php echo $data['tgl_kembali']; ?></td>
                            <td>
                              
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_anggota'];?>">
                          Hapus
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="hapus<?php echo $data['id_anggota'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                               <form action="../config/proses_transaksi.php" method="POST">
                                <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi'];?> ">
                                Apakah anda yakin akan menghapus data ini? <strong>
                                  <?php echo $data['judul_buku']; ?>
                                </strong>
                                <form>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
                                </form>
                              </td>
                            </tr>
                          <?php }?>
                        </tbody>
                      </table>
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