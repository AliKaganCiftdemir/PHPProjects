<?php
session_start();
if (@$_SESSION["girisKontrol"] != 1) {
    echo "<script>alert('Önce Giriş Yapmalısınız!'); window.location.href='index.php'</script>";
}
?>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="anasayfa.php">Sayın <?php echo $_SESSION["username"];?> Hoşgeldiniz</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="cikis.php"><i class="fa fa-sign-out fa-fw"></i> Çıkış Yap</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="anasayfa.php"><i class="fa fa-dashboard fa-fw"></i> Anasayfa</a>
                </li>

                <li>
                    <a href="blog.php"><i class="fa fa-table fa-fw"></i> Bloglar</a>
                </li>

                <li>
                    <a href="hakkimizda.php"><i class="fa fa-eject fa-fw"></i> Hakkımızda</a>
                </li>

                <li>
                    <a href="ayarlar.php"><i class="fa fa-gear fa-fw"></i> Ayarlar</a>
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>