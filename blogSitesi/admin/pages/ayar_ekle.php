<?php require_once "inc-functions.php"; ?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ayar Ekle | Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Tiny Editor -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php
        if (@$_POST["submit"]) {
            $ayarlarTitle = $_POST["ayarlarTitle"];
            $ayarlarAltBaslik = $_POST["ayarlarAltBaslik"];
            $ayarlarİkinciBaslik = $_POST["ayarlarİkinciBaslik"];
            $ayarlarAnahtarKelime = $_POST["ayarlarAnahtarKelime"];
            $ayarlarYazanKisi = $_POST["ayarlarYazanKisi"];

            $insertSorguAyarlar = "INSERT INTO ayarlar SET 
                    ayarlar_title = ?, 
                    ayarlar_alt_baslik = ?, 
                    ayarlar_ikinci_baslik = ?, 
                    ayarlar_anahtar_kelime = ?, 
                    ayarlar_yazan_kisi = ?
            ";

            $insertAyarlar = $db->prepare($insertSorguAyarlar);
            $sonucInsertAyarlar = $insertAyarlar->execute(array(
                $ayarlarTitle,
                $ayarlarAltBaslik,
                $ayarlarİkinciBaslik,
                $ayarlarAnahtarKelime,
                $ayarlarYazanKisi
            ));

            if ($sonucInsertAyarlar) {
                echo "<script>alert('İşleminiz Başarıyla Gerçekleşmiştir.'); window.location.href='ayarlar.php'</script>";
            } else {
                echo "<script>alert('İşleminiz Başarısız Olmuştur.'); window.location.href='ayarlar.php'</script>";
            }
        }
    ?>

    <div id="wrapper">

        <?php require_once 'inc-menu.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blog Ekle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="ayarlar.php" class="btn btn-primary">
                                < Geri Dön</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="ayarlarTitle" placeholder="Başlık Giriniz">
                                        </div>

                                        <div class="form-group">
                                            <label>Alt Başlık</label>
                                            <input class="form-control" name="ayarlarAltBaslik" placeholder="Alt Başlık Giriniz">
                                        </div>

                                        <div class="form-group">
                                            <label>İkinci Başlık</label>
                                            <textarea id="mytextarea" name="ayarlarİkinciBaslik"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Anahtar Kelime</label>
                                            <input class="form-control" name="ayarlarAnahtarKelime" placeholder="Anahtar Kelime Giriniz">
                                        </div>

                                        <div class="form-group">
                                            <label>Yazan Kişi</label>
                                            <input class="form-control" name="ayarlarYazanKisi" placeholder="Yazan Kişiyi Giriniz">
                                        </div>

                                        <input type="submit" name="submit" value="Kaydet" class="btn btn-default">
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>