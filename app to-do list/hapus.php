<?php
   
   //koneksi
   include('koneksi.php');
   
    //mengambil nilai dari parameter id
    $id = $_GET['id'];

    //perintah sql untuk hapus data
    $sql="delete from list where id='$id'";
    mysqli_query($koneksi, $sql)or die ("Gagal SQL");

    //pindah halaman ke halaman index
header('location:index.php');


?>