<?php 
include '../koneksi.php';
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Pemesanan Hotel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="" class="navbar-brand">
          <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Aplikasi Pemesanan Hotel</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="kamar.php" class="nav-link">Kamar</a>
            </li>
            <li class="nav-item">
              <a href="fasilitas.php" class="nav-link">Fasilitas Kamar</a>
            </li>
            <li class="nav-item">
              <a href="galeri.php" class="nav-link">Galeri</a>
            </li>
            <li class="nav-item">
              <a href="users.php" class="nav-link">Users</a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Kamar</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah">Tambah</button>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>No Kamar</th>
                      <th>Tipe Kamar</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM kamar ORDER BY id_kamar ASC";
                    $result = mysqli_query($koneksi, $query);
                    if (!$result) {
                      die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
                    }

                    $no = 1;

                    while ($row = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                        <td><?php echo "$no"; ?></td>
                        <td><?php echo $row['no_kamar']; ?></td>
                        <td><?php echo $row['tipe_kamar']; ?></td>
                        <td>
                          <img class="d-block" src="gambar/<?php echo $row['foto']; ?>" width="200">
                        </td>
                        <td>
                          <a href="edit_kamar.php?id_kamar=<?php echo $row['id_kamar']; ?>" class="btn btn btn-warning">Edit</a>
                          
                          <a href="hapus_kamar.php?id_kamar=<?php echo $row['id_kamar']; ?>" class="btn btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini...?')">Hapus</a>
                        </td>
                      </tr>
                      <?php $no++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong><a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>

    <div class="modal fade" id="tambah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Kamar</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="tambah_kamar.php" enctype="multipart/form-data">
              <div class="form-group">
                <label>No. Kamar</label>
                <input type="text" class="form-control" name="no_kamar" placeholder="Nomor Kamar">
              </div>
               <div class="form-group">
              <label>Tipe Kamar</label>
                <input type="text" class="form-control" name="tipe_kamar" placeholder="Tipe Kamar">
              </div>
              <div class="form-group">
                <label>Foto Kamar</label>
                <input type="file" name="foto" class="form-control">
              </div>         
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </body>
  </html>