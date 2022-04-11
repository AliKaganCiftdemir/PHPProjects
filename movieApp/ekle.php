<?php 
    include "class.php";

    if (isset($_POST["submit"])) {
        $filmAdi         = $_POST["filmAdi"];
        $filmYayinTarihi = $_POST["filmYayinTarihi"];
        $filmYonetmeni   = $_POST["filmYonetmeni"];
        $resim           = $_POST["resim"];
        $aciklama        = $_POST["aciklama"];

        $movie        = new Movie();

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
                $ekle     = $movie -> insert("movie", "film_adi = ?, film_yayin_tarihi = ?, film_yonetmeni = ?, resim = ?, aciklama = ?", array($filmAdi, $filmYayinTarihi, $filmYonetmeni, $resim, $aciklama));    
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
    <a href="form.php" class="btn btn-primary">< Geri Dön</a>
    <form action="" method="post">
        <table class="table table-dark table-striped">
        <thead>
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
                <td><input type="text" name="filmAdi"></td>
                <td><input type="text" name="filmYayinTarihi"></td>
                <td><input type="text" name="filmYonetmeni"></td>
                <td><input type="text" name="resim"></td>
                <td><input type="text" name="aciklama"></td>
                <td><input type="submit" name="submit" value="Gönder" class="btn btn-primary"></td>
            </tr>     
        </tbody>
        </table>
    </form>
</body>
</html>