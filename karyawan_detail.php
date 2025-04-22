<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM karyawan 
    JOIN jabatan ON karyawan.jabatan_id = jabatan.id 
    WHERE karyawan.id='$id'");
$d = mysqli_fetch_array($data);
?>
<h2>Detail Karyawan</h2>
<p><strong>Nama:</strong> <?= $d['nama'] ?></p>
<p><strong>Jenis Kelamin:</strong> <?= $d['jenis_kelamin'] ?></p>
<p><strong>Alamat:</strong> <?= $d['alamat'] ?></p>
<p><strong>No. Telp:</strong> <?= $d['no_telp'] ?></p>
<p><strong>Jabatan:</strong> <?= $d['nama_jabatan'] ?></p>
<img src="uploads/<?= $d['foto'] ?>" width="150">