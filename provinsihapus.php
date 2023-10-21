<?php 
    include "includes/config.php";
    if(isset($_GET['hapus'])){
        $provinsiID = $_GET["hapus"];
        mysqli_query($connection, "DELETE FROM provinsi
        WHERE provinsiID = '$provinsiID'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
            document.location='provinsi.php'</script>";
    }
?>