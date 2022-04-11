<?php 

    $site   = "https://www.tcmb.gov.tr/kurlar/today.xml";
    $baglan = simplexml_load_file($site);

    $dolarIsim  = $baglan -> Currency[0] -> Isim;
    $dolarAlis  = $baglan -> Currency[0] -> ForexBuying;
    $dolarSatis = $baglan -> Currency[0] -> ForexSelling;

    $euroIsim   = $baglan -> Currency[3] -> Isim;
    $euroAlis   = $baglan -> Currency[3] -> ForexBuying;
    $euroSatis  = $baglan -> Currency[3] -> ForexSelling;

    echo $dolarIsim." = Alış: ".$dolarAlis." Satış: ".$dolarSatis."<br>";  
    echo $euroIsim." = Alış: ".$euroAlis." Satış: ".$euroSatis."<br>";
?>