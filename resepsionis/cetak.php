<DOCTYPE html>
<html'>
    <head>
    <style>
        body 
</style>
        <title></title>
    </head>
    <body>
        <br>
        <h1>Laporan Pemesanan</h1>
        <tr>
        <table border="1" style="width: 100%">
        <tr>
            <th style="width: 10px">NO</th>
                      <th>Nama Tamu</th>
                      <th>Email</th>
                      <th>Cek In</th>  
                      <th>Cek Out</th>
                      <th>No Kamar</th>
                      <th>Status</th>
        </tr>
        <?php
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "select * from pesanan");
                    while($d = mysqli_fetch_array($data)){
                      ?>
        <tr>
            <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_tamu']; ?></td>
                        <td><?php echo $d['email_pemesan']; ?></td>
                        <td><?php echo $d['cek_in']; ?></td>
                        <td><?php echo $d['cek_out']; ?></td>
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
                          if ($d['status'] == 1) { ?>
                            <span class="badge bg-warning">Belum di Konfirmasi</span>
                          <?php } else { ?>
                            <span class="badge bg-success">Sudah di Konfirmasi</span>
                          <?php } ?>
                        <td>
                          <form action="aksi_konfirmasi.php" method="POST">
                            <input type="hidden" name="id_pesanan" value="<?php echo $d['id_pesanan']; ?>">
                            <input type="hidden" name="status" value="2">
                          </form>
                        </td>
        </tr>
        <?php 
        }
        ?>
    </table>
    </tbody>
    </table>
  </body>
</html>

	<script>window.print();</script>
		
	
	
</body>
</html>