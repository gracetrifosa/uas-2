<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
    {
        $kodekategori = $_GET["hapus"];
        mysqli_query($connection, "delete from form
        where user_id = '$kodekategori'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
            document.location='form.php'</script>";
    }
?>