<!DOCTYPE html>
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
                <a href="#" class="navbar-brand">
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
                            <a href="pesanan.php" class="nav-link">Pesanan</a>
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
                            <h1 class="m-0">Dashboard</h1>
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
                            <div class="card-body">
                                <form action="pesanan.php" method="get">
                                    <label>Cari :</label>
                                    <input type="text" name="cari">
                                    <input type="submit" value="Cari">
                                </form>
                                <?php
                                include '../koneksi.php';
                                if (isset($_GET['cari'])) {
                                    $cari = $_GET['cari'];
                                    echo "<b>Hasil pencarian : " . $cari . "</b>";
                                    $query = "SELECT * FROM pesanan WHERE nama_tamu LIKE '%" . $cari . "%'";
                                } else {
                                    $query = "SELECT * FROM pesanan";
                                }

                                $data = mysqli_query($koneksi, $query);
                                if (!$data) {
                                 die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
                                     }
                                ?>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">NO</th>
                                            <th>Nama Tamu</th>
                                            <th>Email</th>
                                            <th>Tanggal Cek In</th>
                                            <th>Tanggal Cek Out</th>
                                            <th>Foto</th>
                                            <th>No Kamar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['nama_tamu']; ?></td>
                                                <td><?php echo $d['email_pemesan']; ?></td>
                                                <td><?php echo $d['cek_in']; ?></td>
                                                <td><?php echo $d['cek_out']; ?></td>
                                                <td><img class="d-block" src="gambar/<?php echo $d['FOTO']; ?>" width="100"></td>
                                                <td>
                                                    <?php
                                                    $kamar = mysqli_query($koneksi, "select * from kamar");
                                                    while ($a = mysqli_fetch_array($kamar)) {
                                                        if ($a['id_kamar'] == $d['id_kamar']) { ?>
                                                            <?php echo $a['no_kamar']; ?>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($d['status']==0) { ?>
                                                        <span class="badge bg-warning">Belum di Konfirmasi</span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-success">Sudah di Konfirmasi</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <form action="aksi_konfirmasi.php" method="POST">
                                                        <input type="hidden" name="id_pesanan" value="<?php echo $d['id_pesanan']; ?>">
                                                        <input type="hidden" name="status" value="2">
                                                        <button class="btn btn-sm btn-primary">Konfirmasi</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>

                                <a href="cetak.php?id_pesanan=<?php echo $d['id_pesanan']; ?>" class="btn btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin mencetak?')">Cetak</a>
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
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>

</body>
</html>