<?php 
    require_once "baglanti.php";

    $selectSorguWorks = "SELECT * FROM works";
    $selectWorks = $db -> prepare($selectSorguWorks);
    $selectWorks -> execute();
    $sonucSelectWorks = $selectWorks -> fetch(PDO::FETCH_ASSOC);

    $selectSorguWorksAyarlar = "SELECT * FROM ayarlar WHERE ayarlar_id = ?";
    $selectWorksAyarlar = $db -> prepare($selectSorguWorksAyarlar);
    $selectWorksAyarlar -> execute(array(5));
    $sonucSelectWorksAyarlar = $selectWorksAyarlar -> fetch(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <!-- meta charset -->
        <meta charset="utf-8">
        <!-- site title -->
        <title><?php echo $sonucSelectWorksAyarlar["ayarlar_title"];?></title>

        <meta name="keywords" content="<?php echo $sonucSelectWorksAyarlar["ayarlar_keyword"];?>">
        <!-- meta description -->
        <meta name="description" content="<?php echo $sonucSelectWorksAyarlar["ayarlar_description"];?>">
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
                <div class="pt-tablecell page-works relative">
                    <!-- .close -->
                    <a href="./" class="page-close"><i class="tf-ion-close">    </i></a>
                    <!-- /.close -->

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                                <div class="page-title text-center">
                                    <h2><span class="primary"><?php echo $sonucSelectWorks["works_baslik"];?></span> <span class="title-bg">works</span></h2>
                                    <p><?php echo $sonucSelectWorks["works_aciklama"];?></p>
                                </div>
                            </div>                            
                        </div> <!-- /.row -->

                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="filter list-inline">
                                    <li><a href="#" class="active" data-filter="*">PHP</a></li>
                                    <li><a href="#" data-filter=".Photoshop">Java</a></li>
                                    <li><a href="#" data-filter=".Illustrator">HTML</a></li>
                                    <li><a href="#" data-filter=".Indesign">CSS</a></li>
                                    <li><a href="#" data-filter=".Artworks">Bootstrap</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row isotope-gutter">
                            <div class="col-xs-12 col-sm-6 col-md-4 Photoshop Illustrator">
                                <figure class="works-item">
                                    <img src="img/works/1.jpg" alt="">
                                    <div class="overlay"></div>
                                    <figcaption class="works-inner">
                                        <h4><?php echo $sonucSelectWorks["works_alt_basliklar"];?></h4>
                                        <p>PHP Ve MySQL</p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 Illustrator">
                                <figure class="works-item">
                                    <img src="img/works/2.jpg" alt="">
                                    <div class="overlay"></div>
                                    <figcaption class="works-inner">
                                        <h4><?php echo $sonucSelectWorks["works_alt_basliklar"];?></h4>
                                        <p>Illustration, Digital Art</p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 Indesign Photoshop">
                                <figure class="works-item">
                                    <img src="img/works/3.jpg" alt="">
                                    <div class="overlay"></div>
                                    <figcaption class="works-inner">
                                        <h4><?php echo $sonucSelectWorks["works_alt_basliklar"];?></h4>
                                        <p>Illustration, Digital Art</p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 Artworks Illustrator">
                                <figure class="works-item">
                                    <img src="img/works/4.jpg" alt="">
                                    <div class="overlay"></div>
                                    <figcaption class="works-inner">
                                        <h4><?php echo $sonucSelectWorks["works_alt_basliklar"];?></h4>
                                        <p>Illustration, Digital Art</p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 Photoshop">
                                <figure class="works-item">
                                    <img src="img/works/5.jpg" alt="">
                                    <div class="overlay"></div>
                                    <figcaption class="works-inner">
                                        <h4><?php echo $sonucSelectWorks["works_alt_basliklar"];?></h4>
                                        <p>Illustration, Digital Art</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->

                    <nav class="page-nav clear">
                        <div class="container">
                            <div class="flex flex-middle space-between">
                                <span class="prev-page"><a href="myHistory.php" class="link">&larr; Prev Page</a></span>
                                <span class="copyright hidden-xs">Tüm Haları Saklıdır &copy; 2022, Ali Kağan Çiftdemir.</span>
                                <span class="next-page"><a href="info.php" class="link">Next Page &rarr;</a></span>
                            </div>
                        </div>
                        <!-- /.page-nav -->
                    </nav>
                    <!-- /.container -->
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