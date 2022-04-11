<?php 
    require_once "baglanti.php";

    $selectSorguAbout = "SELECT * FROM about";
    $selectAbout = $db -> prepare($selectSorguAbout);
    $selectAbout -> execute();
    $sonucSelectAbout = $selectAbout -> fetch(PDO::FETCH_ASSOC);

    $selectSorguAboutAyarlar = "SELECT * FROM ayarlar WHERE ayarlar_id = ?";
    $selectAboutAyarlar = $db -> prepare($selectSorguAboutAyarlar);
    $selectAboutAyarlar -> execute(array(2));
    $sonucSelectAboutAyarlar = $selectAboutAyarlar -> fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <!-- meta charset -->
        <meta charset="utf-8">
        <!-- site title -->
        <title><?php echo $sonucSelectAboutAyarlar["ayarlar_title"];?></title>
       
        <meta name="keywords" content="<?php echo $sonucSelectAboutAyarlar["ayarlar_keyword"];?>">
        <!-- meta description -->
        <meta name="description" content="<?php echo $sonucSelectAboutAyarlar["ayarlar_description"];?>">
        <!-- mobile viwport meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- fevicon -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        
        <!-- ================================
        CSS Files
        ================================= -->
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i|Open+Sans:400,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="css/themefisher-fonts.min.css">
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
                <div class="pt-tablecell page-about relative">
                    <!-- .close -->
                    <a href="./" class="page-close"><i class="tf-ion-close"></i></a>
                    <!-- /.close -->

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                                <div class="page-title text-center">
                                    <h2><span class="primary"><?php echo $sonucSelectAbout["about_baslik"];?></span></h2>
                                    <p><?php echo $sonucSelectAbout["about_aciklama"]?></p>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="about-author">
                                    <figure class="author-thumb">
                                        <img src="img/author.jpg" alt="">
                                    </figure> <!-- /.author-bio -->
                                    <div class="author-desc">
                                        <p><b>DOĞUM TARİHİM:</b> 11 AĞUSTOS 1998</p>
                                        <p><b>DİLLER:</b> İNGİLİZCE</p>
                                        <p><b>UZMANLIK:</b> WEB GELİŞTİRME</p>
                                    </div>
                                    <!-- /.author-desc -->
                                </div> <!-- /.about-author -->
                                <p><?php echo $sonucSelectAbout["about_resim_aciklama"]?></p>
                            </div> <!-- /.col -->

                            <div class="col-xs-12 col-md-6">
                                <div class="section-title clear">
                                    <h3>Bilgisayar Bilgisi</h3>
                                </div>
                                <div class="skill-wrapper">
                                    <div class="progress clear">
                                        <div class="skill-name">PHP</div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="75%"></div>
                                    </div> <!-- /.progress -->
                                    <div class="progress clear">
                                        <div class="skill-name">Java</div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="75%"></div>
                                    </div> <!-- /.progress -->
                                    <div class="progress clear">
                                        <div class="skill-name">MYSQL</div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="75%"></div>
                                    </div> <!-- /.progress -->
                                    <div class="progress clear">
                                        <div class="skill-name">MSSQL</div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="75%"></div>
                                    </div> <!-- /.progress -->
                                    <div class="progress clear">
                                        <div class="skill-name">HTML</div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="75%"></div>
                                    </div> <!-- /.progress -->
                                    <div class="progress clear">
                                        <div class="skill-name">CSS</div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="75%"></div>
                                    </div> <!-- /.progress -->
                                    <div class="progress clear">
                                        <div class="skill-name">Bootstrap</div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="75%"></div>
                                    </div> <!-- /.progress -->
                                    <div class="progress clear">
                                        <div class="skill-name">JQuery</div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="25%"></div>
                                    </div> <!-- /.progress -->
                                </div> <!-- /.skill-wrapper -->
                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->

                    <nav class="page-nav clear">
                        <div class="container">
                            <div class="flex flex-middle space-between">
                                <span class="prev-page"><a href="welcome.php" class="link">&larr; Prev Page</a></span>
                                <span class="copyright hidden-xs">Tüm Haları Saklıdır &copy; 2022, Ali Kağan Çiftdemir.</span>
                                <span class="next-page"><a href="ability.php" class="link">Next Page &rarr;</a></span>
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
        <script src="js/main.js"></script>
    </body>
</html>