<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM jabatan WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>
<h2>Detail Jabatan</h2>
<p><strong>Nama Jabatan:</strong> <?= $d['nama_jabatan'] ?></p>
<p><strong>Gaji Pokok:</strong> Rp <?= number_format($d['gaji_pokok']) ?></p>