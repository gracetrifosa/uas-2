<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
    {
        $kodekategori = $_GET["hapus"];
        mysqli_query($connection, "delete from hotel
        where hotelKODE = '$kodekategori'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
            document.location='hotel.php'</script>";
    }
?>