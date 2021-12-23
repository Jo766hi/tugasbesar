<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
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
  <script src="//cdn.ckeditor.com/4.17.1/basic/ckeditor.js"></script>
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
          <li class="nav-item ">
            <a class="nav-link" href="../data_anggota/anggota.php">
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
          <li class="nav-item active ">
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
            <a class="navbar-brand" href="javascript:void(0)">Data Buku</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
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
include '../data_kategori/kategori-list.php';
?>

       <div class="content">
        <div class="container-fluid">
        <?php
      include '../includes/koneksi.php';
      if (isset($_POST["submit"])){
      $judul     = $_POST['judul'];
      $kategori  = $_POST['kategori'];
      $deskripsi = $_POST['editor1'];
      $jumlah    = $_POST['jumlah'];

      // ambil data file yang diupload
      $file        = $_FILES['cover']['tmp_name'];
      $nama_file   = $_FILES['cover']['name'];
      $destination = "cover/" . $nama_file;

      $query = "INSERT INTO buku (buku_judul, kategori_id, buku_deskripsi, buku_jumlah, buku_cover) 
          VALUES ('$judul', $kategori, '$deskripsi', $jumlah, '$nama_file')";
      $hasil = mysqli_query($db, $query);
      if ($hasil == true) {

          // jika data berhasil diinsert, lakukan proses upload
          move_uploaded_file($file, $destination);

          echo "<script>window.alert('Data Berhasil di Tambah')
          window.location='buku.php'</script>";
      } else {
        echo "koneksi gagal" .mysqli_error($db);
      }
      }?>
     
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Tambah Data Buku</h2>
            </div>
            <div class="card-body table-responsive">
              <div class="row">
                  <div class="container clearfix">
                  <div class="content">
                  <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group">
									<label for="judul">Judul</label><br/>
									<input id="judul" type="text" class="form-control" name="judul" value="" required autofocus>
									<div class="invalid-feedback">
										Judul is invalid
									</div>
								</div><br/>
                <div class="form-group">
									<label for="kategori">kategori</label><br/>
									<select id="kategori" class="custom-select" name="kategori">
                    <?php foreach($data_kategori as $kategori) :?>
                      <option value = "<?php echo $kategori['kategori_id'] ?>"><?php echo $kategori['kategori_nama'] ?></option>
                    <?php endforeach ?>
                  </select> 
								</div><br/>
               <p>Deskripsi</p><br/>
                <p><textarea name="editor1"></textarea></p>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
                 
                 <div class="form-group">
									<label for="jumlah">Jumlah</label><br/>
									<input id="jumlah" type="number" class="form-control" name="jumlah" value="" required autofocus>
									<div class="invalid-feedback">
										Jumlah is invalid
									</div></div><br/>

                <p>Cover</p>
                <p><input type="file" name="cover"></p>

                <p><input type="submit" class="btn btn-primary btn-block" value="Simpan" name="submit"></p>
            </form>
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
                <a href="../about-us/about-us.html">
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