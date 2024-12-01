<?php
include("../config.php");
session_start();

$query = "SELECT * FROM acara";
$result = mysqli_query($db, $query);
$total_acara = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Acara dan Tamu</title>
    <style>
        table,thead,th,td{
            border:1px solid black;
            border-collapse:collapse;
            padding:10px;
        }
    </style>
</head>
<body>

    <h1>Daftar Acara</h1>
    <?php if (isset($_SESSION['notifikasi'])): ?>
        <p><?= $_SESSION['notifikasi']; ?></p>
        <?php unset($_SESSION['notifikasi']); ?>
    <?php endif; ?>
    <ul>
    <li><a href="index.php">Data acara</a></li>
    <li><a href="../tamu/tamu.php">Data Tamu</a></li>
    </ul>
    <table>
        <thead>
            <tr>
                <th>Nama Acara</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                <th><a href="tambah_acara.php">Tambah acara</a></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($acara = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $acara['nama_acara']; ?></td>
                    <td><?= $acara['tgl_acara']; ?></td>
                    <td><?= $acara['lokasi_acara']; ?></td>
                    <td><?= $acara['deskripsi']; ?></td>
                    <td>
                        <a href="edit_acara.php?acara_id=<?= $acara['acara_id']; ?>">Edit</a> | 
                        <a href="hapus_acara.php?acara_id=<?= $acara['acara_id']; ?>" onclick="return confirm('Hapus acara ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
<p><strong>Total Acara: <?= $total_acara; ?></strong></p>
</html>
