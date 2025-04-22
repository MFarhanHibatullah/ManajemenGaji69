<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT gaji.*, karyawan.nama FROM gaji 
    JOIN karyawan ON gaji.karyawan_id = karyawan.id 
    WHERE gaji.id='$id'");
$d = mysqli_fetch_array($data);
?>
<h2>Detail Gaji Karyawan</h2>
<p><strong>Nama Karyawan:</strong> <?= $d['nama'] ?></p>
<p><strong>Bulan:</strong> <?= $d['bulan'] ?></p>
<p><strong>Gaji Pokok:</strong> Rp <?= number_format($d['gaji_pokok']) ?></p>
<p><strong>Tarif Lembur:</strong> Rp <?= number_format($d['lembur']) ?></p>
<p><strong>Bonus Rating:</strong> Rp <?= number_format($d['bonus_rating']) ?></p>
<p><strong>Total Gaji:</strong> Rp <?= number_format($d['total_gaji']) ?></p>