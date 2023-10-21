<?php 
    include "includes/config.php";
    if(isset($_GET['hapus'])){
        $ruteID = $_GET["hapus"];
        mysqli_query($connection, "DELETE FROM rutedestinasi
        WHERE ruteID = '$ruteID'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
            document.location='rutedestinasi.php'</script>";
    }
?>