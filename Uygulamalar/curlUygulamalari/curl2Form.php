<form action="" method="post">
    İsim: <br>
    <input type="text" name="isim"> <br>
    Soyisim: <br>
    <input type="text" name="soyisim"> <br>
    Mail: <br>
    <input type="text" name="mail"> <br>
    Bilgi: <br>
    <textarea name="bilgi" cols="30" rows="10"></textarea> <br>

    <button>Gönder</button>

</form>

<?php 
    if ($_POST) {
        foreach ($_POST as $post) {
            echo $post."<br>";
        }
    }
?>
