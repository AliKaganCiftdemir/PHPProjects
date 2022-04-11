<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Kullanıcı Tablosu</h1>

<table id="customers">
  <tr>
    <th>Ad Soyad</th>
    <th>Telefon</th>
    <th>Email</th>
    <th>Konu</th>
    <th>Mesaj</th>
</tr>

<?php

  session_start();

  if ($_SESSION['user'] == "") {
    echo "<script>window.location.href='cikis.php'</script>";
  }else {

    echo "Kullanıcı adınız: ".$_SESSION['user']."<br>";
    echo "<a href='cikis.php'>Çıkış Yap</a><br><br><br>";

    include "dbBaglanti.php";

    $cek = "SELECT * FROM iletisim";
    $islem = $db -> prepare($cek);
    $islem -> execute(); 
    $sonuc = $islem -> fetchAll(PDO::FETCH_ASSOC);
    $say = $islem -> rowCount();
  
    if ($say > 0) {
      foreach ($sonuc as $s) {
        echo "
          <tr>
            <td>".$s['adSoyad']."</td>
            <td>".$s['telefon']."</td>
            <td>".$s['email']."</td>
            <td>".$s['konu']."</td>
            <td>".$s['mesaj']."</td>
          </tr>
        ";
      }
    }else {
      echo "Listelenecek bir şey bulunamadı.";
    }
  }
?>
</table>
</body>
</html>



