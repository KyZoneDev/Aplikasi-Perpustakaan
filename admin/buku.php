<?php
include '../config/koneksi.php';
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
        <a href="Transaksi.php" class="btn btn-outline-light m-1">Transaksi</a>
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
            Tambah Data Buku
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Buku</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 <form action="../config/proses_buku.php" method="POST">
                  <label class="form-label">Judul buku</label>
                  <input type="text" name="judul_buku" class="form-control" required>

                  <label class="form-label">Pengarang</label>
                  <input type="text" name="pengarang" class="form-control" required>

                  <label class="form-label">Penerbit</label>
                  <input type="text" name="penerbit" class="form-control" required>

                  <label class="form-label">Tahun Terbit</label>
                  <input type="text" name="tahun_terbit" class="form-control" required>

                  <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                              <option>tersedia</option>
                              <option>tidak tersedia</option>
                            </select>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="simpan">Save changes</button>
                  
                </div>
              </form>
              </div>
            </div>
          </div>







        </div>
    </div>
  </div>

  <!-- Bagian tampil data anggota -->
  <div class="col-md-14">
    <div class="card mt-2">
      <div class="card-header bg-primary text-light">Data Angota</div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul buku</th>
              <th>Pengarang</th>
              <th>Penerbit</th>
              <th>Tahun terbit</th>
              <th>status</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no=1;
            $sql = mysqli_query($koneksi, "SELECT * FROM buku");
            while ($data = mysqli_fetch_array($sql)) {


              ?>

              <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['judul_buku']; ?></td>
                <td><?php echo $data['pengarang']; ?></td>
                <td><?php echo $data['penerbit']; ?></td>
                <td><?php echo $data['tahun_terbit']; ?></td>
                <td><?php echo $data['status']; ?></td>
                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['id_buku'];?>">
                    Edit
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $data['id_buku'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         <form action="../config/proses_buku.php" method="POST">
                          <input type="hidden" name="id_buku" value="<?php echo $data['id_buku'];?> ">
                          <label class="form-label">judul_buku</label>
                          <input type="text" name="judul_buku" value="<?php echo $data['judul_buku']; ?>" class="form-control" required>

                          <label class="form-label">Pengarang</label>
                          <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>" class="form-control" required>

                          <label class="form-label">Penerbit</label>
                          <input type="text" name="penerbit" value="<?php echo $data['penerbit']; ?>" class="form-control" required>

                          <label class="form-label">Tahun Terbit</label>
                          <input type="text" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>" class="form-control" required>

                          <label class="form-label">Status</label>
                          <input type="text" name="status" value="<?php echo $data['status']; ?>" class="form-control" required>
                          <form>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                          </form>
                        </div>
                      </div>
                    </div>
                
                </td>
                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_buku'];?>">
                    Hapus
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="hapus<?php echo $data['id_buku'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         <form action="../config/proses_buku.php" method="POST">
                          <input type="hidden" name="id_buku" value="<?php echo $data['id_buku'];?> ">
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