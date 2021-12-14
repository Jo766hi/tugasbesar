<?php 
  session_start();
  if (!isset($_SESSION['id'])) {
   header('Location: ../login/login.php');
   exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard Dark Edition by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Perpustakaan
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="../home/dashboard.php">
              <i class="material-icons">home</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="../data_anggota/user-edit.php">
              <i class="material-icons">person</i>
              <p>Data Anggota</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../data_kategori/kategori.php">
              <i class="material-icons">event_note</i>
              <p>Data Kategori</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../data_buku/buku.php">
              <i class="material-icons">import_contacts</i>
              <p>Data Buku</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../peminjaman/peminjaman.php">
              <i class="material-icons">content_paste</i>
              <p>Peminjaman</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../pengembalian/pengembalian.php">
              <i class="material-icons">library_books</i>
              <p>Pengembalian</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../denda/denda.php">
              <i class="material-icons">attach_money</i>
              <p>Denda</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../cetak/cetak.php">
              <i class="material-icons">report</i>
              <p>Laporan</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Data Anggota</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your email</a>
                  <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                  <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../login/logout.php">Log Out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
<?php

include '../includes/koneksi.php';

// ambil artikel yang mau di edit
$tampil = mysqli_query($db, "SELECT * FROM user WHERE id = '$_SESSION[id]'");
$data_anggota = mysqli_fetch_array($tampil);


?>
      <div class="content">
        <div class="container-fluid">
        <?php
          include '../includes/koneksi.php';
                
          if(isset($_POST["save"])){
          $id_anggota = $_POST['id'];
          $user = $_POST['username'];
          $email = $_POST['email'];
          $nama = $_POST['nama'];
          $jenis_kelamin = $_POST['jk'];
          $no_telepon = $_POST['no_telepon'];
          $pass = $_POST['password'];

          if ($pass !== $data_anggota['password']){
            $pass = md5($_POST['password']);
          }

          $query = "UPDATE user
              SET username = '$user',
                  email = '$email',
                  nama = '$nama',
                  jk = '$jenis_kelamin',
                  telp = '$no_telepon',
                  password = '$pass'
              WHERE id = $id_anggota AND level = 'anggota'";

          $hasil = mysqli_query($db, $query);
          // var_dump(mysqli_error($db));
          if ($hasil == true) {
            echo "<div class=alert alert-primary alert-dismissible fade show role=alert >
            <strong>Data Berhasil di Ubah!</strong>
            <button type=button class=close data-dismiss=alert aria-label=Close>
              <span aria-hidden=true>&times;</span>
            </button>
          </div>";
          } else {
          echo "koneksi gagal" .mysqli_error($db);
          }
          }
            
            ?>
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Edit Data Anggota</h2>
            </div>
            <div class="card-body table-responsive">
              <div class="row">
                  <div class="container clearfix">


            <div class="col-12">
            <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $data_anggota['id']?>">
            <div class="form-group">
									<label for="username">Username</label>
									<input id="username" type="text" class="form-control" name="username" value="<?php echo $data_anggota['username'];?>" required autofocus>
									<div class="invalid-feedback">
										Username is invalid
									</div>
								</div><br/>
            <div class="form-group">
									<label for="email">Email</label>
									<input id="email" type="email" class="form-control" name="email" value="<?php echo $data_anggota['email'];?>" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div><br/>
           <div class="form-group">
									<label for="nama">Nama</label>
									<input id="nama" type="text" class="form-control" name="nama" value="<?php echo $data_anggota['nama'];?>" required autofocus>
									<div class="invalid-feedback">
										Name is invalid
									</div>
								</div><br/>
           <div class="form-group">
									<label for="jk">Jenis Kelamin</label><br/>
									<select id="jk" class="custom-select" name="jk">
                    <?php if($data_anggota['jk'] == "L") :?>
                      <option value = "L" selected >Laki- laki</option>
                      <option value = "P" >Perempuan</option>
                    <?php else : ?>
                      <option value = "L">Laki - laki</option>
                      <option value = "P" selected>Perempuan</option>
                    <?php endif ?>
                  </select> 
								</div><br/>
         <div class="form-group">
									<label for="telp">Telephone</label>
									<input id="telp" type="text" class="form-control" name="no_telepon" value="<?php echo $data_anggota['telp'];?>" required autofocus>
									<div class="invalid-feedback">
										Telephone is invalid
									</div>
								</div><br/>
						<div class="form-group">
									<label for="password">Password
									</label>
									<input id="password" type="password" class="form-control" name="password" value="<?php echo $data_anggota['password']; ?>" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>
                <p>
                    <input type="submit" class="btn btn-primary btn-block" value="Simpan" name="save">
                    <input type="reset" class="btn btn-primary btn-block" value="Batal" onclick="self.history.back();">
                </p>
            </form>
        </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
 <footer class="footer">
        <div class="container-fluid">
          <nav class="float-mid">
            <ul>
              <li>
                <a href="https://creative-tim.com/presentation" class="d-none d-lg-block">
                  About Us
                </a>
            </ul>
          </nav>
      </footer>
      
    <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  
</body>

</html>