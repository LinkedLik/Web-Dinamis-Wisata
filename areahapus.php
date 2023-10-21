<?php 
    include "includes/config.php";
    if(isset($_GET['hapus'])){
        $kodearea = $_GET["hapus"];
        mysqli_query($connection, "DELETE FROM area
        WHERE areaID = '$kodearea'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
            document.location='area.php'</script>";

    }
?>