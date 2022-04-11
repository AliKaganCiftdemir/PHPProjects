<?php require_once "inc-functions.php";?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ayarlar | Panel</title>

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

    <div id="wrapper">

        <?php
            require_once "inc-menu.php";
            $id = @$_GET["id"];

            if (@$_GET["is"] == "sil") {
                $sqlSilGet = "DELETE FROM ayarlar WHERE ayarlar_id = ?";
                $silGet = $db -> prepare($sqlSilGet);
                $sonucSilGet = $silGet -> execute(array(
                    $id
                ));
        
                if ($sonucSilGet) { // Burada $sonucAktifGet else'e de düşse çalışıyor sadece alert olarak olumsuz olduğunu söylüyor ama if'teki gibi işlemini doğru yapıyor. Hatayı bul
                    echo "<script>alert('Silme İşlemi Başarıyla Gerçekleşmiştir.'); window.location.href='ayarlar.php'</script>";
                }else {
                    echo "<script>alert('Silme İşlemi Başarısız Olmuştur.'); window.location.href='ayarlar.php'</script>";
                }
            }
        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ayarlar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="ayar_ekle.php" class="btn btn-primary">Ayar Ekle +</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Başlık</th>
                                            <th>Alt Başlık</th>
                                            <th>İkinci Başlık</th>
                                            <th>Anahtar Kelime</th>
                                            <th>Yazan Kişi</th>
                                            <th>Araçlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $selectSorguAyar = "SELECT * FROM ayarlar ORDER BY ayarlar_id ASC";
                                        $selectAyar = $db -> prepare($selectSorguAyar);
                                        $selectAyar -> execute();
                                        while ($sonucSelectAyar = $selectAyar -> fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $sonucSelectAyar["ayarlar_id"];?></td>
                                            <td><?php echo $sonucSelectAyar["ayarlar_title"];?></td>
                                            <td><?php echo $sonucSelectAyar["ayarlar_alt_baslik"];?></td>
                                            <td><?php echo $sonucSelectAyar["ayarlar_ikinci_baslik"];?></td>
                                            <td><?php echo $sonucSelectAyar["ayarlar_anahtar_kelime"];?></td>
                                            <td><?php echo $sonucSelectAyar["ayarlar_yazan_kisi"];?></td>
                                            <td class="center">
                                                <a href="ayar_duzenle.php?id=<?php echo $sonucSelectAyar["ayarlar_id"]?>" class="btn btn-success" style="width:85px; height: 35px;">Düzenle</a>
                                                <a href="ayarlar.php?is=sil&id=<?php echo $sonucSelectAyar["ayarlar_id"]?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-danger" style="width:85px; height: 35px;">Sil</a>
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
