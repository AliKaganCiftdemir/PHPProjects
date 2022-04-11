<?php 
    session_start();
    $_SESSION["girisKontrol"] = 0;
    unset($_SESSION["username"]);
    echo "<script>alert('Çıkış İşlemi Başarılı.'); window.location.href='index.php'</script>";
    session_destroy();
?>