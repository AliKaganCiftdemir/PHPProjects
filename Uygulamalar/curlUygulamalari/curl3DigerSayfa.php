<?php 
session_start();
if (isset($_SESSION["giris"]) && $_SESSION["giris"] == "ok") {
    echo "Merhaba diğer sayfana hoşgeldin.";
}else {
    echo "Önce Giriş Yapmanız Gerekli!";
}

?>