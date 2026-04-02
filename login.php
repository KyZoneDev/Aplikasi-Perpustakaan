<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan Digital</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
</head>
<body>
    
<nav class="navbar bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand">Halaman Login</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
      <button class="btn btn-outline-light m-1" type="submit">Search</button>
      <a href="register.php" class="btn btn-outline-light m-1">Register</a>
      <a href="login.php" class="btn btn-outline-light m-1">Login</a>
    </form>
  </div>
</nav>

<!-- bagian container -->
 <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="text"-center></div>
                    <div>
                        <h5>Login Aplikasi</h5>
                    </div>
                        <form action="config/proses_login.php" method="POST">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>

                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required autocomplete="off">

                            <label class="form-label">Hak akses</label>
                            <select name="akses" class="form-control">
                              <option>Admin</option>
                              <option>Anggota</option>
                            </select>

                            <div class="d-grid mt-2">
                              <button class="btn btn-primary" type="submit" name="kirim">Masuk</button>
                            </div>
                            <form>
                              <hr>
                              <p>
                                 belum punya akun?<a href="register.php">Daftar disini</a>
                              </p>
                            </div>
                            </form>
                 </div>
            </div>
         </div>
    </div>

<footer class="d-flex justify-content-center border-top py-2 mt-auto fixed-bottom bg-secondary">
  <strong>&copy; UKK PPLG 2026 | Dava Maluda Septia</strong>
</footer>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>