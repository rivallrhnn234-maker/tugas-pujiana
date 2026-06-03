<?php 
    //koneksi
    include('koneksi.php');

    //mengambil data dari form
    $judul = $_POST['judul'];
    $id = $_POST['id'];

    //edit data ke database
    $sql="update list set judul='$judul' where id='$id'";
    mysqli_query($koneksi, $sql) or die ("Gagal SQL");

    //pindah halaman ke index
    header('location:index.php');

    ?>
