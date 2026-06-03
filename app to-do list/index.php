<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi To Do List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            background: linear-gradient(123deg, #667eea 0%, #764ba2 100%);
            background-attachment: fixed;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            color: white; /* Supaya judul terbaca di background gelap */
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        /*membuat card list jadi lebih cantik */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.02); /* efek sedikit membesar saat disentuh mouse */
        }
        /* POPUP */
.popup{
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);

    justify-content: center;
    align-items: center;
}

.popup-content{
    background: white;
    padding: 25px;
    border-radius: 15px;
    width: 300px;
    text-align: center;
}

.hapus{
    background: red;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
}

.batal{
    background: gray;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
}
    </style>
  </head>
     
  <body>
    <!-- Main Section -->
     <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                   <h1 class="text-center mb-3">Aplikasi To Do List</h1>
                    
                   <a href="frm_tambah.php" class="btn btn-primary btn-sm">
                    <ion-icon name="add-outline"></ion-icon>
                   </a>

                   <!-- card mulai dari sini -->
                   <?php 
                       include("koneksi.php");
                       
                       $sql="select*from list order by id asc";
                       $query=mysqli_query($koneksi, $sql)or die ("Gagal SQL");
                       while($data=mysqli_fetch_array($query)) {
                   ?>
                   <div class="card mt-2">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-9">
                                  <?php 
                                      if($data['status_selesai'] == 1) {
                                  ?>
                                  <ion-icon name="checkbox-outline" style="font-size: 20px;position:relative;top:5px;
                                  color:green;"></ion-icon>
                                  <?php } ?>

                                <?php echo $data['judul'];?>
                            </div>
                               <div class="col-md-3">
                                <!-- Tombol selesai -->
                                    <a href="set_selesai.php?id=<?php echo $data['id']?>" class="btn btn-success btn-sm" 
                                    onclick="return confirm('<?php echo ($data['status_selesai'] == 1) ? 'Batalkan pekerjaan ini?' : 'Apakah Anda sudah yakin mengerjakan pekerjaan ini?'; ?>')">
                                        <ion-icon name="checkmark-outline"></ion-icon>
                                    </a>

                                    <!-- Tombol edit -->
                                    <a href="frm_edit.php?id=<?php echo $data['id'] ?>"class="btn btn-warning btn-sm">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                       <a href="hapus.php?id=<?php echo $data['id']?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="tampilPopup(event, this.href)">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a>
                               </div>
                           </div>
                       </div>
                    </div>
                    <?php 
                    }
                    ?>
                    <!-- card sampai di sini -->
                </div>
            </div>
        </div>
     </section>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- POPUP -->
<div class="popup" id="popup">

    <div class="popup-content">

        <h3>Konfirmasi</h3>

        <p>Yakin anda mau menghapus?</p>

        <button class="batal"
            onclick="tutupPopup()">
            Batal
        </button>

        <a href="#" id="linkHapus" class="hapus">
            Hapus
        </a>

    </div>

</div>

<script>

function tampilPopup(event, link){

    event.preventDefault();

    document.getElementById("popup").style.display = "flex";

    document.getElementById("linkHapus").href = link;
}

function tutupPopup(){

    document.getElementById("popup").style.display = "none";
}

</script>
  </body>

</html>