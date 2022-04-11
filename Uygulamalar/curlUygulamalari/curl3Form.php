<form action="" method="post">
    Kullanıcı Adı: <br>
    <input type="text" name="kullaniciAdi"> <br>
    Şifre: <br>
    <input type="password" name="sifre"> <br>
    <button>Giriş Yap</button>
</form>

<?php
    if ($_POST) {
        session_start();
        $kullaniciAdi = $_POST["kullaniciAdi"];
        $sifre = $_POST["sifre"];

        if ($kullaniciAdi == "Ali" && $sifre == "123") {
            $_SESSION["giris"] = "ok";
            header("Location: curl3DigerSayfa.php");
        }else {
            echo "Girilen bilgiler hatalı";
        }
    }
?>