<?php
include("../config.php");

$id = $_GET['tamu_id'];
$query = "DELETE FROM tamu WHERE tamu_id=$id";
$result = mysqli_query($db, $query);

if ($result) {
    $_SESSION['notifikasi'] = "Data acara berhasil dihapus!";
    header('Location: tamu.php');
} else {
    $_SESSION['notifikasi'] = "Gagal menghapus data acara.";
    header('Location: tamu.php');
}
?>