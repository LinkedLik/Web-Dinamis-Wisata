<?php 
    include "includes/config.php";
    if(isset($_GET['hapusfoto'])){   
        $hotelID = $_GET['hapusfoto'];
        $hapusfoto = mysqli_query($connection, "SELECT * FROM hotel
                                                WHERE hotelID= '$hotelID'");
        $hapus = mysqli_fetch_array($hapusfoto);
        $namafile = $hapus['hotelfoto'];

        mysqli_query($connection, "DELETE FROM hotel
                    WHERE hotelID= '$hotelID'");
        unlink('images/'.$namafile);

        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location='hotel.php'</script>";
    }
?>