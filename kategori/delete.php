<?php
    include '../koneksi.php';
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM kategori WHERE id='$id'");
    header('location: index.php');
?>