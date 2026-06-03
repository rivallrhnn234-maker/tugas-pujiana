<?php
//koneksi
include('koneksi.php');

//mengambil nilai dari parameter id
$id = $_GET['id'];

//perintah sql untuk toggle status selesai
$sql="UPDATE list SET status_selesai = CASE
    WHEN status_selesai = 1 THEN 0
    ELSE 1
END
WHERE id='$id'";

mysqli_query($koneksi, $sql) or die ("Gagal SQL");

//pindah halaman ke halaman index
header('location:index.php');
?>