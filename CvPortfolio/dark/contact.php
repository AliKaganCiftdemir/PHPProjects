<?php 
require_once "baglanti.php";

$selectSorguIletisimAyarlar = "SELECT * FROM ayarlar WHERE ayarlar_id = ?";
$selectIletisimAyarlar = $db -> prepare($selectSorguIletisimAyarlar);
$selectIletisimAyarlar -> execute(array(7));
$sonucSelectIletisimAyarlar = $selectIletisimAyarlar -> fetch(PDO::FETCH_ASSOC);

if (isset($_POST["submit"])) {
    $iletisimAdSoyad = $_POST["iletisimAdSoyad"];
    $iletisimEmail = $_POST["iletisimEmail"];
    $iletisimKonuBasligi = $_POST["iletisimKonuBasligi"];
    $iletisimMesaj = $_POST["iletisimMesaj"];


    $insertSorguIletisim = "INSERT INTO contact SET 
    contact_ad_soyad = ?, 
    contact_email = ?,
    contact_konu_basligi = ?,
    contact_aciklama = ?
    ";
    
    $insertIletisim = $db -> prepare($insertSorguIletisim);
    $sonucInsertIletisim = $insertIletisim -> execute(array(
        $iletisimAdSoyad,
        $iletisimEmail,
        $iletisimKonuBasligi,
        $iletisimMesaj
    ));

    if ($sonucInsertIletisim) {
        echo "<script>alert('Mesajınız Başarıyla Gönderilmiştir.'); window.location.href='contact.php'</script>";
    }else {
        echo "<script>alert('Mesaj Gönderme İşleminiz Başarısız Olmuştur.'); window.location.href='contact.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <!-- meta charset -->
        <meta charset="utf-8">
        <!-- site title -->
        <title><?php echo $sonucSelectIletisimAyarlar["ayarlar_title"];?></title>

        <meta name="keywords" content="<?php echo $sonucSelectIletisimAyarlar["ayarlar_keyword"];?>">
        <!-- meta description -->
        <meta name="description" content="<?php echo $sonucSelectIletisimAyarlar["ayarlar_description"];?>">
        <!-- mobile viwport meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- fevicon -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        
        <!-- ================================
        CSS Files
        ================================= -->
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i|Open+Sans:400,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="css/themefisher-fonts.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/dark.css">
        <link id="color-changer" rel="stylesheet" href="css/colors/color-0.css">
    </head>

    <body class="dark">

        <div class="preloader">
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
        </div>

        <main class="site-wrapper">
            <div class="pt-table">
                <div class="pt-tablecell page-contact relative">
                    <!-- .close -->
                    <a href="./" class="page-close"><i class="tf-ion-close"></i></a>
                    <!-- /.close -->

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                                <div class="page-title text-center">
                                    <h2> <span class="primary">BENİMLE İLETİŞİME GEÇEBİLİRSİNİZ.</span></h2>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam minus velit quam ipsa modi nisi unde est, facilis voluptate. Ut eaque maxime iusto neque porro, nemo saepe nam tempore et.</p>
                                </div>
                            </div>                            
                        </div> <!-- /.row -->

                        <div class="row">
                            <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                                <div class="contact-block">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="tf-envelope2"></i>
                                        </div>
                                        <div class="media-body">
                                            <h4>Email</h4>
                                            <p><a href="mailto:my_name@gmail.com">my_name@gmail.com</a></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.contact-block -->
                                <div class="contact-block">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="tf-phone2"></i>
                                        </div>
                                        <div class="media-body">
                                            <h4>Phone</h4>
                                            <p><a href="tel:+000-1111-2222">+000-1111-2222</a></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.contact-block -->
                                <div class="contact-block">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="tf-mobile"></i>
                                        </div>
                                        <div class="media-body">
                                            <h4>Skype</h4>
                                            <p><a href="skype:my_name">my_name</a></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.contact-block -->

                                <ul class="contact-social">
                                    <li>
                                        <span class="contact-social-hex"></span>
                                        <a href="www.fb.com/themefisher"><i class="tf-ion-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <span class="contact-social-hex"></span>
                                        <a href="www.twitter.com/themefisher"><i class="tf-ion-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <span class="contact-social-hex"></span>
                                        <a href="#"><i class="tf-ion-social-google"></i></a>
                                    </li>
                                    <li>
                                        <span class="contact-social-hex"></span>
                                        <a href="www.dribbble.com/themefisher"><i class="tf-ion-social-dribbble"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-md-offset-1 col-lg-offset-2">
                                <div class="section-title clear">
                                    <h3>Bana mesaj gönderebilirsiniz</h3>
                                    <span class="bar-dark"></span>
                                    <span class="bar-primary"></span>
                                </div>

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
                            </div> <!-- /.col- -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->

                    <nav class="page-nav clear">
                        <div class="container">
                            <div class="flex flex-middle space-between">
                                <span class="prev-page"><a href="info.php" class="link">&larr; Prev Page</a></span>
                                <span class="copyright hidden-xs">Tüm Hakları Saklıdır &copy; 2022, Ali Kağan Çiftdemir.</span>
                                <span class="next-page"><a href="index.php" class="link">Next Page &rarr;</a></span>
                            </div>
                        </div>
                        <!-- /.page-nav -->
                    </nav>
                    <!-- /.container -->

                </div> <!-- /.pt-tablecell -->
            </div> <!-- /.pt-table -->
        </main> <!-- /.site-wrapper -->

        <!-- ================================
        JavaScript Libraries
        ================================= -->
        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery-validation.min.js"></script>
        <script src="js/form.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>