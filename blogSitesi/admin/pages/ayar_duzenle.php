<?php require_once "inc-functions.php";?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ayar Düzenle | Panel</title>

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
        $ayarlardId = $_GET["id"]; 

        $selectSorguAyarDuzenle = "SELECT * FROM ayarlar WHERE ayarlar_id = ?";
        $selectAyarDuzenle = $db -> prepare($selectSorguAyarDuzenle);
        $selectAyarDuzenle -> execute(array($ayarlardId));
        $sonucSelectAyarDuzenle = $selectAyarDuzenle -> fetch(PDO::FETCH_ASSOC);

        if (@$_POST["submit"]) {
            $ayarDuzenleTitle = $_POST["ayarDuzenleTitle"];
            $ayarDuzenleAltBaslik = $_POST["ayarDuzenleAltBaslik"];
            $ayarDuzenleİkinciBaslik = $_POST["ayarDuzenleİkinciBaslik"];
            $ayarDuzenleAnahtarKelime = $_POST["ayarDuzenleAnahtarKelime"];
            $ayarDuzenleYazanKisi = $_POST["ayarDuzenleYazanKisi"];

            $updateSorguAyarDuzenle = "UPDATE ayarlar SET 
                ayarlar_title = ?, 
                ayarlar_alt_baslik = ?, 
                ayarlar_ikinci_baslik = ?, 
                ayarlar_anahtar_kelime = ?,
                ayarlar_yazan_kisi = ?
                WHERE ayarlar_id = ?
            ";
            
            $updateAyarDuzenle = $db -> prepare($updateSorguAyarDuzenle);
            $sonucUpdateAyarDuzenle = $updateAyarDuzenle -> execute(array(
                $ayarDuzenleTitle,
                $ayarDuzenleAltBaslik,
                $ayarDuzenleİkinciBaslik,
                $ayarDuzenleAnahtarKelime,
                $ayarDuzenleYazanKisi,
                $ayarlardId
            ));

            if ($sonucUpdateAyarDuzenle) {
                echo "<script>alert('İşleminiz Başarıyla Gerçekleşmiştir.'); window.location.href='ayarlar.php?id=$ayarlardId'</script>";
            }else {
                echo "<script>alert('İşleminiz Başarısız Olmuştur.'); window.location.href='ayarlar.php?id=$ayarlardId'</script>";
            }
        }
    ?>    

    <div id="wrapper">

        <?php require_once 'inc-menu.php';?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ayar Düzenle | <?php echo $ayarlardId; ?> Numaralı id</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="ayarlar.php" class="btn btn-primary">< Geri Dön</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="ayarDuzenleTitle" value="<?php echo $sonucSelectAyarDuzenle["ayarlar_title"]?>" placeholder="Başlık Giriniz">
                                        </div>

                                        <div class="form-group">
                                            <label>Alt Başlık</label>
                                            <input class="form-control" name="ayarDuzenleAltBaslik" value="<?php echo $sonucSelectAyarDuzenle["ayarlar_alt_baslik"]?>" placeholder="Alt Başlık Giriniz">
                                        </div>

                                        <div class="form-group">
                                            <label>ikinci Başlık</label>
                                            <textarea id="mytextarea" name="ayarDuzenleİkinciBaslik"><?php echo $sonucSelectAyarDuzenle["ayarlar_ikinci_baslik"]?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Anahtar Kelime</label>
                                            <input class="form-control" name="ayarDuzenleAnahtarKelime" value="<?php echo $sonucSelectAyarDuzenle["ayarlar_anahtar_kelime"]?>" placeholder="Alt Başlık Giriniz">
                                        </div>

                                        <div class="form-group">
                                            <label>Yazan Kişi</label>
                                            <input class="form-control" name="ayarDuzenleYazanKisi" value="<?php echo $sonucSelectAyarDuzenle["ayarlar_yazan_kisi"]?>" placeholder="Alt Başlık Giriniz">
                                        </div>

                                        <input type="submit" name="submit" value="Güncelle" class="btn btn-default">
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
