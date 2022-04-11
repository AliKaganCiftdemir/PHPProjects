<?php 
    function baglan($adres) {
        $formBilgileri = array(
            "kullaniciAdi" => "Ali",
            "sifre" => "123"
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $adres);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $formBilgileri);
        curl_setopt($curl, CURLOPT_COOKIEJAR, "localhost/Uygulamalar/curlUygulamasi/c.txt");
        curl_setopt($curl, CURLOPT_COOKIEFILE, "localhost/Uygulamalar/curlUygulamasi/c.txt");
        $curlExecute = curl_exec($curl);
        curl_close($curl);
        return $curlExecute; 
    }

    $baglan = baglan("http://localhost/Uygulamalar/curlUygulamasi/curl3Form.php");
    echo $baglan;
?>