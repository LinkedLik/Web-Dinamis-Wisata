<!DOCTYPE html>

<?php 
    include "includes/config.php";
    $kabupaten = mysqli_query($connection, "SELECT * FROM kabupaten");
    $hotel = mysqli_query($connection, "SELECT * FROM hotel");
    $berita = mysqli_query($connection, "SELECT * FROM berita");
    $area = mysqli_query($connection, "SELECT * FROM area");
    $restoran = mysqli_query($connection, "SELECT * FROM restoran");
    $rutedestinasi = mysqli_query($connection, "SELECT * FROM rutedestinasi");
    $tempatwisata = mysqli_query($connection, "SELECT * FROM tempatwisata");
    $provinsi = mysqli_query($connection, "SELECT * FROM provinsi");
?>

<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Tampilan</title>
    </head>
    <body>
<div class="container">
    <!-- Menu Navigasi-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="tampilan.php">Tampilan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
      <li class="nav-item active">
        <a class="nav-link" href="tampilan.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="tampilan.php"role="button" data-toggle="dropdown" aria-expanded="false">
            Berita
        </a>
        <ul class="dropdown-menu">
            <?php if(mysqli_num_rows($berita) > 0){
                while ($row = mysqli_fetch_array($berita)){
                    ?>
            <a class="dropdown-item" href="tampilan.php"><?php echo $row["beritajudul"]?></a>
            <?php }
            } ?>
        </li>
        </ul>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="tampilanhotel.php" role="button" data-toggle="dropdown" aria-expanded="false">
          Hotel
        </a>
        <ul class="dropdown-menu">
                <?php if(mysqli_num_rows($hotel) > 0){
                    while ($row = mysqli_fetch_array($hotel)){
                        ?>
                <a class="dropdown-item" href="tampilanhotel.php"><?php echo $row["hotelnama"]?></a>
                    <?php    }
                } ?>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="tampilan.php" role="button" data-toggle="dropdown" aria-expanded="false">
          Kabupaten
        </a>
        <ul class="dropdown-menu">
                <?php if(mysqli_num_rows($kabupaten) > 0){
                    while ($row = mysqli_fetch_array($kabupaten)){
                        ?>
                <a class="dropdown-item" href="tampilan.php"><?php echo $row["kabupatenNAMA"]?></a>
                    <?php    }
                } ?>
          </li>
        </ul>
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="tampilan.php" role="button" data-toggle="dropdown" aria-expanded="false">
          Restoran
        </a>
        <ul class="dropdown-menu">
                <?php if(mysqli_num_rows($restoran) > 0){
                    while ($row = mysqli_fetch_array($restoran)){
                        ?>
                <a class="dropdown-item" href="tampilanhotel.php"><?php echo $row["restoranNAMA"]?></a>
                    <?php    }
                } ?>
          </li>
        </ul>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="tampilanarea.php" role="button" data-toggle="dropdown" aria-expanded="false">
          Provinsi
        </a>
        <ul class="dropdown-menu">
                <?php if(mysqli_num_rows($provinsi) > 0){
                    while ($row = mysqli_fetch_array($provinsi)){
                        ?>
                <a class="dropdown-item" href="tampilan.php"><?php echo $row["provinsiNAMA"]?></a>
                    <?php    }
                } ?>
          </li>
        </ul>
    </ul>
  </div>
  <div class="btn btn-outline-success"href="login.php">
    <a href="login.php">Login</a>
  </div>
</nav>
<!-- Bagian Slider Foto Wisata -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="images/berita_6968633f9c0fdce341.41579476.jpg" class="d-block w-100" alt="Telaga Sarangan">
    </div>
    <div class="carousel-item">
        <img src="images/pendapatan-taman-nasional-bromo-tengger-semeru-capai-rp-27-miliar_m_-640x421.jpg" class="d-block w-100" alt="Bromo">
    </div>
    <div class="carousel-item">
        <img src="images/telaga-sarangan-magetan-jatim.jpg" class="d-block w-100" alt="Telaga Sarangan">
    </div>
    <div class="carousel-item">
        <img src="images/fromandroid-467da6e9f7de0c09a527888033c6d798_600x400.jpg" class="d-block w-100" alt="Candi Arjuna">
    </div>
  </div>
 <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>

<br><br><br> <!-- Banyakin Gap Slider Dengan Header Berita Wisata Terkini Biar Agak Rapih HEHEHE -->
<div class="container">
    <div class="col-sm-12">
        <div class="jumbotron jumbotron-fluid">
            <h2 class="display-1">Tempat Wisata</h2>
        </div>
    </div>
</div>

<br><br>

<div class="card-deck">
    <?php if(mysqli_num_rows($tempatwisata)>0){
    while ($row2 = mysqli_fetch_array($tempatwisata)){?>
    <div class="card">
        <img src="images/<?php echo $row2["wisataFOTO"]?>" class="card-img-top" alt="Card image cap"
        style="width: 200; height: auto">
    <div class="card-body">
        <h5 class="card-title"><?php echo $row2["wisataNAMA"]?></h5>
    </div>
    <div class="card-footer">
        <small class="text-muted"><?php echo $row2["wisataFOTOKETERANGAN"]?></small>
    </div>
    </div>
    <?php }} ?>
    </div>
</div>
<br><br>

<div class="container">
    <div class="col-sm-12">
        <div class="jumbotron jumbotron-fluid">
            <h2 class="display-1">Area yang Dilalui</h2>
        </div>
    </div>
</div>

<br><br>
<div class="container">
<div class="card" style="width: 18rem;">
    <?php if(mysqli_num_rows($area)>0){
    while ($row3 = mysqli_fetch_array($area)){?>
    <div class="card-body">
    <h5 class="card-title"><?php echo $row3["areanama"]?></h4>
    <p class="card-text"><?php echo $row3["areawilayah"]?></p>
    <p class="card-text"><?php echo $row3["areaketerangan"]?></p>
    <a href="#" class="btn btn-primary">Info</a>
    </div>
    <?php }} ?>
</div>
</div>

<br><br>

<div class="container">
    <div class="col-sm-12">
        <div class="jumbotron jumbotron-fluid">
            <h2 class="display-1">Daftar Area Destinasi Wisata</h2>
        </div>
    </div>
</div>

<br><br>
<div class="container">
    <table class="table table-hover table-primary">
            <thead class="thead-light">
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Wilayah</th>
                    <th>Keterangan</th>
                    <th>Provinsi</th>
                    <th>Tanggal Berdiri</th>
                </tr>
            </thead>
            <tbody>
                <?php  $query = mysqli_query($connection, "SELECT * FROM area, provinsi");
                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                        <tr>
                            <td><?php echo $nomor;?></td>
                            <td><?php echo $row['areanama'];?></td>
                            <td><?php echo $row['areawilayah'];?></td>
                            <td><?php echo $row['areaketerangan'];?></td>
                            <td><?php echo $row['provinsiNAMA'];?></td>
                            <td><?php echo $row['provinsiTANGGALBERDIRI'];?></td>
                        </tr>
                    <?php $nomor = $nomor + 1;?>
                    <?php } ?>
            </tbody>
        </table>
</div>


    </body>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</html>