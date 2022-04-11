<?php 
session_start();
require_once "admin/pages/inc-functions.php";

$selectSorguAnasayfaAyarlar = "SELECT * FROM ayarlar WHERE ayarlar_id = ?";
$selectAnasayfaAyarlar = $db -> prepare($selectSorguAnasayfaAyarlar);
$selectAnasayfaAyarlar -> execute(array(1));
$sonucSelectAnasayfaAyarlar = $selectAnasayfaAyarlar -> fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $sonucSelectAnasayfaAyarlar["ayarlar_title"];?></title>
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
        <?php require "includes/inc-menu.php"; ?>
       
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1><?php echo $sonucSelectAnasayfaAyarlar["ayarlar_alt_baslik"];?></h1>
                            <span class="subheading"><?php echo $sonucSelectAnasayfaAyarlar["ayarlar_ikinci_baslik"];?></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php
                        @$kelime = $_GET["srch"];
                        if ($kelime) { // Eğer arama yapıldıysa bu sorgu çalışsın
                            $selectSorguIndex = "SELECT * FROM blog WHERE aktif = ? AND baslik LIKE ? ORDER BY id DESC";
                            $selectIndex = $db -> prepare($selectSorguIndex);
                            $selectIndex -> execute(array(
                                1,
                                "%$kelime%"
                            ));
                        }else { // Eğer arama yapılmadıysa varsayılan değerler gelsin
                            $selectSorguIndex = "SELECT * FROM blog WHERE aktif = ? ORDER BY id DESC";
                            $selectIndex = $db -> prepare($selectSorguIndex);  
                            $selectIndex -> execute(array(1));       
                        }
                        while($sonucSelectIndex = $selectIndex -> fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="post-preview">
                        <a href="blog-detay.php?id=<?php echo $sonucSelectIndex["id"];?>">
                            <h2 class="post-title"><?php echo $sonucSelectIndex["baslik"];?></h2>
                            <h3 class="post-subtitle"><?php echo $sonucSelectIndex["alt_baslik"];?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!"><?php echo $sonucSelectAnasayfaAyarlar["ayarlar_yazan_kisi"];?></a>
                            <?php echo $sonucSelectIndex["tarih"];?>
                        </p>
                    </div>
                    <hr class="my-4" />
                    <?php } ?>
                    
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <?php require "includes/inc-footer.php";?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
