<?php require_once "inc-functions.php";?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Düzenle | Panel</title>

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
        $id = $_GET["id"]; 

        $selectSorguBlogDuzenle = "SELECT * FROM blog WHERE id = ?";
        $selectBlogDuzenle = $db -> prepare($selectSorguBlogDuzenle);
        $selectBlogDuzenle -> execute(array($id));
        $sonucSelectBlogDuzenle = $selectBlogDuzenle -> fetch(PDO::FETCH_ASSOC);

        if (@$_POST["submit"]) {
            $baslik = $_POST["baslik"];
            $alt_baslik = $_POST["alt_baslik"];
            $aciklama = $_POST["aciklama"];
            $aktif = $_POST["aktif"];

            $updateSorguBlogDuzenle = "UPDATE blog SET baslik = ?, alt_baslik = ?, aciklama = ?, aktif = ? WHERE id = ?";
            $updateBlogDuzenle = $db -> prepare($updateSorguBlogDuzenle);
            $sonucUpdateBlogDuzenle = $updateBlogDuzenle -> execute(array(
                $baslik,
                $alt_baslik,
                $aciklama,
                $aktif,
                $id
            ));

            if ($sonucUpdateBlogDuzenle) {
                echo "<script>alert('İşleminiz Başarıyla Gerçekleşmiştir.'); window.location.href='blog.php?id=$id'</script>";
            }else {
                echo "<script>alert('İşleminiz Başarısız Olmuştur.'); window.location.href='blog.php?id=$id'</script>";
            }
        }
    ?>    

    <div id="wrapper">

        <?php require_once 'inc-menu.php';?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blog Düzenle | <?php echo $id; ?> Numaralı id</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="blog.php" class="btn btn-primary">< Geri Dön</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Başlık</label>
                                            <input class="form-control" name="baslik" value="<?php echo $sonucSelectBlogDuzenle["baslik"]?>" placeholder="Başlık Giriniz">
                                        </div>

                                        <div class="form-group">
                                            <label>Alt Başlık</label>
                                            <input class="form-control" name="alt_baslik" value="<?php echo $sonucSelectBlogDuzenle["alt_baslik"]?>" placeholder="Alt Başlık Giriniz">
                                        </div>

                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea id="mytextarea" name="aciklama"><?php echo $sonucSelectBlogDuzenle["aciklama"]?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Durum</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif" value="1" <?php echo ($sonucSelectBlogDuzenle["aktif"] == 1) ? 'checked' : '';?>>Aktif
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif" value="0" <?php echo ($sonucSelectBlogDuzenle["aktif"] == 0) ? 'checked' : '';?>>Pasif
                                                </label>
                                            </div>
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
