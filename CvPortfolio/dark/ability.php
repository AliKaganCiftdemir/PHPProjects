<?php 
    require_once "baglanti.php";

    $selectSorguAbility = "SELECT * FROM ability";
    $selectAbility = $db -> prepare($selectSorguAbility);
    $selectAbility -> execute();
    $sonucSelectAbility = $selectAbility -> fetch(PDO::FETCH_ASSOC);

    $selectSorguAbilityAyarlar = "SELECT * FROM ayarlar WHERE ayarlar_id = ?";
    $selectAbilityAyarlar = $db -> prepare($selectSorguAbilityAyarlar);
    $selectAbilityAyarlar -> execute(array(3));
    $sonucSelectAbilityAyarlar = $selectAbilityAyarlar -> fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html class="no-js" >
    <head>
        <!-- meta charset -->
        <meta charset="utf-8">
        <!-- site title -->
        <title><?php echo $sonucSelectAbilityAyarlar["ayarlar_title"];?></title>

        <meta name="keywords" content="<?php echo $sonucSelectAbilityAyarlar["ayarlar_keyword"];?>">
        <!-- meta description -->
        <meta name="description" content="<?php echo $sonucSelectAbilityAyarlar["ayarlar_description"];?>">
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

        <section class="site-wrapper">
            <div class="pt-table">
                <div class="pt-tablecell page-services relative">
                    <a href="./" class="page-close"><i class="tf-ion-close"></i></a>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-lg-offset-1 col-lg-10">
                                <div class="page-title text-center">
                                    <h2><span class="primary"><?php echo $sonucSelectAbility["ability_baslik"];?></span></h2>
                                    <p><?php echo $sonucSelectAbility["ability_aciklama"];?></p>
                                </div>

                                <div class="hexagon-menu services clear">
                                    <div class="service-hex">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 372 424.5" style="enable-background:new 0 0 372 424.5;" xml:space="preserve">
                                            <g>
                                                <polygon class="st0" points="359.9,314.1 186.9,414 14,314.1 14,114.4 186.9,14.6 359.9,114.4"/>
                                                <polygon class="st1" points="331.2,297.6 186.9,380.9 42.6,297.6 42.6,131 186.9,47.6 331.2,131"/>
                                            </g>
                                        </svg>

                                        <div class="content">
                                            <div class="icon">
                                                <i class="et-line icon-lightbulb"></i>
                                            </div>
                                            <h4><?php echo $sonucSelectAbility["ability_yetenekler_baslik"];?></h4>
                                            <p><?php echo $sonucSelectAbility["ability_yetenekler_aciklama"];?></p>
                                        </div>
                                    </div>
                                    <div class="service-hex">

                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 372 424.5" style="enable-background:new 0 0 372 424.5;" xml:space="preserve">
                                            <g>
                                                <polygon class="st0" points="359.9,314.1 186.9,414 14,314.1 14,114.4 186.9,14.6 359.9,114.4"/>
                                                <polygon class="st1" points="331.2,297.6 186.9,380.9 42.6,297.6 42.6,131 186.9,47.6 331.2,131"/>
                                            </g>
                                        </svg>
                                        <div class="content">
                                            <div class="icon">
                                                <i class="et-line icon-mobile"></i>
                                            </div>
                                            <h4><?php echo $sonucSelectAbility["ability_yetenekler_baslik"];?></h4>
                                            <p><?php echo $sonucSelectAbility["ability_yetenekler_aciklama"];?></p>
                                        </div>
                                    </div>
                                    <div class="service-hex">

                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 372 424.5" style="enable-background:new 0 0 372 424.5;" xml:space="preserve">
                                            <g>
                                                <polygon class="st0" points="359.9,314.1 186.9,414 14,314.1 14,114.4 186.9,14.6 359.9,114.4"/>
                                                <polygon class="st1" points="331.2,297.6 186.9,380.9 42.6,297.6 42.6,131 186.9,47.6 331.2,131"/>
                                            </g>
                                        </svg>
                                        <div class="content">
                                            <div class="icon">
                                                <i class="et-line icon-profile-male"></i>
                                            </div>
                                            <h4><?php echo $sonucSelectAbility["ability_yetenekler_baslik"];?></h4>
                                            <p><?php echo $sonucSelectAbility["ability_yetenekler_aciklama"];?></p>
                                        </div>
                                    </div>
                                    <div class="service-hex">

                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 372 424.5" style="enable-background:new 0 0 372 424.5;" xml:space="preserve">
                                            <g>
                                                <polygon class="st0" points="359.9,314.1 186.9,414 14,314.1 14,114.4 186.9,14.6 359.9,114.4"/>
                                                <polygon class="st1" points="331.2,297.6 186.9,380.9 42.6,297.6 42.6,131 186.9,47.6 331.2,131"/>
                                            </g>
                                        </svg>
                                        <div class="content">
                                            <div class="icon">
                                                <i class="et-line icon-heart"></i>
                                            </div>
                                            <h4><?php echo $sonucSelectAbility["ability_yetenekler_baslik"];?></h4>
                                            <p><?php echo $sonucSelectAbility["ability_yetenekler_aciklama"];?></p>
                                        </div>
                                    </div>
                                    <div class="service-hex">

                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 372 424.5" style="enable-background:new 0 0 372 424.5;" xml:space="preserve">
                                            <g>
                                                <polygon class="st0" points="359.9,314.1 186.9,414 14,314.1 14,114.4 186.9,14.6 359.9,114.4"/>
                                                <polygon class="st1" points="331.2,297.6 186.9,380.9 42.6,297.6 42.6,131 186.9,47.6 331.2,131"/>
                                            </g>
                                        </svg>
                                        <div class="content">
                                            <div class="icon">
                                                <i class="et-line icon-hotairballoon"></i>
                                            </div>
                                            <h4><?php echo $sonucSelectAbility["ability_yetenekler_baslik"];?></h4>
                                            <p><?php echo $sonucSelectAbility["ability_yetenekler_aciklama"];?></p>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- /.col-xs-12 -->

                        </div> <!-- /.row -->
                    </div> <!-- /.container -->

                    <nav class="page-nav clear">
                        <div class="container">
                            <div class="flex flex-middle space-between">
                                <span class="prev-page"><a href="about.php" class="link">&larr; Prev Page</a></span>
                                <span class="copyright hidden-xs">Tüm Haları Saklıdır &copy; 2022, Ali Kağan Çiftdemir.</span>
                                <span class="next-page"><a href="myHistory.php" class="link">Next Page &rarr;</a></span>
                            </div>
                        </div>
                        <!-- /.page-nav -->
                    </nav>
                    <!-- /.container -->

                </div> <!-- /.pt-tablecell -->
            </div> <!-- /.pt-table -->
        </section> <!-- /.site-wrapper -->
        
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