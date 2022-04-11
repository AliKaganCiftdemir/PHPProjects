<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ara Veya Listele</title>
</head>
<body>
    <form action="" method="post">
        Listeleme Ölçütleri: <br> 
        Öğrenci adına göre: <input type="checkbox" name="data[]" value="ad"><br> 
        Ortalamasına göre: <input type="checkbox" name="data[]" value="ortalama"><br> 
        Bölümüne göre: <input type="checkbox" name="data[]" value="bolum"><br>
        <input type="submit" name="submit" value="Listele">
        <a href="kayit.php">Kayıt ekranına geri dön</a>
    </form>
</body>
</html>


<?php 
    include "db.php";
    $db = new DB();
    if (isset($_POST["submit"])) {
        $data = @$_POST["data"];
        foreach ($data as $d) {
            if ($d == "ad") {    
                $listele = $db -> listele("kayit", "WHERE ogrenciAdi", "", "", "");
                foreach ($listele as $liste) {
                    echo "
                    <tr><hr>
                        Öğrenci No: <td>".$liste['ogrenciNo']."</td><br>
                        Öğrenci Adı: <td>".$liste['ogrenciAdi']."</td><br>
                    </tr>";
                }
            }elseif ($d == "ortalama") {
                $listele = $db -> listele("kayit", "WHERE ortalama", "", "", "");
                foreach ($listele as $liste) {
                    echo "
                    <tr><hr>
                        Öğrenci No: <td>".$liste['ogrenciNo']."</td><br>
                        Öğrenci Adı: <td>".$liste['ogrenciAdi']."</td><br>
                        Öğrenci Ortalama: <td>".$liste['ortalama']."</td><br>
                    </tr>";
                }
            }elseif ($d == "bolum") {
                $listele = $db -> listele("kayit", "WHERE ogrenciBolumu", "", "", "");
                foreach ($listele as $liste) {
                    echo "
                    <tr><hr>
                        Öğrenci No: <td>".$liste['ogrenciNo']."</td><br>
                        Öğrenci Adı: <td>".$liste['ogrenciAdi']."</td><br>
                        Öğrenci Bölümü: <td>".$liste['ogrenciBolumu']."</td><br>
                    </tr>";
                }
            }
        }
    }
?>

