<?php 
    include "class.php";

    $id       = @$_GET["id"];
    
    $movie    = new Movie();
    $listele  = $movie -> select("movie", "id = ?", array($id), "", "");

    if (isset($_POST["submit"])) {
        $filmAdi         = $_POST["filmAdi"];
        $filmYayinTarihi = $_POST["filmYayinTarihi"];
        $filmYonetmeni   = $_POST["filmYonetmeni"];
        $resim           = $_POST["resim"];
        $aciklama        = $_POST["aciklama"];

        $regex = "/^[0-9]{4}$/";
        preg_match($regex, $filmYayinTarihi, $control);
        
        if ($filmAdi == "" || $filmYayinTarihi == "" || $filmYonetmeni == "" || $resim == "" || $aciklama == "") {
            echo "
                <div class='alert alert-danger text-center' role='alert'>
                    Alanlardan Herhangibiri Boş Geçilemez.
                </div>";
        }else {
            if ($control == false) {
                echo "
                <div class='alert alert-danger text-center' role='alert'>
                    Girilen Tarih Formatı Geçersiz. Lütfen Sadece Yıl Giriniz.
                </div>";
            }else {
                $guncelle = $movie -> update("movie", "film_adi = ?, film_yayin_tarihi = ?, film_yonetmeni = ?, resim = ?, aciklama = ?", "", "id = ?", array($filmAdi, $filmYayinTarihi, $filmYonetmeni, $resim, $aciklama, $id));   
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Database Uygulamasi</title>
</head>
<body>
    <form action="" method="post">
        <table class="table table-dark table-striped">
        <thead>
            <a href="form.php" class="btn btn-warning">< Geri Dön</a>  
            <tr>
            <th scope="col">Film Adı</th>
            <th scope="col">Film Yayın Tarihi</th>
            <th scope="col">Film Yönetmeni</th>
            <th scope="col">Film Resim Yolu</th>
            <th scope="col">Film Konusu</th>
            <th scope="col">Araçlar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="filmAdi" value="<?php echo $listele[0]["film_adi"]?>"></td>
                <td><input type="text" name="filmYayinTarihi" value="<?php echo $listele[0]["film_yayin_tarihi"]?>"></td>
                <td><input type="text" name="filmYonetmeni" value="<?php echo $listele[0]["film_yonetmeni"]?>"></td>
                <td><input type="text" name="resim" value="<?php echo $listele[0]["resim"]?>"></td>
                <td><input type="text" name="aciklama" value="<?php echo $listele[0]["aciklama"]?>"></td>
                <td>
                    <input type="submit" name="submit" value="Güncelle" class="btn btn-warning"> 
                </td>
            </tr> 
        </tbody>
        </table>
    </form>
</body>
</html>

