<?php require_once "../baglanti.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminAKÇ | İletişim</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
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
            $id = @$_GET["id"];
            if (@$_GET["is"] == "sil") {
                $deleteSorguAyarlar = "DELETE FROM ayarlar WHERE ayarlar_id = ?";
                $deleteAyarlar = $db -> prepare($deleteSorguAyarlar);
                $sonucDeleteAyarlar = $deleteAyarlar -> execute(array($id));

                if ($sonucDeleteAyarlar) {
                    echo "<script>alert('Silme İşlemi Başarıyla Gerçekleşmiştir.'); window.location.href='ayarlar.php'</script>";
                }else {
                    echo "<script>alert('Silme İşlemi Başarısız Olmuştur.'); window.location.href='ayarlar.php'</script>";
                }
            }
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Data Tables
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <a href="index.php" class="btn btn-warning">< Anasayfaya Dön</a>
                                <a href="ayar-ekle.php" class="btn btn-info">Ayar Ekle +</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Keyword</th>
                                            <th>Description</th>
                                            <th>Araçlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $selectSorguAyarlar = "SELECT * FROM ayarlar ORDER BY ayarlar_id ASC";
                                        $selectAyarlar = $db->prepare($selectSorguAyarlar);
                                        $selectAyarlar->execute();
                                        while ($sonucSelectAyarlar = $selectAyarlar->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $sonucSelectAyarlar["ayarlar_id"]; ?></td>
                                                <td><?php echo $sonucSelectAyarlar["ayarlar_title"]; ?></td>
                                                <td><?php echo $sonucSelectAyarlar["ayarlar_keyword"]; ?></td>
                                                <td><?php echo $sonucSelectAyarlar["ayarlar_description"]; ?></td>
                                                <td>
                                                    <a href="ayar-duzenle.php?id=<?php echo $sonucSelectAyarlar["ayarlar_id"];?>" class="btn btn-success">Düzenle</a>
                                                    <a href="ayarlar.php?is=sil&id=<?php echo $sonucSelectAyarlar["ayarlar_id"];?>" onclick="return confirm('Silmek istediğinize emin misiniz?')"  class="btn btn-danger">Sil</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.col -->
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
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
</body>

</html>