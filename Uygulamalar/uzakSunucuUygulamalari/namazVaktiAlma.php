<?php 

    $site = "https://namazvakitleri.diyanet.gov.tr/tr-TR/9541/istanbul-icin-namaz-vakti";
    $baglan = file_get_contents($site);

    preg_match_all('#<div class="tpt-title">(.*?)</div>#', $baglan, $vakit);
    preg_match_all('#<div class="tpt-time">(.*?)</div>#', $baglan, $zaman);

    for ($i = 0; $i < 5; $i++) { 
        echo $vakit[1][$i].": ".$zaman[1][$i]."<br>";
    }

?>