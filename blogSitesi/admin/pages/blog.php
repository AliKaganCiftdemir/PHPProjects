<?php require_once "inc-functions.php";?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bloglar | Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
    $id = @$_GET["id"];
    if (@$_GET["is"] == "aktif") {
        if (@$_GET["drm"] == 1) {
            $durum = 0;
        }else {
            $durum = 1;
        }

        $sqlAktifGet = "UPDATE blog SET aktif = ? WHERE id = ?";
        $aktifGet = $db -> prepare($sqlAktifGet);
        $sonucAktifGet = $aktifGet -> execute(array(
            $durum, 
            $id
        ));

        if ($sonucAktifGet) { // Burada $sonucAktifGet else'e de düşse çalışıyor sadece alert olarak olumsuz olduğunu söylüyor ama if'teki gibi işlemini doğru yapıyor. Hatayı bul
            echo "<script>alert('Aktiflik Değiştirme İşlemi Başarıyla Gerçekleşmiştir.'); window.location.href='blog.php'</script>";
        }else {
            echo "<script>alert('Aktiflik Değiştirme İşlemi Başarısız Olmuştur.'); window.location.href='blog.php'</script>";
        }
    }

    if (@$_GET["is"] == "sil") {
        $sqlSilGet = "DELETE FROM blog WHERE id = ?";
        $silGet = $db -> prepare($sqlSilGet);
        $sonucSilGet = $silGet -> execute(array(
            $id
        ));

        if ($sonucSilGet) { // Burada $sonucAktifGet else'e de düşse çalışıyor sadece alert olarak olumsuz olduğunu söylüyor ama if'teki gibi işlemini doğru yapıyor. Hatayı bul
            echo "<script>alert('Silme İşlemi Başarıyla Gerçekleşmiştir.'); window.location.href='blog.php'</script>";
        }else {
            echo "<script>alert('Silme İşlemi Başarısız Olmuştur.'); window.location.href='blog.php'</script>";
        }
    }

 
?>

    <div id="wrapper">

        <?php require_once "inc-menu.php";?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blog Yazıları</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="blog_ekle.php" class="btn btn-primary">Blog Ekle +</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Başlık</th>
                                            <th>Tarih</th>
                                            <th>Aktif</th>
                                            <th>Araçlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $selectSorguBlog = "SELECT * FROM blog ORDER BY id ASC";
                                        $selectBlog = $db -> prepare($selectSorguBlog);
                                        $selectBlog -> execute();
                                        while ($sonucSelectBlog = $selectBlog -> fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $sonucSelectBlog["id"];?></td>
                                            <td><?php echo $sonucSelectBlog["baslik"];?></td>
                                            <td><?php echo $sonucSelectBlog["tarih"];?></td>
                                            <td class="center">
                                                <?php if ($sonucSelectBlog["aktif"] == 1) { ?>
                                                    <!--Verilen linklerde bulunan id = o satırın id'si 
                                                        Verilen linklerde bulunan is = o linkte yapmak istediğimiz işin ne olduğudur (Örneğin is=sil ise silme işlemi yapılır. is=aktif ise aktiflik durumuna bakacağız demektir.)
                                                        Verilen linklerde bulunan drm = o satırın aktiflik pasiflik durumunun kontrolü-->
                                                    <a href="blog.php?is=aktif&id=<?php echo $sonucSelectBlog["id"]?>&drm=<?php echo $sonucSelectBlog["aktif"]?>" onclick="return confirm('Aktiflik durumu değişsin mi?')" class="btn btn-success" style="width:85px; height: 35px;">Aktif</a>
                                                <?php }else { ?>
                                                    <a href="blog.php?is=aktif&id=<?php echo $sonucSelectBlog["id"]?>&drm=<?php echo $sonucSelectBlog["aktif"]?>" onclick="return confirm('Aktiflik durumu değişsin mi?')" class="btn btn-danger" style="width:85px; height: 35px;">Pasif</a>
                                                <?php }  ?>
                                            </td>
                                            <td class="center">
                                                <a href="blog_duzenle.php?id=<?php echo $sonucSelectBlog["id"]?>" class="btn btn-success" style="width:85px; height: 35px;">Düzenle</a>
                                                <a href="blog.php?is=sil&id=<?php echo $sonucSelectBlog["id"]?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-danger" style="width:85px; height: 35px;">Sil</a>
                                            </td>
                                        </tr>
                                    <?php } ?>   
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
