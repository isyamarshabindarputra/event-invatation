<?php
include("../config.php");

if (isset($_POST['simpan'])) {
    $nama_tamu = $_POST['nama_tamu'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    // Tidak ada acara_id, jadi langsung simpan tanpa kolom acara_id
    $query = "INSERT INTO tamu (nama_tamu, email, status) 
              VALUES ('$nama_tamu', '$email', '$status')";
    $result = mysqli_query($db, $query);

    if ($result) {
        header('Location: tamu.php'); // Redirect ke halaman tamu
    } else {
        die("Gagal menyimpan data...");
    }
} else {
    die("Akses dilarang...");
}
?>