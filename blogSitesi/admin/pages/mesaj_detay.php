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

        $updateSorguMesajDetay = "UPDATE iletisim SET iletisim_okundu = ? WHERE iletisim_id = ?";
        $updateMesajDetay = $db -> prepare($updateSorguMesajDetay);
        $sonucUpdateMesajDetay = $updateMesajDetay -> execute(array(
            1,
            $id
        ));

        $selectSorguMesajDetay = "SELECT * FROM iletisim WHERE iletisim_id = ?";
        $selecMesajDetay = $db -> prepare($selectSorguMesajDetay);
        $selecMesajDetay -> execute(array($id));
        $sonucSelectMesajDetay = $selecMesajDetay -> fetch(PDO::FETCH_ASSOC);
    ?>    

    <div id="wrapper">

        <?php require_once 'inc-menu.php';?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mesaj | <?php echo $id; ?> Numaralı id</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="mesaj.php" class="btn btn-primary">< Geri Dön</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Ad Soyad</label>
                                            <input class="form-control" name="adSoyad" value="<?php echo $sonucSelectMesajDetay["iletisim_ad"]?>">
                                        </div>

                                        <div class="form-group">
                                            <label>E-Mail</label>
                                            <input class="form-control" name="email" value="<?php echo $sonucSelectMesajDetay["iletisim_email"]?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Telefon</label>
                                            <input class="form-control" name="telefon" value="<?php echo $sonucSelectMesajDetay["iletisim_tel"]?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Mesaj</label>
                                            <input class="form-control" name="mesaj" value="<?php echo $sonucSelectMesajDetay["iletisim_mesaj"]?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Tarih</label>
                                            <input class="form-control" name="tarih" value="<?php echo $sonucSelectMesajDetay["iletisim_tarih"]?>">
                                        </div>
                                        
                                        <a href="mesaj.php?is=sil&id=<?php echo $sonucSelectMesajDetay["iletisim_id"]?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-danger" style="width:85px; height: 35px;">Sil</a>
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
