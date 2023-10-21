<?php 
    include "includes/config.php";
    if(isset($_GET['hapus'])){
        $kodeberita = $_GET["hapus"];
        mysqli_query($connection, "DELETE FROM berita
        WHERE beritaID = '$kodeberita'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
            document.location='berita.php'</script>";

    }
?>