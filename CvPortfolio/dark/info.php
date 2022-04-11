<?php 
    require_once "baglanti.php";

    $selectSorguInfo = "SELECT * FROM info";
    $selectInfo = $db -> prepare($selectSorguInfo);
    $selectInfo -> execute();
    $sonucSelectInfo = $selectInfo -> fetch(PDO::FETCH_ASSOC);

    $selectSorguInfoAyarlar = "SELECT * FROM ayarlar WHERE ayarlar_id = ?";
    $selectInfoAyarlar = $db -> prepare($selectSorguInfoAyarlar);
    $selectInfoAyarlar -> execute(array(6));
    $sonucSelectInfoAyarlar = $selectInfoAyarlar -> fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <!-- meta charset -->
        <meta charset="utf-8">
        <!-- site title -->
        <title><?php echo $sonucSelectInfoAyarlar["ayarlar_title"];?></title>
        
        <meta name="keywords" content="<?php echo $sonucSelectInfoAyarlar["ayarlar_keyword"];?>">
        <!-- meta description -->
        <meta name="description" content="<?php echo $sonucSelectInfoAyarlar["ayarlar_description"];?>">
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
                <div class="pt-tablecell page-quotes relative">
                    <!-- .close -->
                    <a href="./" class="page-close"><i class="tf-ion-close"></i></a>
                    <!-- /.close -->

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                                <div class="page-title text-center">
                                    <h2><span class="primary"><?php echo $sonucSelectInfo["info_baslik"];?></span><span class="title-bg">Speech</span></h2>
                                    <p><?php echo $sonucSelectInfo["info_aciklama"];?></p>
                                </div>
                            </div>                            
                        </div> <!-- /.row -->

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="testimonials">
                                    <div class="item clear">
                                        <figure class="thumb">
                                            <div class="tm-hex" style="background-image: url('img/tm.jpg');">
                                                <div class="hexTop"></div>
                                                <div class="hexBottom"></div>
                                            </div>
                                            <figcaption>
                                                <h4><?php echo $sonucSelectInfo["info_resim_baslik"];?></h4>
                                            </figcaption>
                                        </figure>
                                        <div class="text">
                                            <p><?php echo $sonucSelectInfo["info_resim_icerik"];?></p>
                                        </div>
                                    </div>
                                    <div class="item clear">
                                        <figure class="thumb">
                                            <div class="tm-hex" style="background-image: url('img/tm-2.jpg');">
                                                <div class="hexTop"></div>
                                                <div class="hexBottom"></div>
                                            </div>
                                            <figcaption>
                                                <h4><?php echo $sonucSelectInfo["info_resim_baslik"];?></h4>
                                            </figcaption>
                                        </figure>
                                        <div class="text">
                                            <p><?php echo $sonucSelectInfo["info_resim_icerik"];?> </p>
                                        </div>
                                    </div>
                                    <div class="item clear">
                                        <figure class="thumb">
                                            <div class="tm-hex" style="background-image: url('img/tm.jpg');">
                                                <div class="hexTop"></div>
                                                <div class="hexBottom"></div>
                                            </div>
                                            <figcaption>
                                                <h4><?php echo $sonucSelectInfo["info_resim_baslik"];?></h4>
                                            </figcaption>
                                        </figure>
                                        <div class="text">
                                            <p><?php echo $sonucSelectInfo["info_resim_icerik"];?></p>
                                        </div>
                                    </div>
                                    <div class="item clear">
                                        <figure class="thumb">
                                            <div class="tm-hex" style="background-image: url('img/tm-2.jpg');">
                                                <div class="hexTop"></div>
                                                <div class="hexBottom"></div>
                                            </div>
                                            <figcaption>
                                                <h4><?php echo $sonucSelectInfo["info_resim_baslik"];?></h4>
                                            </figcaption>
                                        </figure>
                                        <div class="text">
                                            <p><?php echo $sonucSelectInfo["info_resim_icerik"];?></p>
                                        </div>
                                    </div>
                                    <div class="item clear">
                                        <figure class="thumb">
                                            <div class="tm-hex" style="background-image: url('img/tm.jpg');">
                                                <div class="hexTop"></div>
                                                <div class="hexBottom"></div>
                                            </div>
                                            <figcaption>
                                                <h4><?php echo $sonucSelectInfo["info_resim_baslik"];?></h4>
                                            </figcaption>
                                        </figure>
                                        <div class="text">
                                            <p><?php echo $sonucSelectInfo["info_resim_icerik"];?></p>
                                        </div>
                                    </div>
                                    <div class="item clear">
                                        <figure class="thumb">
                                            <div class="tm-hex" style="background-image: url('img/tm-2.jpg');">
                                                <div class="hexTop"></div>
                                                <div class="hexBottom"></div>
                                            </div>
                                            <figcaption>
                                                <h4><?php echo $sonucSelectInfo["info_resim_baslik"];?></h4>
                                            </figcaption>
                                        </figure>
                                        <div class="text">
                                            <p><?php echo $sonucSelectInfo["info_resim_icerik"];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->

                    <nav class="page-nav clear">
                        <div class="container">
                            <div class="flex flex-middle space-between">
                                <span class="prev-page"><a href="works.php" class="link">&larr; Prev Page</a></span>
                                <span class="copyright hidden-xs">Tüm Haları Saklıdır &copy; 2022, Ali Kağan Çiftdemir.</span>
                                <span class="next-page"><a href="contact.php" class="link">Next Page &rarr;</a></span>
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