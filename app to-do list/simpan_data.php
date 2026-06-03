<?php 
    //koneksi
    include('koneksi.php');

    //mengambil data dari form
    $judul = $_POST['judul'];

    /* cek apakah judul sudah ada */
$cek = mysqli_query($koneksi,
"SELECT * FROM list WHERE judul='$judul'");

if(mysqli_num_rows($cek) > 0){

    echo "
    <script>
        alert('Tugas sudah ada!');
        window.location='index.php';
    </script>
    ";

}else{

    // simpan data
    $sql = "INSERT INTO list (judul)
            VALUES ('$judul')";

    mysqli_query($koneksi, $sql)
    or die ('Gagal SQL');

    // kembali ke index
    header('location:index.php');
}
   