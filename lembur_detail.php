<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT lembur.*, jabatan.nama_jabatan FROM lembur 
    JOIN jabatan ON lembur.jabatan_id = jabatan.id 
    WHERE lembur.id='$id'");
$d = mysqli_fetch_array($data);
?>
<h2>Detail Tarif Lembur</h2>
<p><strong>Jabatan:</strong> <?= $d['nama_jabatan'] ?></p>
<p><strong>Tarif per Jam:</strong> Rp <?= number_format($d['tarif']) ?></p>