<?php
include 'koneksi.php';
include 'includes/header.php';
include 'includes/sidebar.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$query = "
    SELECT g.*, k.nama
    FROM gaji g
    JOIN karyawan k ON g.karyawan_id = k.id
    WHERE g.id = $id
";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<div class='container mt-5 alert alert-warning'>Data gaji tidak ditemukan.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Gaji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar sudah di-include -->
        <div class="p-4 w-100">
            <div class="container">
                <h3 class="mb-4">Detail Gaji</h3>
                <div class="card">
                    <div class="card-body">
                        <p><strong>Nama Karyawan:</strong> <?= htmlspecialchars($data['nama']) ?></p>
                        <p><strong>Bulan:</strong> <?= htmlspecialchars($data['bulan']) ?></p>
                        <p><strong>Total Gaji:</strong> Rp <?= number_format($data['total_gaji'], 0, ',', '.') ?></p>
                    </div>
                </div>
                <a href="rating.php" class="btn btn-outline-secondary mt-4">
                    <i class="bi bi-arrow-left"></i>← Kembali
                </a>
            </div>
        </div>
    </div>
</body>
</html>
