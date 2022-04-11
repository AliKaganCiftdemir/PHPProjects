<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Formu</title>
</head>
<body>  
    <form action="" method="POST">
        Öğrenci No:<br>
        <input type="text" name="ogrenciNo"><br>
        Öğrenci Adı:<br> 
        <input type="text" name="ogrenciAdi"><br>
        Öğrenci Bölümü:<br> 
        <input type="text" name="ogrenciBolumu"><br>
        Notlar: <br>
        Öğrenci Not 1: <input type="text" name="ogrenciNot1"><br>
        Öğrenci Not 2: <input type="text" name="ogrenciNot2"><br>
        Öğrenci Not 3: <input type="text" name="ogrenciNot3"><br>
        <input type="submit" name="submit" value="Gönder">
        <a href="araVeyaListele.php">Kriterlere göre Listeleyin.</a>
    </form>
</body>
</html>

<?php 
    include "db.php";
    if (isset($_POST["submit"])) {
        @$ogrenciNo = $_POST["ogrenciNo"];
        @$ogrenciAdi = $_POST["ogrenciAdi"];
        @$ogrenciBolumu = $_POST["ogrenciBolumu"];
        @$ogrenciNot1 = $_POST["ogrenciNot1"]; 
        @$ogrenciNot2 = $_POST["ogrenciNot2"];   
        @$ogrenciNot3 = $_POST["ogrenciNot3"];  
        @$ortalama = ($ogrenciNot1 + $ogrenciNot2 + $ogrenciNot3)/3;   

        $db = new DB();
        $ekle = $db -> ekle("kayit","ogrenciNo = ?, ogrenciAdi = ?, ogrenciBolumu = ?, ogrenciNot1 = ?, ogrenciNot2 = ?, ogrenciNot3 = ?, ortalama = ?", array($ogrenciNo, $ogrenciAdi, $ogrenciBolumu, $ogrenciNot1, $ogrenciNot2, $ogrenciNot3, $ortalama));
        header("Location:kayitListele.php");
    }
    
    
    

?>