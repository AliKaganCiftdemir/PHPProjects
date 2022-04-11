<?php 

    $site = "https://www.beinconnect.com.tr/ana-sayfa";
    $baglan = file_get_contents($site);
    $regex = "#<title>(.*?)</title>#";

    preg_match($regex, $baglan, $title);

    echo $title[1];
?>