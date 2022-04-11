<?php 
    session_start();
    if (@$_SESSION["girisKontrol"] == 1) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminAKÇ | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .gradient-custom {
        /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }

    </style>

</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <form class="mb-md-5 mt-md-4 pb-5" method="POST">

              <h2 class="fw-bold mb-2 ">Admin Panel Giriş Ekranı</h2>
              <p class="text-white-50 mb-5">Kullanıcı Adınızı Ve Şifrenizi Giriniz</p>

              <div class="form-outline form-white mb-4">
                <label class="form-label" for="typeEmailX">Kullanıcı Adı</label>
                <input type="text" name="username" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
                <label class="form-label" for="typePasswordX">Şifre</label>
                <input type="password" name="password" class="form-control form-control-lg" />
              </div>
              <input type="submit" name="submit" value="Giriş Yap" class="btn btn-outline-light btn-lg px-5">
            </form>
        </div>
      </div>
    </div>
  </div>
</section>



<?php 
    if (isset($_POST["submit"])) {
        $sifrele = sha1(base64_encode(md5(base64_encode($_POST["password"]))));
        if ($_POST["username"] == "Ali Kağan Çiftdemir" AND $sifrele == "0e4bcde334ab9c28469f17f2532877e433c6e5cc") {
            $_SESSION["girisKontrol"] = 1;
            $_SESSION["username"] = $_POST["username"]; 
            echo "<script>alert('Giriş İşlemi Başarılı.'); window.location.href='index.php'</script>";
            return true;
        }else {
            echo "<script>alert('Giriş İşlemi Başarısız.'); window.location.href='login.php'</script>";
            return false;
        }
    }
?>

</body>
</html>





