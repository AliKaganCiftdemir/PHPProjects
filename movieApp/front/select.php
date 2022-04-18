<?php
include "../class.php";

if (isset($_POST["id"])) {

    $output  = '';
    $movie   = new Movie();
    $listele = $movie->select("movie", "id = ?", array($_POST["id"]), "", "");

    $output .= '
        <div class="d-flex">
            <hr>' . '<img class="listFoto" src="' . $listele[0]['resim'] . '" alt="">
        </div>
        <hr>' . $listele[0]['film_adi'] . '
        <hr>' . $listele[0]['film_yayin_tarihi'] . '
        <hr>' . $listele[0]['aciklama'] . '
        <hr>';

    echo $output;
}
?>

<style>
    .listFoto {
        margin: 0 auto;
        width: 80% !important;
        height: 80% !important;
    }
</style>