<?php 

    $site = "https://www.beinconnect.com.tr/ana-sayfa";
    $baglan = get_meta_tags($site);

    echo $baglan["description"];

?>