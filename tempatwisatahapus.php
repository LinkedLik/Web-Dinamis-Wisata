<?php 
    include "includes/config.php";
    if(isset($_GET['hapusfoto'])){   
        $wisataID = $_GET['hapusfoto'];
        $hapusfoto = mysqli_query($connection, "SELECT * FROM tempatwisata
                                                WHERE wisataID= '$wisataID'");
        $hapus = mysqli_fetch_array($hapusfoto);
        $namafile = $hapus['wisataFOTO'];

        mysqli_query($connection, "DELETE FROM tempatwisata
                    WHERE wisataID= '$wisataID'");
        unlink('images/'.$namafile);

        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location='tempatwisata.php'</script>";
    }
?>