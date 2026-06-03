<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi To Do List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <!-- Main Section -->
    <section>
        <div class="container">
            <div class="row">
                   <div class="col-md-6 offset-md-3">
                    <h3 class="text-center mt-3">Edit Data - To Do List</h3>
                    <?php 
                        //koneksi
                        include('koneksi.php');

                        //mengambil nilai parameter id
                        $id = $_GET['id'];

                        //mengambil data dari database
                        $sql = "select*from list where id='$id'";
                        $query = mysqli_query($koneksi, $sql) or die ("Gagal SQL");
                        $data = mysqli_fetch_array($query);

                    ?>
                    <form action="edit_data.php" method="POST">

                        <input type="hidden" name="id" value="<?php echo $id ?>">

                        <div class="mb-3">
                            <label for="judul" class="form-label">judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo 
                            $data['judul'] ?>">
                        </div> 
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="index.php" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
    </section>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>

</html>