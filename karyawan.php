<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Karyawan - Sistem Manajemen Gaji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <?php include 'includes/sidebar.php'; ?>
    <div class="p-4 w-100">
        <h3>Daftar Karyawan</h3>
        <a href="karyawan_tambah.php" class="btn btn-primary mb-3">+ Tambah Karyawan</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT karyawan.*, jabatan.nama_jabatan 
                                              FROM karyawan 
                                              JOIN jabatan ON karyawan.jabatan_id = jabatan.id 
                                              ORDER BY karyawan.id DESC");
                $bulan_ini = date('Y-m');
                $no = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                    $id_karyawan = $row['id'];
                    $rating_q = mysqli_query($conn, "SELECT nilai_rating FROM rating WHERE karyawan_id = $id_karyawan AND bulan = '$bulan_ini'");
                    $data_rating = mysqli_fetch_assoc($rating_q);
                    $nilai_rating = $data_rating['nilai_rating'] ?? '-';
                    $bintang = is_numeric($nilai_rating) ? str_repeat('⭐', $nilai_rating) : '-';

                    echo '<tr>
                            <td>' . $no++ . '</td>
                            <td>' . $row['nama'] . '</td>
                            <td>' . $row['nama_jabatan'] . '</td>
                            <td>' . $bintang . '</td>
                            <td>
                                <a href="karyawan_detail.php?id=' . $row['id'] . '" class="btn btn-info btn-sm">Detail</a>
                                <a href="karyawan_edit.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Edit</a>
                                <a href="karyawan_hapus.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus?\')">Hapus</a>
                            </td>
                          </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
