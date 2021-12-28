<?php 
session_start();
if (empty($_SESSION['username'])){
    header ("location: ../login/login.php");
    exit();
}

  include '../includes/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  Perpustakaan Web
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
      <div class="logo"><a href="../display/index.html" class="simple-text logo-normal">
          Perpustakaan
        </a></div>
        <div class="sidebar-wrapper">
        <ul class="nav">
        <img src="../assets/img/user.png" style="width:90px; padding: 10px;">
        <span style="color:#a9afbbd1; font-size: 20px; font-family: arvo; ">
        <?php echo "$_SESSION[nama]"; ?>  
        </span>     
        <hr> 
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
          <li class="nav-item active ">
            <a class="nav-link" href="../data_kategori/user-kategori.php">
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
            <a class="navbar-brand"><?php echo $_SESSION['level'] ?></a>
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
    include 'kategori-list.php';
    $no = 1;
    ?>

<div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Data Kategori</h2>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="container clearfix">
                  <div class="content">
              <?php 
                 if (isset($_GET['halaman']) && $_GET['halaman'] != ""){
                  $halaman = $_GET['halaman'];
                } else {
                  $halaman = 1;
                }
                  $limit = 3;
                  if ($halaman > 1){
                    $offset = ($halaman * $limit) - $limit;
                  } else $offset = 0;
                  $sebelum = $halaman - 1;
                  $sesudah = $halaman + 1;
                  $query = "SELECT * FROM kategori";
                  $result = mysqli_query($db, $query);
                  
                  $jlh_data = mysqli_num_rows($result);
                  $jlh_halaman = ceil($jlh_data/$limit);
                  $hal_akhir = $jlh_halaman;
                                
                  $query2 = "SELECT * FROM kategori LIMIT $offset,$limit";
                  $data_kategori = mysqli_query($db, $query2);
                  ?>

                  <?php if(isset($_GET["cari"])) { ?>
                  <?php $data_kategori = cari5($_GET["keyword"]);}?>
                  
            <?php if (empty($data_kategori)) : ?>
            Tidak ada data.
            <?php else : ?>   
            <form class="navbar-form" action="" method="GET">
              <div class="input-group no-border">
                <input type="text" name="keyword" value="" class="form-control" placeholder="Search...">
                <button type="submit" name="cari" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <br>
            <table class="table table-bordered-light data">
                <tr>
                    <th style="color:thistle; border:1px solid; text-align:center;" width="30%">No.</th>
                    <th style="color:thistle; border:1px solid; text-align:center;" width="50%">Kategori</th>
                </tr>
                <?php foreach ($data_kategori as $kategori) : ?>
                <tr>
                    <td style="color:white; border:1px solid; text-align:center;"><?php echo $no++?></td>
                    <td style="color:white; border:1px solid; text-align:center;"><?php echo $kategori['kategori_nama'] ?></td>
                <?php  endforeach ?>
            </table>
            <?php endif ?>
            <nav aria-label="Page navigation example">
            <ul class="pagination">
            <?php 
            if ($halaman == 1){
            echo "";
            }
            else {
            ?>
            <li class="page-item"><a class="page-link" href="<?php echo "user-kategori.php?halaman=1"?>">&lt;&lt;</a></li>
            <li class="page-item"><a class="page-link" href="<?php echo "user-kategori.php?halaman=$sebelum"?>">Previous</a></li>
            <?php } ?>
                            
            <?php
            for ($i=1; $i<=$jlh_halaman; $i++){
            echo "<li class=page-item><a class=page-link href=user-kategori.php?halaman=$i>$i</a></li>";
            }
            ?>
            <?php
            if ($halaman == $jlh_halaman){
              echo "";
            }else {
              ?>
            <li class="page-item"><a class="page-link" href="<?php echo "user-kategori.php?halaman=$sesudah"?>">Next</a></li>
            <li class="page-item"><a class="page-link" href="<?php echo "user-kategori.php?halaman=$jlh_halaman"?>">&gt;&gt;</a></li>
          <?php }?>  
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