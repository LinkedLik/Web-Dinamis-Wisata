<?php 
    include "includes/config.php";
    if(isset($_GET['hapus'])){
        $restoranID = $_GET["hapus"];
        mysqli_query($connection, "DELETE FROM restoran
        WHERE restoranID = '$restoranID'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
            document.location='restoran.php'</script>";
    }
?>