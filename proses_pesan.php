<?php
// Tambahkan Koneksi Databases
include 'koneksi.php';

// Menerima data dari form
$cek_in = $_POST['cek_in'];
$cek_out = $_POST['cek_out'];
$jml_kamar = $_POST['jml_kamar'];
$nama_pemesan = $_POST['nama_pemesan'];
$email_pemesan = $_POST['email_pemesan'];
$hp_pemesan = $_POST['hp_pemesan'];
$nama_tamu = $_POST['nama_tamu'];
$id_kamar = $_POST['id_kamar'];
$FOTO = $_FILES['FOTO']['name'];

if ($foto !="") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $foto);
    $extensi = strtolower(end($x));
    $file_tmp = $_FILES['FOTO']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto;
    if (in_array($extensi, $ekstensi_diperbolehkan) == true) {
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
        $query = "INSERT INTO pesanan (cek_in,cek_out,jml_kamar,nama_pemesan,email_pemesan,hp_pemesan,nama_tamu,id_kamar,FOTO) VALUES ('$cek_in', '$cek_out', '$jml_kamar', '$nama_pemesan', '$email_pemesan', '$hp_pemesan', '$nama_tamu', '$id_kamar', '$nama_gambar_baru')";
        $data = mysqli_query($koneksi, $query);

        if (!$data) {
            die("Query gagal dijalankan : " . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Extensi gambar harus png atau jpg.');window.location='index.php';</script>";
    }
} else {
    $query = "INSERT INTO pesanan (cek_in,cek_out,jml_kamar,nama_pemesan,email_pemesan,hp_pemesan,nama_tamu,id_kamar,FOTO) VALUES ('$cek_in', '$cek_out', '$jml_kamar', '$nama_pemesan', '$email_pemesan', '$hp_pemesan', '$nama_tamu', '$id_kamar', null)";
    $data = mysqli_query($koneksi, $query);

    if (!$data) {
        die("Query gagal dijalankan : " . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Terima Kasih Pesanan Anda.');window.location='index.php';</script>";
    }
}
?>
