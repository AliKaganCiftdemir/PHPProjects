<?php 
    include "class.php";

    $id = @$_GET["id"];

    $movie    = new Movie();
    $listele  = $movie -> select("movie", "","", "", "");
    $say      = $movie -> selectCount("movie");

    if (@$_GET["is"] == "sil") {
        $sil = $movie -> delete("movie", "id = ?", array($id));
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
    
    <style>
        .backendFoto{
            width: 25% !important;
            height: 25% !important;
        }
    </style>

</head>
<body>
<table class="table table-dark table-striped">
  <thead>
    <a href="ekle.php" class="btn btn-warning">Film Ekle +</a>  
    <tr>
      <th class="col-2" scope="col">Film Numarası</th>
      <th class="col-2" scope="col">Film Adı</th>
      <th class="col-2" scope="col">Film Yayın Tarihi</th>
      <th class="col-2" scope="col">Film Yönetmeni</th>
      <th class="col-2" scope="col">Film Resim Yolu</th>
      <th class="col-2" scope="col">Araçlar</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      if ($say > 0) {
        foreach ($listele as $liste) {
      ?>
            <tr>
                <td><?php echo $liste["id"]?></td>
                <td><?php echo $liste["film_adi"]?></td>
                <td><?php echo $liste["film_yayin_tarihi"]?></td>
                <td><?php echo $liste["film_yonetmeni"]?></td>
                <td><img src="<?php echo $liste["resim"]?>" alt="" class="backendFoto card-img-top"></td>
                <td>
                    <a href="duzenle.php?id=<?php echo $liste['id']?>" class="btn btn-success">Düzenle</a>
                    <a href="form.php?is=sil&id=<?php echo $liste['id']?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-danger">Sil</a>
                </td>
          </tr> 
      <?php 
        } 
      }else {
        echo "
                <div class='alert alert-danger text-center' role='alert'>
                    Veritabanında Hiç Veri Bulunamadı.
                </div>";
      }
      ?>
    
  </tbody>
</table>
</body>
</html>