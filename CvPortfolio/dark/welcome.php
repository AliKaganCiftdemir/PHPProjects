<?php 
    require_once "baglanti.php";

    $selectSorguWelcome = "SELECT * FROM welcome";
    $selectWelcome = $db -> prepare($selectSorguWelcome);
    $selectWelcome -> execute();
    $sonucSelectWelcome = $selectWelcome -> fetch(PDO::FETCH_ASSOC);

    $selectSorguWelcomeAyarlar = "SELECT * FROM ayarlar WHERE ayarlar_id = ?";
    $selectWelcomeAyarlar = $db -> prepare($selectSorguWelcomeAyarlar);
    $selectWelcomeAyarlar -> execute(array(1));
    $sonucSelectWelcomeAyarlar = $selectWelcomeAyarlar -> fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <!-- meta charset -->
        <meta charset="utf-8">
        <!-- site title -->
        <title><?php echo $sonucSelectWelcomeAyarlar["ayarlar_title"];?></title>

        <meta name="keywords" content="<?php echo $sonucSelectWelcomeAyarlar["ayarlar_keyword"];?>">
        <!-- meta description -->
        <meta name="description" content="<?php echo $sonucSelectWelcomeAyarlar["ayarlar_description"];?>">
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
                <div class="pt-tablecell page-welcome relative">
                    <!-- .close -->
                    <a href="./" class="page-close"><i class="tf-ion-close"></i></a>
                    <!-- /.close -->

                    <div class="author-image-large">
                        <img src="img/author.png" alt="">
                    </div>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-7">
                                <div class="page-title">
                                    <h2><span class="primary"><?php echo $sonucSelectWelcome["welcome_baslik"];?></span></h2>
                                    <p><?php echo $sonucSelectWelcome["welcome_aciklama"];?></p>
                                </div>
                            </div>
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->

                    <nav class="page-nav clear">
                        <div class="container">
                            <div class="flex flex-middle space-between">
                                <span class="prev-page"><a href="index.php" class="link">&larr; Prev Page</a></span>
                                <span class="copyright hidden-xs">Tüm Haları Saklıdır &copy; 2022, Ali Kağan Çiftdemir.</span>
                                <span class="next-page"><a href="about.php" class="link">Next Page &rarr;</a></span>
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