<?php
include "../class.php";

if (isset($_POST["id"])) {

    $output  = '';
    $movie   = new Movie();
    $listele = $movie->select("movie", "id = ?", array($_POST["id"]), "", "");

    $output .=
        '<div class="table-responsive">
<table class="table table-bordered overflow-hidden">
    <tr>
        <td class="d-flex">
            ' . '<img class="listFoto" src="' . $listele[0]['resim'] . '" alt="">
        </td>
    </tr>
    <tr>
        <td>
            ' . $listele[0]['film_adi'] . '
        </td>
    </tr>
    <tr>
        <td>
            ' . $listele[0]['film_yayin_tarihi'] . '
        </td>
    </tr>
    <tr>
        <td>
            ' . $listele[0]['aciklama'] . '
        </td>
    </tr>
</table>
</div>';

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