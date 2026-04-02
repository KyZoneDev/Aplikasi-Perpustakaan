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
        <a href="transaksi.php" class="btn btn-outline-light m-1">Transaksi</a>
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
            Tambah Data Anggota
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Anggota</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 <form action="../config/proses_anggota.php" method="POST">
                  <label class="form-label">NIS</label>
                  <input type="text" name="nis" class="form-control" required>

                  <label class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" required>

                  <label class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" required>

                  <label class="form-label">Password</label>
                  <input type="text" name="password" class="form-control" required>

                  <label class="form-label">Kelas</label>
                  <input type="text" name="kelas" class="form-control" required>
                  <form>
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
      <div class="card-header bg-primary text-light">Data Angota</div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nis</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Password</th>
              <th>Kelas</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no=1;
            $sql = mysqli_query($koneksi, "SELECT * FROM anggota");
            while ($data = mysqli_fetch_array($sql)) {


              ?>

              <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama_anggota']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td><?php echo $data['kelas']; ?></td>
                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['id_anggota'];?>">
                    Edit
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $data['id_anggota'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         <form action="../config/proses_anggota.php" method="POST">
                          <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota'];?> ">
                          <label class="form-label">NIS</label>
                          <input type="text" name="nis" value="<?php echo $data['nis']; ?>" class="form-control" required>

                          <label class="form-label">Nama</label>
                          <input type="text" name="nama" value="<?php echo $data['nama_anggota']; ?>" class="form-control" required>

                          <label class="form-label">Username</label>
                          <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control" required>

                          <label class="form-label">Password</label>
                          <input type="text" name="password" value="<?php echo $data['password']; ?>" class="form-control" required>

                          <label class="form-label">Kelas</label>
                          <input type="text" name="kelas" value="<?php echo $data['kelas']; ?>" class="form-control" required>
                          <form>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                          </form>
                        </div>
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
                         <form action="../config/proses_anggota.php" method="POST">
                          <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota'];?> ">
                          Apakah anda yakin akan menghapus data ini? <strong>
                            <?php echo $data['nama_anggota']; ?>
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