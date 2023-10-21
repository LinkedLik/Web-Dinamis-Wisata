<?php 
    include "includes/config.php";
    if(isset($_GET['hapusfoto']))
    {   #MASIH ADA ERROR MASIH DI CARI
        $kabupatenKODE = $_GET['hapusfoto'];
        $hapusfoto = mysqli_query($connection, "SELECT * FROM kabupaten
                                                WHERE kabupatenKODE= '$kabupatenKODE'");
        $hapus = mysqli_fetch_array($hapusfoto);
        $namafile = $hapus['kabupatenFOTOICON'];

        mysqli_query($connection, "DELETE FROM kabupaten
                    WHERE kabupatenKODE= '$kabupatenKODE'");
        unlink('images/'.$namafile);

        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location='kabupaten.php'</script>";
    }
?>