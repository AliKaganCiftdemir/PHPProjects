<?php 
require_once "admin/pages/inc-functions.php";

$selectSorguIletisimAyarlar = "SELECT * FROM ayarlar WHERE ayarlar_id = ?";
$selectIletisimAyarlar = $db -> prepare($selectSorguIletisimAyarlar);
$selectIletisimAyarlar -> execute(array(3));
$sonucSelectIletisimAyarlar = $selectIletisimAyarlar -> fetch(PDO::FETCH_ASSOC);

if (@$_POST["submit"]) {
    $adSoyad = $_POST["adSoyad"];
    $mailAdres = $_POST["mailAdres"];
    $telefon = $_POST["telefon"];
    $mesaj = $_POST["mesaj"];

    $insertSorguIletisim = "INSERT INTO iletisim SET 
    iletisim_ad = ?, 
    iletisim_email = ?,
    iletisim_tel = ?,
    iletisim_mesaj = ?
    ";
    
    $insertIletisim = $db -> prepare($insertSorguIletisim);
    $sonucInsertIletisim = $insertIletisim -> execute(array(
        $adSoyad,
        $mailAdres,
        $telefon,
        $mesaj
    ));

    if ($sonucInsertIletisim) {
        echo "<script>alert('Mesajınız Başarıyla Gönderilmiştir.'); window.location.href='iletisim.php'</script>";
    }else {
        echo "<script>alert('Mesaj Gönderme İşleminiz Başarısız Olmuştur.'); window.location.href='iletisim.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $sonucSelectIletisimAyarlar["ayarlar_title"];?></title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <?php require "includes/inc-menu.php";?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1><?php echo $sonucSelectIletisimAyarlar["ayarlar_alt_baslik"];?></h1>
                            <span class="subheading"><?php echo $sonucSelectIletisimAyarlar["ayarlar_ikinci_baslik"];?></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Lütfen formu doğru bir şekilde doldurunuz, sizinle en kısa sürede iletişime geçeceğiz.</p>
                        <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <form method="POST">
                                <div class="form-floating">
                                    <input class="form-control" name="adSoyad" type="text" placeholder="Ad Soyad Giriniz..." required/>
                                    <label for="name">Ad Soyad</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" name="mailAdres" type="email" placeholder="E-mail Adresinizi Giriniz..." required/>
                                    <label for="email">E-mail adres</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" name="telefon" type="tel" placeholder="Telefon Numaranızı Giriniz..." required/>
                                    <label for="phone">Telefon</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" name="mesaj" placeholder="İletmek İstediğiniz Mesajı Giriniz..." style="height: 12rem" required></textarea>
                                    <label for="message">Mesaj</label>
                                </div>
                                <br />
                                <!-- Submit Button-->
                                <input type="submit" name="submit" class="btn btn-primary" value="Gönder">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <?php require "includes/inc-footer.php";?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
