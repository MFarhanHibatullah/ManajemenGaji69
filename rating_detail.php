<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT rating.*, karyawan.nama FROM rating 
    JOIN karyawan ON rating.karyawan_id = karyawan.id 
    WHERE rating.id='$id'");
$d = mysqli_fetch_array($data);
?>
<h2>Detail Rating Karyawan</h2>
<p><strong>Nama Karyawan:</strong> <?= $d['nama'] ?></p>
<p><strong>Bulan:</strong> <?= $d['bulan'] ?></p>
<p><strong>Nilai Rating:</strong> <?= $d['nilai_rating'] ?></p>