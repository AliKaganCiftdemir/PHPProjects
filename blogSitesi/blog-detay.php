<?php 
    require_once "admin/pages/inc-functions.php";
    @$id = $_GET["id"];

    $selectSorguBlogDetay = "SELECT * FROM blog WHERE id = ?";
    $selectBlogDetay = $db -> prepare($selectSorguBlogDetay);
    $selectBlogDetay -> execute(array($id));
    $sonucSelectBlogDetay = $selectBlogDetay -> fetch(PDO::FETCH_ASSOC);

    $selectSorguBlogDetayAyarlar = "SELECT * FROM ayarlar WHERE ayarlar_id = ?";
    $selectBlogDetayAyarlar = $db -> prepare($selectSorguBlogDetayAyarlar);
    $selectBlogDetayAyarlar -> execute(array(5));
    $sonucSelectBlogDetayAyarlar = $selectBlogDetayAyarlar -> fetch(PDO::FETCH_ASSOC);

    if ($sonucSelectBlogDetay["aktif"] == 0) {
        echo "<script>alert('Aradığınız ID Değeri Aktif Değil.'); window.location.href='index.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $sonucSelectBlogDetay["baslik"]?></title>
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
        <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo $sonucSelectBlogDetay["baslik"];?></h1>
                            <h2 class="subheading"><?php echo $sonucSelectBlogDetay["alt_baslik"];?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?php echo $sonucSelectBlogDetayAyarlar["ayarlar_yazan_kisi"];?></a>
                                <?php echo $sonucSelectBlogDetay["tarih"];?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <?php echo $sonucSelectBlogDetay["aciklama"];?>
                    </div>
                </div>
            </div>
        </article>
        <!-- Footer-->
        <?php require "includes/inc-footer.php";?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>