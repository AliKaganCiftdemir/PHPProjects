<?php 
    
    $site = "https://www.beinconnect.com.tr/ana-sayfa";
    $baglan = file_get_contents($site);

    $bol1 = explode("<title>", $baglan);
    $bol2 = explode("</title>", $bol1[1]);

    echo $bol2[0];

?>