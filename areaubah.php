<!-- BELUM DIRUBAH -->
<!DOCTYPE html>

<?php 
ob_start();
session_start();
if(!isset($_SESSION['useremail']))
    header("location:login.php");
?>

<?php
    include "includes/config.php";
    
    if(isset($_POST['Batal'])){
        header("location:area.php");
    }

    
    if(isset($_POST['Edit'])){
        $areaID = $_POST['inputkode'];
        $areanama = $_POST['inputnama'];
        $areawilayah = $_POST['inputwilayah'];
        $areaketerangan = $_POST['inputket'];
        $kabupatenKODE = $_POST["inputkodekabupaten"];

        mysqli_query($connection, "UPDATE area set areanama='$areanama', 
                        areawilayah='$areawilayah', areaketerangan='$areaketerangan',
                        kabupatenKODE='$kabupatenKODE'
                        WHERE areaID='$areaID'");
        header("location:area.php");
    }

    $datakabupaten = mysqli_query($connection, "SELECT * FROM kabupaten");
    $dataarea = mysqli_query($connection, "SELECT * FROM area");

$kodearea = $_GET["ubah"];
$editarea = mysqli_query($connection, "SELECT * FROM area
                            WHERE areaID = '$kodearea'");
$rowedit = mysqli_fetch_array($editarea);
    
$editkabupaten = mysqli_query($connection, "SELECT * FROM area, kabupaten
                                WHERE areaID = '$kodearea' and area.kabupatenKODE = kabupaten.kabupatenKODE ");
$rowedit2 = mysqli_fetch_array($editkabupaten);
    
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard PROJECT UAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="images/icon/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/metisMenu.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="css/typography.css">
    <link rel="stylesheet" href="css/default-css.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
    <?php include "header.php";?>
<div class="main-content-inner">
    
<div class="row">
<div class="col-sm-1">
  </div>

<div class="col-sm-10">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Input area Wisata</h1>
            </div>
        </div> <!-- penutup jumbotron -->

  <form method="POST">
  <div class="form-group row">
    <label for="kodearea" class="col-sm-2 col-form-label">Kode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kodearea" name="inputkode" maxlength="4" readonly
      value="<?php echo $rowedit["areaID"]?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="namaarea" class="col-sm-2 col-form-label">Nama Area</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputnama" id="namaarea" 
      value="<?php echo $rowedit["areanama"]?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="wilayah" class="col-sm-2 col-form-label">Area Wilayah</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputwilayah" id="wilayah" 
      value="<?php echo $rowedit["areawilayah"]?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="keterangan" class="col-sm-2 col-form-label">Area Keterangan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputket" id="keterangan" 
      value="<?php echo $rowedit["areaketerangan"]?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="kodekabupaten" class="col-sm-2 col-form-label">kabupaten</label>
    <div class="col-sm-10">
    <select class="form-control" id="kodekabupaten" name="inputkodekabupaten">
        <option value="<?php echo $rowedit['kabupatenKODE']?>">
        <?php echo $rowedit["kabupatenKODE"]?>
        <?php echo $rowedit2['kabupatenNAMA']?></option>
        <?php while($row = mysqli_fetch_array($datakabupaten)) {?>
            <option value="<?php echo $row["kabupatenKODE"]?>">
                <?php echo $row["kabupatenKODE"]?>
                <?php echo $row["kabupatenNAMA"]?>
            </option>
        <?php } ?>
    </select>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <input type="submit" class="btn btn-primary" value="Edit" name="Edit">
        <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
    </div>
  </div>



</form>
</div>

<div class="col-sm-1">
</div>
</div> <!-- penutup class row-->

<!-- mulai dengan menampilkan data -->
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Daftar area Wisata</h1>
                <h2>Hasil Entri data pada Tabel area</h2>
            </div>
        </div> <!-- penutup jumbotron -->



    <table class="table table-hover table-danger">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Area ID</th>
                <th>Area Nama</th>
                <th>Area Wilayah</th>
                <th>Area Keterangan</th>
                <th>Kabupaten Kode</th>
                <th colspan="2" style="text-align: center">Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $query = mysqli_query($connection, "SELECT * FROM area");
        $nomor = 1;
        while ($row = mysqli_fetch_array($query))
        { ?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $row['areaID'];?></td>
                    <td><?php echo $row['areanama'];?></td>
                    <td><?php echo $row['areawilayah'];?></td>
                    <td><?php echo $row['areaketerangan'];?></td>
                    <td><?php echo $row['kabupatenKODE'];?></td>
                    <!-- untuk icon edit dan delete -->
                    <td>    
                        <a href="areaubah.php?ubah=<?php echo $row["areaID"]?>" class="btn btn-success btn-sm" title="EDIT">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                    </a>
                        </td>

                    <td>
                        <a href="areahapus.php?hapus=<?php echo $row["areaID"]?>" class="btn btn-danger btn-sm" title="DELETE">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    </a>
                        </td>

<!-- akhir icon edit delete -->
                <tr>
           <?php $nomor = $nomor + 1; ?>
           <?php } ?>
        </tbody>
    </table>
    
        </div>
        <div class="col-sm-1"></div>
        <?php include "footer.php";?>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="js/plugins.js"></script>
    <script src="js/scripts.js"></script>
    </div>
</html>