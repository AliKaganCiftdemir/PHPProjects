<?php require_once "../baglanti.php";?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminAKÇ | Yaptıklarım</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php require_once "menuHeaderFooter/header.php"; ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php require_once "menuHeaderFooter/menu.php"; ?>

        <?php 
            if (isset($_POST["submit"])) {
                
                $worksBaslik = $_POST["worksBaslik"];
                $worksAciklama = $_POST["worksAciklama"];
                $worksAltBasliklar = $_POST["worksAltBasliklar"];

                $deleteSorguWorks = "DELETE FROM works";
                $deleteWorks = $db -> prepare($deleteSorguWorks);
                $sonucDeleteWorks = $deleteWorks -> execute();

                $insertSorguWorks = "INSERT INTO works SET 
                    works_baslik = ?, 
                    works_aciklama = ?,
                    works_alt_basliklar = ?
                ";
                $insertWorks = $db -> prepare($insertSorguWorks);
                $sonucInsertWorks = $insertWorks -> execute(array(
                    $worksBaslik,
                    $worksAciklama,
                    $worksAltBasliklar
                ));

                if ($sonucInsertWorks) { 
                    echo "<script>alert('İşleminiz Başarıyla Gerçekleşmiştir.'); window.location.href='works.php'</script>";
                } else {
                    echo "<script>alert('İşleminiz Başarısız Olmuştur.'); window.location.href='works.php'</script>";
                }
            }

            $selectSorguWorks = "SELECT * FROM works ORDER BY works_id DESC LIMIT 1";
            $selectWorks = $db -> prepare($selectSorguWorks);
            $selectWorks -> execute();
            $sonucSelectWorks = $selectWorks -> fetch(PDO::FETCH_ASSOC);
        ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Yaptıklarım Form
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Ansayfa</a></li>
                    <li><a href="#">Yaptıklarım</a></li>
                    <li class="active">Yaptıklarım Form</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- right column -->
                    <div class="col-md-6 col-lg-12">
                        <!-- general form elements disabled -->
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <a href="index.php" class="btn btn-warning ms-3">< Anasayfaya Dön</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form role="form" method="POST">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Başlık</label>
                                        <input type="text" class="form-control" value="<?php echo $sonucSelectWorks["works_baslik"];?>" name="worksBaslik" placeholder="Başlık Giriniz...">
                                    </div>
                                    <div class="form-group">
                                        <label>Açıklama</label>
                                        <textarea class="form-control" rows="3" name="worksAciklama" placeholder="Açıklama Giriniz..."><?php echo $sonucSelectWorks["works_aciklama"];?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Alt Başlıklar</label>
                                        <input type="text" class="form-control" value="<?php echo $sonucSelectWorks["works_alt_basliklar"];?>" name="worksAltBasliklar" placeholder="Alt Başlıkları Giriniz...">
                                    </div>
                                    

                                    <input type="submit" name="submit" value="Gönder" class="btn btn-info">
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require_once "menuHeaderFooter/footer.php"; ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>