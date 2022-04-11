<?php 
    require_once "baglanti.php";

    $selectSorguMyHistory = "SELECT * FROM myhistory";
    $selectMyHistory = $db -> prepare($selectSorguMyHistory);
    $selectMyHistory -> execute();
    $sonucSelectMyHistory = $selectMyHistory -> fetch(PDO::FETCH_ASSOC);

    $selectSorguMyHistoryAyarlar = "SELECT * FROM ayarlar WHERE ayarlar_id = ?";
    $selectMyHistoryAyarlar = $db -> prepare($selectSorguMyHistoryAyarlar);
    $selectMyHistoryAyarlar -> execute(array(4));
    $sonucSelectMyHistoryAyarlar = $selectMyHistoryAyarlar -> fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <!-- meta charset -->
        <meta charset="utf-8">
        <!-- site title -->
        <title><?php echo $sonucSelectMyHistoryAyarlar["ayarlar_title"];?></title>
        
        <meta name="keywords" content="<?php echo $sonucSelectMyHistoryAyarlar["ayarlar_keyword"];?>">
        <!-- meta description -->
        <meta name="description" content="<?php echo $sonucSelectMyHistoryAyarlar["ayarlar_description"];?>">
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
                <div class="pt-tablecell page-resume relative">
                    <!-- .close -->
                    <a href="./" class="page-close"><i class="tf-ion-close"></i></a>
                    <!-- /.close -->

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                                <div class="page-title text-center">
                                    <h2><span class="primary"><?php echo $sonucSelectMyHistory["myhistory_baslik"];?></span></h2>
                                    <p><?php echo $sonucSelectMyHistory["myhistory_aciklama"];?></p>
                                </div>
                            </div>
                        </div> <!-- /.row -->

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="history-block">
                                    <div class="section-title light clear">
                                        <h3>Eğitim Hayatım</h3>
                                    </div>
                                    <!-- /.section-title -->
                                    <div class="history-scroller">
                                        <!-- /.history-item -->
                                        <div class="history-item">
                                            <div class="history-icon">
                                                <span class="history-hex"></span>
                                                <i class="tf-documents5"></i>
                                            </div>
                                            <div class="history-text">
                                                <h5><?php echo $sonucSelectMyHistory["myhistory_egitimler_baslik"];?></h5>
                                                <span><?php echo $sonucSelectMyHistory["myhistory_egitimler_tarih"];?></span>
                                                <p><?php echo $sonucSelectMyHistory["myhistory_egitimler_icerik"];?></p>
                                            </div>
                                        </div>
                                        <!-- /.history-item -->
                                        <div class="history-item">
                                            <div class="history-icon">
                                                <span class="history-hex"></span>
                                                <i class="tf-documents5"></i>
                                            </div>
                                            <div class="history-text">
                                                <h5>Merin Land College</h5>
                                                <span>2012 - 2014</span>
                                            </div>
                                        </div>
                                        <!-- /.history-item -->
                                        <div class="history-item">
                                            <div class="history-icon">
                                                <span class="history-hex"></span>
                                                <i class="tf-documents5"></i>
                                            </div>
                                            <div class="history-text">
                                                <h5>Merin Land College</h5>
                                                <span>2012 - 2014</span>
                                            </div>
                                        </div>
                                        <!-- /.history-item -->
                                        <div class="history-item">
                                            <div class="history-icon">
                                                <span class="history-hex"></span>
                                                <i class="tf-documents5"></i>
                                            </div>
                                            <div class="history-text">
                                                <h5>Merin Land College</h5>
                                                <span>2012 - 2014</span>
                                            </div>
                                        </div>
                                        <!-- /.history-item -->
                                    </div>
                                </div> <!-- /.history-block -->
                            </div> <!-- /.col -->
                            <div class="col-xs-12 col-sm-6">
                                <div class="history-block">
                                    <div class="section-title light clear">
                                        <h3>Tecrübelerim</h3>
                                    </div>
                                    <!-- /.section-title -->
                                    <div class="history-scroller">
                                        <!-- /.history-item -->
                                        <div class="history-item">
                                            <div class="history-icon">
                                                <span class="history-hex"></span>
                                                <i class="tf-documents5"></i>
                                            </div>
                                            <div class="history-text">
                                                <h5>Workcube</h5>
                                                <span>2019-2019</span>
                                                <p>Claritas est etiam processus dynamicus, qui <br> sequitur mutationem consuetudium lectorum.</p>
                                            </div>
                                        </div>
                                        <!-- /.history-item -->
                                        <div class="history-item">
                                            <div class="history-icon">
                                                <span class="history-hex"></span>
                                                <i class="tf-documents5"></i>
                                            </div>
                                            <div class="history-text">
                                                <h5>Merin Land College</h5>
                                                <span>2012 - 2014</span>
                                            </div>
                                        </div>
                                        <!-- /.history-item -->
                                        <div class="history-item">
                                            <div class="history-icon">
                                                <span class="history-hex"></span>
                                                <i class="tf-documents5"></i>
                                            </div>
                                            <div class="history-text">
                                                <h5>Merin Land College</h5>
                                                <span>2012 - 2014</span>
                                            </div>
                                        </div>
                                        <!-- /.history-item -->
                                        <div class="history-item">
                                            <div class="history-icon">
                                                <span class="history-hex"></span>
                                                <i class="tf-documents5"></i>
                                            </div>
                                            <div class="history-text">
                                                <h5>Merin Land College</h5>
                                                <span>2012 - 2014</span>
                                            </div>
                                        </div>
                                        <!-- /.history-item -->
                                    </div>
                                </div> <!-- /.history-block -->
                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->

                    <nav class="page-nav clear">
                        <div class="container">
                            <div class="flex flex-middle space-between">
                                <span class="prev-page"><a href="ability.php" class="link">&larr; Prev Page</a></span>
                                <span class="copyright hidden-xs">Tüm Haları Saklıdır &copy; 2022, Ali Kağan Çiftdemir.</span>
                                <span class="next-page"><a href="works.php" class="link">Next Page &rarr;</a></span>
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